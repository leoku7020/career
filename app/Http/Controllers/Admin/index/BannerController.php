<?php

namespace App\Http\Controllers\Admin\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\index\Banner;
use App\Models\share\FileProcess;
use App\Models\share\TimeProcess;
use App\Models\share\SortProcess;
use App\Http\Requests\BannerUpdateRequest;
use App\Http\Requests\BannerRequest;
use Lang;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::orderBy('sort')->get();

        return view('admin.index.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        //id
        $id = $request->id;
        //init flag
        $flag = true;

        $input = $request->only('name','status','start_time','end_time');
        //自動帶入系統時間
        $input = TimeProcess::autoAddTime($input);

        //如果有檔案更新
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = FileProcess::createFileName($file);
            $input['cover'] = $fileName;
            
        }
        //更新資料
        $banner = Banner::updateData($input,$id);
        if($banner){ //成功
            if($fileName){
                //刪除舊檔案
                $delete = FileProcess::deleteFile($banner,'banners');
                //儲存新檔案resize Img
                $save = FileProcess::resizeImg($file,'banners',$fileName,1020,'');
                if(!$delete || !$save){
                    $flag = false;
                }
            }
        }else{  //失敗
            $flag = false;
        }

        if($flag){
            return redirect()->route('index.banner.index')
                ->with('success',Lang::get('admin.Edit Success'));
        }else{
            return redirect()->route('index.banner.index')
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
        $banner = Banner::where('id',$id)->first();
        
        return view('admin.index.banner.create',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, $id)
    {
        //init flag
        $flag = true;

        $input = $request->only('name','status','start_time','end_time');
        //自動帶入系統時間
        $input = TimeProcess::autoAddTime($input);

        //如果有檔案更新
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = FileProcess::createFileName($file);
            $input['cover'] = $fileName;
            
        }
        //更新資料
        $banner = Banner::updateData($input,$id);
        if($banner){ //成功
            if($fileName){
                //刪除舊檔案
                $delete = FileProcess::deleteFile($banner,'banners');
                //儲存新檔案resize Img
                $save = FileProcess::resizeImg($file,'banners',$fileName,1020,'');
                if(!$delete || !$save){
                    $flag = false;
                }
            }
        }else{  //失敗
            $flag = false;
        }

        if($flag){
            return redirect()->route('index.banner.index')
                ->with('success',Lang::get('admin.Edit Success'));
        }else{
            return redirect()->route('index.banner.index')
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
        //軟刪除
        $input['status'] = 4;
        $result = Banner::softDeleteData($input,$id);

        if($result){
            return redirect()->route('index.banner.index')
                ->with('success',Lang::get('admin.Go Off Success'));
        }else{
            return redirect()->route('index.banner.index')
                ->with('error',Lang::get('admin.Go Off Fail'));
        }
    }

    public function up(Request $request){
        $id = $request->code;
        $result = SortProcess::up(Banner::class,$id);

        if($result){
            return redirect()->route('index.banner.index')
                ->with('success',Lang::get('admin.Sort Success'));
        }else{
            return redirect()->route('index.banner.index')
                ->with('error',Lang::get('admin.Sort Fail'));
        }

    }
    
    public function down(Request $request){
        $id = $request->code;
        $last = "10";//下限
        $result = SortProcess::down(Banner::class,$id,$last);

        if($result){
            return redirect()->route('index.banner.index')
                ->with('success',Lang::get('admin.Sort Success'));
        }else{
            return redirect()->route('index.banner.index')
                ->with('error',Lang::get('admin.Sort Fail'));
        }

    }
}
