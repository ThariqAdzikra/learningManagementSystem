<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard untuk Dosen.
     */
    public function dosenDashboard()
    {
        // 1. Dapatkan data dosen yang sedang login
        $dosen = Auth::user();

        // 2. Ambil semua kelas yang diajar oleh dosen ini menggunakan relasi 'courses'
        //    'withCount' adalah cara efisien untuk menghitung jumlah relasi (mahasiswa & tugas)
        $courses = $dosen->courses()->withCount('students', 'assignments')->get();

        // 3. Hitung statistik total dari semua kelas yang diajar
        $stats = [
            'classCount' => $courses->count(),
            'studentCount' => $courses->sum('students_count'),
            'assignmentCount' => $courses->sum('assignments_count'),
        ];

        // 4. Kirim semua data ke view 'dashboardDosen'
        return view('dashboardDosen', compact('dosen', 'courses', 'stats'));
    }

    /**
     * Menampilkan dashboard untuk Mahasiswa.
     */
    public function mahasiswaDashboard()
    {
        // 1. Dapatkan data mahasiswa yang sedang login
        $mahasiswa = Auth::user();

        // 2. Ambil semua kelas yang diikuti oleh mahasiswa menggunakan relasi 'enrollments'
        //    'dosen' di-load untuk menampilkan nama dosen pengajar
        $courses = $mahasiswa->enrollments()->with('dosen')->withCount('materials', 'assignments')->get();

        // 3. Hitung statistik total dari semua kelas yang diikuti
        $stats = [
            'materi' => $courses->sum('materials_count'),
            'tugas' => $courses->sum('assignments_count'),
            'ujian' => 0, // Placeholder, bisa dikembangkan nanti
        ];

        // 4. Siapkan data tambahan untuk tampilan (ucapan selamat pagi/malam, tanggal)
        $time_of_day = (Carbon::now()->hour < 18 && Carbon::now()->hour > 5) ? 'pagi' : 'malam';
        $current_date = Carbon::now()->translatedFormat('l, d F Y');

        // 5. Kirim semua data ke view 'dashboardMahasiswa'
        return view('dashboardMahasiswa', compact('mahasiswa', 'courses', 'stats', 'time_of_day', 'current_date'));
    }
}