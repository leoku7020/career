<?php

namespace App\Http\Controllers\Admin\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\index\Material;
use App\Http\Requests\MaterialRequest;
use App\Http\Requests\MaterialUpdateRequest;
use App\Models\share\FileProcess;
use Lang;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageLimit = 10;
        $materials =  Material::orderBy('created_at')->paginate($pageLimit);
        
        return view('admin.index.material.index',compact('materials'));
    }

    public function search(Request $request){
        $input = $request->only('start_time','end_time','keywords','type');
        $page = $request->page;
        $pageLimit = 10;
        $type = (isset($request->type))?($request->type):(0);
        $search = Material::orderBy('created_at','DESC');
        $setPath = '';
        if(isset($input['start_time'])){
            $search->where('created_at','>=',$input['start_time']);
            $setPath .= '&start_time='.$input['start_time'];
        }
        if(isset($input['end_time'])){
            $search->where('created_at','<=',$input['end_time']);
            $setPath .= '&='.$input['end_time'];
        }
        if(isset($input['type'])){
            $search->where('type','=',$input['type']);
            $setPath .= '&type='.$input['type'];
        }
        if(isset($input['keywords'])){
            $search->where('name','like','%'.$input['keywords'].'%');
            $setPath .= '&keywords='.$input['keywords'];
        }
        $materials = $search->paginate($pageLimit);
        $old = $input;
        //判斷是否超過最後一頁，強制最後一頁
        if($page > $materials->lastPage()){
            $page = $materials->lastPage();
            $materials = $search->paginate($pageLimit, ['*'], 'page', $page);
        }
        //設定連結
        $materials->setPath($setPath);

        return view('admin.index.material.index',compact('materials','old'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.index.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialRequest $request)
    {
        //init
        $flag = true;

        $input = $request->only('name','type','link');

        //如果有檔案更新
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = FileProcess::createFileName($file);
            $input['cover'] = $fileName;
        }

        //新增資料
        $material = Material::createMaterial($input);
        if($material){ //成功
            if($request->file('file')){
                //儲存新檔案resize Img
                $save = FileProcess::resizeImg($file,'material',$fileName,260,60);
                if(!$save){
                    $flag = false;
                }
            }
        }else{  //失敗
            $flag = false;
        }

        if($flag){
            return redirect()->route('index.material.index')
                ->with('success',Lang::get('admin.Edit Success'));
        }else{
            return redirect()->route('index.material.index')
                ->with('error',Lang::get('admin.Edit Fail'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $material = Material::where('id',$id)->first();

        return view('admin.index.material.create',compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialUpdateRequest $request, $id)
    {
        //init
        $flag = true;

        $input = $request->only('name','type','link');

        //如果有檔案更新
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = FileProcess::createFileName($file);
            $input['cover'] = $fileName;
        }

        //更新資料
        $material = Material::updateData($input,$id);
        if($material){ //成功
            if($request->file('file')){
                //刪除舊檔案
                $delete = FileProcess::deleteFile($material,'material');
                //儲存新檔案resize Img
                $save = FileProcess::resizeImg($file,'material',$fileName,260,60);
                if(!$delete || !$save){
                    $flag = false;
                }
            }
        }else{  //失敗
            $flag = false;
        }

        if($flag){
            return redirect()->route('index.material.index')
                ->with('success',Lang::get('admin.Edit Success'));
        }else{
            return redirect()->route('index.material.index')
                ->with('error',Lang::get('admin.Edit Fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $check = Material::checkUse($id);

        if(!$check){
            $delete = Material::deleteMaterial($id); 
        }else{
            return redirect()->route('index.material.index')
                ->with('error',Lang::get('admin.Delete Fail In Use'));
        }
        
        if($delete){
            return redirect()->route('index.material.index')
                ->with('success',Lang::get('admin.Delete Success'));
        }else{
            return redirect()->route('index.material.index')
                ->with('error',Lang::get('admin.Delete Fail'));
        }

    }

    public function batchDestroy(Request $request){

        $deleteArray = explode(',',$request->code_array);
        //檢查是否被使用
        $check = Material::batchCheckUse($deleteArray);

        if(!$check){
            $result = Material::batchDeleteMaterial($deleteArray); 
        }else{
            return redirect()->route('index.material.index')
                ->with('error',Lang::get('admin.Delete Fail In Use'));
        }

        if($result){
            return redirect()->route('index.news.index')
                ->with('success',Lang::get('admin.Delete Success'));
        }else{
            return redirect()->route('index.news.index')
                ->with('error',Lang::get('admin.Delete Fail'));
        }
    }
}
