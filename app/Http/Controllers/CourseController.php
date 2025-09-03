<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User; // Ditambahkan untuk relasi
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /**
     * ====================================================================
     * PERBAIKAN: Method `store` disesuaikan untuk form di dashboard dosen
     * ====================================================================
     * Menyimpan kelas baru yang dibuat oleh dosen.
     */
    public function store(Request $request)
    {
        // 1. Validasi input dari form modal
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'schedule' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            // 2. Buat dan simpan data kelas baru
            $course = Course::create([
                'name' => $validatedData['name'],
                'schedule' => $validatedData['schedule'],
                'description' => $validatedData['description'],
                'dosen_id' => Auth::id(), // Mengambil ID dosen yang sedang login
                // Kolom 'code' akan di-generate otomatis oleh Model Course
            ]);

            Log::info('Kelas baru berhasil dibuat oleh dosen.', ['course_id' => $course->id, 'dosen_id' => Auth::id()]);

            // 3. Alihkan kembali ke dashboard dosen dengan pesan sukses
            return redirect()->route('dosen.dashboard')->with('success', 'Kelas baru berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Gagal membuat kelas baru: ' . $e->getMessage(), [
                'dosen_id' => Auth::id(),
                'request_data' => $request->all(),
            ]);

            // Alihkan kembali dengan pesan error jika terjadi masalah
            return back()->with('error', 'Terjadi kesalahan saat membuat kelas. Silakan coba lagi.');
        }
    }

    /**
     * Menangani permintaan mahasiswa untuk bergabung ke kelas.
     */
    public function join(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:courses,code',
        ], [
            'code.exists' => 'Token kelas tidak ditemukan atau tidak valid.'
        ]);

        $course = Course::where('code', $request->code)->first();
        $student = Auth::user();

        if ($student->enrollments()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'Anda sudah terdaftar di kelas ini.');
        }

        $student->enrollments()->attach($course->id);

        return redirect()->route('mahasiswa.dashboard')->with('success', "Anda berhasil bergabung ke kelas {$course->name}!");
    }


    /**
     * Menampilkan detail kelas untuk dosen.
     */
    public function showDosen(Course $course)
    {
        // Pastikan hanya dosen pemilik kelas yang bisa mengakses
        if ($course->dosen_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        $course->load('students', 'assignments', 'materials');
        return view('halamanKelasDosen', compact('course'));
    }

    /**
     * Menampilkan detail kelas untuk mahasiswa.
     */
    public function showMahasiswa(Course $course)
    {
        // Pastikan mahasiswa terdaftar di kelas ini
        $isEnrolled = Auth::user()->enrollments()->where('course_id', $course->id)->exists();
        if (!$isEnrolled) {
            abort(403, 'AKSES DITOLAK. ANDA BUKAN ANGGOTA KELAS INI.');
        }

        $course->load('dosen', 'assignments', 'materials');
        // Mengarahkan ke file resources/views/halamanKelasMahasiswa.blade.php
        return view('halamanKelasMahasiswa', compact('course'));
    }

    // Metode lain seperti update, edit, destroy bisa ditambahkan di sini sesuai kebutuhan
}