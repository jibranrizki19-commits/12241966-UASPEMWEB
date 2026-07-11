<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('buku', BukuController::class);

    Route::resource('anggota', AnggotaController::class)
    ->parameters([
        'anggota' => 'anggota'
    ]);

    Route::resource('peminjaman', PeminjamanController::class)
    ->parameters([
        'peminjaman' => 'peminjaman'
    ]);

});

Route::redirect('/', '/dashboard');

require __DIR__.'/auth.php';