<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//前台首頁 
Route::get('/', 'Front\FrontController@index')->name('index');

//前台 news
Route::get('news/', 'Front\NewsController@index')->name('news');
Route::get('news/view/{id}', 'Front\NewsController@view')->name('news.view');

//前台 lecture
Route::get('lecture/', 'Front\LectureController@index')->name('lecture');
Route::get('lecture/view/{id}', 'Front\LectureController@view')->name('lecture.view');

/*
user auth
*/
Route::get('login', 'Auth\LoginController@show');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'Admin\dashBoard\DashboardController@index')->name('home')->middleware('auth');

