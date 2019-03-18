<?php

namespace App;
use Zizaco\Entrust\EntrustRole;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends EntrustRole
{
    use LogsActivity;
    //
    protected static $logName = 'Role';
    protected static $logAttributes = [
        'name', 'display_name', 'description',
    ];

    public function permissions(){
       return $this->belongsToMany(Permission::class);
    }
}
