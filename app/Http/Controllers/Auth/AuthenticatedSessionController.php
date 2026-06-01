<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // V3.1.1 — Regenerate session ID setelah login berhasil
        // Mencegah Session Fixation Attack: penyerang yang sudah
        // mengetahui session ID sebelum login tidak bisa membajak sesi.
        $request->session()->regenerate();

        return redirect()->intended(route('articles.index'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // V3.1.1 — Hapus semua data session & regenerate CSRF token saat logout
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}