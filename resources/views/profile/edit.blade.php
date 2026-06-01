<x-app-layout>

    {{-- Page header --}}
    <div style="margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 1.6rem; font-weight: 700; letter-spacing: -0.02em;">Profil Saya</h1>
            <p style="font-size: 14px; color: var(--ink-muted); margin-top: 2px;">
                Kelola informasi akun dan keamanan kamu
            </p>
        </div>
        <a href="{{ route('articles.index') }}"
        style="padding: 9px 20px; border: 1px solid var(--border); border-radius: 9999px; font-size: 14px; font-weight: 500; color: var(--ink-muted);">
            ← Kembali
        </a>
    </div>

    <div style="display: flex; flex-direction: column; gap: 1.5rem; max-width: 1500px;">

        {{-- Update Profile Information --}}
        <div style="background: white; border-radius: var(--radius); box-shadow: var(--shadow); padding: 2rem;">
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Update Password --}}
        <div style="background: white; border-radius: var(--radius); box-shadow: var(--shadow); padding: 2rem;">
            @include('profile.partials.update-password-form')
        </div>

        {{-- Delete Account --}}
        <div style="background: white; border-radius: var(--radius); box-shadow: var(--shadow); padding: 2rem; border: 1px solid #fecaca;">
            @include('profile.partials.delete-user-form')
        </div>

    </div>

</x-app-layout>