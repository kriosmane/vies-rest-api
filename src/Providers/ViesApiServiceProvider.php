<?php

namespace Kriosmane\ViesApi\Providers;

use Illuminate\Support\ServiceProvider;
use Kriosmane\ViesApi\ViesApi;

class ViesApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        /**
         *  Publish the configuration file (tag: config)
         */
        $this->publishes([
            __DIR__.'/../../config/vies-rest-api.php' => config_path('vies-rest-api.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        // Merge the package configuration file with the application's configuration
        $this->mergeConfigFrom(__DIR__.'/../../config/vies-rest-api.php', 'vies-rest-api');

        // Registra la classe nel Service Container
        $this->app->singleton(ViesApi::class, function () {
            return new ViesApi(config('vies-rest-api'));
        });
    }
}
