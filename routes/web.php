<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LifeWheelController;
use Illuminate\Support\Facades\Route;

// Landing pages
Route::view('/', 'landing.index')->name('home');
Route::redirect('/index.html', '/', 301);

$getLifeWheelCategories = function () {
    $assessment = \App\Models\Assessment::with('dimensions.questions')->where('category', 'عجلة الحياة')->first();
    $categories = [];
    if ($assessment) {
        $keys = [
            'الروحي' => 'spiritual',
            'الصحي' => 'health',
            'الشخصي' => 'personal',
            'العائلي' => 'family',
            'الاجتماعي' => 'social',
            'المهني' => 'professional',
            'المالي' => 'financial',
            'الترفيهي' => 'leisure'
        ];
        
        $icons = [
            'spiritual' => '/landing/icons/wheel_of_life_line/mosque.svg',
            'health' => '/landing/icons/wheel_of_life_line/heart-pulse.svg',
            'personal' => '/landing/icons/wheel_of_life_line/user.svg',
            'family' => '/landing/icons/wheel_of_life_line/family.svg',
            'social' => '/landing/icons/wheel_of_life_line/users.svg',
            'professional' => '/landing/icons/wheel_of_life_line/work.svg',
            'financial' => '/landing/icons/wheel_of_life_line/coins.svg',
            'leisure' => '/landing/icons/wheel_of_life_line/gamepad.svg'
        ];

        foreach ($assessment->dimensions as $dim) {
            $key = $keys[$dim->name_ar] ?? 'unknown';
            $icon = $icons[$key] ?? '';
            $questions = $dim->questions->sortBy('order_index')->pluck('text_ar')->toArray();
            
            $categories[] = [
                'key' => $key,
                'label' => $dim->name_ar,
                'iconUrl' => $icon,
                'description' => $dim->description_ar ?? '',
                'questions' => $questions
            ];
        }
    }
    return $categories;
};

Route::view('/life-wheel.html', 'landing.life-wheel')->name('life-wheel.explore');

Route::get('/life-wheel-assessment.html', function () use ($getLifeWheelCategories) {
    $categories = $getLifeWheelCategories();
    return view('landing.life-wheel-assessment', compact('categories'));
})->name('life-wheel.assessment');

Route::get('/result.html', function () use ($getLifeWheelCategories) {
    $categories = $getLifeWheelCategories();
    return view('landing.result', compact('categories'));
})->name('life-wheel.result');

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
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    Route::get('/assessments', function () {
        return redirect()->route('home');
    })->name('dashboard.assessments');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

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

    Route::resource('icons', Admin\IconController::class)->only(['index', 'store', 'destroy']);

    Route::get('/users', [Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/results', [Admin\UserController::class, 'userResults'])->name('users.results');
});