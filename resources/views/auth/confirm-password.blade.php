<x-guest-layout>

    <div style="margin-bottom: 1.75rem;">
        <h1 style="font-size: 1.3rem; font-weight: 700; letter-spacing: -0.02em;">Konfirmasi Password</h1>
        <p style="font-size: 13px; color: var(--ink-muted); margin-top: 3px; line-height: 1.6;">
            Ini area aman. Masukkan password kamu untuk melanjutkan.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div style="margin-bottom: 1.5rem;">
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

        <button type="submit"
                style="width: 100%; padding: 11px; background: var(--accent); color: white; border: none;
                       border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
            Konfirmasi
        </button>
    </form>

</x-guest-layout>