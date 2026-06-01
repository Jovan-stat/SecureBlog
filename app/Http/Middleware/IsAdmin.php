<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * V4.1.1 — Verifikasi role user sebelum mengakses resource admin.
     * User yang tidak terautentikasi atau bukan admin akan mendapat 403.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek autentikasi dulu, baru cek role
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk admin.');
        }

        return $next($request);
    }
}