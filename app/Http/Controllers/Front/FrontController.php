<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
        return view(self::SLUG."index");
        
    }

}
