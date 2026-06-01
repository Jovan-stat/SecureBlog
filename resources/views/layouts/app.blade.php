<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SecureBlog') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg: #ffffff;
            --bg-soft: #f9fafb;
            --ink: #111827;
            --ink-muted: #6b7280;
            --ink-faint: #9ca3af;
            --border: #e5e7eb;
            --accent: #2563eb;
            --accent-hover: #1d4ed8;
            --danger: #dc2626;
            --radius: 14px;
            --shadow: 0 1px 4px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.06);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background: var(--bg-soft);
            color: var(--ink);
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            line-height: 1.6;
        }
        a { color: inherit; text-decoration: none; }
        a:hover { color: var(--accent); }
        img { max-width: 100%; display: block; }
    </style>
</head>
<body>

    @include('layouts.navigation')

    <main style="max-width: 1100px; margin: 0 auto; padding: 2rem 1.5rem;">
        {{ $slot }}
    </main>

    <footer style="margin-top: 4rem; padding: 2rem 0; border-top: 1px solid var(--border); text-align: center;">
        <p style="font-size: 13px; color: var(--ink-faint);">
            &copy; 2026 Secure Blog. All rights reserved.
        </p>
    </footer>

</body>
</html>