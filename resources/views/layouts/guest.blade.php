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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        a { color: inherit; text-decoration: none; }
    </style>
</head>
<body>

    {{-- Logo --}}
    <a href="{{ route('articles.index') }}"
       style="font-size: 1.2rem; font-weight: 700; color: var(--ink); letter-spacing: -0.02em; margin-bottom: 1.5rem;">
        ✦ Secure Blog
    </a>

    {{-- Card --}}
    <div style="background: white; border-radius: var(--radius); box-shadow: var(--shadow); padding: 2rem; width: 100%; max-width: 420px;">
        {{ $slot }}
    </div>

</body>
</html>