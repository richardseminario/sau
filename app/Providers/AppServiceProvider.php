<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {   
        Validator::extend('username', function ($attribute, $value, $parameters, $valitors)
        {
            return preg_match('/^[a-zA-Z0-9_]+$/', $value);
        });
    }
}
