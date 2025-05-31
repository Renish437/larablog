<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/**
 Test

 * 
 */
Route::view('example-page', 'example-page');
Route::view('example-auth', 'example-auth');
Route::get('/admin/logout', function () {
    Auth::logout();
    return redirect('admin/login');
});

/** 
ADMIN ROUTES    
 * 
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware([])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login','loginForm')->name('login');
            Route::get('/register','registerForm')->name('register');
            Route::post('/login','loginHandler')->name('login.handler');
         
            Route::get('/forgot-password','forgotForm')->name('forgot');
        });
    });

    Route::middleware([])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard','adminDashboard')->name('dashboard');
              Route::post('/logout','logoutHandler')->name('logout');
        });
    });
});
