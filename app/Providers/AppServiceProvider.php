<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Revolution\Salvager\Contracts\Driver;
use Revolution\Salvager\Drivers\Selenium\FireFox;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Custom Driver
         */
        //        $this->app->singleton(Driver::class, function ($app) {
        //            return new FireFox();
        //        });
    }
}
