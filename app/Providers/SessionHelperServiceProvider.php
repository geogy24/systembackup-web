<?php

namespace App\Providers;
use App;
use Illuminate\Support\ServiceProvider;

class SessionHelperServiceProvider extends ServiceProvider
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
        App::bind('sessionhelper', function() {
            return new App\Helpers\SessionHelper;
        });
    }
}
