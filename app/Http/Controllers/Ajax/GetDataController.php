<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\index\Links;
use App\Models\index\Material;

class GetDataController extends Controller
{
    //
    public function getLinks(Request $request){

    	$id = $request->id;
    	$link = Links::where('id',$id)->with('material')->get();
    	$material = Material::select('id','name')->orderBy('created_at','DESC')->get();

    	if($link){
    		$result = [
	            'syscode'=>'200',
	            'data'=>$link,
                'material'=>$material
        	];
    	}else{
    		$result = [
	    		'syscode' => '202'
	    	];
    	}

    	return $result;
    }
}
