<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
    public function index()
    {
        //
        return view(self::SLUG."index");
        
    }
    public function view(Request $request, $id)
    {
        //
        return view(self::SLUG."view");
        
    }

}
