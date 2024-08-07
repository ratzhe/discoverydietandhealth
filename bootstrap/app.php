<?php

use \App\Http\Middleware\Admin;
use \App\Http\Middleware\Nutricionist;
use \App\Http\Middleware\Trainer;
use \App\Http\Middleware\Patient;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'nutricionist' => \App\Http\Middleware\Nutricionist::class,
            'trainer' => \App\Http\Middleware\Trainer::class,
            'patient' => \App\Http\Middleware\Patient::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
