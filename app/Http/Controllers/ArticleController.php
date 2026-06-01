<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    // Publik — semua user bisa lihat daftar artikel
    public function index(): View
    {
        // V5.3.4 — Eloquent ORM, aman dari SQL Injection
        $articles = Article::latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    // Publik — semua user bisa lihat detail artikel
    public function show(Article $article): View
    {
        // V5.3.4 — Route model binding, Laravel otomatis escape ID
        return view('articles.show', compact('article'));
    }

    // Admin only (dijaga middleware + authorize di FormRequest)
    public function create(): View
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            // V12.1.1 — Simpan file ke storage/app/public/thumbnails
            // Nama file di-generate ulang otomatis oleh Laravel (mencegah path traversal)
            // File disimpan di luar folder public/ langsung
            if ($request->hasFile('image_thumbnail')) {
                $data['image_thumbnail'] = $request
                    ->file('image_thumbnail')
                    ->store('thumbnails', 'public');
            }

            Article::create($data);

            Log::info('Artikel baru dibuat', [
                'admin_id' => auth()->id(),
                'title'    => $data['title'],
            ]);

            return redirect()
                ->route('articles.index')
                ->with('success', 'Artikel berhasil dibuat.');

        } catch (\Exception $e) {
            Log::error('Gagal membuat artikel', [
                'admin_id' => auth()->id(),
                'error'    => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->with('error', 'Gagal menyimpan artikel. Silakan coba lagi.');
        }
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('image_thumbnail')) {
                // Hapus file lama jika ada
                if ($article->image_thumbnail) {
                    \Storage::disk('public')->delete($article->image_thumbnail);
                }

                $data['image_thumbnail'] = $request
                    ->file('image_thumbnail')
                    ->store('thumbnails', 'public');
            }

            $article->update($data);

            Log::info('Artikel diperbarui', [
                'admin_id'   => auth()->id(),
                'article_id' => $article->id,
            ]);

            return redirect()
                ->route('articles.show', $article)
                ->with('success', 'Artikel berhasil diperbarui.');

        } catch (\Exception $e) {
            Log::error('Gagal memperbarui artikel', [
                'admin_id'   => auth()->id(),
                'article_id' => $article->id,
                'error'      => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui artikel. Silakan coba lagi.');
        }
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}