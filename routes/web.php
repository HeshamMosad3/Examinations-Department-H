<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LifeWheelController;
use App\Http\Controllers\PersonalityKeysController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Landing pages
Route::get('/', [LandingController::class, 'home'])->name('home');

Route::view('/life-wheel.html', 'landing.life-wheel')->name('life-wheel.explore');
Route::get('/wheel-test', [LandingController::class, 'wheelTest'])->name('life-wheel.test');
Route::get('/wheel-test.html', [LandingController::class, 'wheelTest']);
Route::get('/life-wheel-test.html', [LandingController::class, 'wheelTest']);
Route::get('/life-wheel-assessment.html', [LandingController::class, 'lifeWheelAssessment'])->name('life-wheel.assessment');
Route::get('/result.html', [LandingController::class, 'lifeWheelResult'])->name('life-wheel.result');

Route::get('/perceptual-explore.html', [LandingController::class, 'perceptualExplore'])->name('perceptual.explore');
Route::get('/perceptual-test.html', [LandingController::class, 'perceptualTest'])->name('perceptual.test');
Route::get('/perceptual-result.html', [LandingController::class, 'perceptualResult'])->middleware(['auth', 'profile.complete'])->name('perceptual.result');

// مقياس مفاتيح الشخصية السبعة: الصفحة نفسها للمسجلين بس (الزائر بيروح لتسجيل الدخول ويرجع لها)، والنتيجة بتتحفظ للمستخدم
Route::view('/personality-keys.html', 'landing.personality-keys-explore')->name('keys.explore');
Route::get('/personality-keys-test.html', [PersonalityKeysController::class, 'test'])->name('keys.test');

Route::middleware('auth')->group(function () {
    Route::post('/personality-keys/results', [PersonalityKeysController::class, 'store'])->middleware('throttle:20,1')->name('keys.results.store');
    Route::get('/personality-keys-result.html', [PersonalityKeysController::class, 'result'])->name('keys.result');
    Route::get('/personality-keys-details.html', [PersonalityKeysController::class, 'details'])->name('keys.details');
    // تقرير الـ PDF (ملخص + تقرير كامل): بعد اكتمال الملف الشخصي لأنه بيحمل بيانات المستخدم والتفاصيل
    Route::get('/personality-keys-report.html', [PersonalityKeysController::class, 'report'])->middleware('profile.complete')->name('keys.report');
    // التقرير المفصّل: بعد اكتمال الملف الشخصي بس
    Route::get('/life-wheel-details.html', [LifeWheelController::class, 'details'])->middleware('profile.complete')->name('life-wheel.details');
    // تقرير الـPDF (صفحة واحدة طويلة)
    Route::get('/life-wheel-report.html', [LifeWheelController::class, 'report'])->middleware('profile.complete')->name('life-wheel.report');
    Route::post('/life-wheel/results', [LifeWheelController::class, 'store'])->middleware('throttle:20,1')->name('life-wheel.results.store');
});

// Auth (guests only; signed-in users are sent home)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1')->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('register.post');

    // Pop-up dialogs (sign-up / sign-in) opened from the "start assessment" and "view report" buttons; they answer with JSON
    Route::post('/quick-signup', [AuthController::class, 'quickRegister'])->middleware('throttle:5,1')->name('quick-signup.post');
    Route::post('/quick-login', [AuthController::class, 'quickLogin'])->middleware('throttle:10,1')->name('quick-login.post');

    // Password Reset (OTP Flow matching Figma)
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendOtp'])->middleware('throttle:5,1')->name('password.email');
    Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])->name('password.verify-otp');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->middleware('throttle:10,1')->name('password.verify-otp.post');
    Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->middleware('throttle:5,1')->name('password.resend-otp');
    Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('throttle:5,1')->name('password.update');
    Route::get('/reset-password/success', [AuthController::class, 'showResetSuccess'])->name('password.reset-success');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User routes
Route::middleware(['auth', 'user'])->group(function () {
    // الملف الشخصي: عرض / تعديل وإكمال / حذف البيانات
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->middleware('throttle:20,1')->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('throttle:5,1')->name('profile.destroy');

    Route::redirect('/dashboard', '/')->name('dashboard');
    Route::redirect('/assessments', '/')->name('dashboard.assessments');
});

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // المقاييس
    Route::resource('assessments', Admin\AssessmentController::class);
    Route::post('/assessments/{assessment}/toggle', [Admin\AssessmentController::class, 'toggle'])->name('assessments.toggle');
    Route::post('/assessments/{assessment}/duplicate', [Admin\AssessmentController::class, 'duplicate'])->name('assessments.duplicate');
    Route::match(['get', 'post'], '/assessments/{assessment}/preview', [Admin\AssessmentController::class, 'preview'])->name('assessments.preview');

    Route::post('/assessments/{assessment}/dimensions', [Admin\DimensionController::class, 'store'])->name('dimensions.store');
    Route::put('/dimensions/{dimension}', [Admin\DimensionController::class, 'update'])->name('dimensions.update');
    Route::delete('/dimensions/{dimension}', [Admin\DimensionController::class, 'destroy'])->name('dimensions.destroy');

    Route::post('/assessments/{assessment}/questions', [Admin\QuestionController::class, 'store'])->name('questions.store');
    Route::post('/assessments/{assessment}/questions/options', [Admin\QuestionController::class, 'applyOptions'])->name('questions.applyOptions');
    Route::patch('/assessments/{assessment}/questions/order', [Admin\QuestionController::class, 'reorder'])->name('questions.reorder');
    Route::put('/questions/{question}', [Admin\QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{question}', [Admin\QuestionController::class, 'destroy'])->name('questions.destroy');

    Route::post('/assessments/{assessment}/levels', [Admin\ResultLevelController::class, 'store'])->name('levels.store');
    Route::post('/assessments/{assessment}/levels/generate', [Admin\ResultLevelController::class, 'generate'])->name('levels.generate');
    Route::put('/levels/{level}', [Admin\ResultLevelController::class, 'update'])->name('levels.update');
    Route::delete('/levels/{level}', [Admin\ResultLevelController::class, 'destroy'])->name('levels.destroy');

    // المستخدمين ونتائجهم
    Route::get('/users', [Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [Admin\UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [Admin\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/attempts/{attempt}', [Admin\UserController::class, 'attempt'])->name('attempts.show');

    // محتوى صفحات الموقع (النصوص والصور والروابط لحد الفوتر)
    Route::get('/site-content', [Admin\SiteContentController::class, 'index'])->name('site-content.index');
    Route::get('/site-content/{page}', [Admin\SiteContentController::class, 'edit'])->where('page', '[a-z_]+')->name('site-content.edit');
    Route::put('/site-content/{page}', [Admin\SiteContentController::class, 'update'])->where('page', '[a-z_]+')->name('site-content.update');

    // إدارة عجلة الحياة (تأثير الجوانب على بعضها في عجلة الصفحة الرئيسية)
    Route::get('/life-wheel-influence', [Admin\LifeWheelInfluenceController::class, 'index'])->name('life-wheel-influence.index');
    Route::put('/life-wheel-influence', [Admin\LifeWheelInfluenceController::class, 'update'])->name('life-wheel-influence.update');
    Route::put('/life-wheel-influence/journey', [Admin\LifeWheelInfluenceController::class, 'updateJourney'])->name('life-wheel-influence.journey');
});
