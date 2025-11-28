<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;


// Public pages
// Route::get('/', fn() => view('admin.dashboard'))->name('admin.dashboard');
Route::get('/', fn() => view('customer.home'))->name('customer.home');
Route::get('/mens', [ProductController::class, 'mens'])->name('mens');
Route::get('/womens', [ProductController::class, 'womens'])->name('womens');
Route::get('/kids', [ProductController::class, 'kids'])->name('kids');
Route::get('/sale', [ProductController::class, 'sale'])->name('sale');

// Cart routes (requires login)
Route::middleware('auth')->group(function () {
    // Cart page
    Route::get('/cart', [CartController::class, 'index'])->name('customer.cart');

    // Add product to cart
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

    // Remove item from cart
    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');

    // Update quantity
    Route::patch('/cart/update/{item}', [CartController::class, 'updateQuantity'])->name('cart.update');

    // Other customer pages
    Route::get('/customer/orders', fn() => view('customer.orders'))->name('customer.orders');
    Route::get('/customer/heart', fn() => view('customer.heart'))->name('customer.heart');
    Route::get('/customer/checkout', fn() => view('customer.checkout'))->name('customer.checkout');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.process');
    Route::get('/customer/orders', [OrderController::class, 'deliveredOrders'])->name('customer.orders');
Route::post('/cart/remove-selected', [CartController::class, 'removeSelected'])->name('cart.removeSelected');

Route::get('/customer/checkout', [CheckoutController::class, 'index'])->name('customer.checkout');

// Checkout submit (POST)
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
});

// VERY IMPORTANT
require __DIR__.'/auth.php';

