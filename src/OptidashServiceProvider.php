<?php

namespace Optidash\OptidashLaravel;

use Illuminate\Support\ServiceProvider;
use Optidash;

class OptidashServiceProvider extends ServiceProvider {

    /**
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */

    protected $defer = false;


    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->bootPublishes();
    }


     /**
     * Bootstrap publishes.
     *
     * @return void
     */

    public function bootPublishes()
    {
        $path = realpath(__DIR__ . '/../config/optidash.php');
        $this->publishes([$path => config_path('optidash.php')], 'config');
    }


    /**
    * Register Optidash service provider.
    *
    * @return void
    */

    public function register()
    {
        $this->app->singleton('Optidash', function ($app) {
            return new Optidash\Optidash($app['config']['optidash']['api_key']);
        });
    }


    /**
    * Get the services provided by the provider.
    *
    * @return array
    */

    public function provides()
    {
        return array();
    }
}