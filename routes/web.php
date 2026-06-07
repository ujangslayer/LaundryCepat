<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\CustomerProfilController;
use App\Http\Controllers\CustomerDashboardController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('customer.dashboard');
})->middleware(['auth'])->name('dashboard');

// ==========================================
// GROUP CUSTOMER (Folder: resources/views/customer)
// ==========================================
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
  Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
  Route::get('/get-notifications', [CustomerDashboardController::class, 'getNotifications'])->name('notifications.get');
    Route::post('/notifications/{id}/read', [CustomerDashboardController::class, 'markAsRead'])->name('notifications.read');  
  // Pesanan
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    
    // Lacak Pesanan
    Route::get('/tracking/{id}', [TrackingController::class, 'track'])->name('tracking');
    
    // History
    Route::get('/history', [TrackingController::class, 'index'])->name('history');
    
    // Ulasan (SUDAH DIPERBAIKI: Mengarah ke Controller & Ditambah Route POST)
    Route::get('/reviews', [ReviewController::class, 'customerIndex'])->name('reviews');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    
    // Profile
    Route::get('/profil', [CustomerProfilController::class, 'index'])->name('profil');
    Route::put('/profil', [CustomerProfilController::class, 'update'])->name('profil.update');
});

// ==========================================
// GROUP ADMIN (Folder: resources/views/admin)
// ==========================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

Route::get('/get-notifications', [CustomerDashboardController::class, 'getNotifications'])->name('notifications.get');
    Route::post('/notifications/{id}/read', [CustomerDashboardController::class, 'markAsRead'])->name('notifications.read');
    // Kelola Pesanan (SUDAH DIPERBAIKI: Duplikasi Rute Statis Dihapus)
    Route::get('/orders', [PesananController::class, 'index'])->name('orders.index');
    Route::get('/orders/export', [PesananController::class, 'exportCsv'])->name('orders.export');
    Route::get('/orders/{id}', [PesananController::class, 'show'])->name('orders.show');
    Route::get('/orders/{id}/print', [PesananController::class, 'printReceipt'])->name('orders.print');
    Route::put('/orders/{id}/status', [PesananController::class, 'updateStatus'])->name('orders.update_status');
    Route::put('/orders/{id}/payment', [PesananController::class, 'updatePaymentStatus'])->name('orders.update_payment');
        
    // Kelola Pelanggan 
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');

    // Kelola Layanan 
    Route::get('/services', [LayananController::class, 'index'])->name('services.index');
    Route::post('/services', [LayananController::class, 'store'])->name('services.store');
    Route::put('/services/{id}', [LayananController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [LayananController::class, 'destroy'])->name('services.destroy');
   
    // Kelola Ulasan 
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::put('/reviews/{id}/reply', [ReviewController::class, 'reply'])->name('reviews.reply');
});

require __DIR__.'/auth.php';