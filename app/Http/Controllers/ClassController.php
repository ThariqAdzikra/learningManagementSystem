<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function show($id)
    {
        // Logika ini sudah benar, ia mengambil satu kelas
        // beserta semua tugasnya (assignments)
        $classroom = ClassRoom::with([
            'assignments' => function ($query) {
                $query->orderBy('created_date', 'desc');
            }
        ])->findOrFail($id);

        // ✅ UBAH BARIS INI
        // Arahkan ke file view baru Anda
        return view('halamanKelasMahasiswa', compact('classroom'));
    }
}