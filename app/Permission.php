<?php

namespace App;
use Zizaco\Entrust\EntrustPermission;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends EntrustPermission
{
    use LogsActivity;
    protected $guarded = [];

    protected static $logName = 'Permission';
    protected static $logAttributes = [
        'name', 'display_name', 'description',
    ];
}
