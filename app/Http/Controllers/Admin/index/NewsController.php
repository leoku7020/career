<?php

namespace App\Http\Controllers\Admin\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\index\News;
use App\Models\share\FileProcess;
use App\Models\share\TimeProcess;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use Lang;

class NewsController extends Controller
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
        $news = News::paginate($pageLimit);

        return view('admin.index.News.index',compact('news'));
    }

    public function search(Request $request){
        $input = $request->only('start_time','end_time','keywords','type','status');
        $page = $request->page;
        $pageLimit = 10;
        $type = (isset($request->type))?($request->type):(0);
        $search = News::orderBy('created_at','DESC');
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
        if(isset($input['status'])){
            $search->where('status','=',$input['status']);
            $setPath .= '&status='.$input['status'];
        } 
        if(isset($input['keywords'])){
            $search->where('title','like','%'.$input['keywords'].'%');
            $setPath .= '&keywords='.$input['keywords'];
        }
        $news = $search->paginate($pageLimit);
        $old = $input;
        //判斷是否超過最後一頁，強制最後一頁
        if($page > $news->lastPage()){
            $page = $news->lastPage();
            $news = $search->paginate($pageLimit, ['*'], 'page', $page);
        }
        //設定連結
        $news->setPath($setPath);

        return view('admin.index.News.index',compact('news','old'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.index.News.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        //init flag
        $flag = true;
        $input = $request->only('title','type','status','start_time','end_time');
        //自動帶入系統時間
        $input = TimeProcess::autoAddTime($input);
        $detail=FileProcess::saveEditorImg($request->summernoteInput,'news');
        if($detail){
            $input['content'] = $detail;
            if($request->file('file')){
                //儲存檔案
                $file = FileProcess::saveMultipleFiles($request->file('file'),'news');
                if($file){
                    $input['file'] = json_encode($file);
                }else{
                    $flag = false;
                }
            }
            //新增
            $new = News::createNews($input);
            if(!$new){
                $flag = false;
            }
        }else{
            $flag = false;
        }

        if($flag){
            return redirect()->route('index.news.index')
                ->with('success',Lang::get('admin.Edit Success'));
        }else{
            return redirect()->route('index.news.index')
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
        $new = News::where('id',$id)->first();

        return view('admin.index.News.create',compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        //
        //init flag
        $flag = true;
        $input = $request->only('title','type','status','start_time','end_time');
        //自動帶入系統時間
        $input = TimeProcess::autoAddTime($input);
        $detail=FileProcess::updateEditorImg($request->summernoteInput,'news');
        if($detail){
            $input['content'] = $detail;
            if($request->file('file')){
                //儲存檔案
                $file = FileProcess::saveMultipleFiles($request->file('file'),'news');
                if($file){
                    $oldfile = News::getOldFile($id);

                    if($oldfile){
                        $input['file'] = json_encode(array_merge($file,$oldfile));
                    }else{
                        $input['file'] = json_encode($file);
                    }
                }else{
                    $flag = false;
                }
            }
            //更新
            $new = News::updateNews($input,$id);
            if(!$new){
                $flag = false;
            }
        }else{
            $flag = false;
        }

        if($flag){
            return redirect()->route('index.news.index')
                ->with('success',Lang::get('admin.Edit Success'));
        }else{
            return redirect()->route('index.news.index')
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
        $result = News::deleteNews($id);

        if($result){
            return redirect()->route('index.news.index')
                ->with('success',Lang::get('admin.Delete Success'));
        }else{
            return redirect()->route('index.news.index')
                ->with('success',Lang::get('admin.Delete Fail'));
        }
    }

    public function batchDestroy(Request $request){

        $deleteArray = explode(',',$request->code_array);
        $result = News::batchDeleteNews($deleteArray);

        if($result){
            return redirect()->route('index.news.index')
                ->with('success',Lang::get('admin.Delete Success'));
        }else{
            return redirect()->route('index.news.index')
                ->with('error',Lang::get('admin.Delete Fail'));
        }
    }

    public function toTop($id){

        $input['top'] = 1;
        //更新
        $new = News::updateNews($input,$id);

        if($new){
            return redirect()->route('index.news.index')
                ->with('success',Lang::get('admin.To Top Success'));
        }else{
            return redirect()->route('index.news.index')
                ->with('error',Lang::get('admin.To Top Fail'));
        }
    }

    public function disTop($id){

        $input['top'] = 0;
        //更新
        $new = News::updateNews($input,$id);

        if($new){
            return redirect()->route('index.news.index')
                ->with('success',Lang::get('admin.Dis Top Success'));
        }else{
            return redirect()->route('index.news.index')
                ->with('error',Lang::get('admin.Dis Top Fail'));
        }
    }

}
