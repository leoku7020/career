<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\index\News;


class NewsController extends Controller
{

    const SLUG = "front.news.";
    const SLUG_NAME = "最新消息";

    public function __construct()
    {
        view()->share('slug', self::SLUG);
        view()->share('slug_name', self::SLUG_NAME);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //init
        $type = $request->type;
        $page = $request->page;
        $pageLimit = 10;
        $setPath = '';

        $select = News::where('status','1');
        if($type){
            $select = $select->where('type',$type);
            $setPath .= '?type='.$type;
        }

        $news = $select->orderBy('top','DESC')->orderBy('start_time','DESC')->paginate($pageLimit);

        //判斷是否超過最後一頁，強制最後一頁
        if($page > $news->lastPage()){
            $page = $news->lastPage();
            $news = $select->paginate($pageLimit, ['*'], 'page', $page);
        }
        //設定連結
        $news->setPath($setPath);

        return view(self::SLUG."index",compact('news','type'));
        
    }
    public function view(Request $request, $id)
    {
        //
        $new = News::where('id',$id)->first();

        return view(self::SLUG."view",compact('new'));
        
    }

}
