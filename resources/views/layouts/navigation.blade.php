<nav style="background: var(--bg); border-bottom: 1px solid var(--border); position: sticky; top: 0; z-index: 50;">
    <div style="max-width: 1100px; margin: 0 auto; padding: 0 1.5rem; height: 60px; display: flex; align-items: center; justify-content: space-between; gap: 1rem;">

        {{-- Logo --}}
        <a href="{{ route('articles.index') }}"
           style="font-size: 1.2rem; font-weight: 700; color: var(--ink); letter-spacing: -0.02em; white-space: nowrap;">
            ✦ Secure Blog
        </a>

        {{-- Nav links --}}
        <div style="display: flex; align-items: center; gap: 0.25rem; flex-wrap: nowrap; white-space: nowrap;">
            <a href="{{ route('articles.index') }}"
            style="padding: 6px 14px; border-radius: 8px; font-size: 14px; font-weight: 500;
                    background: {{ request()->routeIs('articles.index') ? 'var(--bg-soft)' : 'transparent' }};
                    color: {{ request()->routeIs('articles.index') ? 'var(--ink)' : 'var(--ink-muted)' }};">
                Artikel
            </a>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.articles.create') }}"
                    style="padding: 6px 14px; border-radius: 8px; font-size: 14px; font-weight: 500; color: var(--ink-muted);">
                        + Tulis
                    </a>
                @else
                    <a href="https://wa.me/6282229445559?text=Halo,%20saya%20ingin%20gabung%20jadi%20penulis%20artikel!%20di%20Secure%20Blog."
                    target="_blank"
                    style="padding: 6px 14px; border-radius: 8px; font-size: 14px; font-weight: 500; color: var(--ink);">
                        Gabung jadi Penulis!
                    </a>
                @endif
            @endauth
        </div>

        {{-- Kanan: user / auth --}}
        <div style="display: flex; align-items: center; gap: 10px;">
            @auth
                <div x-data="{ open: false }" style="position: relative;">
                    <button @click="open = !open"
                            style="display: flex; align-items: center; gap: 8px; background: var(--bg-soft); border: 1px solid var(--border); border-radius: 9999px; padding: 5px 14px 5px 5px; cursor: pointer; font-size: 14px; font-weight: 500; color: var(--ink);">
                        <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--accent); color: white; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        {{ auth()->user()->name }}
                        @if(auth()->user()->role === 'admin')
                            <span style="font-size: 10px; background: var(--accent); color: white; padding: 1px 6px; border-radius: 9999px;">Admin</span>
                        @endif
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="color: var(--ink-faint);">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.outside="open = false" x-transition
                         style="position: absolute; right: 0; top: calc(100% + 8px); background: white; border: 1px solid var(--border); border-radius: 12px; min-width: 180px; box-shadow: var(--shadow); overflow: hidden; z-index: 100;">
                        <a href="{{ route('profile.edit') }}"
                           style="display: block; padding: 11px 16px; font-size: 14px; color: var(--ink); border-bottom: 1px solid var(--border);">
                            Profil Saya
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    style="width: 100%; text-align: left; padding: 11px 16px; font-size: 14px; color: var(--danger); background: none; border: none; cursor: pointer;">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                   style="padding: 7px 16px; border-radius: 8px; font-size: 14px; font-weight: 500; color: var(--ink-muted); border: 1px solid var(--border);">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   style="padding: 7px 16px; border-radius: 8px; font-size: 14px; font-weight: 500; background: var(--accent); color: white;">
                    Daftar
                </a>
            @endauth
        </div>

    </div>
</nav>