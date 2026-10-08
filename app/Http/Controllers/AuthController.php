<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {}

    /**
     * Preserves intended destination for login / registration when guests initiate tests:
     * - 'life-wheel' -> life-wheel.details (from report view)
     * - 'life-wheel-assessment' -> life-wheel.assessment
     * - 'perceptual-test' -> perceptual.test
     * - specific route names / relative app paths
     */
    private function rememberIntendedDestination(Request $request): void
    {
        $next = $request->input('next', $request->query('next'));
        if (! $next) {
            return;
        }

        $destinations = [
            'life-wheel' => route('life-wheel.details'),
            'life-wheel-assessment' => route('life-wheel.assessment'),
            'perceptual-test' => route('perceptual.test'),
        ];

        if (isset($destinations[$next])) {
            $request->session()->put('url.intended', $destinations[$next]);
            return;
        }

        if (Route::has($next)) {
            $request->session()->put('url.intended', route($next));
            return;
        }

        if (is_string($next) && str_starts_with($next, '/') && ! str_starts_with($next, '//')) {
            $request->session()->put('url.intended', url($next));
        }
    }

    public function showLogin(Request $request)
    {
        $this->rememberIntendedDestination($request);

        return response()
            ->view('auth.login')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $this->rememberIntendedDestination($request);

            /** @var \App\Models\User $user */
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.'])->onlyInput('email');
    }

    public function showRegister(Request $request)
    {
        $this->rememberIntendedDestination($request);

        return response()
            ->view('auth.register')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = $this->userService->register($request->validated());

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();
        $this->rememberIntendedDestination($request);

        return redirect()->intended(route('home'));
    }

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'يرجى إدخال البريد الإلكتروني.',
            'email.email'    => 'يرجى إدخال بريد إلكتروني صحيح.',
            'email.exists'   => 'هذا البريد الإلكتروني غير مسجل لدينا.',
        ]);

        $email = $request->email;
        $otp = sprintf('%04d', random_int(1000, 9999));

        DB::table('password_reset_otps')->where('email', $email)->delete();
        DB::table('password_reset_otps')->insert([
            'email'      => $email,
            'otp'        => $otp,
            'token'      => null,
            'expires_at' => now()->addMinutes(15),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $parts = explode('@', $email);
        $namePart = $parts[0];
        $domain = $parts[1] ?? '';
        $maskedName = strlen($namePart) <= 3 ? substr($namePart, 0, 1) . '**' : substr($namePart, 0, 3) . '**';
        $maskedEmail = $maskedName . '@' . $domain;

        $request->session()->put('password_reset_email', $email);
        $request->session()->put('password_reset_masked_email', $maskedEmail);

        Log::info("Password reset OTP for {$email}: {$otp}");
        session()->flash('dev_otp', $otp);

        return redirect()->route('password.verify-otp');
    }

    public function showVerifyOtp(Request $request)
    {
        $email = $request->session()->get('password_reset_email');
        if (!$email) {
            return redirect()->route('password.request');
        }

        $maskedEmail = $request->session()->get('password_reset_masked_email', $email);

        return view('auth.verify-otp', [
            'email' => $email,
            'maskedEmail' => $maskedEmail,
        ]);
    }

    public function verifyOtp(Request $request): RedirectResponse
    {
        $email = $request->session()->get('password_reset_email');
        if (!$email) {
            return redirect()->route('password.request');
        }

        $otpInput = $request->input('otp');
        if (is_array($otpInput)) {
            $otp = implode('', $otpInput);
        } else {
            $otp = (string) $otpInput;
        }

        $record = DB::table('password_reset_otps')
            ->where('email', $email)
            ->where('otp', $otp)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'رمز التحقق غير صحيح أو انتهت صلاحيته.']);
        }

        $token = Str::random(60);
        DB::table('password_reset_otps')
            ->where('id', $record->id)
            ->update([
                'token' => $token,
                'updated_at' => now(),
            ]);

        $request->session()->put('password_reset_token', $token);

        return redirect()->route('password.reset');
    }

    public function resendOtp(Request $request)
    {
        $email = $request->session()->get('password_reset_email');
        if (!$email) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'انتهت الجلسة'], 400);
            }
            return redirect()->route('password.request');
        }

        $otp = sprintf('%04d', random_int(1000, 9999));

        DB::table('password_reset_otps')->where('email', $email)->delete();
        DB::table('password_reset_otps')->insert([
            'email'      => $email,
            'otp'        => $otp,
            'token'      => null,
            'expires_at' => now()->addMinutes(15),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Log::info("Resent password reset OTP for {$email}: {$otp}");
        session()->flash('dev_otp', $otp);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'تم إرسال رمز جديد']);
        }

        return back()->with('status', 'تم إرسال رمز تحقق جديد بنجاح.');
    }

    public function showResetPassword(Request $request)
    {
        $email = $request->session()->get('password_reset_email');
        $token = $request->session()->get('password_reset_token');

        if (!$email || !$token) {
            return redirect()->route('password.request');
        }

        $valid = DB::table('password_reset_otps')
            ->where('email', $email)
            ->where('token', $token)
            ->where('expires_at', '>=', now())
            ->exists();

        if (!$valid) {
            return redirect()->route('password.request')->withErrors(['email' => 'انتهت صلاحية جلسة إعادة التعيين.']);
        }

        return view('auth.reset-password', [
            'email' => $email,
            'token' => $token,
        ]);
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $email = $request->session()->get('password_reset_email');
        $token = $request->session()->get('password_reset_token');

        if (!$email || !$token) {
            return redirect()->route('password.request');
        }

        $cleanPass = function (?string $val): ?string {
            if ($val === null) return null;
            return trim(preg_replace('/[\x{200B}-\x{200D}\x{FEFF}\x{00A0}\r\n\t]/u', '', (string) $val));
        };

        if ($request->has('password') || $request->has('password_confirmation')) {
            $request->merge([
                'password' => $cleanPass($request->input('password')),
                'password_confirmation' => $cleanPass($request->input('password_confirmation')),
            ]);
        }

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.required'  => 'يرجى إدخال كلمة المرور الجديدة.',
            'password.min'       => 'يجب أن تكون كلمة المرور الجديدة مكونة من 8 خانات على الأقل.',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
        ]);

        $record = DB::table('password_reset_otps')
            ->where('email', $email)
            ->where('token', $token)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$record) {
            return redirect()->route('password.request')->withErrors(['email' => 'انتهت صلاحية الرمز، يرجى المحاولة مجدداً.']);
        }

        User::where('email', $email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_reset_otps')->where('email', $email)->delete();
        $request->session()->forget(['password_reset_email', 'password_reset_token', 'password_reset_masked_email']);

        return redirect()->route('password.reset-success');
    }

    public function showResetSuccess()
    {
        return view('auth.reset-success');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
