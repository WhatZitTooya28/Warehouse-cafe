<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController; // <-- Pastikan ini ada
use App\Http\Controllers\BarangController;  // <-- Pastikan ini ada
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

// Rute utama akan langsung mengarah ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    // Rute untuk Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('supplier', SupplierController::class);
    Route::get('/transaksi/barang-masuk', [TransaksiController::class, 'indexBarangMasuk'])->name('transaksi.masuk');
    Route::get('/transaksi/barang-keluar', [TransaksiController::class, 'indexBarangKeluar'])->name('transaksi.keluar');

    // Rute untuk Laporan
    Route::get('/laporan/stok', [LaporanController::class, 'stok'])->name('laporan.stok');
    Route::get('/laporan/masuk', [LaporanController::class, 'masuk'])->name('laporan.masuk');
    Route::get('/laporan/keluar', [LaporanController::class, 'keluar'])->name('laporan.keluar');

    // RUTE PROFIL (PENYEBAB ERROR ANDA) - TAMBAHKAN BLOK INI
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk Manajemen Barang
    Route::resource('barang', BarangController::class);
       // Rute untuk Manajemen User
    Route::resource('users', UserController::class);
    // Rute untuk menampilkan form reset password
    Route::get('/users/{user}/reset-password', [UserController::class, 'showResetForm'])->name('users.reset-password.form');

    // Rute untuk memproses reset password
    Route::post('/users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset-password.submit');

});

// Memuat rute untuk autentikasi (login, logout, dll)
require __DIR__.'/auth.php';