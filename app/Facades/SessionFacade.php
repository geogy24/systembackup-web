<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SessionFacade extends Facade {
    protected static function getFacadeAccessor() { return 'sessionhelper'; }
}