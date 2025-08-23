<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;

// Arahkan halaman utama langsung ke dashboard
Route::get('/', function () {
    return redirect()->route('dosen.dashboard');
});

// Route untuk halaman dashboard utama
Route::get('/dashboard-dosen', [DosenController::class, 'dashboard'])->name('dosen.dashboard');

// Route untuk halaman detail kelas
Route::get('/kelas/{course}', [DosenController::class, 'show'])->name('dosen.kelas.show');