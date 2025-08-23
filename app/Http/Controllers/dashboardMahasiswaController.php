<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // Pastikan Carbon sudah di-import

class dashboardMahasiswaController extends Controller
{
    public function index()
    {
        // Set locale ke Bahasa Indonesia
        Carbon::setLocale('id');

        // --- AWAL PERUBAHAN ---
        $now = Carbon::now(); // Ambil waktu saat ini

        // Tentukan waktu berdasarkan jam
        $hour = $now->hour;
        $time_of_day = ($hour >= 18 || $hour < 5) ? 'bulan' : 'matahari';
        // --- AKHIR PERUBAHAN ---

        $user_name = 'Asep'; // Anda bisa ganti dengan Auth::user()->name jika sudah ada login
        $current_date = $now->translatedFormat('l, d F Y'); // Gunakan $now yang sudah dibuat

        $stats = [
            'materi' => 10,
            'tugas' => 3,
            'ujian' => 1
        ];

        $courses = [
            [
                'title' => 'Konsep Pemograman',
                'content_count' => 15,
                'teacher' => 'Prof. Ahmad',
                'progress' => 75
            ],
            [
                'title' => 'Konsep Basis Data',
                'content_count' => 15,
                'teacher' => 'Andika Fitra',
                'progress' => 60
            ],
            [
                'title' => 'Budaya Alam Minangkabau',
                'content_count' => 15,
                'teacher' => 'Thariq Adzikra',
                'progress' => 40
            ],
            [
                'title' => 'Budaya Melayu',
                'content_count' => 15,
                'teacher' => 'Nur Khairatul',
                'progress' => 85
            ]
        ];

        // Tambahkan 'time_of_day' ke dalam data yang dikirim ke view
        return view('dashboardMahasiswa', compact('user_name', 'current_date', 'stats', 'courses', 'time_of_day'));
    }
}