<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StackOverflowServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Library\Services\StackOverflowAPI', function ($app) {
            return new StackOverflowAPI();
        });
    }
}
