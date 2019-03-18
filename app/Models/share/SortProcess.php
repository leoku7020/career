<?php

namespace App\Models\share;

use Illuminate\Database\Eloquent\Model;
use DB;

class SortProcess extends Model
{
    //往上
    static function up($model,$id){
        //確認順序
        $object = $model::where('id',$id)->first();
        $nowSort = $object->sort;
        if($nowSort == "1"){ //已為置頂
            return false;
        }else{
            //找前
            $before = $model::where('sort',($nowSort-1))->first();
            $beforeSort = $before->sort;
            //更新排序
            DB::beginTransaction();
            try {
            	//往上
            	$object->sort = $beforeSort;
                $object->save();
                //下移
            	$before->sort = $nowSort;
            	$before->save();
                DB::commit();          
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                // print_r($e->getMessage());//Show excption message);
                // exit;
                return false;
            }
        }
        return true;
    }
    //往下
    static function down($model,$id,$last){
    	//確認順序
        $object = $model::where('id',$id)->first();
        $nowSort = $object->sort;
        if($nowSort == $last){ //已為置底
            return false;
        }else{
            //找後
            $after = $model::where('sort',($nowSort+1))->first();
            $afterSort = $after->sort;
            //更新排序
            DB::beginTransaction();
            try {
            	//往下
            	$object->sort = $afterSort;
                $object->save();
                //上移
            	$after->sort = $nowSort;
            	$after->save();
                DB::commit();          
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                // print_r($e->getMessage());//Show excption message);
                // exit;
                return false;
            }
        }
        return true;
    }
}
