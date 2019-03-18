<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\index\News;
use App\Models\share\FileProcess;

class FileController extends Controller
{
    //
    public function deleteFile(Request $request){

    	$id = $request->id;
    	$name = $request->name;

    	//init
    	$delete = 0;
    	$update = 0;

    	$new = News::where('id',$id)->first();
    	$file = json_decode($new->file);
    	if (($key = array_search($name, $file)) !== false) {
		    unset($file[$key]);
		    //刪除檔案
	    	$delete = FileProcess::deleteFile($name,'News');
	    	//更新檔案欄位
	    	$input['file'] = json_encode(array_values($file));
	    	$update = News::updateNews($input,$id);
		}

    	if($delete && $update){
    		$result = [
	    		'syscode' => '200'
	    	];
    	}else{
    		$result = [
	    		'syscode' => '202',
	    		'delete' => $delete,
	    		'update' => $update
	    	];
    	}
    	

    	return $result;
    }
}
