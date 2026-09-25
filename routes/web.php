<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', fn () => redirect()->route('login'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/selection', function () {
        return view('user.selection');
    })->name('selection');
    
    // Keep old dashboard route for backward compatibility, redirect to selection
    Route::get('/dashboard', function () {
        return redirect()->route('selection');
    })->name('dashboard');
    
    Route::get('/assessments', [DashboardController::class, 'index'])->name('dashboard.assessments');
    Route::post('/coupon/validate', [ExamController::class, 'validateCoupon'])->name('coupon.validate');
    Route::get('/coupon/for-assessment/{assessment}', [ExamController::class, 'getCouponForAssessment'])->name('coupon.for-assessment');
    Route::post('/exam/{assessment}/start', [ExamController::class, 'start'])->name('exam.start');
    Route::get('/exam/{session}', [ExamController::class, 'show'])->name('exam.show');
    Route::post('/exam/{session}/answer', [ExamController::class, 'answer'])->name('exam.answer');
    Route::post('/exam/{session}/previous', [ExamController::class, 'previous'])->name('exam.previous');
    Route::get('/exam/{session}/result', [ExamController::class, 'result'])->name('exam.result');
    
});

// User Graded Exams
Route::middleware(['auth'])->prefix('certificates')->name('user.graded_exams.')->group(function () {
    Route::get('/', [User\UserGradedExamController::class, 'index'])->name('index');
    Route::get('/progress', [User\UserGradedExamController::class, 'progress'])->name('progress');
    Route::get('/{exam}/intro', [User\UserGradedExamController::class, 'intro'])->name('intro');
    Route::post('/{exam}/start', [User\UserGradedExamController::class, 'start'])->name('start');
    Route::get('/session/{session}', [User\UserGradedExamController::class, 'show'])->name('show');
    Route::post('/session/{session}/answer', [User\UserGradedExamController::class, 'answer'])->name('answer');
    Route::get('/session/{session}/result', [User\UserGradedExamController::class, 'result'])->name('result');
    Route::get('/{exam}/final-registration', [User\UserGradedExamController::class, 'finalRegistration'])->name('final_registration');
});

