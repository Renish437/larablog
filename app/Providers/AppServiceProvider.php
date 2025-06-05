<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        // 
        RedirectIfAuthenticated::redirectUsing(function ($request) {
            return route('admin.dashboard');
        });
        // Redirect to authenticated User to admin login page
        Authenticate::redirectUsing(function ($request) {
            Session::flash('error','You are not authorized to access this page');
            return route('admin.login');
        });
        // In a service provider (e.g., AppServiceProvider)


    }
}
