<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // V8.1.1 — Jangan expose detail error ke user di production
        // Detail error hanya dicatat di log server, bukan ditampilkan ke user
        $exceptions->render(function (\Throwable $e, $request) {

            // Hanya aktif saat APP_DEBUG=false (production)
            if (!config('app.debug')) {

                // Untuk request API/JSON
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Terjadi kesalahan pada server.',
                        // Tidak expose: $e->getMessage(), stack trace, dll
                    ], 500);
                }

                // Untuk request biasa (browser)
                // Laravel otomatis tampilkan resources/views/errors/500.blade.php
            }
        });
    })->create();