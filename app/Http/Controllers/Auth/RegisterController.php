<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // Pastikan ini mengarah ke nama file Blade Anda, 'register.blade.php'
    }

    public function register(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')
            ],
            'role' => 'required|in:dosen,mahasiswa',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
           // ...
// 2. Simpan Data ke Database
DB::table('users')->insert([
    'first_name' => $request->first_name,
    'last_name' => $request->last_name,
    'username' => $request->username, // Pastikan ada di migrasi
    'email' => $request->email,
    'role' => $request->role,
    'password' => Hash::make($request->password), // Enkripsi password
    'created_at' => now(),
    'updated_at' => now() // Tambahkan ini agar tidak ada error kolom 'updated_at'
]);
// ...

            // 3. Redirect ke Halaman Login
            return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');

        } catch (\Exception $e) {
            // Tangani error jika ada
            return back()->withInput()->withErrors(['message' => 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.']);
        }
    }
}