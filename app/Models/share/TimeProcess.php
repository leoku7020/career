<?php

namespace App\Models\share;

use Illuminate\Database\Eloquent\Model;

class TimeProcess extends Model
{
    //自動帶入系統時間
    static function autoAddTime($input){
    	//自動帶入系統時間
        $input['start_time'] = (isset($input['start_time']))?(strtotime($input['start_time'])):(time());
        if($input['status'] != "0"){
            if(strtotime($input['end_time'])){
                $input['end_time'] = strtotime($input['end_time']);
            }else{
                $input['end_time'] = 0;
            }
        }else{
            $input['end_time'] = 0;
            $input['start_time'] = 0;
        }

        return $input;
    }
}
