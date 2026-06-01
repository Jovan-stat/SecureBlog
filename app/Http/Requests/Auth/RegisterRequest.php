<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * ASVS V4.1.1 — hanya user yang belum login boleh register
     */
    public function authorize(): bool
    {
        return !auth()->check();
    }

    /**
     * ASVS V2.1.1 — Password minimal 8 karakter, ada huruf besar/kecil & angka
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)           // V2.1.1 — minimal 8 karakter
                    ->letters()            // harus ada huruf
                    ->mixedCase()          // huruf besar & kecil
                    ->numbers()            // harus ada angka
            ],
        ];
    }

    /**
     * Pesan error yang ditampilkan ke user
     */
    public function messages(): array
    {
        return [
            'name.required'              => 'Nama wajib diisi.',
            'email.required'             => 'Email wajib diisi.',
            'email.unique'               => 'Email sudah terdaftar.',
            'password.min'               => 'Password minimal 8 karakter.',
            'password.mixed'             => 'Password harus mengandung huruf besar dan kecil.',
            'password.numbers'           => 'Password harus mengandung minimal satu angka.',
        ];
    }
}