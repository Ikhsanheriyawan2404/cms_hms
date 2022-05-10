<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\AboutHeaderController;

// Login Routes ...
Route::get('', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class,'login'])->name('login');
Route::post('logout',  [LoginController::class,'logout'])->name('logout');

// Registration Routes...
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    Route::prefix('admin')->group(function () {
        Route::resources(['homepages' => HomepageController::class]);
        Route::resources(['abouts' => AboutController::class]);
        Route::resources(['about_header' => AboutHeaderController::class]);
        Route::put('about_header/{about_header:id}/update_image', [AboutHeaderController::class, 'updateImage'])->name('about_header.updateImage');

        Route::resources(['users' => UserController::class]);
        Route::post('users/{user:id}/status', [UserController::class, 'changeStatus'])->name('users.status');
        Route::resources(['roles' => RoleController::class]);
    });
});
