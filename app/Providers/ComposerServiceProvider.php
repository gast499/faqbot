<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //View Composer --
        view()->composer(
            ['includes/archive'],
            'App\Http\ViewComposers\QuestionComposer'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
