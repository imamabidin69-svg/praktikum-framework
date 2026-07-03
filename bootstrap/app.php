<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException; // Jangan lupa tambahkan ini di atas

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Penanganan Global Error untuk form request
        $exceptions->render(function (ValidationException $e, $request) {
            return response()->json([
                'message' => 'Data yang dikirim tidak valid',
                'errors' => $e->errors(),
            ], 422); // 422 Unprocessable Entity
        });
    })->create();