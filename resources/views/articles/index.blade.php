<x-app-layout>

    {{-- Page header --}}
    <div style="margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 1.6rem; font-weight: 700; letter-spacing: -0.02em;">
                Telusuri Artikelmu Disini!
            </h1>
            <p style="font-size: 14px; color: var(--ink-muted); margin-top: 2px;">
                Kumpulan artikel terbaru
            </p>
        </div>
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.articles.create') }}"
                   style="padding: 9px 20px; background: var(--accent); color: white; border-radius: 9999px; font-size: 14px; font-weight: 600; flex-shrink: 0;">
                    + Tulis Artikel
                </a>
            @endif
        @endauth
    </div>

    @if(session('success'))
        <div style="margin-bottom: 1.5rem; padding: 12px 16px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 10px; font-size: 14px; color: #15803d;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="margin-bottom: 1.5rem; padding: 12px 16px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 10px; font-size: 14px; color: var(--danger);">
            {{ session('error') }}
        </div>
    @endif

    {{-- Grid artikel --}}
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">

        @forelse($articles as $article)

            <div style="background: white; border-radius: var(--radius); box-shadow: var(--shadow); overflow: hidden; display: flex; flex-direction: column;">

                {{-- Thumbnail --}}
                <a href="{{ route('articles.show', $article) }}" style="display: block; flex-shrink: 0;">
                    @if($article->image_thumbnail)
                        <img src="{{ Storage::url($article->image_thumbnail) }}"
                             alt="{{ $article->title }}"
                             style="width: 100%; height: 180px; object-fit: cover; display: block;">
                    @else
                        <div style="width: 100%; height: 180px; background: linear-gradient(135deg, #e0e7ff 0%, #f0f9ff 100%); display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 2.5rem; opacity: 0.4;">✦</span>
                        </div>
                    @endif
                </a>

                {{-- Konten kartu --}}
                <div style="padding: 1.25rem; flex: 1; display: flex; flex-direction: column;">
                    <a href="{{ route('articles.show', $article) }}" style="flex: 1; display: flex; flex-direction: column;">
                        <h2 style="font-size: 1rem; font-weight: 700; line-height: 1.4; margin-bottom: 8px; color: var(--ink);">
                            {{ $article->title }}
                        </h2>
                        <p style="font-size: 13px; color: var(--ink-muted); line-height: 1.6; flex: 1;
                                   display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ strip_tags($article->content) }}
                        </p>
                    </a>

                    <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 1rem; padding-top: 0.75rem; border-top: 1px solid var(--border);">
                        <span style="font-size: 12px; color: var(--ink-faint);">
                            {{ $article->created_at->format('d M Y') }}
                        </span>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <div style="display: flex; gap: 8px;">
                                    <a href="{{ route('admin.articles.edit', $article) }}"
                                       style="font-size: 12px; color: var(--ink-muted); padding: 3px 10px; border-radius: 6px; border: 1px solid var(--border);">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                          onsubmit="return confirm('Hapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="font-size: 12px; color: var(--danger); padding: 3px 10px; border-radius: 6px; border: 1px solid #fecaca; background: none; cursor: pointer;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>

            </div>

        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 5rem 1rem; background: white; border-radius: var(--radius); box-shadow: var(--shadow);">
                <div style="font-size: 3rem; margin-bottom: 1rem;">✦</div>
                <p style="font-size: 1.1rem; font-weight: 600; margin-bottom: 6px;">Belum ada artikel</p>
                <p style="font-size: 14px; color: var(--ink-muted);">Artikel yang diterbitkan akan muncul di sini.</p>
            </div>
        @endforelse

    </div>

    {{-- Pagination --}}
    @if($articles->hasPages())
        <div style="margin-top: 2rem;">
            {{ $articles->links() }}
        </div>
    @endif

</x-app-layout>