<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class DropboxApiClass extends Facade {
    protected static function getFacadeAccessor() { return 'dropboxapiclass'; }
}