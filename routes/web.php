<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\PostHeaderController;
use App\Http\Controllers\{HomeController, BlogController};
use App\Http\Controllers\Admin\{RoleController, UserController, AboutController, ServiceController, VehicleController, CustomerController, DeliveryController, HomepageController, DashboardController, AboutHeaderController, AlbumVehicleController, CategoryController, ContactController, ServiceHeaderController, VehicleHeaderController, DeliveryHeaderController, PostController};

// Login Routes ...
Route::get('', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class,'login'])->name('login');
Route::post('logout',  [LoginController::class,'logout'])->name('logout');

// Registration Routes...
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/about/{about:slug}', [HomeController::class, 'aboutDetails'])->name('about.details');
    Route::get('/delivery', [HomeController::class, 'delivery'])->name('delivery');
    Route::get('/service', [HomeController::class, 'service'])->name('service');
    Route::get('/vehicle', [HomeController::class, 'vehicle'])->name('vehicle');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

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

        Route::resources(['posts' => PostController::class]);
        Route::resources(['categories' => CategoryController::class]);
        Route::resources(['post_header' => PostHeaderController::class]);
        Route::put('post_header/{post_header:id}/update_image', [PostHeaderController::class, 'updateImage'])->name('post_header.updateImage');

        Route::resources(['contacts' => ContactController::class]);

        Route::resources(['users' => UserController::class]);
        Route::post('users/{user:id}/status', [UserController::class, 'changeStatus'])->name('users.status');
        Route::resources(['roles' => RoleController::class]);
    });
});
