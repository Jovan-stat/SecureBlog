<x-guest-layout>

    <div style="margin-bottom: 1.75rem;">
        <h1 style="font-size: 1.3rem; font-weight: 700; letter-spacing: -0.02em;">Verifikasi Email</h1>
        <p style="font-size: 13px; color: var(--ink-muted); margin-top: 3px; line-height: 1.6;">
            Terima kasih sudah mendaftar! Cek email kamu dan klik link verifikasi yang kami kirimkan.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div style="margin-bottom: 1.25rem; padding: 10px 14px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; font-size: 13px; color: #15803d;">
            Link verifikasi baru telah dikirim ke email kamu.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit"
                style="width: 100%; padding: 11px; background: var(--accent); color: white; border: none;
                       border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
            Kirim Ulang Email Verifikasi
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" style="margin-top: 1rem; text-align: center;">
        @csrf
        <button type="submit"
                style="background: none; border: none; cursor: pointer; font-size: 13px; color: var(--ink-muted);">
            Keluar
        </button>
    </form>

</x-guest-layout>