<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'users_type';
    
    protected $primaryKey = 'user_type_id';

    const CLIENT_USER = 2;

    public static function clientUser()
    {
        return self::CLIENT_USER;
    }
}
