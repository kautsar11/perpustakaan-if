<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // pagination dengan bootstrap 5
        Paginator::useBootstrapFive();

        // cek apakah user admin
        Blade::if('roles', function ($role) {
            return $role === 'admin';
        });
    }
}
