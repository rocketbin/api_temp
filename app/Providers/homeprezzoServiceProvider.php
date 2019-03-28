<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class homeprezzoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('hp', function () {
            return new \App\Services\hpService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
