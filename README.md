# SecureBlog

SecureBlog adalah aplikasi web blog artikel yang dibangun dengan Laravel 12, dilengkapi sistem autentikasi, manajemen artikel oleh admin, dan fitur keamanan web modern.

---

## Fitur Utama

- Membaca artikel tanpa perlu login
- Registrasi dan login pengguna dengan verifikasi email
- Manajemen artikel (tambah, edit, hapus) khusus admin
- Upload thumbnail artikel
- Reset password via email
- Profil pengguna (ubah nama, email, password, hapus akun)
- Integrasi email menggunakan Mailtrap
- Fitur "Gabung Jadi Penulis" via WhatsApp

---

## Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| Laravel 12 | Framework PHP utama |
| Laravel Breeze | Starter kit autentikasi |
| Alpine.js | Interaktivitas UI ringan |
| Mailtrap | Testing pengiriman email |
| MySQL | Database |
| Vite | Asset bundler |

---

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- Git

---

## Cara Instalasi

### 1. Clone repository

```bash
git clone https://github.com/username/secureblog.git
cd secureblog
```

### 2. Install dependencies PHP

```bash
composer install
```

### 3. Install dependencies JavaScript

```bash
npm install
```

### 4. Salin file environment

```bash
cp .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Konfigurasi database

Buka file `.env` dan sesuaikan:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=secureblog
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Konfigurasi email (Mailtrap)

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=isi_username_mailtrap
MAIL_PASSWORD=isi_password_mailtrap
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@secureblog.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 8. Jalankan migrasi database

```bash
php artisan migrate
```

### 9. Jalankan aplikasi

```bash
php artisan serve
```

```bash
npm run dev
```

Akses aplikasi di `http://localhost:8000`

---

## Struktur Role Pengguna

| Role | Hak Akses |
|------|-----------|
| Guest | Membaca artikel |
| User | Membaca artikel, kelola profil |
| Admin | Semua akses + tulis, edit, hapus artikel |

Untuk membuat akun admin, ubah kolom `role` di tabel `users` menjadi `admin` secara manual via database atau seeder.

---

## Keamanan — OWASP ASVS

Aplikasi ini dibangun dengan mengacu pada standar **OWASP Application Security Verification Standard (ASVS)**. Berikut daftar kontrol keamanan yang diterapkan:

| Kode | Kategori | Deskripsi | Implementasi |
|------|----------|-----------|--------------|
| V2.1.1 | Autentikasi | Password minimum length & rules | Validasi `min:8` pada form register & ganti password via Laravel Breeze |
| V2.1.7 | Autentikasi | Breached password check | Laravel Breeze menggunakan `Password::defaults()` yang dapat dikonfigurasi dengan `uncompromised()` |
| V3.1.1 | Session | Session regenerate setelah login | Laravel memanggil `session()->regenerate()` otomatis setelah login berhasil |
| V3.4.1 | Session | Cookie Secure + HttpOnly | Dikonfigurasi via `config/session.php` — `http_only: true`, `secure: true` di environment production |
| V4.1.1 | Akses Kontrol | Role-based access control (admin/user) | Middleware `is_admin` melindungi semua route admin, role disimpan di kolom `role` pada tabel `users` |
| V5.1.1 | Validasi | Server-side input validation | Semua input divalidasi di controller menggunakan `$request->validate()` sebelum diproses |
| V5.2.1 | Output | Output encoding / XSS prevention | Semua output menggunakan `{{ }}` yang otomatis melakukan HTML escaping, konten artikel menggunakan `nl2br(e($article->content))` |
| V5.3.4 | Injeksi | SQL Injection prevention | Seluruh query database menggunakan Eloquent ORM dengan prepared statements secara otomatis |
| V8.1.1 | Error Handling | Tidak membocorkan data sensitif | Mode `APP_DEBUG=false` di production, error ditangani tanpa menampilkan stack trace ke pengguna |
| V12.1.1 | File Upload | Validasi & penyimpanan file aman | Upload thumbnail divalidasi tipe (`image/jpg,jpeg,png,webp`) dan ukuran (`max:2048`), disimpan via `Storage::disk('public')` |

---

## Struktur Direktori Utama

```
secureblog/
├── app/
│   ├── Http/Controllers/
│   │   ├── ArticleController.php
│   │   └── ProfileController.php
│   └── Models/
│       ├── User.php
│       └── Article.php
├── resources/views/
│   ├── layouts/
│   │   ├── app.blade.php
│   │   ├── guest.blade.php
│   │   └── navigation.blade.php
│   ├── articles/
│   │   ├── index.blade.php
│   │   ├── show.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   ├── profile/
│   └── auth/
├── routes/
│   ├── web.php
│   └── auth.php
└── database/migrations/
```

---

## Dibuat Oleh

**Jovan**  
Tugas Kuliah — Pemrograman Web  
Framework: Laravel 12

---

> SecureBlog dibuat sebagai implementasi nyata konsep keamanan web dalam sebuah aplikasi blog modern.