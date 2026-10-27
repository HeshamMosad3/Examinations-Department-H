<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('admin')->check() && ! $request->is('exam/*/result')) {
            return redirect()->route('admin.dashboard');
        }

        if (! auth('web')->check()) {
            throw new AuthenticationException();
        }

        return $next($request);
    }
}
