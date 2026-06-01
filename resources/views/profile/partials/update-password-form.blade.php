<section>
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 1rem; font-weight: 700; color: var(--ink);">Ubah Password</h2>
        <p style="font-size: 13px; color: var(--ink-muted); margin-top: 3px;">
            Gunakan password panjang dan acak agar akun tetap aman.
        </p>
    </div>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        {{-- Password Saat Ini --}}
        <div style="margin-bottom: 1.25rem;">
            <label for="update_password_current_password"
                   style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                Password Saat Ini
            </label>
            <input id="update_password_current_password" name="current_password" type="password"
                   autocomplete="current-password"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft);
                          outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('current_password', 'updatePassword')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password Baru --}}
        <div style="margin-bottom: 1.25rem;">
            <label for="update_password_password"
                   style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                Password Baru
            </label>
            <input id="update_password_password" name="password" type="password"
                   autocomplete="new-password"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft);
                          outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('password', 'updatePassword')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div style="margin-bottom: 1.25rem;">
            <label for="update_password_password_confirmation"
                   style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                Konfirmasi Password Baru
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   autocomplete="new-password"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft);
                          outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('password_confirmation', 'updatePassword')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Actions --}}
        <div style="display: flex; align-items: center; gap: 12px; padding-top: 1rem; border-top: 1px solid var(--border);">
            <button type="submit"
                    style="padding: 10px 28px; background: var(--accent); color: white; border: none;
                           border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
                Simpan
            </button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   style="font-size: 13px; color: #15803d;">
                    Tersimpan!
                </p>
            @endif
        </div>
    </form>
</section>