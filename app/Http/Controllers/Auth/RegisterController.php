<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Import model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // 1. Validasi Data (Tetap sama, sudah bagus)
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
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

        // 2. Simpan Data ke Database menggunakan Eloquent Model
        // Ini adalah cara yang lebih modern dan direkomendasikan di Laravel.
        // Blok try-catch bisa dihilangkan karena Laravel akan menangani error secara otomatis.
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password), // Password tetap di-hash dengan aman
        ]);

        // 3. Redirect ke Halaman Login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }
}