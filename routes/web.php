<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{RoleController, UserController, LoginController, AboutController, ServiceController, VehicleController, CustomerController, DeliveryController, HomepageController, DashboardController, AboutHeaderController, AlbumVehicleController, ServiceHeaderController, VehicleHeaderController, DeliveryHeaderController};

// Login Routes ...
Route::get('', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class,'login'])->name('login');
Route::post('logout',  [LoginController::class,'logout'])->name('logout');

// Registration Routes...
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resources(['homepages' => HomepageController::class]);
        Route::resources(['customers' => CustomerController::class]);

        Route::resources(['abouts' => AboutController::class]);
        Route::resources(['about_header' => AboutHeaderController::class]);
        Route::put('about_header/{about_header:id}/update_image', [AboutHeaderController::class, 'updateImage'])->name('about_header.updateImage');

        Route::resources(['deliveries' => DeliveryController::class]);
        Route::resources(['delivery_header' => DeliveryHeaderController::class]);
        Route::put('delivery_header/{delivery_header:id}/update_image', [DeliveryHeaderController::class, 'updateImage'])->name('delivery_header.updateImage');

        Route::resources(['vehicles' => VehicleController::class]);
        Route::resources(['album_vehicle' => AlbumVehicleController::class]);
        Route::resources(['vehicle_header' => VehicleHeaderController::class]);
        Route::put('vehicle_header/{vehicle_header:id}/update_image', [VehicleHeaderController::class, 'updateImage'])->name('vehicle_header.updateImage');

        Route::resources(['services' => ServiceController::class]);
        Route::resources(['service_header' => ServiceHeaderController::class]);
        Route::put('service_header/{service_header:id}/update_image', [ServiceHeaderController::class, 'updateImage'])->name('service_header.updateImage');

        Route::resources(['users' => UserController::class]);
        Route::post('users/{user:id}/status', [UserController::class, 'changeStatus'])->name('users.status');
        Route::resources(['roles' => RoleController::class]);
    });
});
