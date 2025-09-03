<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // Ambil data user yang sedang login
        $user = Auth::user();

        // Cek apakah peran user ada di dalam daftar peran yang diizinkan
        foreach ($roles as $role) {
            if ($user->role === $role) {
                // Jika peran cocok, izinkan request untuk melanjutkan
                return $next($request);
            }
        }

        // Jika tidak ada peran yang cocok, kembalikan halaman error "403 Forbidden"
        abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
    }
}