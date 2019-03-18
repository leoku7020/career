<?php

namespace App\Models\index;

use Illuminate\Database\Eloquent\Model;
use App\Models\share\FileProcess;
use DB;

class News extends Model
{
    //
    protected $table = 'news';
    protected $fillable = [
        'title','type','status','start_time','end_time','content','file','top'
    ];
    //新增
    static function createNews($input){
    	//新增
        DB::beginTransaction();
        try {
            $new = News::create($input); //Create material table entry
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
    static function updateNews($input,$id){
    	//update
        $new = self::where('id',$id);
        $oldeditor = $new->first()->content;
        DB::beginTransaction();
        try {
            $new->update($input); //update the user info
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // print_r($e->getMessage());//Show excption message);
            return false;
        }

        return true;

    }
    //取得舊檔案
    static function getOldFile($id){
    	return json_decode(self::where('id',$id)->first()->file);
    }
    //刪除
    static function deleteNews($id){

    	try{
    		$new = News::where('id',$id)->first();
	    	$file = $new->file;
	    	$editor = $new->content;
	    	//delete editor img file
	    	if($editor){
	    		FileProcess::deleteEditorImg($editor,'news');
	    	}
	    	//刪除附加檔案
	    	if($file){	    		
	    		FileProcess::deleteMultipleFiles(json_decode($file),'news');
	    	}
	    	//刪除ＤＢ
	        $new->delete();

    	}catch(\Exception $e){
    		// print_r($e->getMessage());//Show excption message;
      		// exit;
    		return false;
    	}

    	return true;
    	
    }
    //批次刪除
    static function batchDeleteNews($deleteArray){

    	foreach ($deleteArray as $key => $id) {
    		$result = self::deleteNews($id);
    		if(!$result){
    			return false;
    		}
    	}

    	return true;

    }
}
