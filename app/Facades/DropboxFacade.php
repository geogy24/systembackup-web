<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class DropboxFacade extends Facade {
    protected static function getFacadeAccessor() { return 'dropboxhelper'; }
}