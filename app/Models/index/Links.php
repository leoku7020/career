<?php

namespace App\Models\index;

use Illuminate\Database\Eloquent\Model;
use DB;

class Links extends Model
{
    //
    protected $table = 'links';
    protected $fillable = [
        'sort','material_id','status'
    ];

    public function material(){
    	return $this->belongsTo(Material::class);
    }

    static function updateData($input,$id){
    	//update
        $link = self::where('id',$id);
        DB::beginTransaction();
        try {
            $link->update($input); //update the user info
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
