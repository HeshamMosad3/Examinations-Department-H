<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\QuickRegisterRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {}

    /** OTP attempts allowed before the code is burned and the user has to request a new one */
    private const OTP_MAX_ATTEMPTS = 5;

    /**
     * Remembers where to send the user after login / registration (?next=...):
     * - 'life-wheel' -> life-wheel.details (from report view)
     * - 'life-wheel-assessment' -> life-wheel.assessment
     * - 'perceptual-test' -> perceptual.test
     * - a path on this site, e.g. '/', '/life-wheel.html', '/#challenge' (the page the user was on)
     */
    private function rememberIntendedDestination(Request $request): void
    {
        $next = $request->input('next', $request->query('next'));
        if (! is_string($next) || $next === '') {
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

        // Local paths only ('//host' and '/\host' are protocol-relative tricks), and never back to an auth page
        if (! str_starts_with($next, '/') || str_starts_with($next, '//') || str_starts_with($next, '/\\')) {
            return;
        }

        $path = '/' . trim((string) parse_url($next, PHP_URL_PATH), '/');
        $authPaths = ['/login', '/register', '/logout', '/forgot-password', '/verify-otp', '/resend-otp', '/reset-password'];
        foreach ($authPaths as $authPath) {
            if ($path === $authPath || str_starts_with($path, $authPath . '/')) {
                return;
            }
        }

        $request->session()->put('url.intended', url($next));
    }

    /** Admins only follow an intended URL inside the admin panel; anything else lands them on the dashboard */
    private function redirectAfterLogin(Request $request, User $user): RedirectResponse
    {
        if (! $user->isAdmin()) {
            return redirect()->intended(route('home'));
        }

        $intended = (string) $request->session()->pull('url.intended', '');
        $adminPrefix = url('/admin');

        return $intended === $adminPrefix || str_starts_with($intended, $adminPrefix . '/')
            ? redirect()->to($intended)
            : redirect()->route('admin.dashboard');
    }

    /** Creates a fresh 4-digit code for the email (replacing any previous one) and sends it */
    private function issueOtp(Request $request, string $email): void
    {
        $otp = sprintf('%04d', random_int(0, 9999));

        DB::table('password_reset_otps')->where('email', $email)->delete();
        DB::table('password_reset_otps')->insert([
            'email'      => $email,
            'otp'        => $otp,
            'token'      => null,
            'expires_at' => now()->addMinutes(15),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        RateLimiter::clear($this->otpAttemptsKey($email));

        try {
            Mail::raw(
                str_replace(':code', $otp, cms('auth.otp.email_body', 'رمز التحقق لإعادة تعيين كلمة المرور في دار الرؤى هو: :code — صالح لمدة 15 دقيقة. إذا لم تطلب إعادة التعيين فتجاهل هذه الرسالة.')),
                fn ($message) => $message->to($email)->subject(cms('auth.otp.email_subject', 'رمز التحقق — دار الرؤى'))
            );
        } catch (\Throwable $e) {
            Log::error('Failed to send password reset OTP', ['email' => $email, 'error' => $e->getMessage()]);
        }

        // Shown on the verify page only while developing locally (no real mailbox)
        if (app()->isLocal()) {
            $request->session()->flash('dev_otp', $otp);
        }
    }

    private function otpAttemptsKey(string $email): string
    {
        return 'password-otp:' . sha1(strtolower($email));
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

            return $this->redirectAfterLogin($request, $user);
        }

        return back()->withErrors(['email' => cms('auth.login.failed', 'البريد الإلكتروني أو كلمة المرور غير صحيحة.')])->onlyInput('email');
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

    /**
     * نافذة التسجيل السريع (landing.partials.auth-dialogs): بيسجّل ويدخّل المستخدم ويرجّع JSON فيه الصفحة اللي يكمّل عليها
     * (اللي كان رايحلها قبل التسجيل: ?next= المبعوت مع الفورم). صفحة التسجيل الكامل (/register) منفصلة وزي ما هي.
     */
    public function quickRegister(QuickRegisterRequest $request): JsonResponse
    {
        $user = $this->userService->register($request->safe()->only(['name', 'email', 'phone', 'national_id', 'password']));

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();
        $this->rememberIntendedDestination($request);

        return response()->json(['success' => true, 'redirect' => redirect()->intended(route('home'))->getTargetUrl()]);
    }

    /** نافذة الدخول السريع: نفس منطق /login بس بترجّع JSON (الأدمن بيروح للوحة الإدارة، والمستخدم للصفحة اللي كان رايحلها) */
    public function quickLogin(LoginRequest $request): JsonResponse
    {
        if (! Auth::attempt($request->validated(), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => cms('auth.login.failed', 'البريد الإلكتروني أو كلمة المرور غير صحيحة.'),
            ]);
        }

        $request->session()->regenerate();
        $this->rememberIntendedDestination($request);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        return response()->json(['success' => true, 'redirect' => $this->redirectAfterLogin($request, $user)->getTargetUrl()]);
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
            'email.required' => cms('auth.forgot.email_required', 'يرجى إدخال البريد الإلكتروني.'),
            'email.email'    => cms('auth.validation.email', 'يرجى إدخال بريد إلكتروني صحيح.'),
            'email.exists'   => cms('auth.forgot.email_not_found', 'هذا البريد الإلكتروني غير مسجل لدينا.'),
        ]);

        $email = $request->email;
        $this->issueOtp($request, $email);

        $parts = explode('@', $email);
        $namePart = $parts[0];
        $domain = $parts[1] ?? '';
        $maskedName = strlen($namePart) <= 3 ? substr($namePart, 0, 1) . '**' : substr($namePart, 0, 3) . '**';
        $maskedEmail = $maskedName . '@' . $domain;

        $request->session()->put('password_reset_email', $email);
        $request->session()->put('password_reset_masked_email', $maskedEmail);
        $request->session()->forget('password_reset_token');

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

        $attemptsKey = $this->otpAttemptsKey($email);
        if (RateLimiter::tooManyAttempts($attemptsKey, self::OTP_MAX_ATTEMPTS)) {
            return back()->withErrors(['otp' => cms('auth.otp.too_many', 'تجاوزت عدد المحاولات المسموح بها، يرجى طلب رمز جديد.')]);
        }

        $record = DB::table('password_reset_otps')
            ->where('email', $email)
            ->where('otp', $otp)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$record) {
            RateLimiter::hit($attemptsKey, 15 * 60);
            if (RateLimiter::tooManyAttempts($attemptsKey, self::OTP_MAX_ATTEMPTS)) {
                // Burn the code so it can't be brute-forced from another IP either
                DB::table('password_reset_otps')->where('email', $email)->delete();
                return back()->withErrors(['otp' => cms('auth.otp.too_many', 'تجاوزت عدد المحاولات المسموح بها، يرجى طلب رمز جديد.')]);
            }

            return back()->withErrors(['otp' => cms('auth.otp.invalid', 'رمز التحقق غير صحيح أو انتهت صلاحيته.')]);
        }

        RateLimiter::clear($attemptsKey);

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
                return response()->json(['success' => false, 'message' => cms('auth.otp.session_expired', 'انتهت الجلسة، يرجى طلب رمز جديد.')], 400);
            }
            return redirect()->route('password.request');
        }

        $this->issueOtp($request, $email);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => cms('auth.otp.resent', 'تم إرسال رمز تحقق جديد بنجاح.')]);
        }

        return back()->with('status', cms('auth.otp.resent', 'تم إرسال رمز تحقق جديد بنجاح.'));
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
            return redirect()->route('password.request')->withErrors(['email' => cms('auth.reset.expired', 'انتهت صلاحية جلسة إعادة التعيين، يرجى المحاولة مجدداً.')]);
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

        // نفس أقل طول لكلمة المرور في فورم إنشاء حساب
        $passwordMin = cms_number('auth.field_password.min', '8');
        $request->validate([
            'password' => "required|string|min:{$passwordMin}|confirmed",
        ], [
            'password.required'  => cms('auth.reset.password_required', 'كلمة المرور الجديدة مطلوبة.'),
            'password.min'       => str_replace(':min', $passwordMin, cms('auth.reset.password_min', 'يجب أن تكون كلمة المرور :min خانات على الأقل.')),
            'password.confirmed' => cms('auth.reset.confirm_mismatch', 'كلمة المرور وتأكيدها غير متطابقين.'),
        ]);

        $record = DB::table('password_reset_otps')
            ->where('email', $email)
            ->where('token', $token)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$record) {
            return redirect()->route('password.request')->withErrors(['email' => cms('auth.reset.expired', 'انتهت صلاحية جلسة إعادة التعيين، يرجى المحاولة مجدداً.')]);
        }

        // A new remember token signs out "remember me" cookies on other devices
        User::where('email', $email)->first()?->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        DB::table('password_reset_otps')->where('email', $email)->delete();
        $request->session()->forget(['password_reset_email', 'password_reset_token', 'password_reset_masked_email']);

        return redirect()->route('password.reset-success')->with('password_reset_done', true);
    }

    public function showResetSuccess(Request $request)
    {
        if (! $request->session()->get('password_reset_done')) {
            return redirect()->route('login');
        }

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
