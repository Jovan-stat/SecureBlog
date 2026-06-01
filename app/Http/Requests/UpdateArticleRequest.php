<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    // V5.1.1 — Rules sama dengan store, semua 'sometimes' untuk partial update
    public function rules(): array
    {
        return [
            'title'           => [
                'sometimes',
                'required',
                'string',
                'min:5',
                'max:255',
            ],
            'content'         => [
                'sometimes',
                'required',
                'string',
                'min:20',
            ],
            // V12.1.1 — Validasi file upload saat edit
            'image_thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
                'dimensions:max_width=2000,max_height=2000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'              => 'Judul artikel wajib diisi.',
            'title.min'                   => 'Judul minimal 5 karakter.',
            'title.max'                   => 'Judul maksimal 255 karakter.',
            'content.required'            => 'Konten artikel wajib diisi.',
            'content.min'                 => 'Konten minimal 20 karakter.',
            'image_thumbnail.image'       => 'File harus berupa gambar.',
            'image_thumbnail.mimes'       => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image_thumbnail.max'         => 'Ukuran gambar maksimal 2MB.',
            'image_thumbnail.dimensions'  => 'Dimensi gambar maksimal 2000x2000 piksel.',
        ];
    }
}