<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil pengguna.
     */
    public function show()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        return view('profile', compact('user'));
    }

    /**
     * Perbarui data profil pengguna.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi data profil
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id), // Pastikan username unik, kecuali untuk pengguna ini sendiri
            ],
            // 'email' => [ ... jika diizinkan untuk diubah ]
        ]);

        // Perbarui data pengguna
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->username = $validatedData['username'];
        $user->save();

        // Tangani perubahan kata sandi jika diisi
        if ($request->filled('old_password') || $request->filled('new_password') || $request->filled('new_password_confirmation')) {
            $request->validate([
                'old_password' => 'required|string',
                'new_password' => 'required|string|min:8|confirmed',
            ]);

            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak cocok.']);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();
        }

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}