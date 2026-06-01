<x-guest-layout>

    <div style="margin-bottom: 1.75rem;">
        <h1 style="font-size: 1.3rem; font-weight: 700; letter-spacing: -0.02em;">Reset Password</h1>
        <p style="font-size: 13px; color: var(--ink-muted); margin-top: 3px;">Buat password baru untuk akunmu.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        {{-- Email --}}
        <div style="margin-bottom: 1.25rem;">
            <label for="email" style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}"
                   required autofocus autocomplete="username"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft); outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('email')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password Baru --}}
        <div style="margin-bottom: 1.25rem;">
            <label for="password" style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">Password Baru</label>
            <input id="password" name="password" type="password"
                   required autocomplete="new-password"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft); outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('password')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div style="margin-bottom: 1.75rem;">
            <label for="password_confirmation" style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">Konfirmasi Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                   required autocomplete="new-password"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft); outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('password_confirmation')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                style="width: 100%; padding: 11px; background: var(--accent); color: white; border: none;
                       border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
            Reset Password
        </button>
    </form>

</x-guest-layout>