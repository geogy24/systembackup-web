<?php

namespace App\Providers;
use App;
use Illuminate\Support\ServiceProvider;

class DropboxClassServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('dropboxclass', function() {
            return new App\Helpers\DropboxClass;
        });
    }
}
