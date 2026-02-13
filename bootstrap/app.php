<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) { //設定整個 middleware pipeline

        // API middleware group
        $middleware->api([
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);

        // Web middleware group
        $middleware->web([
            // 保留預設即可
        ]);

        // 全域啟用 CORS（關鍵）
        $middleware->append(HandleCors::class);

        // 若需要關閉 CSRF（可選）
        // $middleware->disableCsrfFor([
        //     'api/*',
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
