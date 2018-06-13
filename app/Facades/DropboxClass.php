<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class DropboxClass extends Facade {
    protected static function getFacadeAccessor() { return 'dropboxclass'; }
}