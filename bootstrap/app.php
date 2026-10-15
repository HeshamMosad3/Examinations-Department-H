<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EnsureProfileComplete;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');

        // 'guest' routes (login, register, password reset) send signed-in users back to the site
        $middleware->redirectUsersTo('/');

        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'user' => UserMiddleware::class,
            'profile.complete' => EnsureProfileComplete::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Signed-out visitors (never logged in, or the session ended) on a page that needs an account get a friendly
        // 401 page with "home" / "back" instead of being bounced to the login form. JSON requests keep the default 401.
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->expectsJson()) {
                return null;
            }

            return response()->view('errors.401', [], 401);
        });
    })->create();
