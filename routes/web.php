<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. Redirect Dashboard (Polisi Lalu Lintas)
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('customer.dashboard');
})->middleware(['auth'])->name('dashboard');

// ==========================================
// GROUP CUSTOMER (Folder: resources/views/customer)
// ==========================================
Route::middleware(['auth'])->prefix('customer')->name('customer.')->group(function () {
    
    Route::get('/dashboard', function () { return view('customer.dashboard'); })->name('dashboard');
    
    // Sesuaikan dengan nama file Anda: booking.blade.php
    Route::get('/booking', function () { return view('customer.booking'); })->name('booking');
    
    // tracking.blade.php
    Route::get('/tracking', function () { return view('customer.tracking'); })->name('tracking');
    
    // history.blade.php
    Route::get('/history', function () { return view('customer.history'); })->name('history');
    
    // reviews.blade.php
    Route::get('/reviews', function () { return view('customer.reviews'); })->name('reviews');
    
    // profile.blade.php
    Route::get('/profil', function () { return view('customer.profil'); })->name('profil');
});

// ==========================================
// GROUP ADMIN (Folder: resources/views/admin)
// ==========================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');

    // Kelola Pesanan (admin/orders/index.blade.php)
    Route::get('/orders', function () { return view('admin.orders.index'); })->name('orders.index');
    
    // Detail Pesanan (admin/orders/show.blade.php)
    Route::get('/orders/{id}', function () { return view('admin.orders.show'); })->name('orders.show');

    // Kelola Pelanggan (admin/customers/index.blade.php)
    Route::get('/customer', function () { return view('admin.customer.index'); })->name('customer.index');

    // Kelola Layanan (admin/services/index.blade.php)
    Route::get('/services', function () { return view('admin.services.index'); })->name('services.index');

    // Ulasan Customer (admin/reviews/index.blade.php)
    Route::get('/reviews', function () { return view('admin.reviews.index'); })->name('reviews.index');
});

require __DIR__.'/auth.php';