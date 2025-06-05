<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/home', [HomeController::class, 'my_home'])->name('my-home');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category.show');
Route::get('/about-us',[HomeController::class,'aboutUs'])->name('about');
Route::get('/author/1', [HomeController::class, 'author'])->name('author');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('blog/{slug}', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::fallback([HomeController::class,'notFound'])->name('404');

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
    Route::middleware(['guest','preventBackHistroy'])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login','loginForm')->name('login');
            Route::get('/register','registerForm')->name('register');
            Route::post('/login','loginHandler')->name('login.handler');
            Route::post('/register','registerHandler')->name('register.handler');
         
        Route::get('/forgot-password', 'forgotForm')->name('forgot');
Route::post('/send-password-reset-link', 'sendPasswordResetLink')->name('send.password.reset.link');
Route::get('/reset-password/{token}', 'resetPasswordForm')->name('reset.password');
Route::post('/reset-password', 'resetPasswordHandler')->name('reset.password.handler');
        });
    });

    Route::middleware(['auth','preventBackHistroy'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard','adminDashboard')->name('dashboard');
              Route::post('/logout','logoutHandler')->name('logout');
              Route::get('/profile','profileView')->name('profile');
         

             Route::middleware(['onlySuperAdmin'])->group(function () {
            Route::get('/settings','settingsView')->name('settings');
             Route::get('/categories','categoriesView')->name('categories');
             });
        });
        Route::controller(PostController::class)->group(function () {
            Route::get('/posts/new','addPost')->name('posts.create');
            Route::post('/posts/new','storePost')->name('posts.store');
            Route::get('/posts','postsView')->name('posts.index');
            Route::get('/posts/{post:slug}/edit','editPost')->name('posts.edit');
            Route::post('/posts/{post:slug}/edit','updatePost')->name('posts.update');
            Route::get('/posts/{post:slug}/delete','deletePost')->name('posts.delete');
            Route::post('/upload-image',  'uploadFroalaImage')->name('upload.image');
        });
    });
});


