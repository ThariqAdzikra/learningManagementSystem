<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function show($id)
    {
        // Sample data - in real app, fetch from database
        $class = [
            'id' => $id,
            'name' => 'Konsep Pemrograman',
            'code' => 'CS101',
            'schedule' => 'Senin, 08:00 - 10:00',
            'semester' => 'Ganjil 2024/2025',
            'room' => 'Lab Komputer 1'
        ];

        $students = [
            ['id' => 1, 'name' => 'Ahmad Rizki', 'nim' => '2021001', 'avatar' => '/placeholder.svg?height=40&width=40'],
            ['id' => 2, 'name' => 'Siti Nurhaliza', 'nim' => '2021002', 'avatar' => '/placeholder.svg?height=40&width=40'],
            ['id' => 3, 'name' => 'Budi Santoso', 'nim' => '2021003', 'avatar' => '/placeholder.svg?height=40&width=40'],
            ['id' => 4, 'name' => 'Dewi Sartika', 'nim' => '2021004', 'avatar' => '/placeholder.svg?height=40&width=40'],
            ['id' => 5, 'name' => 'Eko Prasetyo', 'nim' => '2021005', 'avatar' => '/placeholder.svg?height=40&width=40'],
        ];

        $materials = [
            ['id' => 1, 'title' => 'Pengenalan Algoritma', 'type' => 'pdf', 'size' => '2.5 MB', 'uploaded_at' => '2024-01-15'],
            ['id' => 2, 'title' => 'Struktur Data Dasar', 'type' => 'pptx', 'size' => '4.2 MB', 'uploaded_at' => '2024-01-20'],
            ['id' => 3, 'title' => 'Video Tutorial Loop', 'type' => 'mp4', 'size' => '15.8 MB', 'uploaded_at' => '2024-01-25'],
            ['id' => 4, 'title' => 'Latihan Soal Array', 'type' => 'docx', 'size' => '1.2 MB', 'uploaded_at' => '2024-02-01'],
        ];

        $assignments = [
            ['id' => 1, 'title' => 'Tugas 1: Algoritma Sorting', 'deadline' => '2024-02-15', 'submitted' => 12, 'total' => 25],
            ['id' => 2, 'title' => 'Tugas 2: Implementasi Stack', 'deadline' => '2024-02-28', 'submitted' => 8, 'total' => 25],
            ['id' => 3, 'title' => 'Project Akhir: Aplikasi CRUD', 'deadline' => '2024-03-15', 'submitted' => 3, 'total' => 25],
        ];

        $grades = [
            ['student' => 'Ahmad Rizki', 'nim' => '2021001', 'tugas1' => 85, 'tugas2' => 90, 'uts' => 88, 'uas' => '-', 'final' => '-'],
            ['student' => 'Siti Nurhaliza', 'nim' => '2021002', 'tugas1' => 92, 'tugas2' => 88, 'uts' => 90, 'uas' => '-', 'final' => '-'],
            ['student' => 'Budi Santoso', 'nim' => '2021003', 'tugas1' => 78, 'tugas2' => 82, 'uts' => 80, 'uas' => '-', 'final' => '-'],
            ['student' => 'Dewi Sartika', 'nim' => '2021004', 'tugas1' => 88, 'tugas2' => 85, 'uts' => 87, 'uas' => '-', 'final' => '-'],
            ['student' => 'Eko Prasetyo', 'nim' => '2021005', 'tugas1' => 75, 'tugas2' => 78, 'uts' => 76, 'uas' => '-', 'final' => '-'],
        ];

        return view('class.show', compact('class', 'students', 'materials', 'assignments', 'grades'));
    }

    public function removeStudent($classId, $studentId)
    {
        // Logic to remove student from class
        return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus dari kelas');
    }

    public function deleteMaterial($classId, $materialId)
    {
        // Logic to delete material
        return redirect()->back()->with('success', 'Materi berhasil dihapus');
    }
}
