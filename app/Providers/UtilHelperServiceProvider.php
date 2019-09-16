<?php

namespace App\Providers;
use App;
use Illuminate\Support\ServiceProvider;

class UtilHelperServiceProvider extends ServiceProvider
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
        App::bind('utilhelper', function() {
            return new App\Helpers\UtilHelper;
        });
    }
}
