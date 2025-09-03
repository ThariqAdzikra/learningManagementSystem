<?php

use Illuminate\Support\Facades\Route;

// Import semua controller yang akan kita gunakan
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Halaman Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Grup Rute Tamu
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Grup Rute yang Membutuhkan Login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


    // -- RUTE KHUSUS UNTUK DOSEN --
    Route::middleware([RoleMiddleware::class . ':dosen'])->prefix('dosen')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dosenDashboard'])->name('dosen.dashboard');
        Route::get('/kelas/{course}', [CourseController::class, 'showDosen'])->name('dosen.kelas.show');

        // --- Rute untuk menyimpan kelas baru dari form modal ---
        Route::post('/kelas', [CourseController::class, 'store'])->name('dosen.kelas.store');
    });

    // -- RUTE KHUSUS UNTUK MAHASISWA --
    Route::middleware([RoleMiddleware::class . ':mahasiswa'])->prefix('mahasiswa')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'mahasiswaDashboard'])->name('mahasiswa.dashboard');
        Route::get('/kelas/{course}', [CourseController::class, 'showMahasiswa'])->name('mahasiswa.kelas.show');

        // Rute untuk memproses permintaan gabung kelas
        Route::post('/kelas/join', [CourseController::class, 'join'])->name('mahasiswa.kelas.join');
    });
});

