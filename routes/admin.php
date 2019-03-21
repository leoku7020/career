<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
user auth
*/
Route::group(['namespace'=>'Auth', 'prefix' => 'Auth'], function() {
    // Route::get('login', 'LoginController@show')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');
});
//admin crud
Route::group(['namespace'=>'Admin', 'prefix' => 'admin','middleware' => 'auth'], function() {
    // dashboard
    Route::get('/', 'dashBoard\DashBoardController@index');
    Route::resource('dashboard','dashBoard\DashBoardController');
    //Index
    Route::group(['prefix' => 'Index', 'as' => 'index.'], function() {
    	Route::resource('banner','index\BannerController');
    	Route::resource('news','index\NewsController');
    	Route::post('Search','index\NewsController@search')->name('news.search');
        Route::get('Search','index\NewsController@search')->name('news.search');
        Route::post('bannerUp','index\BannerController@up')->name('bannerUp');
        Route::post('bannerDown','index\BannerController@down')->name('bannerDown');
        Route::post('BatchDelete','index\NewsController@batchDestroy')->name('newsBatchDelete');
        Route::get('toTop/{id}','index\NewsController@toTop')->name('newsToTop');
        Route::get('disTop/{id}','index\NewsController@disTop')->name('newsDisTop');
        Route::resource('link','index\LinksController');
        Route::post('linkUp','index\LinksController@up')->name('linkUp');
        Route::post('linkDown','index\LinksController@down')->name('linkDown');
        Route::resource('material','index\MaterialController');
        Route::post('materialSearch','index\MaterialController@search')->name('materialSearch');
        Route::get('materialSearch','index\MaterialController@search')->name('materialSearch');
        Route::post('materialBatchDelete','index\MaterialController@batchDestroy')->name('materialBatchDelete');
    });
    

});

/*
utility tools
admin only 要鎖住admin user或block ip
*/

Route::group(['prefix' => 'utility'], function() {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('utility.logs');
    Route::get('api-tester', '\Asvae\ApiTester\Http\Controllers\HomeController@index')->name('utility.api-tester');
});

Auth::routes();
