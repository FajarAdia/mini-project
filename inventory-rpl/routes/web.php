<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/tes', function () {
    return 'Web Laravel Berjalan Normal!';
});

Route::get('/', function () {
    return redirect()->route('barang.index');
});

Route::get('/dashboard', [BarangController::class, 'index'])->name('dashboard');

// Route CRUD barang
Route::resource('barang', BarangController::class);
Route::get('/dashboard', [BarangController::class, 'dashboard'])->name('dashboard');
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');