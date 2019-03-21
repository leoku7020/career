<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ajax
Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax',], function(){
	Route::post('delete','FileController@deleteFile');
	Route::post('getLinks','GetDataController@getLinks');
});