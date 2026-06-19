<?php

use App\Http\Middleware\WajibAdmin;
use App\Http\Middleware\WajibMasuk;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'wajibMasuk' => WajibMasuk::class,
            'wajibAdmin' => WajibAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
    })->create();
