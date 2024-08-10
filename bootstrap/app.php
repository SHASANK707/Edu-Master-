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
            'disable_back_btn' => \App\Http\Middleware\DisableBackBtn::class,
            'teststaff' => \App\Http\Middleware\teststaff::class,
            'Authinstitute' => \App\Http\Middleware\Authinstitute::class,
            'Authmanagement'=>App\Http\Middleware\Authmanagement::class,
            'Authparent' => \App\Http\Middleware\Authparent::class,
            'Authstudent'=>App\Http\Middleware\Authstudent::class,
            'Authteacher'=>App\Http\Middleware\Authteacher::class,
        ]);

        $middleware->redirectTo(
            guests:'login',
            users:'form'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
