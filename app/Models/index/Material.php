<?php

namespace App\Models\index;

use Illuminate\Database\Eloquent\Model;
use App\Models\share\FileProcess;
use App\Models\index\Links;
use DB;

class Material extends Model
{
    //
    protected $table = 'material';
    protected $fillable = [
        'type','name','cover','link'
    ];

    //新增
    static function createMaterial($input){
    	//新增
        DB::beginTransaction();
        try {
            $material = self::create($input); //Create material table entry
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // print_r($e->getMessage());//Show excption message);
            // exit;
            return false;
        }

        return true;
    }
    //更新
    static function updateData($input,$id){
    	//update
        $material = self::where('id',$id);
        $oldFile = $material->first()->cover;
        DB::beginTransaction();
        try {
            $material->update($input); //update the user info
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // print_r($e->getMessage());//Show excption message);
            return false;
        }   

    	return $oldFile;
    }

    //刪除
    static function deleteMaterial($id){

    	try{
    		$material = self::where('id',$id)->first();
	    	$file = $material->cover;
	    	//刪除舊檔案
	    	if($file){	    		
	    		FileProcess::deleteFile($file,'material');
	    	}
	    	//刪除ＤＢ
	        $material->delete();

    	}catch(\Exception $e){
    		// print_r($e->getMessage());//Show excption message;
      // 		exit;
    		return false;
    	}

        return true;
    }
    //批次刪除
    static function batchDeleteMaterial($id){

    	foreach ($id as $key => $value) {
    		$material = self::deleteMaterial($value);
    		if(!$material){
    			return false;
    		}
    	}

    	return ture;
    }

    //確認是否被使用
    static function checkUse($id){
    	$link = Links::where('material_id',$id)->get();

    	if($link->count()){
    		return true;
    	}else{
    		return false;
    	}
    }

    //批次確認是否被使用
    static function batchCheckUse($id){
    	foreach ($id as $key => $value) {
    		$link = self::checkUse($value);
    		if(!$link){
    			return false;
    		}
    	}

    }
}
