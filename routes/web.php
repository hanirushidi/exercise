<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;   // Add OrderController
use App\Http\Controllers\UserController;    // Add UserController
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    // Get the total number of products, users, and orders
    $totalProducts = Product::count();
    $totalUsers = User::count();
    $totalOrders = Order::count();  // Get total orders
    
    // Pass these values to the dashboard view
    return view('dashboard', compact('totalProducts', 'totalUsers', 'totalOrders'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protected by 'auth' middleware
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product Routes
    Route::resource('products', ProductController::class);

    // User Routes (Adding users.index route here)
    Route::resource('users', UserController::class);

    // Order Routes (Adding orders.index route here)
    Route::resource('orders', OrderController::class);
});

require __DIR__.'/auth.php';
