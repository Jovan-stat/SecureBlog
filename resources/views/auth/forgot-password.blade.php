<x-guest-layout>

    <div style="margin-bottom: 1.75rem;">
        <h1 style="font-size: 1.3rem; font-weight: 700; letter-spacing: -0.02em;">Lupa Password</h1>
        <p style="font-size: 13px; color: var(--ink-muted); margin-top: 3px; line-height: 1.6;">
            Masukkan email kamu dan kami akan mengirim link untuk mereset password.
        </p>
    </div>

    @if (session('status'))
        <div style="margin-bottom: 1.25rem; padding: 10px 14px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; font-size: 13px; color: #15803d;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div style="margin-bottom: 1.5rem;">
            <label for="email" style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}"
                   required autofocus
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft); outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('email')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                style="width: 100%; padding: 11px; background: var(--accent); color: white; border: none;
                       border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
            Kirim Link Reset
        </button>

        <p style="text-align: center; margin-top: 1.25rem; font-size: 13px; color: var(--ink-muted);">
            <a href="{{ route('login') }}" style="color: var(--accent); font-weight: 500;">← Kembali ke Login</a>
        </p>
    </form>

</x-guest-layout>