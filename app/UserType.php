<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'users_type';
    
    protected $primaryKey = 'user_type_id';

    const CLIENT_USER = 2;

    const ADMIN_USER = 1;

    public static function clientUser()
    {
        return self::CLIENT_USER;
    }

    public static function adminUser()
    {
        return self::ADMIN_USER;
    }
}
