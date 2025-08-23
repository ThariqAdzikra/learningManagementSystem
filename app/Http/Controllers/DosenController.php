<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama.
     */
    public function dashboard()
    {
        $courses = Course::all();
        $dosen = (object)['name' => 'Prof. Ahmad']; // Ganti dengan data user yang login
        $stats = [
            'classCount' => $courses->count(),
            'studentCount' => 88,
            'assignmentCount' => 8,
        ];
        return view('dashboard_dosen', compact('dosen', 'stats', 'courses'));
    }

    /**
     * Menampilkan halaman detail kelas.
     */
    public function show(Course $course)
    {
        // Data di bawah ini statis sebagai contoh.
        $students = [
            ['id' => 1, 'name' => 'Ahmad Rizki', 'nim' => '2021001'],
            ['id' => 2, 'name' => 'Siti Nurhaliza', 'nim' => '2021002'],
            ['id' => 3, 'name' => 'Budi Santoso', 'nim' => '2021003'],
        ];
        $materials = [
            ['id' => 1, 'title' => 'Pengenalan Algoritma', 'type' => 'PDF', 'date' => '2024-01-15'],
            ['id' => 2, 'title' => 'Struktur Kontrol', 'type' => 'Video', 'date' => '2024-01-22'],
        ];
        $grades = [
            ['student_id' => 1, 'tugas1' => 85, 'uts' => 88],
            ['student_id' => 2, 'tugas1' => 80, 'uts' => 85],
            ['student_id' => 3, 'tugas1' => 75, 'uts' => 70],
        ];

        return view('detail_kelas', compact('course', 'students', 'materials', 'grades'));
    }
}