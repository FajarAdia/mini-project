<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

// Redirect halaman utama ke daftar barang
Route::get('/', function () {
    return redirect()->route('barang.index');
});

// Route sesuai spesifikasi Lembar Kerja (Point IV)
Route::get('/dashboard', [BarangController::class, 'dashboard'])->name('dashboard');
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');