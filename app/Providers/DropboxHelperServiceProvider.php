<?php

namespace App\Providers;
use App;
use Illuminate\Support\ServiceProvider;

class DropboxHelperServiceProvider extends ServiceProvider
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
        App::bind('dropboxhelper', function() {
            return new App\Helpers\DropboxHelper;
        });
    }
}