// Public Admin Preview Route (No Login Required)
Route::get('/admin/graded-exams/{exam}/preview', [Admin\GradedExamController::class, 'preview'])->name('admin.graded_exams.preview');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [Admin\SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [Admin\SettingController::class, 'update'])->name('settings.update');

    Route::get('/assessments', [Admin\AssessmentController::class, 'index'])->name('assessments.index');
    Route::post('/assessments', [Admin\AssessmentController::class, 'store'])->name('assessments.store');
    Route::put('/assessments/{assessment}', [Admin\AssessmentController::class, 'update'])->name('assessments.update');
    Route::delete('/assessments/{assessment}', [Admin\AssessmentController::class, 'destroy'])->name('assessments.destroy');
    Route::post('/assessments/{assessment}/toggle', [Admin\AssessmentController::class, 'toggle'])->name('assessments.toggle');
    Route::get('/assessments/{assessment}', [Admin\AssessmentController::class, 'show'])->name('assessments.show');
    Route::get('/assessments/{assessment}/preview/{level}', [Admin\AssessmentController::class, 'previewResult'])->name('assessments.preview');
    Route::patch('/assessments/{assessment}/settings', [Admin\AssessmentController::class, 'updateSettings'])->name('assessments.settings');

    Route::get('/questions', [Admin\QuestionController::class, 'index'])->name('questions.index');
    Route::post('/questions', [Admin\QuestionController::class, 'store'])->name('questions.store');
    Route::post('/questions/bulk', [Admin\QuestionController::class, 'bulkStore'])->name('questions.bulk');
    Route::get('/questions/by-assessment/{assessment}', [Admin\QuestionController::class, 'byAssessment'])->name('questions.byAssessment');
    Route::post('/assessments/{assessment}/questions/import-csv', [Admin\QuestionController::class, 'importCsv'])->name('questions.importCsv');
    Route::get('/questions/template', [Admin\QuestionController::class, 'downloadTemplate'])->name('questions.template');

    // Admin UX Improvements Routes
    Route::patch('/questions/reorder', [Admin\QuestionController::class, 'reorder'])->name('questions.reorder');
    Route::patch('/questions/bulk-dimension', [Admin\QuestionController::class, 'bulkAssignDimension'])->name('questions.bulkAssignDimension');
    Route::delete('/questions/bulk-delete', [Admin\QuestionController::class, 'bulkDelete'])->name('questions.bulkDelete');
    Route::patch('/questions/{question}/dimension', [Admin\QuestionController::class, 'assignDimension'])->name('questions.assignDimension');
    Route::patch('/questions/{question}', [Admin\QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{question}', [Admin\QuestionController::class, 'destroy'])->name('questions.destroy');

    // Answer Options Routes
    Route::get('/questions/{question}/options', [Admin\AnswerOptionController::class, 'index'])->name('options.index');
    Route::post('/questions/{question}/options', [Admin\AnswerOptionController::class, 'store'])->name('options.store');
    Route::put('/options/{option}', [Admin\AnswerOptionController::class, 'update'])->name('options.update');
    Route::delete('/options/{option}', [Admin\AnswerOptionController::class, 'destroy'])->name('options.destroy');
    Route::post('/questions/{question}/sync-options', [Admin\AnswerOptionController::class, 'syncToAssessment'])->name('options.sync');

    Route::get('/exams/create', [Admin\ExamController::class, 'create'])->name('exams.create');
    Route::post('/exams', [Admin\ExamController::class, 'store'])->name('exams.store');

    Route::get('/dimensions/by-assessment/{assessment}', [Admin\DimensionController::class, 'byAssessment'])->name('dimensions.byAssessment');
    Route::patch('/dimensions/reorder', [Admin\DimensionController::class, 'reorder'])->name('dimensions.reorder');
    Route::post('/assessments/{assessment}/dimensions', [Admin\DimensionController::class, 'store'])->name('dimensions.store');
    Route::patch('/dimensions/{dimension}', [Admin\DimensionController::class, 'update'])->name('dimensions.update');
    Route::delete('/dimensions/{dimension}', [Admin\DimensionController::class, 'destroy'])->name('dimensions.destroy');
    Route::post('/dimensions/{dimension}/interpretations', [Admin\DimensionController::class, 'storeInterpretations'])->name('dimensions.interpretations.store');

    Route::get('/recommendations', [Admin\RecommendationController::class, 'index'])->name('recommendations.index');
    Route::post('/recommendations', [Admin\RecommendationController::class, 'store'])->name('recommendations.store');
    Route::delete('/recommendations/{recommendation}', [Admin\RecommendationController::class, 'destroy'])->name('recommendations.destroy');

    Route::get('/statistics', [Admin\StatisticsController::class, 'index'])->name('statistics.index');
    Route::get('/statistics/data', [Admin\StatisticsController::class, 'data'])->name('statistics.data');
    Route::get('/statistics/export-csv', [Admin\StatisticsController::class, 'exportCsv'])->name('statistics.exportCsv');

    Route::resource('coupons', Admin\CouponController::class)->except(['show']);
    Route::resource('icons', Admin\IconController::class)->only(['index', 'store', 'destroy']);

    Route::get('/users', [Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/results', [Admin\UserController::class, 'userResults'])->name('users.results');

    // Graded Exams Admin Routes
    Route::prefix('graded-exams')->name('graded_exams.')->group(function () {
        // Certificates and Units
        Route::get('/', [Admin\GradedExamController::class, 'index'])->name('index');
        Route::post('/', [Admin\GradedExamController::class, 'store'])->name('store');
        Route::put('/{exam}', [Admin\GradedExamController::class, 'update'])->name('update');
        Route::delete('/{exam}', [Admin\GradedExamController::class, 'destroy'])->name('destroy');
        
        // Settings
        Route::get('/{exam}/settings', [Admin\GradedExamController::class, 'settings'])->name('settings');
        Route::put('/{exam}/settings', [Admin\GradedExamController::class, 'updateSettings'])->name('settings.update');
        
        Route::get('/{exam}/units', [Admin\GradedExamController::class, 'showUnits'])->name('units.show');
        Route::post('/{exam}/units', [Admin\GradedExamController::class, 'storeUnit'])->name('units.store');
        Route::put('/units/{unit}', [Admin\GradedExamController::class, 'updateUnit'])->name('units.update');
        Route::delete('/units/{unit}', [Admin\GradedExamController::class, 'destroyUnit'])->name('units.destroy');

        // Questions
        Route::get('/questions', [Admin\GradedExamQuestionController::class, 'index'])->name('questions.index');
        Route::post('/questions', [Admin\GradedExamQuestionController::class, 'store'])->name('questions.store');
        Route::patch('/questions/{question}', [Admin\GradedExamQuestionController::class, 'update'])->name('questions.update');
        Route::delete('/questions/{question}', [Admin\GradedExamQuestionController::class, 'destroy'])->name('questions.destroy');
        Route::get('/questions/{question}/options', [Admin\GradedExamQuestionController::class, 'options'])->name('questions.options');
        
        Route::get('/api-units', [Admin\GradedExamQuestionController::class, 'getUnits'])->name('units.byExam');
    });
});