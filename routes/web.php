<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;

Route::get('/', fn() => redirect()->route('dosen.dashboard'));

// Route untuk Halaman Utama
Route::get('/dashboard-dosen', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
Route::get('/kelas/{course}', [DosenController::class, 'show'])->name('dosen.kelas.show');

// Routes untuk Aksi Mahasiswa
Route::post('/kelas/{course}/mahasiswa', [DosenController::class, 'tambahMahasiswa'])->name('mahasiswa.tambah');
Route::delete('/kelas/{course}/mahasiswa/{student}', [DosenController::class, 'hapusMahasiswa'])->name('mahasiswa.hapus');

// Routes untuk Aksi Materi
Route::post('/kelas/{course}/materi', [DosenController::class, 'uploadMateri'])->name('materi.upload');
Route::put('/materi/{material}', [DosenController::class, 'updateMateri'])->name('materi.update');
Route::delete('/materi/{material}', [DosenController::class, 'hapusMateri'])->name('materi.hapus');

// Routes untuk Aksi Tugas
Route::post('/kelas/{course}/tugas', [DosenController::class, 'buatTugas'])->name('tugas.buat');