<?php

use App\Http\Controllers\PenghuniController;   
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController; 


Route::get('/', function () {
    return view('welcome');
});

// Hapus Route::get('/dashboard', function () { ... }) bawaan Breeze, ganti dengan ini:
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/penghuni', [PenghuniController::class, 'index'])->middleware(['auth', 'verified'])->name('penghuni.index');
    Route::get('/penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
    Route::put('/penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
    Route::get('/tagihan/buat', [PaymentController::class, 'create'])->name('tagihan.create');
    Route::post('/tagihan', [PaymentController::class, 'store'])->name('tagihan.store');
});

require __DIR__.'/auth.php';
