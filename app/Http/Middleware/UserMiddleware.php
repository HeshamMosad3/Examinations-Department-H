<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->guest(route('login'));
        }

        if (auth()->user()->isAdmin() && ! $request->is('exam/*/result')) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
