<section>
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 1rem; font-weight: 700; color: var(--ink);">Informasi Profil</h2>
        <p style="font-size: 13px; color: var(--ink-muted); margin-top: 3px;">
            Perbarui nama dan alamat email akun kamu.
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        {{-- Nama --}}
        <div style="margin-bottom: 1.25rem;">
            <label for="name" style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                Nama
            </label>
            <input id="name" name="name" type="text"
                   value="{{ old('name', $user->name) }}"
                   required autofocus autocomplete="name"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft);
                          outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('name')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div style="margin-bottom: 1.25rem;">
            <label for="email" style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                Email
            </label>
            <input id="email" name="email" type="email"
                   value="{{ old('email', $user->email) }}"
                   required autocomplete="username"
                   style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                          font-size: 14px; color: var(--ink); background: var(--bg-soft);
                          outline: none; transition: border-color 0.15s;"
                   onfocus="this.style.borderColor='var(--accent)'"
                   onblur="this.style.borderColor='var(--border)'">
            @error('email')
                <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div style="margin-top: 8px; padding: 10px 14px; background: #fffbeb; border: 1px solid #fde68a; border-radius: 8px; font-size: 13px; color: #92400e;">
                    Email kamu belum diverifikasi.
                    <button form="send-verification"
                            style="background: none; border: none; cursor: pointer; font-size: 13px; color: var(--accent); text-decoration: underline; padding: 0;">
                        Kirim ulang email verifikasi.
                    </button>
                    @if (session('status') === 'verification-link-sent')
                        <p style="margin-top: 6px; font-size: 13px; color: #15803d;">Link verifikasi baru telah dikirim.</p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Actions --}}
        <div style="display: flex; align-items: center; gap: 12px; padding-top: 1rem; border-top: 1px solid var(--border);">
            <button type="submit"
                    style="padding: 10px 28px; background: var(--accent); color: white; border: none;
                           border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
                Simpan
            </button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   style="font-size: 13px; color: #15803d;">
                    Tersimpan!
                </p>
            @endif
        </div>
    </form>
</section>