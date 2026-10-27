<?php

namespace App\Http\Middleware;

use App\Services\Website\Auth\ProfileForm;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * بوابة التقارير المفصّلة: المستخدم لازم يكمّل ملفه الشخصي الأول.
 * لو ناقص، بنفتكر الصفحة اللي كان رايحلها (url.intended) ونودّيه لصفحة الملف الشخصي، وبعد ما يكمّل بيرجع لها لوحده.
 */
class EnsureProfileComplete
{
    public function __construct(private readonly ProfileForm $profile) {}

    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || $this->profile->isComplete($user)) {
            return $next($request);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => cms('profile.gate.message', 'أكمل ملفك الشخصي لعرض التقرير التفصيلي.'),
                'redirect' => route('profile.edit'),
            ], 403);
        }

        if ($request->isMethod('GET')) {
            $request->session()->put('url.intended', $request->fullUrl());
        }

        return redirect()->route('profile.edit')->with('warning', cms('profile.gate.message', 'أكمل ملفك الشخصي لعرض التقرير التفصيلي.'));
    }
}
