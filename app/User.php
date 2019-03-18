<?php

namespace App;
use Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\Impersonate\Models\Impersonate;
use Zizaco\Entrust\Traits\EntrustUserTrait;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Notifications\MailResetPasswordToken;
use DB;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait, LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status'
    ];
    protected static $logName = 'User';
    protected static $logFillable = true;
    // protected static $logAttributes = [
    //     'name', 'email',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'role_user');
    }

    static function updateData($input,$id){
        $user = User::find($id);
        DB::beginTransaction();
        try {
            $user->update($input); //update the user info
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            // print_r($e->getMessage());//Show excption message);
        }   
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }
    /*
    Auth::user()->impersonate($other_user);
    // You're now logged as the $other_user
    Auth::user()->leaveImpersonation();
    // You're now logged as your original user.

    */
}