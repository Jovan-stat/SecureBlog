<x-app-layout>

    {{-- Page header --}}
    <div style="margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 1.6rem; font-weight: 700; letter-spacing: -0.02em;">Edit Artikel</h1>
            <p style="font-size: 14px; color: var(--ink-muted); margin-top: 2px;">
                Perbarui isi artikel
            </p>
        </div>
        <a href="{{ route('articles.index') }}"
           style="padding: 9px 20px; border: 1px solid var(--border); border-radius: 9999px; font-size: 14px; font-weight: 500; color: var(--ink-muted);">
            ← Kembali
        </a>
    </div>

    {{-- Form card --}}
    <div style="background: white; border-radius: var(--radius); box-shadow: var(--shadow); padding: 2rem; max-width: 1500px;">

        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                    Judul
                </label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}"
                       placeholder="Masukkan judul artikel..."
                       style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                              font-size: 14px; color: var(--ink); background: var(--bg-soft);
                              outline: none; transition: border-color 0.15s;"
                       onfocus="this.style.borderColor='var(--accent)'"
                       onblur="this.style.borderColor='var(--border)'">
                @error('title')
                    <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konten --}}
            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                    Konten
                </label>
                <textarea name="content" rows="10"
                          placeholder="Tulis isi artikel di sini..."
                          style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                                 font-size: 14px; color: var(--ink); background: var(--bg-soft);
                                 outline: none; resize: vertical; line-height: 1.7; transition: border-color 0.15s;"
                          onfocus="this.style.borderColor='var(--accent)'"
                          onblur="this.style.borderColor='var(--border)'">{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Thumbnail --}}
            <div style="margin-bottom: 1.75rem;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                    Thumbnail
                    <span style="font-size: 12px; font-weight: 400; color: var(--ink-faint);">— opsional, maks 2MB</span>
                </label>

                @if($article->image_thumbnail)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ Storage::url($article->image_thumbnail) }}"
                             alt="Thumbnail saat ini"
                             style="height: 120px; border-radius: 10px; border: 1px solid var(--border); object-fit: cover;">
                        <p style="font-size: 12px; color: var(--ink-faint); margin-top: 5px;">Thumbnail saat ini — upload baru untuk mengganti</p>
                    </div>
                @endif

                <div style="border: 1.5px dashed var(--border); border-radius: 10px; padding: 1.25rem; background: var(--bg-soft); text-align: center;">
                    <input type="file" name="image_thumbnail"
                           accept="image/jpg,image/jpeg,image/png,image/webp"
                           style="width: 100%; font-size: 13px; color: var(--ink-muted); cursor: pointer;">
                    <p style="font-size: 12px; color: var(--ink-faint); margin-top: 8px;">JPG, PNG, atau WEBP</p>
                </div>
                @error('image_thumbnail')
                    <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div style="display: flex; align-items: center; gap: 12px; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="submit"
                        style="padding: 10px 28px; background: var(--accent); color: white; border: none;
                               border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
                    Update Artikel
                </button>
                <a href="{{ route('articles.index') }}"
                   style="font-size: 14px; color: var(--ink-muted);">
                    Batal
                </a>
            </div>

        </form>
    </div>

</x-app-layout>