<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terjadi Kesalahan</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 80px; color: #333; }
        h1 { font-size: 48px; color: #e53e3e; }
        p  { font-size: 18px; color: #666; }
        a  { color: #3b82f6; text-decoration: none; }
    </style>
</head>
<body>
    <h1>500</h1>
    <p>Terjadi kesalahan pada server.</p>
    {{-- V8.1.1 — Tidak menampilkan detail error, stack trace, atau query --}}
    <p><a href="{{ url('/') }}">← Kembali ke Beranda</a></p>
</body>
</html>