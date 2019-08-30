<?php

namespace andcarpi\Popper;

use Illuminate\Support\ServiceProvider;

class PopperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('popper',function(){
            return new Popper();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/popper.php' => config_path('popper.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/js' => public_path('vendor/laravel-popper')
        ], 'public');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'popper');
    }
}
