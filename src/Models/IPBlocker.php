<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IPBlocker extends Model
{
    protected $table = 'ipblockers';

    protected $fillable = [
        'ip_address',
        'status'
    ];

    /**
     * check ip address if is Blocked
     *
     * @return boolean
     */
    public static function isBlocked()
    {
        $obj = false;
        if(self::where(['ip_address' => \Request::ip(), 'status' => true])->count()) {
            $obj = true;
        }
        return $obj;
    }
}