<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\index\Banner;
use App\Models\index\News;
use App\Models\index\Links;


class FrontController extends Controller
{
    const SLUG = "front.";
    const SLUG_NAME = "首頁";

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
    public function index()
    {
        $banners = Banner::where('status','1')->orderBy('sort')->get();
        $news = [];
        $need = ['1','2','3','4'];
        foreach ($need as $value) {
            $news[] = News::where('status','1')->where('type',$value)->orderBy('top')->orderBy('created_at','DESC')->first();
        }
        $links = Links::where('status','1')->with('material')->orderBy('sort')->get();

        return view(self::SLUG."index",compact('banners','news','links'));
        
    }

}
