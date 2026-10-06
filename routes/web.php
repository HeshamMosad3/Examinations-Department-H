<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LifeWheelController;
use Illuminate\Support\Facades\Route;

// Landing pages
Route::get('/', [LandingController::class, 'home'])->name('home');

Route::view('/life-wheel.html', 'landing.life-wheel')->name('life-wheel.explore');
Route::get('/life-wheel-assessment.html', [LandingController::class, 'lifeWheelAssessment'])->name('life-wheel.assessment');
Route::get('/result.html', [LandingController::class, 'lifeWheelResult'])->name('life-wheel.result');

Route::get('/perceptual-explore.html', [LandingController::class, 'perceptualExplore'])->name('perceptual.explore');
Route::get('/perceptual-test.html', [LandingController::class, 'perceptualTest'])->name('perceptual.test');
Route::get('/perceptual-result.html', [LandingController::class, 'perceptualResult'])->name('perceptual.result');

Route::middleware('auth')->group(function () {
    Route::get('/life-wheel-details.html', [LifeWheelController::class, 'details'])->name('life-wheel.details');
    Route::post('/life-wheel/results', [LifeWheelController::class, 'store'])->middleware('throttle:20,1')->name('life-wheel.results.store');
});

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User routes
Route::middleware(['auth', 'user'])->group(function () {
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
});
