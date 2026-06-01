<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Publik — siapa saja bisa baca artikel
Route::resource('articles', \App\Http\Controllers\ArticleController::class)
    ->only(['index', 'show']);

// Admin only: create, edit, delete artikel
Route::middleware(['auth', 'verified', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('articles', \App\Http\Controllers\ArticleController::class)
            ->except(['index', 'show']);
    });

Route::get('/', function () {
    return redirect()->route('articles.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';