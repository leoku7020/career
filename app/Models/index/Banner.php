<?php

namespace App\Models\index;

use Illuminate\Database\Eloquent\Model;
use DB;

class Banner extends Model
{
    //
    protected $table = 'banners';
    protected $fillable = [
        'sort','name','status','start_time','end_time','cover'
    ];


    static function updateData($input,$id){
    	//update
        $banner = self::where('id',$id);
        $oldFile = $banner->first()->cover;
        DB::beginTransaction();
        try {
            $banner->update($input); //update the user info
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // print_r($e->getMessage());//Show excption message);
            return false;
        }   

    	return $oldFile;
    }

    static function softDeleteData($input,$id){
        //update
        $banner = self::where('id',$id);
        DB::beginTransaction();
        try {
            $banner->update($input); //update the user info
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // print_r($e->getMessage());//Show excption message);
            return false;
        }   

        return true;
    }

}
