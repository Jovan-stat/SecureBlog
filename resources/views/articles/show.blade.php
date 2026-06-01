<x-app-layout>

    {{-- Page header --}}
    <div style="margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <a href="{{ route('articles.index') }}"
               style="font-size: 13px; color: var(--ink-muted); display: inline-flex; align-items: center; gap: 4px; margin-bottom: 8px;">
                ← Kembali ke Artikel
            </a>
            <h1 style="font-size: 1.6rem; font-weight: 700; letter-spacing: -0.02em; max-width: 680px; line-height: 1.3;">
                {{ $article->title }}
            </h1>
            <p style="font-size: 13px; color: var(--ink-faint); margin-top: 6px;">
                {{ $article->created_at->format('d M Y') }}
            </p>
        </div>
        @auth
            @if(auth()->user()->role === 'admin')
                <div style="display: flex; gap: 8px; flex-shrink: 0;">
                    <a href="{{ route('admin.articles.edit', $article) }}"
                       style="padding: 9px 20px; border: 1px solid var(--border); border-radius: 9999px; font-size: 14px; font-weight: 500; color: var(--ink-muted);">
                        Edit
                    </a>
                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus artikel ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                style="padding: 9px 20px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 9999px; font-size: 14px; font-weight: 500; color: var(--danger); cursor: pointer;">
                            Hapus
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    {{-- Artikel card --}}
    <div style="background: white; border-radius: var(--radius); box-shadow: var(--shadow); overflow: hidden; max-width: 1500px;">

        {{-- Thumbnail --}}
        @if($article->image_thumbnail)
            <img src="{{ Storage::url($article->image_thumbnail) }}"
                 alt="{{ $article->title }}"
                 style="width: 100%; max-height: 360px; object-fit: cover; display: block;">
        @endif

        {{-- Konten --}}
        <div style="padding: 2rem;">
            <div style="font-size: 15px; color: var(--ink); line-height: 1.8;">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>

    </div>

</x-app-layout>