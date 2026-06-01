<x-guest-layout>

    <div style="margin-bottom: 1.75rem;">
        <h1 style="font-size: 1.3rem; font-weight: 700; letter-spacing: -0.02em;">Masuk</h1>
        <p style="font-size: 13px; color: var(--ink-muted); margin-top: 3px;">Selamat datang kembali!</p>
    </div>

    {{-- Session status --}}
    @if (session('status'))
        <div style="margin-bottom: 1.25rem; padding: 10px 14px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; font-size: 13px; color: #15803d;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div style="margin-bottom: 1.25rem;">
            <label for="email" style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}"
                   required autofocus autocomplete="username"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft); outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('email')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div style="margin-bottom: 1rem;">
            <label for="password" style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">Password</label>
            <input id="password" name="password" type="password"
                   required autocomplete="current-password"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft); outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('password')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember me + Forgot password --}}
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
            <label style="display: flex; align-items: center; gap: 7px; font-size: 13px; color: var(--ink-muted); cursor: pointer;">
                <input type="checkbox" name="remember" id="remember_me"
                       style="width: 15px; height: 15px; accent-color: var(--accent);">
                Ingat saya
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   style="font-size: 13px; color: var(--accent);">
                    Lupa password?
                </a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit"
                style="width: 100%; padding: 11px; background: var(--accent); color: white; border: none;
                       border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
            Masuk
        </button>

        <p style="text-align: center; margin-top: 1.25rem; font-size: 13px; color: var(--ink-muted);">
            Belum punya akun?
            <a href="{{ route('register') }}" style="color: var(--accent); font-weight: 500;">Daftar</a>
        </p>
    </form>

</x-guest-layout>