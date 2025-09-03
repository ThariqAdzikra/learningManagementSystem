<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('login'); // Pastikan Anda memiliki view 'login.blade.php'
    }

    /**
     * Tangani permintaan login.
     */
    public function login(Request $request)
    {
        // 1. Validasi data
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Coba untuk login
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // 3. Periksa peran pengguna dan arahkan ke dashboard yang sesuai
            if ($user->role === 'mahasiswa') {
                // PERUBAHAN: Menggunakan nama rute yang baru
                return redirect()->route('mahasiswa.dashboard');
            } elseif ($user->role === 'dosen') {
                // PERUBAHAN: Menggunakan nama rute yang baru
                return redirect()->route('dosen.dashboard');
            }

            // Pengalihan default jika peran tidak terdefinisi
            Auth::logout();
            return redirect('/login')->withErrors(['username' => 'Peran pengguna tidak valid.']);
        }

        // 4. Jika login gagal, kembali dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password yang diberikan salah.',
        ])->onlyInput('username');
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}