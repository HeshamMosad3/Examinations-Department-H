<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LifeWheelController;
use Illuminate\Support\Facades\Route;

// Landing pages
Route::get('/', function () {
    $challengeQuestions = \App\Models\ChallengeQuestion::where('is_active', true)->get()->map(function($q, $index) {
        return [
            'id' => $q->id,
            'question' => $q->question,
            'type' => $q->type,
            'patternRow' => $q->pattern_row,
            'options' => $q->options,
            'correctIndex' => $q->correct_index,
            'initialBtnText' => $index === 0 ? 'ابدأ التحدي' : null,
        ];
    });
    return view('landing.index', compact('challengeQuestions'));
})->name('home');

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

        $solidIcons = [
            'spiritual' => '/landing/icons/wheel_of_life/spiritual.png',
            'health' => '/landing/icons/wheel_of_life/health.png',
            'personal' => '/landing/icons/wheel_of_life/personal.png',
            'family' => '/landing/icons/wheel_of_life/family.png',
            'social' => '/landing/icons/wheel_of_life/social.png',
            'professional' => '/landing/icons/wheel_of_life/career.png',
            'financial' => '/landing/icons/wheel_of_life/financial.png',
            'leisure' => '/landing/icons/wheel_of_life/leisure.png'
        ];

        foreach ($assessment->dimensions as $dim) {
            $key = $keys[$dim->name_ar] ?? 'unknown';
            $icon = $icons[$key] ?? '';
            $solidIcon = $solidIcons[$key] ?? '';
            $questions = $dim->questions->sortBy('order_index')->pluck('text_ar')->toArray();
            
            $categories[] = [
                'key' => $key,
                'label' => $dim->name_ar,
                'iconUrl' => $icon,
                'solidIconUrl' => $solidIcon,
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

// اختبار أنماط الإدراك - الأسئلة والإجابات من قاعدة البيانات بس
$getPerceptualAssessment = function () {
    $assessment = \App\Models\Assessment::with([
        'questions' => fn ($q) => $q->orderBy('order_index'),
        'questions.answerOptions' => fn ($q) => $q->orderBy('order_index'),
        'questions.dimension',
        'dimensions' => fn ($q) => $q->orderBy('order_index'),
        'recommendations',
    ])->where('scoring_type', 'perceptual_styles')->where('is_active', true)->first();

    abort_if(!$assessment || $assessment->questions->isEmpty(), 404);

    return $assessment;
};

// صفحة "اكتشف أنماط الإدراك" - عدد الأسئلة من قاعدة البيانات
Route::get('/perceptual-explore.html', function () {
    $questionsCount = \App\Models\Question::whereHas('assessment', fn ($q) => $q->where('scoring_type', 'perceptual_styles')->where('is_active', true))->count();

    return view('landing.perceptual-explore', compact('questionsCount'));
})->name('perceptual.explore');

Route::get('/perceptual-test.html', function () use ($getPerceptualAssessment) {
    $questions = $getPerceptualAssessment()->questions->map(fn ($q) => [
        'text' => $q->text_ar,
        'options' => $q->answerOptions->map(fn ($o) => ['label' => $o->label_ar])->all(),
    ])->all();

    return view('landing.perceptual-test', compact('questions'));
})->name('perceptual.test');

// تقرير نتائج أنماط الإدراك - الإجابات جاية في الرابط والدرجات بتتحسب من score_value في قاعدة البيانات
Route::get('/perceptual-result.html', function (\Illuminate\Http\Request $request) use ($getPerceptualAssessment) {
    $assessment = $getPerceptualAssessment();
    $answers = explode(',', (string) $request->query('answers'));
    abort_if(count($answers) !== $assessment->questions->count(), 422, 'إجابات غير مكتملة');

    $styleKey = fn (string $name) => match (true) {
        str_contains($name, 'بصري') => 'visual',
        str_contains($name, 'سمعي') => 'auditory',
        str_contains($name, 'حسي') => 'kinesthetic',
        default => null,
    };

    $scores = $assessment->dimensions->mapWithKeys(fn ($d) => [$d->id => 0])->all();
    foreach ($assessment->questions->values() as $i => $question) {
        $option = $question->answerOptions->values()->get((int) $answers[$i]);
        abort_if(!ctype_digit($answers[$i]) || !$option, 422, 'إجابة غير صحيحة');
        $scores[$question->dimension_id] = ($scores[$question->dimension_id] ?? 0) + (int) $option->score_value;
    }

    $styles = $assessment->dimensions
        ->map(fn ($d) => ['key' => $styleKey($d->name_ar), 'name' => $d->name_ar, 'score' => $scores[$d->id] ?? 0, 'max' => (int) $d->max_score])
        ->filter(fn ($s) => $s['key'])
        ->sortByDesc('score')->values();

    $byKey = $styles->pluck('score', 'key');
    $level = \App\Services\Result\RecommendationSelector::classifyPerceptual($byKey['visual'] ?? 0, $byKey['auditory'] ?? 0, $byKey['kinesthetic'] ?? 0);
    $recommendation = $assessment->recommendations->firstWhere('level', $level);
    abort_if(!$recommendation, 404, 'لا يوجد تقرير مسجل لهذه النتيجة');

    return view('landing.perceptual-result', [
        'report' => app(\App\Services\Result\PerceptualReportBuilder::class)->build($recommendation),
        'styles' => $styles,
        'reportCode' => $assessment->report_code,
        'beneficiary' => auth()->user()?->name ?? 'زائر',
    ]);
})->name('perceptual.result');

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
    Route::resource('challenge-questions', Admin\ChallengeQuestionController::class);
    Route::get('/life-wheel-influence', [Admin\LifeWheelInfluenceController::class, 'index'])->name('life-wheel-influence.index');
    Route::put('/life-wheel-influence', [Admin\LifeWheelInfluenceController::class, 'update'])->name('life-wheel-influence.update');

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