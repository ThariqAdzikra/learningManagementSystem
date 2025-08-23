<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Material;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * Menampilkan halaman detail kelas dengan semua data terkait.
     */
    public function show(Course $course)
    {
        // Mengambil data dinamis dari relasi database
        return view('detail_kelas', [
            'course' => $course,
            'students' => $course->students()->orderBy('name')->get(),
            'materials' => $course->materials()->latest()->get(),
            'assignments' => $course->assignments()->latest()->get(),
            'grades' => [], // Data nilai bisa dikembangkan di sini
        ]);
    }

    // --- FITUR MAHASISWA ---
    public function tambahMahasiswa(Request $request, Course $course)
    {
        $request->validate(['name' => 'required|string|max:255', 'nim' => 'required|string|max:255|unique:students,nim']);
        $student = Student::create($request->all());
        $course->students()->attach($student->id);
        return back()->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function hapusMahasiswa(Course $course, Student $student)
    {
        $course->students()->detach($student->id);
        return back()->with('success', 'Mahasiswa berhasil dihapus dari kelas.');
    }

    // --- FITUR MATERI ---
    public function uploadMateri(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,mp4,mov|max:20480', // max 20MB
        ]);
        $file = $request->file('file');
        $path = $file->store('materials', 'public');
        $course->materials()->create(['title' => $request->title, 'file_path' => $path, 'file_type' => $file->getClientOriginalExtension()]);
        return back()->with('success', 'Materi berhasil di-upload.');
    }
    
    public function updateMateri(Request $request, Material $material)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $material->update(['title' => $request->title]);
        return back()->with('success', 'Materi berhasil di-update.');
    }

    public function hapusMateri(Material $material)
    {
        Storage::disk('public')->delete($material->file_path);
        $material->delete();
        return back()->with('success', 'Materi berhasil dihapus.');
    }

    // --- FITUR TUGAS ---
    public function buatTugas(Request $request, Course $course)
    {
        $request->validate(['title' => 'required|string|max:255', 'description' => 'nullable|string', 'deadline' => 'required|date']);
        $course->assignments()->create($request->all());
        return back()->with('success', 'Tugas berhasil dibuat.');
    }
}