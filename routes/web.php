<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
// Import semua controller yang dibutuhkan
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AssignmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
=======
use App\Http\Controllers\Auth\RegisterController; // Pastikan ini diimpor
>>>>>>> Stashed changes

// Rute untuk halaman Landing Page
Route::get('/', function () {
<<<<<<< Updated upstream
    return view('welcome');
});

// Route untuk dashboard mahasiswa (sudah ada sebelumnya)
Route::get('/dashboardMahasiswa', [DashboardMahasiswaController::class, 'index'])->name('dashboard.mahasiswa');


// --- ROUTE BARU ANDA ---

// Route untuk menampilkan halaman detail kelas berdasarkan ID
// Contoh URL: /kelas/1
Route::get('/kelas/{id}', [ClassController::class, 'show'])->name('kelas.show');

// Route untuk menandai tugas sebagai selesai
// Ini dibutuhkan oleh form di dalam halaman kelas
// PERBAIKAN: Mengganti } dengan ; di akhir baris ini
Route::patch('/assignments/{id}/complete', [AssignmentController::class, 'markCompleted'])->name('assignments.complete');
=======
    return view('landing');
})->name('landing');

// Rute untuk halaman Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Rute untuk menampilkan form register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Rute untuk memproses form register
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
>>>>>>> Stashed changes
