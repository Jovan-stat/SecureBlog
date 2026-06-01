<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
        {
            // 1. Akun Admin (Untuk simulasi akses legal ke halaman manajemen artikel)
            User::create([
                'name' => 'Admin Utama',
                'email' => 'admin@blog.com',
                'password' => Hash::make('123456'), // Password aman > 8 karakter (ASVS V2.1.1)
                'role' => 'admin',
            ]);

            // 2. Akun User Biasa (Untuk bahan simulasi pentest Access Control di Burp Suite)
            User::create([
                'name' => 'Budi Biasa',
                'email' => 'budi@blog.com',
                'password' => Hash::make('123456'), // Password aman > 8 karakter (ASVS V2.1.1)
                'role' => 'user', // Default role user biasa
            ]);
        }
}
