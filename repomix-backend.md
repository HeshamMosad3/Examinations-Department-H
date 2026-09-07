This file is a merged representation of a subset of the codebase, containing specifically included files and files not matching ignore patterns, combined into a single document by Repomix.

# File Summary

## Purpose
This file contains a packed representation of a subset of the repository's contents that is considered the most important context.
It is designed to be easily consumable by AI systems for analysis, code review,
or other automated processes.

## File Format
The content is organized as follows:
1. This summary section
2. Repository information
3. Directory structure
4. Repository files (if enabled)
5. Multiple file entries, each consisting of:
  a. A header with the file path (## File: path/to/file)
  b. The full contents of the file in a code block

## Usage Guidelines
- This file should be treated as read-only. Any changes should be made to the
  original repository files, not this packed version.
- When processing this file, use the file path to distinguish
  between different files in the repository.
- Be aware that this file may contain sensitive information. Handle it with
  the same level of security as you would the original repository.

## Notes
- Some files may have been excluded based on .gitignore rules and Repomix's configuration
- Binary files are not included in this packed representation. Please refer to the Repository Structure section for a complete list of file paths, including binary files
- Only files matching these patterns are included: app/**, routes/**, database/migrations/**, config/**
- Files matching these patterns are excluded: _ide_helper*.php, .phpstorm.meta.php, *backup*, *.txt
- Files matching patterns in .gitignore are excluded
- Files matching default ignore patterns are excluded
- Files are sorted by Git change count (files with more changes are at the bottom)

# Directory Structure
```
app/Console/Commands/CleanReversedLabels.php
app/Console/Commands/ConvertRecommendationsJson.php
app/Http/Controllers/Admin/AnswerOptionController.php
app/Http/Controllers/Admin/AssessmentController.php
app/Http/Controllers/Admin/CouponController.php
app/Http/Controllers/Admin/DashboardController.php
app/Http/Controllers/Admin/DimensionController.php
app/Http/Controllers/Admin/ExamController.php
app/Http/Controllers/Admin/GradedExamController.php
app/Http/Controllers/Admin/GradedExamQuestionController.php
app/Http/Controllers/Admin/IconController.php
app/Http/Controllers/Admin/QuestionController.php
app/Http/Controllers/Admin/RecommendationController.php
app/Http/Controllers/Admin/SettingController.php
app/Http/Controllers/Admin/StatisticsController.php
app/Http/Controllers/Admin/UserController.php
app/Http/Controllers/AuthController.php
app/Http/Controllers/Controller.php
app/Http/Controllers/DashboardController.php
app/Http/Controllers/ExamController.php
app/Http/Controllers/User/UserGradedExamController.php
app/Http/Middleware/AdminMiddleware.php
app/Http/Middleware/UserMiddleware.php
app/Http/Requests/Admin/BulkStoreQuestionsRequest.php
app/Http/Requests/Admin/SaveCouponRequest.php
app/Http/Requests/Admin/StoreAssessmentRequest.php
app/Http/Requests/Admin/StoreDimensionRequest.php
app/Http/Requests/Admin/StoreInterpretationsRequest.php
app/Http/Requests/Admin/StoreQuestionRequest.php
app/Http/Requests/Admin/StoreRecommendationRequest.php
app/Http/Requests/Admin/UpdateAssessmentRequest.php
app/Http/Requests/Admin/UpdateSettingsRequest.php
app/Http/Requests/AnswerQuestionRequest.php
app/Http/Requests/LoginRequest.php
app/Http/Requests/RegisterRequest.php
app/Models/AnswerOption.php
app/Models/Assessment.php
app/Models/Coupon.php
app/Models/Dimension.php
app/Models/DimensionInterpretation.php
app/Models/DimensionScore.php
app/Models/ExamSession.php
app/Models/GradedExam.php
app/Models/GradedExamConstraintSetting.php
app/Models/GradedExamOption.php
app/Models/GradedExamQuestion.php
app/Models/GradedExamResult.php
app/Models/GradedExamSession.php
app/Models/GradedExamSessionQuestion.php
app/Models/GradedExamUnit.php
app/Models/GradedExamUserAnswer.php
app/Models/GradedExamUserAnswerOption.php
app/Models/Icon.php
app/Models/Question.php
app/Models/Recommendation.php
app/Models/Result.php
app/Models/Setting.php
app/Models/User.php
app/Models/UserAnswer.php
app/Providers/AppServiceProvider.php
app/Repositories/AssessmentRepository.php
app/Repositories/Contracts/AssessmentRepositoryInterface.php
app/Repositories/Contracts/DimensionRepositoryInterface.php
app/Repositories/Contracts/ExamSessionRepositoryInterface.php
app/Repositories/Contracts/QuestionRepositoryInterface.php
app/Repositories/Contracts/RecommendationRepositoryInterface.php
app/Repositories/Contracts/UserRepositoryInterface.php
app/Repositories/DimensionRepository.php
app/Repositories/ExamSessionRepository.php
app/Repositories/QuestionRepository.php
app/Repositories/RecommendationRepository.php
app/Repositories/UserRepository.php
app/Services/AdminDashboardService.php
app/Services/AssessmentService.php
app/Services/CouponService.php
app/Services/DimensionService.php
app/Services/ExamResultService.php
app/Services/ExamService.php
app/Services/FileUploadService.php
app/Services/GradedExamGeneratorService.php
app/Services/IconService.php
app/Services/QuestionService.php
app/Services/RecommendationService.php
app/Services/Result/DimensionInterpreter.php
app/Services/Result/RecommendationSelector.php
app/Services/Result/ResultFormatter.php
app/Services/Result/ScoreCalculator.php
app/Services/SettingService.php
app/Services/StatisticsService.php
app/Services/UserDashboardService.php
app/Services/UserService.php
config/app.php
config/auth.php
config/cache.php
config/database.php
config/filesystems.php
config/graded_exams.php
config/logging.php
config/mail.php
config/queue.php
config/services.php
config/session.php
database/migrations/0001_01_01_000000_create_users_table.php
database/migrations/0001_01_01_000001_create_cache_table.php
database/migrations/0001_01_01_000002_create_jobs_table.php
database/migrations/2024_01_01_000002_create_assessments_table.php
database/migrations/2024_01_01_000003_create_dimensions_table.php
database/migrations/2024_01_01_000004_create_questions_table.php
database/migrations/2024_01_01_000005_create_answer_options_table.php
database/migrations/2024_01_01_000006_create_exam_sessions_table.php
database/migrations/2024_01_01_000007_create_user_answers_table.php
database/migrations/2024_01_01_000008_create_results_table.php
database/migrations/2024_01_01_000009_create_dimension_scores_table.php
database/migrations/2024_01_01_000010_create_recommendations_table.php
database/migrations/2026_06_24_085954_add_performance_indexes_to_tables.php
database/migrations/2026_06_24_091932_create_dimension_interpretations_table.php
database/migrations/2026_06_25_120000_add_is_reversed_to_questions_table.php
database/migrations/2026_07_01_122729_add_price_and_rating_to_assessments_table.php
database/migrations/2026_07_01_140449_add_image_url_to_assessments_table.php
database/migrations/2026_07_01_154805_create_coupons_table.php
database/migrations/2026_07_03_160643_add_subtitle_ar_to_assessments_table.php
database/migrations/2026_07_05_000000_upgrade_coupons_and_users_tables.php
database/migrations/2026_07_05_124738_add_user_restrictions_to_coupons.php
database/migrations/2026_07_05_153443_create_settings_table.php
database/migrations/2026_07_05_161859_add_extra_discount_tiers_to_coupons_table.php
database/migrations/2026_07_05_225427_add_details_to_users_table.php
database/migrations/2026_07_06_005159_add_report_details_to_assessments_table.php
database/migrations/2026_07_10_164000_add_intro_and_outro_to_assessments_and_recommendations.php
database/migrations/2026_07_11_102607_move_report_details_to_recommendations.php
database/migrations/2026_07_11_104237_add_intro_texts_to_recommendations.php
database/migrations/2026_07_11_115159_create_icons_table.php
database/migrations/2026_07_11_132219_add_icon_to_assessments_table.php
database/migrations/2026_07_15_151418_add_report_code_to_assessments_table.php
database/migrations/2026_07_17_014000_change_sessions_user_id_to_uuid.php
database/migrations/2026_07_21_170000_make_assessments_limit_nullable_on_coupons_table.php
database/migrations/2026_07_21_234000_add_perceptual_fields_to_recommendations_table.php
database/migrations/2026_08_01_000000_add_soft_deletes_to_all_core_tables.php
database/migrations/2026_08_29_000001_create_graded_exams_table.php
database/migrations/2026_08_29_000002_create_graded_exam_units_table.php
database/migrations/2026_08_29_000003_create_graded_exam_questions_table.php
database/migrations/2026_08_29_000004_create_graded_exam_options_table.php
database/migrations/2026_08_29_000005_create_graded_exam_sessions_table.php
database/migrations/2026_08_29_000006_create_graded_exam_session_questions_table.php
database/migrations/2026_08_29_000007_create_graded_exam_user_answers_table.php
database/migrations/2026_08_29_000008_create_graded_exam_user_answer_options_table.php
database/migrations/2026_08_29_000009_create_graded_exam_results_table.php
database/migrations/2026_08_29_000010_create_graded_exam_constraint_settings_table.php
database/migrations/2026_08_31_000000_make_user_id_nullable_on_graded_exam_sessions_table.php
routes/console.php
routes/web.php
```

# Files

## File: app/Http/Controllers/Admin/AnswerOptionController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnswerOption;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnswerOptionController extends Controller
{
    /**
     * Get all options for a specific question.
     */
    public function index(Question $question): JsonResponse
    {
        $options = $question->answerOptions()->orderBy('order_index')->get();
        return response()->json($options);
    }

    /**
     * Store a new answer option for a question.
     */
    public function store(Request $request, Question $question): JsonResponse
    {
        $request->validate([
            'label_ar' => 'required|string|max:255',
            'score_value' => 'required|numeric',
        ]);

        $maxOrder = $question->answerOptions()->max('order_index') ?? -1;

        $option = AnswerOption::create([
            'question_id' => $question->id,
            'label_ar' => $request->label_ar,
            'score_value' => $request->score_value,
            'order_index' => $maxOrder + 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة خيار الإجابة.',
            'option' => $option
        ]);
    }

    /**
     * Update an existing answer option.
     */
    public function update(Request $request, AnswerOption $option): JsonResponse
    {
        $request->validate([
            'label_ar' => 'required|string|max:255',
            'score_value' => 'required|numeric',
        ]);

        $option->update([
            'label_ar' => $request->label_ar,
            'score_value' => $request->score_value,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث خيار الإجابة.'
        ]);
    }

    /**
     * Delete an answer option.
     */
    public function destroy(AnswerOption $option): JsonResponse
    {
        $option->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف خيار الإجابة.'
        ]);
    }

    /**
     * Sync identical options to ALL questions in the same assessment.
     */
    public function syncToAssessment(Request $request, Question $question): JsonResponse
    {
        $assessment = $question->assessment;
        $options = $question->answerOptions()->orderBy('order_index')->get();

        if ($options->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'لا توجد خيارات لنسخها.']);
        }

        $allQuestions = $assessment->questions()->where('id', '!=', $question->id)->get();

        \Illuminate\Support\Facades\DB::transaction(function () use ($allQuestions, $options) {
            foreach ($allQuestions as $q) {
                // Delete existing options
                $q->answerOptions()->delete();
                
                // Duplicate the current question's options
                foreach ($options as $opt) {
                    AnswerOption::create([
                        'question_id' => $q->id,
                        'label_ar' => $opt->label_ar,
                        'score_value' => $opt->score_value,
                        'order_index' => $opt->order_index,
                    ]);
                }
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'تم تعميم الخيارات على جميع أسئلة المقياس بنجاح.'
        ]);
    }
}
```

## File: app/Http/Controllers/Admin/DashboardController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminDashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private readonly AdminDashboardService $dashboardService,
    ) {}

    public function index(): View
    {
        $data = $this->dashboardService->getData();

        return view('admin.dashboard', $data);
    }
}
```

## File: app/Http/Controllers/Admin/RecommendationController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRecommendationRequest;
use App\Models\Assessment;
use App\Models\Recommendation;
use App\Services\RecommendationService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RecommendationController extends Controller
{
    public function __construct(
        private readonly RecommendationService $recommendationService,
    ) {}

    public function index(): View
    {
        $recommendations = $this->recommendationService->allGrouped();
        $assessments = Assessment::orderBy('title_ar')->get();
        $icons = \App\Models\Icon::all()->groupBy('category');

        return view('admin.recommendations.index', compact('recommendations', 'assessments', 'icons'));
    }

    public function store(StoreRecommendationRequest $request): JsonResponse
    {
        $rec = $this->recommendationService->upsert($request->validated());

        return response()->json(['success' => true, 'message' => 'تم حفظ التوصية.', 'id' => $rec->id]);
    }

    public function destroy(Recommendation $recommendation): JsonResponse
    {
        $this->recommendationService->delete($recommendation);

        return response()->json(['success' => true, 'message' => 'تم حذف التوصية.']);
    }
}
```

## File: app/Http/Controllers/Admin/StatisticsController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatisticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StatisticsController extends Controller
{
    public function __construct(
        private readonly StatisticsService $statisticsService,
    ) {}

    public function index(): View
    {
        $assessments = $this->statisticsService->getAssessments();

        return view('admin.statistics.index', compact('assessments'));
    }

    public function data(Request $request): JsonResponse
    {
        $range = max(1, min((int) $request->query('range', 30), 365));
        $data = $this->statisticsService->getData($range);

        return response()->json($data);
    }

    /**
     * Export completed exam results to a CSV file.
     */
    public function exportCsv(): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="exam_results_export.csv"',
        ];

        $csvContent = $this->statisticsService->exportResultsCsv();

        return response()->streamDownload(function () use ($csvContent) {
            echo $csvContent;
        }, 'exam_results_export.csv', $headers);
    }
}
```

## File: app/Http/Controllers/Admin/UserController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {}

    public function index(Request $request): View
    {
        $search = $request->query('search');
        $users = $this->userService->searchPaginated($search);

        return view('admin.users.index', compact('users', 'search'));
    }

    public function userResults(User $user): JsonResponse
    {
        $sessions = $this->userService->getUserResults($user->id);

        $levelTranslations = [
            'high' => 'مرتفع',
            'medium' => 'متوسط',
            'low' => 'منخفض',
        ];

        $formatted = $sessions->map(function ($session) use ($levelTranslations) {
            return [
                'id' => $session->id,
                'assessment_title' => $session->assessment->title_ar,
                'completed_at' => $session->completed_at ? $session->completed_at->format('Y-m-d H:i') : null,
                'total_score' => $session->result ? $session->result->total_score : 0,
                'max_possible_score' => $session->result ? $session->result->max_possible_score : 0,
                'level' => $session->result ? ($levelTranslations[$session->result->level] ?? $session->result->level) : 'غير متوفر',
                'level_raw' => $session->result ? $session->result->level : 'unknown',
            ];
        });

        return response()->json([
            'success' => true,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
            'results' => $formatted,
        ]);
    }
}
```

## File: app/Http/Controllers/Controller.php
```php
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
```

## File: app/Http/Middleware/AdminMiddleware.php
```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check() || ! auth()->user()->isAdmin()) {
            abort(403, 'غير مصرح لك بالوصول.');
        }

        return $next($request);
    }
}
```

## File: app/Http/Middleware/UserMiddleware.php
```php
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
            return redirect()->route('login');
        }

        if (auth()->user()->isAdmin() && ! $request->is('exam/*/result')) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
```

## File: app/Http/Requests/Admin/StoreAssessmentRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssessmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'subtitle_ar' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'time_limit_min' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable|numeric|min:0',
            'rating' => 'nullable|numeric|min:1|max:5',
            'certificates_ar' => 'nullable|string',
            'programs_ar' => 'nullable|string',
            'plan_30_days_ar' => 'nullable|string',
            'dimensions' => 'nullable|array',
            'dimensions.*.name_ar' => 'required_with:dimensions|string',
            'dimensions.*.max_score' => 'required_with:dimensions|integer|min:1',
        ];
    }
}
```

## File: app/Http/Requests/Admin/StoreDimensionRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreDimensionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|max:255',
            'max_score' => 'required|integer|min:1',
        ];
    }
}
```

## File: app/Http/Requests/Admin/StoreInterpretationsRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterpretationsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'high_threshold' => 'nullable|integer|min:0',
            'low_threshold' => 'nullable|integer|min:0',
            'interpretations' => 'required|array',
            'interpretations.*' => 'required|string',
        ];
    }
}
```

## File: app/Http/Requests/Admin/UpdateAssessmentRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssessmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'time_limit_min' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'certificates_ar' => 'nullable|string',
            'programs_ar' => 'nullable|string',
            'plan_30_days_ar' => 'nullable|string',
        ];
    }
}
```

## File: app/Models/DimensionScore.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class DimensionScore extends Model
{
    use HasUuids;

    protected $fillable = ['result_id', 'dimension_id', 'score', 'max_score', 'level'];

    public function result()
    {
        return $this->belongsTo(Result::class);
    }

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
```

## File: app/Models/Icon.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Icon extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'category',
        'icon_url',
    ];
}
```

## File: app/Models/Setting.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
}
```

## File: app/Models/UserAnswer.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasUuids;

    protected $fillable = ['session_id', 'question_id', 'selected_option_id', 'score_earned'];

    public function examSession()
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function selectedOption()
    {
        return $this->belongsTo(AnswerOption::class, 'selected_option_id');
    }
}
```

## File: app/Providers/AppServiceProvider.php
```php
<?php

namespace App\Providers;

use App\Repositories\AssessmentRepository;
use App\Repositories\Contracts\AssessmentRepositoryInterface;
use App\Repositories\Contracts\DimensionRepositoryInterface;
use App\Repositories\Contracts\ExamSessionRepositoryInterface;
use App\Repositories\Contracts\QuestionRepositoryInterface;
use App\Repositories\Contracts\RecommendationRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\DimensionRepository;
use App\Repositories\ExamSessionRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\RecommendationRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register repository interface → implementation bindings.
     * This enables constructor injection throughout the application.
     */
    public function register(): void
    {
        $this->app->bind(AssessmentRepositoryInterface::class, AssessmentRepository::class);
        $this->app->bind(DimensionRepositoryInterface::class, DimensionRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(RecommendationRepositoryInterface::class, RecommendationRepository::class);
        $this->app->bind(ExamSessionRepositoryInterface::class, ExamSessionRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production') || env('FORCE_HTTPS', false)) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
```

## File: app/Repositories/Contracts/AssessmentRepositoryInterface.php
```php
<?php

namespace App\Repositories\Contracts;

use App\Models\Assessment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AssessmentRepositoryInterface
{
    /**
     * Return paginated list of assessments with questions/dimensions counts.
     */
    public function paginated(array $filters = [], int $perPage = 15): LengthAwarePaginator;

    /**
     * Find an assessment and eager-load all nested relations needed for the show page.
     */
    public function findWithRelations(string $id): Assessment;

    /**
     * Create a new assessment and return it.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Assessment;

    /**
     * Update an assessment with the given attributes.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(Assessment $assessment, array $data): Assessment;

    /**
     * Delete an assessment.
     */
    public function delete(Assessment $assessment): void;

    /**
     * Toggle the is_active flag.
     */
    public function toggle(Assessment $assessment): Assessment;
}
```

## File: app/Repositories/Contracts/DimensionRepositoryInterface.php
```php
<?php

namespace App\Repositories\Contracts;

use App\Models\Assessment;
use App\Models\Dimension;
use Illuminate\Database\Eloquent\Collection;

interface DimensionRepositoryInterface
{
    /**
     * Get all dimensions for an assessment ordered by order_index, with question count.
     */
    public function byAssessment(Assessment $assessment): Collection;

    /**
     * Create a new dimension.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Dimension;

    /**
     * Update a dimension.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(Dimension $dimension, array $data): Dimension;

    /**
     * Delete a dimension (unlinks its questions first).
     */
    public function delete(Dimension $dimension): void;

    /**
     * Reorder dimensions by providing an ordered array of UUIDs.
     *
     * @param  array<int, string>  $orderedIds
     */
    public function reorder(array $orderedIds): void;

    /**
     * Upsert dimension interpretations (high / medium / low).
     *
     * @param  array<string, mixed>  $data
     */
    public function upsertInterpretations(Dimension $dimension, array $data): void;
}
```

## File: app/Repositories/Contracts/ExamSessionRepositoryInterface.php
```php
<?php

namespace App\Repositories\Contracts;

use App\Models\Assessment;
use App\Models\ExamSession;

interface ExamSessionRepositoryInterface
{
    /**
     * Find an in-progress session for a user and assessment.
     */
    public function findInProgress(string $userId, string $assessmentId): ?ExamSession;

    /**
     * Create a new exam session.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): ExamSession;

    /**
     * Update an exam session with the given attributes.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(ExamSession $session, array $data): ExamSession;
}
```

## File: app/Repositories/Contracts/QuestionRepositoryInterface.php
```php
<?php

namespace App\Repositories\Contracts;

use App\Models\Assessment;
use App\Models\Question;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface QuestionRepositoryInterface
{
    /**
     * Return a paginated, filtered list of questions.
     * Uses DB JOINs to fetch assessment and dimension names efficiently.
     *
     * @param  array<string, mixed>  $filters  Keys: assessment_id, dimension_id, search, per_page
     */
    public function filteredPaginated(array $filters): LengthAwarePaginator;

    /**
     * Get all questions for an assessment with their answer options.
     */
    public function byAssessment(Assessment $assessment): Collection;

    /**
     * Create a question together with its answer options.
     *
     * @param  array<string, mixed>  $data
     * @param  array<int, array<string, mixed>>  $options
     */
    public function create(array $data, array $options): Question;

    /**
     * Update the question text.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(Question $question, array $data): Question;

    /**
     * Delete a single question.
     */
    public function delete(Question $question): void;

    /**
     * Delete multiple questions by IDs.
     *
     * @param  array<int, string>  $ids
     */
    public function bulkDelete(array $ids): void;

    /**
     * Reorder questions by providing an ordered array of UUIDs.
     *
     * @param  array<int, string>  $orderedIds
     */
    public function reorder(array $orderedIds): void;

    /**
     * Assign a dimension to multiple questions.
     *
     * @param  array<int, string>  $ids
     */
    public function bulkAssignDimension(array $ids, ?string $dimensionId): void;

    /**
     * Assign a dimension to a single question.
     */
    public function assignDimension(Question $question, ?string $dimensionId): Question;

    /**
     * Bulk-import questions from plain text lines with default answer options.
     *
     * @param  array<string, mixed>  $data  Keys: assessment_id, dimension_id, lines
     * @return int Number of questions created
     */
    public function bulkImport(array $data): int;
}
```

## File: app/Repositories/Contracts/RecommendationRepositoryInterface.php
```php
<?php

namespace App\Repositories\Contracts;

use App\Models\Recommendation;
use Illuminate\Support\Collection;

interface RecommendationRepositoryInterface
{
    /**
     * Get all recommendations joined with assessment names, grouped by assessment_id.
     *
     * @return Collection<string, Collection<int, Recommendation>>
     */
    public function allGrouped(): Collection;

    /**
     * Upsert a recommendation (update-or-create by assessment_id + level).
     *
     * @param  array<string, mixed>  $data
     */
    public function upsert(array $data): Recommendation;

    /**
     * Delete a recommendation.
     */
    public function delete(Recommendation $recommendation): void;
}
```

## File: app/Repositories/DimensionRepository.php
```php
<?php

namespace App\Repositories;

use App\Models\Assessment;
use App\Models\Dimension;
use App\Repositories\Contracts\DimensionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DimensionRepository implements DimensionRepositoryInterface
{
    public function byAssessment(Assessment $assessment): Collection
    {
        return $assessment->dimensions()
            ->withCount('questions')
            ->orderBy('order_index')
            ->get();
    }

    public function create(array $data): Dimension
    {
        return Dimension::create($data);
    }

    public function update(Dimension $dimension, array $data): Dimension
    {
        $dimension->update($data);

        return $dimension->fresh();
    }

    public function delete(Dimension $dimension): void
    {
        // Unlink questions so they are not orphaned
        $dimension->questions()->update(['dimension_id' => null]);
        $dimension->delete();
    }

    public function reorder(array $orderedIds): void
    {
        foreach ($orderedIds as $index => $id) {
            Dimension::where('id', $id)->update(['order_index' => $index]);
        }
    }

    public function upsertInterpretations(Dimension $dimension, array $data): void
    {
        foreach (['high', 'medium', 'low'] as $level) {
            $dimension->interpretations()->updateOrCreate(
                ['level' => $level],
                [
                    'interpretation_text_ar' => $data['interpretations'][$level],
                    'high_threshold' => $data['high_threshold'],
                    'low_threshold' => $data['low_threshold'],
                ]
            );
        }
    }
}
```

## File: app/Repositories/ExamSessionRepository.php
```php
<?php

namespace App\Repositories;

use App\Models\ExamSession;
use App\Repositories\Contracts\ExamSessionRepositoryInterface;

class ExamSessionRepository implements ExamSessionRepositoryInterface
{
    public function findInProgress(string $userId, string $assessmentId): ?ExamSession
    {
        return ExamSession::where('user_id', $userId)
            ->where('assessment_id', $assessmentId)
            ->where('status', 'in_progress')
            ->first();
    }

    public function create(array $data): ExamSession
    {
        return ExamSession::create($data);
    }

    public function update(ExamSession $session, array $data): ExamSession
    {
        $session->update($data);

        return $session->fresh();
    }
}
```

## File: app/Repositories/RecommendationRepository.php
```php
<?php

namespace App\Repositories;

use App\Models\Recommendation;
use App\Repositories\Contracts\RecommendationRepositoryInterface;
use Illuminate\Support\Collection;

class RecommendationRepository implements RecommendationRepositoryInterface
{
    public function allGrouped(): Collection
    {
        /*
         * JOIN recommendations with assessments to retrieve assessment title
         * alongside each recommendation in a single query.
         */
        return Recommendation::with('assessment')
            ->orderBy('assessment_id')
            ->get()
            ->groupBy('assessment_id');
    }

    public function upsert(array $data): Recommendation
    {
        if (!empty($data['id'])) {
            /** @var Recommendation $rec */
            $rec = Recommendation::findOrFail($data['id']);
            $rec->update($data);
            return $rec;
        }

        /** @var Recommendation $rec */
        $rec = Recommendation::updateOrCreate(
            [
                'assessment_id' => $data['assessment_id'],
                'level' => $data['level'],
            ],
            $data
        );

        return $rec;
    }

    public function delete(Recommendation $recommendation): void
    {
        $recommendation->delete();
    }
}
```

## File: app/Services/AdminDashboardService.php
```php
<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\ExamSession;
use Illuminate\Support\Facades\DB;

class AdminDashboardService
{
    /**
     * Build all data needed for the admin dashboard.
     *
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        $totalUsers = DB::table('users')->where('role', 'user')->count();
        $todaySessions = DB::table('exam_sessions')
            ->where('status', 'completed')
            ->whereDate('completed_at', today())
            ->count();

        /*
         * Most-used assessment: join exam_sessions and count completed ones
         * to avoid the N+1 withCount pattern.
         */
        $mostUsedAssessment = Assessment::withCount([
            'examSessions' => fn ($q) => $q->where('status', 'completed'),
        ])
            ->orderByDesc('exam_sessions_count')
            ->first();

        $avgScore = DB::table('results')->avg('total_score');

        /*
         * Recent sessions: JOIN users, assessments, results in a single query.
         */
        $recentSessions = ExamSession::where('status', 'completed')
            ->with(['user', 'assessment', 'result'])
            ->orderByDesc('completed_at')
            ->limit(10)
            ->get();

        return compact(
            'totalUsers',
            'todaySessions',
            'mostUsedAssessment',
            'avgScore',
            'recentSessions'
        );
    }
}
```

## File: app/Services/AssessmentService.php
```php
<?php

namespace App\Services;

use App\Models\Assessment;
use App\Repositories\Contracts\AssessmentRepositoryInterface;
use App\Repositories\Contracts\DimensionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AssessmentService
{
    public function __construct(
        private readonly AssessmentRepositoryInterface $assessments,
        private readonly DimensionRepositoryInterface $dimensions,
    ) {}

    public function list(array $filters = []): LengthAwarePaginator
    {
        return $this->assessments->paginated($filters);
    }

    public function getForManagement(string $id): Assessment
    {
        return $this->assessments->findWithRelations($id);
    }

    /**
     * Create an assessment along with its initial dimensions.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Assessment
    {
        $assessment = $this->assessments->create([
            'title_ar' => $data['title_ar'],
            'category' => $data['category'],
            'description_ar' => $data['description_ar'] ?? null,
            'time_limit_min' => $data['time_limit_min'] ?? null,
            'created_by' => auth()->id(),
        ]);

        if (! empty($data['dimensions'])) {
            foreach ($data['dimensions'] as $index => $dim) {
                $this->dimensions->create([
                    'assessment_id' => $assessment->id,
                    'name_ar' => $dim['name_ar'],
                    'max_score' => $dim['max_score'],
                    'order_index' => $index,
                ]);
            }
        }

        return $assessment;
    }

    /**
     * Update basic assessment fields.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(Assessment $assessment, array $data): Assessment
    {
        return $this->assessments->update($assessment, $data);
    }

    /**
     * Update assessment settings (includes is_active flag).
     *
     * @param  array<string, mixed>  $data
     */
    public function updateSettings(Assessment $assessment, array $data): Assessment
    {
        return $this->assessments->update($assessment, $data);
    }

    public function delete(Assessment $assessment): void
    {
        $this->assessments->delete($assessment);
    }

    public function toggle(Assessment $assessment): Assessment
    {
        return $this->assessments->toggle($assessment);
    }
}
```

## File: app/Services/DimensionService.php
```php
<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Dimension;
use App\Repositories\Contracts\DimensionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DimensionService
{
    public function __construct(
        private readonly DimensionRepositoryInterface $dimensions,
    ) {}

    public function byAssessment(Assessment $assessment): Collection
    {
        return $this->dimensions->byAssessment($assessment);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(Assessment $assessment, array $data): Dimension
    {
        return $this->dimensions->create([
            'assessment_id' => $assessment->id,
            'name_ar' => $data['name_ar'],
            'max_score' => $data['max_score'],
            'order_index' => $assessment->dimensions()->count(),
        ]);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(Dimension $dimension, array $data): Dimension
    {
        return $this->dimensions->update($dimension, $data);
    }

    public function delete(Dimension $dimension): void
    {
        $this->dimensions->delete($dimension);
    }

    /**
     * @param  array<int, string>  $orderedIds
     */
    public function reorder(array $orderedIds): void
    {
        $this->dimensions->reorder($orderedIds);
    }

    /**
     * Save all three level interpretations for a dimension.
     *
     * @param  array<string, mixed>  $data
     */
    public function saveInterpretations(Dimension $dimension, array $data): void
    {
        $this->dimensions->upsertInterpretations($dimension, $data);
    }
}
```

## File: app/Services/ExamService.php
```php
<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\UserAnswer;
use App\Repositories\Contracts\ExamSessionRepositoryInterface;
use Carbon\Carbon;

class ExamService
{
    public function __construct(
        private readonly ExamSessionRepositoryInterface $sessions,
        private readonly ExamResultService $resultService,
    ) {}

    /**
     * Start a new exam session (or return an existing in-progress one).
     *
     * Returns either an ExamSession (if resumed) or a newly created ExamSession.
     */
    public function startOrResume(Assessment $assessment, string $userId): array
    {
        $existing = $this->sessions->findInProgress($userId, $assessment->id);

        if ($existing) {
            return ['session' => $existing, 'resumed' => true];
        }

        $session = $this->sessions->create([
            'user_id' => $userId,
            'assessment_id' => $assessment->id,
            'status' => 'in_progress',
            'started_at' => Carbon::now(),
        ]);

        return ['session' => $session, 'resumed' => false];
    }

    /**
     * Load session data for the exam page (assessment + questions + progress).
     *
     * @return array<string, mixed>
     */
    public function getSessionData(ExamSession $session): array
    {
        $assessment = $session->assessment;
        $total = $assessment->questions()->count();
        $answeredIds = $session->userAnswers()->pluck('question_id')->toArray();
        
        $nextQuestion = $assessment->questions()
            ->with('answerOptions')
            ->whereNotIn('id', $answeredIds)
            ->orderBy('order_index')
            ->first();
            
        $current = count($answeredIds) + 1;

        return [
            'assessment' => $assessment,
            'nextQuestion' => $nextQuestion,
            'progress' => [
                'current' => $current,
                'total' => $total,
                'percentage' => $total > 0 ? round(($current) / $total * 100) : 0,
            ],
        ];
    }

    /**
     * Delete the last answer and return the previous question state.
     *
     * @return array<string, mixed>
     */
    public function previousQuestion(ExamSession $session): array
    {
        $lastAnswer = $session->userAnswers()->orderBy('id', 'desc')->first();
        if ($lastAnswer) {
            $lastAnswer->delete();
        }

        $answeredIds = $session->userAnswers()->pluck('question_id')->toArray();
        $total = $session->assessment->questions()->count();
        $answeredCount = count($answeredIds);
        
        $nextQuestion = $session->assessment->questions()
            ->with('answerOptions', 'dimension')
            ->whereNotIn('id', $answeredIds)
            ->orderBy('order_index')
            ->first();
            
        $current = $answeredCount + 1;

        if (! $nextQuestion) {
            // Unlikely if we just deleted an answer, but fallback
            $this->resultService->calculate($session);

            return ['is_last' => true, 'redirect' => route('exam.result', $session->id)];
        }

        return [
            'is_last' => false,
            'next_question' => [
                'id' => $nextQuestion->id,
                'text_ar' => $nextQuestion->text_ar,
                'is_reversed' => (bool) $nextQuestion->is_reversed,
                'dimension_name' => $nextQuestion->dimension?->name_ar,
                'options' => $nextQuestion->answerOptions->map(fn ($o) => [
                    'id' => $o->id,
                    'label_ar' => $o->label_ar,
                ]),
            ],
            'progress' => [
                'current' => $current,
                'total' => $total,
                'percentage' => $total > 0 ? round(($current) / $total * 100) : 0,
            ],
        ];
    }

    /**
     * Submit an answer and return the next question data (or redirect to result).
     *
     * @return array<string, mixed>
     */
    public function submitAnswer(ExamSession $session, string $questionId, string $optionId): array
    {
        // Verify question belongs to this assessment
        $question = $session->assessment->questions()->findOrFail($questionId);

        // Verify option belongs to this question
        $option = $question->answerOptions()->findOrFail($optionId);

        // Upsert answer
        UserAnswer::updateOrCreate(
            ['session_id' => $session->id, 'question_id' => $question->id],
            ['selected_option_id' => $option->id, 'score_earned' => $option->score_value]
        );

        // Find next unanswered question
        $answeredIds = $session->userAnswers()->pluck('question_id')->toArray();
        $total = $session->assessment->questions()->count();
        $answeredCount = count($answeredIds);
        
        $nextQuestion = $session->assessment->questions()
            ->with('answerOptions', 'dimension')
            ->whereNotIn('id', $answeredIds)
            ->orderBy('order_index')
            ->first();

        if (! $nextQuestion) {
            $this->resultService->calculate($session);

            return ['is_last' => true, 'redirect' => route('exam.result', $session->id)];
        }

        $current = $answeredCount + 1;

        return [
            'is_last' => false,
            'next_question' => [
                'id' => $nextQuestion->id,
                'text_ar' => $nextQuestion->text_ar,
                'is_reversed' => (bool) $nextQuestion->is_reversed,
                'dimension_name' => $nextQuestion->dimension?->name_ar,
                'options' => $nextQuestion->answerOptions->map(fn ($o) => [
                    'id' => $o->id,
                    'label_ar' => $o->label_ar,
                ]),
            ],
            'progress' => [
                'current' => $current,
                'total' => $total,
                'percentage' => $total > 0 ? round(($current) / $total * 100) : 0,
            ],
        ];
    }

    /**
     * Get or calculate the result for a completed session.
     *
     * @return array<string, mixed>
     */
    public function getResult(ExamSession $session): array
    {
        return $this->resultService->getFormattedResult($session);
    }
}
```

## File: app/Services/RecommendationService.php
```php
<?php

namespace App\Services;

use App\Models\Recommendation;
use App\Repositories\Contracts\RecommendationRepositoryInterface;
use Illuminate\Support\Collection;

class RecommendationService
{
    public function __construct(
        private readonly RecommendationRepositoryInterface $recommendations,
    ) {}

    /**
     * @return Collection<string, Collection<int, Recommendation>>
     */
    public function allGrouped(): Collection
    {
        return $this->recommendations->allGrouped();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function upsert(array $data): Recommendation
    {
        return $this->recommendations->upsert($data);
    }

    public function delete(Recommendation $recommendation): void
    {
        $this->recommendations->delete($recommendation);
    }
}
```

## File: app/Services/Result/DimensionInterpreter.php
```php
<?php

namespace App\Services\Result;

use App\Models\Dimension;
use App\Models\DimensionInterpretation;

class DimensionInterpreter
{
    /**
     * Interprets a dimension score strictly using its database thresholds.
     */
    public function interpret(Dimension $dimension, int $score): ?DimensionInterpretation
    {
        foreach ($dimension->interpretations as $interp) {
            if ($interp->low_threshold !== null && $interp->high_threshold !== null) {
                if ($score >= $interp->low_threshold && $score <= $interp->high_threshold) {
                    return $interp;
                }
            }
        }

        return null;
    }
}
```

## File: app/Services/Result/ScoreCalculator.php
```php
<?php

namespace App\Services\Result;

use App\Models\ExamSession;

class ScoreCalculator
{
    /**
     * Calculate raw scores for the overall assessment and individual dimensions.
     * 
     * @return array{
     *   total_score: int, 
     *   max_score: int, 
     *   dimensions: array<array{dimension_id: string, score: int, max_score: int, name: string}>
     * }
     */
    public function calculate(ExamSession $session): array
    {
        $assessment = $session->assessment;
        $answeredByQuestion = $session->userAnswers->keyBy('question_id');

        $totalScore = 0;
        $maxScore = 0;

        foreach ($assessment->questions as $question) {
            $answer = $answeredByQuestion->get($question->id);
            if ($answer) {
                // The score_earned is already accurately recorded during the exam 
                // regardless of whether the question is reversed or not.
                $totalScore += (int)$answer->score_earned;
            }
            $maxScore += (int)($question->answerOptions->max('score_value') ?? 0);
        }

        $dimensionScoresData = [];

        foreach ($assessment->dimensions as $dimension) {
            $dimQuestions = $assessment->questions->where('dimension_id', $dimension->id);
            $dimScore = 0;
            $dimMax = 0;

            foreach ($dimQuestions as $q) {
                $answer = $answeredByQuestion->get($q->id);
                if ($answer) {
                    $dimScore += (int)$answer->score_earned;
                }
                $dimMax += (int)($q->answerOptions->max('score_value') ?? 0);
            }
            
            // Fallback for max score if no options
            $dimMax = $dimMax ?: $dimension->max_score;

            $dimensionScoresData[] = [
                'dimension_id' => $dimension->id,
                'name'         => $dimension->name_ar,
                'score'        => $dimScore,
                'max_score'    => (int)$dimMax,
            ];
        }

        return [
            'total_score' => $totalScore,
            'max_score'   => $maxScore,
            'dimensions'  => $dimensionScoresData,
        ];
    }
}
```

## File: app/Services/UserDashboardService.php
```php
<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Coupon;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserDashboardService
{
    /**
     * Build all data needed for the user dashboard in an optimised way.
     *
     * @return array<string, mixed>
     */
    public function getData(User $user): array
    {
        // 1. Cache Assessments (Global)
        $assessmentsMax = Assessment::max('updated_at') ?? 'none';
        $assessmentsCount = Assessment::count();
        $assessmentsKey = "active_assessments_{$assessmentsMax}_{$assessmentsCount}";
        $assessments = Cache::remember($assessmentsKey, 3600, function () {
            return Assessment::where('is_active', true)
                ->withCount('questions')
                ->orderBy('category')
                ->orderBy('title_ar')
                ->get();
        });

        // 2. Cache Active Coupons (Global)
        $couponsMax = Coupon::max('updated_at') ?? 'none';
        $couponsCount = Coupon::count();
        $couponsKey = "active_coupons_{$couponsMax}_{$couponsCount}";
        $activeCoupons = Cache::remember($couponsKey, 3600, function () {
            return Coupon::where('is_active', true)
                ->where(function ($query) {
                    $query->whereNull('expires_at')
                        ->orWhere('expires_at', '>=', now()->toDateString());
                })->get();
        });

        // 3. Cache User Sessions & Progress Map (User-specific)
        $sessionsMax = $user->examSessions()->max('updated_at') ?? 'none';
        $sessionsCount = $user->examSessions()->count();
        $sessionsKey = "user_sessions_{$user->id}_{$sessionsMax}_{$sessionsCount}";

        $userSessions = Cache::remember($sessionsKey, 3600, function () use ($user) {
            return $user->examSessions()
                ->with(['assessment', 'result'])
                ->orderByDesc('updated_at')
                ->get();
        });

        $progressKey = "user_progress_{$user->id}_{$sessionsMax}_{$sessionsCount}";
        $progressMap = Cache::remember($progressKey, 3600, function () use ($user) {
            $progressRows = DB::table('exam_sessions')
                ->where('user_id', $user->id)
                ->select([
                    'assessment_id',
                    DB::raw('COUNT(*) as total'),
                    DB::raw("SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed"),
                ])
                ->groupBy('assessment_id')
                ->get();

            $map = [];
            foreach ($progressRows as $row) {
                $map[$row->assessment_id] = [
                    'completed' => (int) $row->completed,
                    'total' => (int) $row->total,
                ];
            }

            return $map;
        });

        // 4. Load My Coupons (No need to cache as it's a very light query and pivot updates are tricky to track globally)
        $myCoupons = $user->coupons()->get();

        // 5. Site Settings (stats)
        $siteSettings = Cache::remember('site_settings', 3600, function () {
            $settings = Setting::pluck('value', 'key')->toArray();
            
            if (isset($settings['stats_mode']) && $settings['stats_mode'] === 'auto') {
                $settings['stat_users'] = '+' . \App\Models\User::count();
                $settings['stat_exams'] = '+' . \App\Models\Result::count();
                $settings['stat_assessments'] = '+' . \App\Models\Assessment::count();
                $settings['stat_fields'] = '+' . \App\Models\Dimension::count();
            }
            
            return $settings;
        });

        return compact('assessments', 'userSessions', 'progressMap', 'activeCoupons', 'myCoupons', 'siteSettings');
    }
}
```

## File: config/app.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
```

## File: config/auth.php
```php
<?php

use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | which utilizes session storage plus the Eloquent user provider.
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | If you have multiple user tables or models you may configure multiple
    | providers to represent the model / table. These providers may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the number of seconds before a password confirmation
    | window expires and users are asked to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
```

## File: config/cache.php
```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache store that will be used by the
    | framework. This connection is utilized if another isn't explicitly
    | specified when running a cache operation inside the application.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "array", "database", "file", "memcached",
    |                    "redis", "dynamodb", "octane",
    |                    "failover", "null"
    |
    */

    'stores' => [

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

        'failover' => [
            'driver' => 'failover',
            'stores' => [
                'database',
                'array',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    | stores, there might be other applications using the same cache. For
    | that reason, you may prefix every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-cache-'),

];
```

## File: config/database.php
```php
<?php

use Illuminate\Support\Str;
use Pdo\Mysql;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
            'transaction_mode' => 'DEFERRED',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                (PHP_VERSION_ID >= 80500 ? Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                (PHP_VERSION_ID >= 80500 ? Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => env('DB_SSLMODE', 'prefer'),
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-database-'),
            'persistent' => env('REDIS_PERSISTENT', false),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
            'max_retries' => env('REDIS_MAX_RETRIES', 3),
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'),
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100),
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
            'max_retries' => env('REDIS_MAX_RETRIES', 3),
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'),
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100),
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000),
        ],

    ],

];
```

## File: config/filesystems.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
```

## File: config/logging.php
```php
<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [

        'stack' => [
            'driver' => 'stack',
            'channels' => explode(',', (string) env('LOG_STACK', 'single')),
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => env('LOG_DAILY_DAYS', 14),
            'replace_placeholders' => true,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => env('LOG_SLACK_USERNAME', env('APP_NAME', 'Laravel')),
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'),
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'handler_with' => [
                'stream' => 'php://stderr',
            ],
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'processors' => [PsrLogMessageProcessor::class],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER),
            'replace_placeholders' => true,
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

    ],

];
```

## File: config/mail.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
            'retry_after' => 60,
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
            'retry_after' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', env('APP_NAME', 'Laravel')),
    ],

];
```

## File: config/queue.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Laravel. You're also free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis",
    |          "deferred", "background", "failover", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],

        'deferred' => [
            'driver' => 'deferred',
        ],

        'background' => [
            'driver' => 'background',
        ],

        'failover' => [
            'driver' => 'failover',
            'connections' => [
                'database',
                'deferred',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | The following options configure the database and table that store job
    | batching information. These options can be updated to any database
    | connection and table which has been defined by your application.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control how and where failed jobs are stored. Laravel ships with
    | support for storing failed jobs in a simple file or in a database.
    |
    | Supported drivers: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
```

## File: config/services.php
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
```

## File: config/session.php
```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option determines the default session driver that is utilized for
    | incoming requests. Laravel supports a variety of storage options to
    | persist session data. Database storage is a great default choice.
    |
    | Supported: "file", "cookie", "database", "memcached",
    |            "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
    | to expire immediately when the browser is closed then you may
    | indicate that via the expire_on_close configuration option.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
    | should be encrypted before it's stored. All encryption is performed
    | automatically by Laravel and you may use the session like normal.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | When utilizing the "file" session driver, the session files are placed
    | on disk. The default storage location is defined here; however, you
    | are free to provide another location where they should be stored.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "redis" session drivers, you may specify a
    | connection that should be used to manage these sessions. This should
    | correspond to a connection in your database configuration options.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | When using the "database" session driver, you may specify the table to
    | be used to store sessions. Of course, a sensible default is defined
    | for you; however, you're welcome to change this to another table.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | When using one of the framework's cache driven session backends, you may
    | define the cache store which should be used to store the session data
    | between requests. This must match one of your defined cache stores.
    |
    | Affects: "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Here you may change the name of the session cookie that is created by
    | the framework. Typically, you should not need to change this value
    | since doing so does not grant a meaningful security improvement.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug((string) env('APP_NAME', 'laravel')).'-session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
    | your application, but you're free to change this when necessary.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | This value determines the domain and subdomains the session cookie is
    | available to. By default, the cookie will be available to the root
    | domain without subdomains. Typically, this shouldn't be changed.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you when it can't be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
    | the HTTP protocol. It's unlikely you should disable this option.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place, and can be used to mitigate CSRF attacks. By default, we
    | will set this value to "lax" to permit secure cross-site requests.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Supported: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Partitioned Cookies
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will tie the cookie to the top-level site for
    | a cross-site context. Partitioned cookies are accepted by the browser
    | when flagged "secure" and the Same-Site attribute is set to "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
```

## File: database/migrations/0001_01_01_000001_create_cache_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration')->index();
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
```

## File: database/migrations/0001_01_01_000002_create_jobs_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
```

## File: database/migrations/2026_06_24_085954_add_performance_indexes_to_tables.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->unique(['assessment_id', 'level'], 'recommendations_assessment_level_unique');
        });

        Schema::table('dimensions', function (Blueprint $table) {
            $table->index(['assessment_id', 'order_index'], 'dimensions_assessment_order_index');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->index(['assessment_id', 'order_index'], 'questions_assessment_order_index');
            $table->index(['dimension_id', 'order_index'], 'questions_dimension_order_index');
        });

        Schema::table('answer_options', function (Blueprint $table) {
            $table->index(['question_id', 'order_index'], 'answer_options_question_order_index');
        });
    }

    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropUnique('recommendations_assessment_level_unique');
        });

        Schema::table('dimensions', function (Blueprint $table) {
            $table->dropIndex('dimensions_assessment_order_index');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropIndex('questions_assessment_order_index');
            $table->dropIndex('questions_dimension_order_index');
        });

        Schema::table('answer_options', function (Blueprint $table) {
            $table->dropIndex('answer_options_question_order_index');
        });
    }
};
```

## File: database/migrations/2026_06_25_120000_add_is_reversed_to_questions_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            // Reversed questions score inversely: نعم=0, إلى حد ما=1, لا=2
            $table->boolean('is_reversed')->default(false)->after('order_index');
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('is_reversed');
        });
    }
};
```

## File: database/migrations/2026_07_01_122729_add_price_and_rating_to_assessments_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->nullable()->after('time_limit_min');
            $table->decimal('rating', 3, 2)->nullable()->after('price');
            $table->integer('rating_count')->default(0)->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['price', 'rating', 'rating_count']);
        });
    }
};
```

## File: database/migrations/2026_07_01_140449_add_image_url_to_assessments_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('description_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
};
```

## File: database/migrations/2026_07_03_160643_add_subtitle_ar_to_assessments_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->string('subtitle_ar')->nullable()->after('title_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('subtitle_ar');
        });
    }
};
```

## File: database/migrations/2026_07_05_153443_create_settings_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
```

## File: database/migrations/2026_07_05_161859_add_extra_discount_tiers_to_coupons_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->decimal('discount_percentage_4th', 5, 2)->nullable()->after('discount_percentage_3rd');
            $table->decimal('discount_percentage_5th', 5, 2)->nullable()->after('discount_percentage_4th');
            $table->decimal('discount_percentage_6th', 5, 2)->nullable()->after('discount_percentage_5th');
            $table->decimal('discount_percentage_7th', 5, 2)->nullable()->after('discount_percentage_6th');
            $table->decimal('discount_percentage_8th', 5, 2)->nullable()->after('discount_percentage_7th');
            $table->decimal('discount_percentage_9th', 5, 2)->nullable()->after('discount_percentage_8th');
            $table->decimal('discount_percentage_10th', 5, 2)->nullable()->after('discount_percentage_9th');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn([
                'discount_percentage_4th',
                'discount_percentage_5th',
                'discount_percentage_6th',
                'discount_percentage_7th',
                'discount_percentage_8th',
                'discount_percentage_9th',
                'discount_percentage_10th'
            ]);
        });
    }
};
```

## File: database/migrations/2026_07_05_225427_add_details_to_users_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('phone');
            $table->string('qualification')->nullable()->after('gender');
            $table->string('nationality')->nullable()->after('qualification');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['gender', 'qualification', 'nationality']);
        });
    }
};
```

## File: database/migrations/2026_07_06_005159_add_report_details_to_assessments_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->text('certificates_ar')->nullable()->after('description_ar');
            $table->text('programs_ar')->nullable()->after('certificates_ar');
            $table->text('plan_30_days_ar')->nullable()->after('programs_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['certificates_ar', 'programs_ar', 'plan_30_days_ar']);
        });
    }
};
```

## File: database/migrations/2026_07_10_164000_add_intro_and_outro_to_assessments_and_recommendations.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->text('programs_intro_ar')->nullable()->after('description_ar');
            $table->text('programs_outro_ar')->nullable()->after('programs_intro_ar');
        });

        Schema::table('recommendations', function (Blueprint $table) {
            $table->text('programs_intro_ar')->nullable()->after('programs_ar');
            $table->text('programs_outro_ar')->nullable()->after('programs_intro_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn(['programs_intro_ar', 'programs_outro_ar']);
        });

        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['programs_intro_ar', 'programs_outro_ar']);
        });
    }
};
```

## File: database/migrations/2026_07_11_102607_move_report_details_to_recommendations.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add to recommendations
        Schema::table('recommendations', function (Blueprint $table) {
            $table->text('certificates_ar')->nullable()->after('description_ar');
            $table->text('plan_30_days_ar')->nullable()->after('programs_outro_ar');
        });

        // Drop from assessments
        Schema::table('assessments', function (Blueprint $table) {
            if (Schema::hasColumn('assessments', 'certificates_ar')) {
                $table->dropColumn('certificates_ar');
            }
            if (Schema::hasColumn('assessments', 'programs_ar')) {
                $table->dropColumn('programs_ar');
            }
            if (Schema::hasColumn('assessments', 'programs_intro_ar')) {
                $table->dropColumn('programs_intro_ar');
            }
            if (Schema::hasColumn('assessments', 'programs_outro_ar')) {
                $table->dropColumn('programs_outro_ar');
            }
            if (Schema::hasColumn('assessments', 'plan_30_days_ar')) {
                $table->dropColumn('plan_30_days_ar');
            }
            if (Schema::hasColumn('assessments', 'roadmap_ar')) {
                $table->dropColumn('roadmap_ar');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->text('certificates_ar')->nullable();
            $table->text('programs_ar')->nullable();
            $table->text('programs_intro_ar')->nullable();
            $table->text('programs_outro_ar')->nullable();
            $table->text('plan_30_days_ar')->nullable();
            $table->text('roadmap_ar')->nullable();
        });

        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn(['certificates_ar', 'plan_30_days_ar']);
        });
    }
};
```

## File: database/migrations/2026_07_11_104237_add_intro_texts_to_recommendations.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->text('certificates_intro_ar')->nullable()->after('certificates_ar');
            $table->text('plan_30_days_intro_ar')->nullable()->after('programs_outro_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn(['certificates_intro_ar', 'plan_30_days_intro_ar']);
        });
    }
};
```

## File: database/migrations/2026_07_11_115159_create_icons_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('category'); // 'certificates', 'programs', 'plan_30_days'
            $table->string('icon_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icons');
    }
};
```

## File: database/migrations/2026_07_11_132219_add_icon_to_assessments_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('title_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
};
```

## File: database/migrations/2026_07_15_151418_add_report_code_to_assessments_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->string('report_code')->nullable()->after('scoring_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('report_code');
        });
    }
};
```

## File: routes/console.php
```php
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
```

## File: app/Console/Commands/CleanReversedLabels.php
```php
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanReversedLabels extends Command
{
    protected $signature = 'app:clean-reversed-labels';
    protected $description = 'Clean legacy (عبارة معكوسة) notes from questions and assessments';

    public function handle(): int
    {
        $questions = DB::table('questions')
            ->where('text_ar', 'like', '%معكوس%')
            ->get();

        foreach ($questions as $question) {
            $cleaned = str_replace(
                [' (عبارة معكوسة)', '(عبارة معكوسة)', ' (عبارة معكوسه)', '(عبارة معكوسه)'],
                '',
                $question->text_ar
            );

            DB::table('questions')
                ->where('id', $question->id)
                ->update(['text_ar' => trim($cleaned)]);
        }

        $assessments = DB::table('assessments')
            ->where('description_ar', 'like', '%معكوس%')
            ->get();

        foreach ($assessments as $assessment) {
            $cleanedDesc = preg_replace('/ ملحوظة:\s*العبارات.*معكوسة.*/u', '', $assessment->description_ar);
            DB::table('assessments')
                ->where('id', $assessment->id)
                ->update(['description_ar' => trim($cleanedDesc)]);
        }

        $this->info('Reversed labels cleaned successfully.');
        return Command::SUCCESS;
    }
}
```

## File: app/Console/Commands/ConvertRecommendationsJson.php
```php
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ConvertRecommendationsJson extends Command
{
    protected $signature = 'app:convert-recommendations-json';
    protected $description = 'Convert legacy recommendation text fields to structured JSON format';

    public function handle(): int
    {
        $recommendations = DB::table('recommendations')->get();

        foreach ($recommendations as $rec) {
            $certs = [];
            if (!empty($rec->certificates_ar) && !is_array(json_decode($rec->certificates_ar, true))) {
                $lines = array_filter(array_map('trim', explode("\n", $rec->certificates_ar)));
                foreach ($lines as $line) {
                    $certs[] = [
                        'title' => mb_substr($line, 0, 30),
                        'subtitle' => $line,
                        'icon' => 'blue-hexagon'
                    ];
                }
            }

            $progs = [];
            if (!empty($rec->programs_ar) && !is_array(json_decode($rec->programs_ar, true))) {
                $lines = array_filter(array_map('trim', explode("\n", $rec->programs_ar)));
                foreach ($lines as $line) {
                    $progs[] = [
                        'title' => $line,
                        'icon' => 'bi-journal-bookmark'
                    ];
                }
            }

            $plans = [];
            if (!empty($rec->plan_30_days_ar) && !is_array(json_decode($rec->plan_30_days_ar, true))) {
                $lines = array_filter(array_map('trim', explode("\n", $rec->plan_30_days_ar)));
                $week = 1;
                $arabicWeeks = [1 => 'الأسبوع الأول', 2 => 'الأسبوع الثاني', 3 => 'الأسبوع الثالث', 4 => 'الأسبوع الرابع'];
                foreach ($lines as $line) {
                    $plans[] = [
                        'period' => $arabicWeeks[$week] ?? "الأسبوع {$week}",
                        'title' => $line,
                        'icon' => 'bi-calendar-check'
                    ];
                    $week++;
                }
            }

            $updateData = [];
            if (!empty($certs)) {
                $updateData['certificates_ar'] = json_encode($certs, JSON_UNESCAPED_UNICODE);
            }
            if (!empty($progs)) {
                $updateData['programs_ar'] = json_encode($progs, JSON_UNESCAPED_UNICODE);
            }
            if (!empty($plans)) {
                $updateData['plan_30_days_ar'] = json_encode($plans, JSON_UNESCAPED_UNICODE);
            }

            if (!empty($updateData)) {
                DB::table('recommendations')->where('id', $rec->id)->update($updateData);
            }
        }

        $this->info('Recommendation fields successfully converted to JSON.');
        return Command::SUCCESS;
    }
}
```

## File: app/Http/Controllers/Admin/CouponController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveCouponRequest;
use App\Models\Coupon;
use App\Services\CouponService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CouponController extends Controller
{
    public function __construct(
        private readonly CouponService $couponService,
    ) {}

    public function index()
    {
        $coupons = Coupon::latest()->paginate(10);

        return view('admin.coupons.index', compact('coupons'));
    }

    public function create(): View
    {
        $assessments = \App\Models\Assessment::orderBy('title_ar')->get();
        $users = \App\Models\User::orderBy('name')->get();

        return view('admin.coupons.create', compact('assessments', 'users'));
    }

    public function store(SaveCouponRequest $request): RedirectResponse
    {
        $this->couponService->createCoupon($request->validated());

        return redirect()->route('admin.coupons.index')->with('success', 'تم إضافة الكوبون بنجاح');
    }

    public function edit(Coupon $coupon): View
    {
        $assessments = \App\Models\Assessment::orderBy('title_ar')->get();
        $couponAssessmentIds = $coupon->assessments()->pluck('assessment_id')->toArray();
        $users = \App\Models\User::orderBy('name')->get();
        $couponPermittedUserIds = $coupon->permittedUsers()->pluck('user_id')->toArray();

        return view('admin.coupons.edit', compact('coupon', 'assessments', 'couponAssessmentIds', 'users', 'couponPermittedUserIds'));
    }

    public function update(SaveCouponRequest $request, Coupon $coupon): RedirectResponse
    {
        $this->couponService->updateCoupon($coupon, $request->validated());

        return redirect()->route('admin.coupons.index')->with('success', 'تم تحديث الكوبون بنجاح');
    }

    public function destroy(Coupon $coupon): RedirectResponse
    {
        $this->couponService->deleteCoupon($coupon);

        return redirect()->route('admin.coupons.index')->with('success', 'تم حذف الكوبون بنجاح');
    }
}
```

## File: app/Http/Controllers/Admin/DimensionController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDimensionRequest;
use App\Http\Requests\Admin\StoreInterpretationsRequest;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Services\DimensionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    public function __construct(
        private readonly DimensionService $dimensionService,
    ) {}

    public function byAssessment(Assessment $assessment): JsonResponse
    {
        $dimensions = $this->dimensionService->byAssessment($assessment);

        return response()->json($dimensions);
    }

    public function store(StoreDimensionRequest $request, Assessment $assessment): JsonResponse
    {
        $dimension = $this->dimensionService->create($assessment, $request->validated());

        return response()->json([
            'success' => true,
            'dimension' => $dimension,
            'message' => 'تم إضافة البُعد بنجاح.',
        ]);
    }

    public function update(StoreDimensionRequest $request, Dimension $dimension): JsonResponse
    {
        $this->dimensionService->update($dimension, $request->validated());

        return response()->json(['success' => true, 'message' => 'تم تحديث البُعد.']);
    }

    public function destroy(Dimension $dimension): JsonResponse
    {
        $this->dimensionService->delete($dimension);

        return response()->json(['success' => true, 'message' => 'تم حذف البُعد بنجاح.']);
    }

    public function reorder(Request $request): JsonResponse
    {
        $data = $request->validate([
            'order' => 'required|array',
            'order.*' => 'required|uuid|exists:dimensions,id,deleted_at,NULL',
        ]);

        $this->dimensionService->reorder($data['order']);

        return response()->json(['success' => true, 'message' => 'تم إعادة ترتيب الأبعاد.']);
    }

    public function storeInterpretations(StoreInterpretationsRequest $request, Dimension $dimension): JsonResponse
    {
        $this->dimensionService->saveInterpretations($dimension, $request->validated());

        return response()->json(['success' => true, 'message' => 'تم حفظ تفسيرات البُعد بنجاح.']);
    }
}
```

## File: app/Http/Controllers/Admin/ExamController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Question;
use App\Services\AssessmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function __construct(
        private readonly AssessmentService $assessmentService,
    ) {}

    public function create(): View
    {
        $assessments = Assessment::orderBy('title_ar')->get();

        return view('admin.exams.create', compact('assessments'));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'time_limit_min' => 'nullable|integer|min:1',
            'question_ids' => 'required|array|min:1',
            'question_ids.*' => 'uuid|exists:questions,id,deleted_at,NULL',
        ]);

        $assessment = \Illuminate\Support\Facades\DB::transaction(function () use ($data) {
            $assessment = $this->assessmentService->create([
                'title_ar' => $data['title_ar'],
                'category' => $data['category'],
                'description_ar' => $data['description_ar'] ?? null,
                'time_limit_min' => $data['time_limit_min'] ?? null,
                'dimensions' => [],
            ]);

            // Re-assign chosen questions to this assessment in order
            foreach ($data['question_ids'] as $idx => $qId) {
                Question::where('id', $qId)->update([
                    'assessment_id' => $assessment->id,
                    'order_index' => $idx,
                ]);
            }
            
            return $assessment;
        });

        return response()->json(['success' => true, 'message' => 'تم إنشاء الاختبار.', 'id' => $assessment->id]);
    }
}
```

## File: app/Http/Controllers/Admin/GradedExamQuestionController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradedExam;
use App\Models\GradedExamUnit;
use App\Models\GradedExamQuestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GradedExamQuestionController extends Controller
{
    public function index(Request $request): View
    {
        $exams = GradedExam::orderBy('title_ar')->get();
        $units = collect();

        $query = GradedExamQuestion::with(['gradedExam', 'unit'])
            ->withCount('options');

        if ($request->filled('graded_exam_id')) {
            $query->where('graded_exam_id', $request->graded_exam_id);
            $units = GradedExamUnit::where('graded_exam_id', $request->graded_exam_id)
                ->orderBy('order_index')
                ->get();
        } else {
            $units = GradedExamUnit::orderBy('order_index')->get();
        }

        if ($request->filled('unit_id')) {
            $query->where('unit_id', $request->unit_id);
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('question_type')) {
            if ($request->question_type === 'mcq_single') {
                $query->where('question_type', 'mcq')->where('is_multi_correct', false);
            } elseif ($request->question_type === 'mcq_multi') {
                $query->where('question_type', 'mcq')->where('is_multi_correct', true);
            } else {
                $query->where('question_type', $request->question_type);
            }
        }

        if ($request->filled('options_count')) {
            if ($request->options_count === 'other') {
                $query->has('options', '>', 5);
            } else {
                $query->has('options', '=', (int) $request->options_count);
            }
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('text_ar', 'like', "%{$search}%")
                  ->orWhere('explanation_ar', 'like', "%{$search}%");
            });
        }

        // Sort by unit and original number
        $query->orderBy('unit_id')->orderBy('original_number');

        $perPage = $request->input('per_page', 25);
        if ($perPage === 'all') {
            $perPage = $query->count() > 0 ? $query->count() : 1;
        }

        $questions = $query->paginate((int) $perPage);

        return view('admin.graded_exam_questions.index', compact('questions', 'exams', 'units'));
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'graded_exam_id' => 'required|uuid|exists:graded_exams,id',
            'unit_id' => 'required|uuid|exists:graded_exam_units,id',
            'text_ar' => 'required|string',
            'explanation_ar' => 'nullable|string',
            'level' => 'required|in:easy,medium,hard',
            'question_type' => 'required|in:true_false,mcq',
            'options' => 'required|array|min:2',
            'options.*.label_ar' => 'required|string',
            'options.*.is_correct' => 'required|boolean',
        ]);

        $isMultiCorrect = collect($request->options)->where('is_correct', true)->count() > 1;

        \DB::transaction(function () use ($validated, $isMultiCorrect, $request) {
            $lastNum = GradedExamQuestion::where('unit_id', $validated['unit_id'])->max('original_number') ?? 0;
            
            $question = GradedExamQuestion::create([
                'graded_exam_id' => $validated['graded_exam_id'],
                'unit_id' => $validated['unit_id'],
                'text_ar' => $validated['text_ar'],
                'explanation_ar' => $validated['explanation_ar'],
                'level' => $validated['level'],
                'question_type' => $validated['question_type'],
                'is_multi_correct' => $isMultiCorrect,
                'original_number' => $lastNum + 1,
            ]);

            foreach ($request->options as $index => $opt) {
                $question->options()->create([
                    'option_text_ar' => $opt['label_ar'],
                    'is_correct' => $opt['is_correct'],
                    'order_index' => $index,
                ]);
            }
        });

        return response()->json(['success' => true, 'message' => 'تم إضافة السؤال بنجاح.']);
    }

    public function update(Request $request, GradedExamQuestion $question): JsonResponse
    {
        $validated = $request->validate([
            'text_ar' => 'sometimes|string',
            'explanation_ar' => 'nullable|string',
            'level' => 'sometimes|in:easy,medium,hard',
            'question_type' => 'sometimes|in:true_false,mcq',
        ]);

        $question->update($validated);

        return response()->json(['success' => true, 'message' => 'تم تحديث السؤال بنجاح.']);
    }

    public function destroy(GradedExamQuestion $question): JsonResponse
    {
        $question->delete();

        return response()->json(['success' => true, 'message' => 'تم حذف السؤال.']);
    }

    public function options(GradedExamQuestion $question): JsonResponse
    {
        $options = $question->options()->orderBy('order_index')->get();
        
        return response()->json([
            'success' => true,
            'options' => $options
        ]);
    }
    
    public function getUnits(Request $request): JsonResponse
    {
        if ($request->filled('graded_exam_id')) {
            $units = GradedExamUnit::where('graded_exam_id', $request->graded_exam_id)->orderBy('order_index')->get();
        } else {
            $units = GradedExamUnit::orderBy('order_index')->get();
        }
        return response()->json($units);
    }
}
```

## File: app/Http/Controllers/Admin/IconController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use App\Services\IconService;
use Illuminate\Http\Request;

class IconController extends Controller
{
    public function __construct(
        private readonly IconService $iconService,
    ) {}

    public function index()
    {
        $icons = $this->iconService->getGroupedByCategory();

        return view('admin.icons.index', compact('icons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:certificates,programs,plan_30_days,assessments,system',
            'icon_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:500', // max 500KB
        ], [
            'icon_file.max' => 'حجم الأيقونة يجب أن لا يتجاوز 500 كيلوبايت لضمان سرعة التقرير.',
            'icon_file.image' => 'يجب اختيار ملف صورة صالح.',
        ]);

        if ($request->hasFile('icon_file')) {
            $this->iconService->store(
                $request->name,
                $request->category,
                $request->file('icon_file')
            );

            return back()->with('success', 'تم إضافة الأيقونة بنجاح.');
        }

        return back()->withErrors(['icon_file' => 'فشل في رفع الأيقونة.']);
    }

    public function destroy(Icon $icon)
    {
        $this->iconService->delete($icon);

        return back()->with('success', 'تم حذف الأيقونة بنجاح.');
    }
}
```

## File: app/Http/Controllers/Admin/QuestionController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BulkStoreQuestionsRequest;
use App\Http\Requests\Admin\StoreQuestionRequest;
use App\Models\Assessment;
use App\Models\Question;
use App\Services\AssessmentService;
use App\Services\QuestionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class QuestionController extends Controller
{
    public function __construct(
        private readonly QuestionService $questionService,
        private readonly AssessmentService $assessmentService,
    ) {}

    public function index(Request $request): View
    {
        $assessments = Assessment::with('dimensions')->orderBy('title_ar')->get();

        $questions = $this->questionService->filteredList($request->only([
            'assessment_id',
            'dimension_id',
            'search',
            'per_page',
        ]));

        return view('admin.questions.index', compact('questions', 'assessments'));
    }

    public function store(StoreQuestionRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $question = $this->questionService->create($validated, $validated['options']);

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة السؤال.',
            'id' => $question->id,
        ]);
    }

    public function bulkStore(BulkStoreQuestionsRequest $request): JsonResponse
    {
        $count = $this->questionService->bulkImport($request->validated());

        return response()->json(['success' => true, 'message' => "تم استيراد $count سؤال بنجاح."]);
    }

    public function byAssessment(Assessment $assessment): JsonResponse
    {
        $questions = $this->questionService->byAssessment($assessment);

        return response()->json($questions);
    }

    public function update(Request $request, Question $question): JsonResponse
    {
        $request->validate(['text_ar' => 'sometimes|string', 'is_reversed' => 'sometimes|boolean']);
        $this->questionService->update($question, $request->only(['text_ar', 'is_reversed']));

        return response()->json(['success' => true, 'message' => 'تم تحديث السؤال.']);
    }

    public function destroy(Question $question): JsonResponse
    {
        $this->questionService->delete($question);

        return response()->json(['success' => true, 'message' => 'تم حذف السؤال.']);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        $request->validate(['ids' => 'required|array', 'ids.*' => 'uuid']);
        $count = $this->questionService->bulkDelete($request->ids);

        return response()->json(['success' => true, 'message' => "تم حذف $count سؤال."]);
    }

    public function reorder(Request $request): JsonResponse
    {
        $request->validate(['order' => 'required|array', 'order.*' => 'uuid']);
        $this->questionService->reorder($request->order);

        return response()->json(['success' => true]);
    }

    public function assignDimension(Request $request, Question $question): JsonResponse
    {
        $request->validate(['dimension_id' => 'nullable|uuid|exists:dimensions,id,deleted_at,NULL']);
        $this->questionService->assignDimension($question, $request->dimension_id ?: null);

        return response()->json(['success' => true, 'message' => 'تم تحديد البُعد.']);
    }

    public function bulkAssignDimension(Request $request): JsonResponse
    {
        $request->validate([
            'ids' => 'required|array', 
            'ids.*' => 'uuid',
            'dimension_id' => 'nullable|uuid|exists:dimensions,id,deleted_at,NULL'
        ]);
        $this->questionService->bulkAssignDimension($request->ids, $request->dimension_id ?: null);

        return response()->json(['success' => true, 'message' => 'تم تعيين البُعد للأسئلة المحددة.']);
    }

    /**
     * Import questions from CSV for an assessment.
     */
    public function importCsv(Request $request, Assessment $assessment): JsonResponse
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('csv_file');

        try {
            $count = $this->questionService->importFromCsv($assessment, $file->getRealPath());

            return response()->json([
                'success' => true,
                'message' => "تم استيراد $count سؤال بنجاح وتحديث الأبعاد المعنية.",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء الاستيراد: '.$e->getMessage(),
            ], 422);
        }
    }

    /**
     * Download CSV template for question importing.
     */
    public function downloadTemplate(): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="questions_import_template.csv"',
        ];

        return response()->streamDownload(function () {
            $output = fopen('php://output', 'w');
            fwrite($output, "\xEF\xBB\xBF"); // UTF-8 BOM
            fputcsv($output, ['اسم البعد', 'نص السؤال', 'معكوس', 'الخيارات']);
            fputcsv($output, ['الوعي بالذات', 'أعرف نقاط قوتي بوضوح.', '0', 'نعم:2|إلى حد ما:1|لا:0']);
            fputcsv($output, ['الوعي بالذات', 'أستطيع تحديد نقاط الضعف التي أحتاج إلى تطويرها.', '0', '']);
            fputcsv($output, ['الوعي الانفعالي', 'أشعر بالقلق أو التوتر بسهولة عند مواجهة المشكلات.', '1', 'نعم:0|إلى حد ما:1|لا:2']);
            fclose($output);
        }, 'questions_import_template.csv', $headers);
    }
}
```

## File: app/Http/Controllers/Admin/SettingController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(
        private readonly SettingService $settingService,
    ) {}

    public function index()
    {
        $settings = $this->settingService->getAllAsKeyValue();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'stats_mode' => 'required|in:manual,auto',
            'stat_users' => 'required|string|max:255',
            'stat_exams' => 'required|string|max:255',
            'stat_assessments' => 'required|string|max:255',
            'stat_fields' => 'required|string|max:255',
            'stat_users_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'stat_exams_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'stat_assessments_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'stat_fields_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $this->settingService->updateFromRequest($request, $data);

        return redirect()->back()->with('success', 'تم تحديث الإحصائيات والإعدادات بنجاح.');
    }
}
```

## File: app/Http/Controllers/DashboardController.php
```php
<?php

namespace App\Http\Controllers;

use App\Services\UserDashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private readonly UserDashboardService $dashboardService,
    ) {}

    public function index(): View
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $data = $this->dashboardService->getData($user);

        return view('user.dashboard', $data);
    }
}
```

## File: app/Http/Requests/Admin/BulkStoreQuestionsRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreQuestionsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'assessment_id' => 'required|uuid|exists:assessments,id,deleted_at,NULL',
            'dimension_id' => 'nullable|uuid|exists:dimensions,id,deleted_at,NULL',
            'questions_text' => 'required|string',
        ];
    }
}
```

## File: app/Http/Requests/Admin/StoreQuestionRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'assessment_id' => 'required|uuid|exists:assessments,id,deleted_at,NULL',
            'dimension_id' => 'nullable|uuid|exists:dimensions,id,deleted_at,NULL',
            'text_ar' => 'required|string',
            'is_reversed' => 'nullable|boolean',
            'options' => 'required|array|min:2',
            'options.*.label_ar' => 'required|string',
            'options.*.score_value' => 'required|integer',
        ];
    }
}
```

## File: app/Http/Requests/Admin/StoreRecommendationRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecommendationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'id' => 'nullable|uuid',
            'assessment_id' => 'required|uuid|exists:assessments,id,deleted_at,NULL',
            'level' => 'required|string',
            'description_ar' => 'required|string',
            'certificates_ar' => 'nullable|array',
            'certificates_ar.*.title' => 'nullable|string',
            'certificates_ar.*.subtitle' => 'nullable|string',
            'certificates_ar.*.icon' => 'nullable|string',
            'certificates_intro_ar' => 'nullable|string',
            'programs_ar' => 'nullable|array',
            'programs_ar.*.title' => 'nullable|string',
            'programs_ar.*.icon' => 'nullable|string',
            'programs_intro_ar' => 'nullable|string',
            'programs_outro_ar' => 'nullable|string',
            'plan_30_days_ar' => 'nullable|array',
            'plan_30_days_ar.*.period' => 'nullable|string',
            'plan_30_days_ar.*.title' => 'nullable|string',
            'plan_30_days_ar.*.icon' => 'nullable|string',
            'plan_30_days_intro_ar' => 'nullable|string',
            'high_threshold' => 'nullable|integer|min:0',
            'low_threshold' => 'nullable|integer|min:0',
        ];
    }
}
```

## File: app/Http/Requests/Admin/UpdateSettingsRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'subtitle_ar' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'scoring_type' => 'required|in:overall_score,highest_dimension,dimension_only,perceptual_styles',
            'description_ar' => 'nullable|string',
            'time_limit_min' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable|numeric|min:0',
            'rating' => 'nullable|numeric|min:1|max:5',
            'is_active' => 'nullable|boolean',
            'hide_coupon_field' => 'nullable|boolean',
            'icon' => 'nullable|string|max:100',
            'icon_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'report_code' => 'nullable|string|max:50',
        ];
    }

    /**
     * Prepare the data for validation (cast checkbox boolean).
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
            'hide_coupon_field' => $this->boolean('hide_coupon_field'),
        ]);
    }
}
```

## File: app/Http/Requests/AnswerQuestionRequest.php
```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'question_id' => 'required|uuid|exists:questions,id,deleted_at,NULL',
            'selected_option_id' => 'required|uuid|exists:answer_options,id,deleted_at,NULL',
        ];
    }
}
```

## File: app/Http/Requests/LoginRequest.php
```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
}
```

## File: app/Http/Requests/RegisterRequest.php
```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'email'         => ['required', 'email', Rule::unique('users', 'email')->whereNull('deleted_at')],
            'national_id'   => ['required', 'string', 'max:20', Rule::unique('users', 'national_id')->whereNull('deleted_at')],
            'phone'         => ['required', 'string', 'max:20', Rule::unique('users', 'phone')->whereNull('deleted_at')],
            'gender'        => 'required|string|in:male,female',
            'qualification' => 'required|string|max:255',
            'nationality'   => 'required|string|max:255',
            'password'      => 'required|min:8|confirmed',
        ];
    }
}
```

## File: app/Models/AnswerOption.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnswerOption extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = ['question_id', 'label_ar', 'score_value', 'order_index'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'selected_option_id');
    }
}
```

## File: app/Models/Dimension.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dimension extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = ['assessment_id', 'name_ar', 'max_score', 'order_index'];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function dimensionScores()
    {
        return $this->hasMany(DimensionScore::class);
    }

    public function interpretations()
    {
        return $this->hasMany(DimensionInterpretation::class);
    }
}
```

## File: app/Models/DimensionInterpretation.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DimensionInterpretation extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'dimension_id',
        'level',
        'interpretation_text_ar',
        'high_threshold',
        'low_threshold',
    ];

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
```

## File: app/Models/ExamSession.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamSession extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id', 'assessment_id', 'status', 'started_at', 'completed_at', 'coupon_id', 'discount_applied',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'session_id');
    }

    public function result()
    {
        return $this->hasOne(Result::class, 'session_id');
    }
}
```

## File: app/Models/GradedExam.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradedExam extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'title_ar', 'description_ar', 'category', 'total_questions',
        'time_limit_min', 'is_active', 'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'total_questions' => 'integer',
        'time_limit_min' => 'integer',
    ];

    public function units()
    {
        return $this->hasMany(GradedExamUnit::class)->orderBy('order_index');
    }

    public function constraintSettings()
    {
    return $this->hasOne(GradedExamConstraintSetting::class);
    }
    public function questions()
    {
        return $this->hasMany(GradedExamQuestion::class);
    }

    public function sessions()
    {
        return $this->hasMany(GradedExamSession::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
```

## File: app/Models/GradedExamOption.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradedExamOption extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'question_id', 'option_label', 'option_text_ar', 'order_index', 'is_correct',
    ];

    protected $casts = [
        'order_index' => 'integer',
        'is_correct' => 'boolean',
    ];

    public function question()
    {
        return $this->belongsTo(GradedExamQuestion::class, 'question_id');
    }

    public function selectedByAnswers()
    {
        return $this->hasMany(GradedExamUserAnswerOption::class, 'option_id');
    }
}
```

## File: app/Models/GradedExamQuestion.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradedExamQuestion extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'graded_exam_id', 'unit_id', 'original_number', 'level', 'question_type',
        'text_ar', 'explanation_ar', 'is_multi_correct', 'source_page_ref', 'order_index',
    ];

    protected $casts = [
        'original_number' => 'integer',
        'is_multi_correct' => 'boolean',
        'order_index' => 'integer',
    ];

    public function gradedExam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GradedExam::class);
    }

    public function unit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GradedExamUnit::class, 'unit_id');
    }

    public function options(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GradedExamOption::class, 'question_id')->orderBy('order_index');
    }

    public function correctOptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GradedExamOption::class, 'question_id')->where('is_correct', true);
    }

    public function userAnswers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GradedExamUserAnswer::class, 'question_id');
    }

    public function scopeEasy($query)
    {
        return $query->where('level', 'easy');
    }

    public function scopeMedium($query)
    {
        return $query->where('level', 'medium');
    }

    public function scopeHard($query)
    {
        return $query->where('level', 'hard');
    }

    public function scopeMcq($query)
    {
        return $query->where('question_type', 'mcq');
    }

    public function scopeTrueFalse($query)
    {
        return $query->where('question_type', 'true_false');
    }
}
```

## File: app/Models/GradedExamResult.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradedExamResult extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'session_id', 'correct_count', 'incorrect_count', 'total_questions',
        'percentage', 'pass_status', 'calculated_at',
    ];

    protected $casts = [
        'correct_count' => 'integer',
        'incorrect_count' => 'integer',
        'total_questions' => 'integer',
        'percentage' => 'decimal:2',
        'calculated_at' => 'datetime',
    ];

    public function session()
    {
        return $this->belongsTo(GradedExamSession::class, 'session_id');
    }
}
```

## File: app/Models/GradedExamSession.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $user_id
 * @property string $status
 * @property string $graded_exam_id
 * @property \App\Models\GradedExam $gradedExam
 * @property \Illuminate\Database\Eloquent\Collection $sessionQuestions
 * @method void load(array|string $relations)
 * @method bool update(array $attributes = [], array $options = [])
 */
class GradedExamSession extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id', 'graded_exam_id', 'status', 'total_questions',
        'constraints_snapshot', 'random_seed', 'started_at', 'completed_at',
    ];

    protected $casts = [
        'total_questions' => 'integer',
        'constraints_snapshot' => 'array',
        'random_seed' => 'integer',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gradedExam()
    {
        return $this->belongsTo(GradedExam::class);
    }

    public function sessionQuestions()
    {
        return $this->hasMany(GradedExamSessionQuestion::class, 'session_id')->orderBy('position_in_exam');
    }

    public function userAnswers()
    {
        return $this->hasMany(GradedExamUserAnswer::class, 'session_id');
    }

    public function result()
    {
        return $this->hasOne(GradedExamResult::class, 'session_id');
    }
}
```

## File: app/Models/GradedExamSessionQuestion.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class GradedExamSessionQuestion extends Model
{
    use HasUuids;

    protected $fillable = [
        'session_id', 'question_id', 'position_in_exam', 'shuffled_options_order',
    ];

    protected $casts = [
        'position_in_exam' => 'integer',
        'shuffled_options_order' => 'array',
    ];

    public function session()
    {
        return $this->belongsTo(GradedExamSession::class, 'session_id');
    }

    public function question()
    {
        return $this->belongsTo(GradedExamQuestion::class, 'question_id');
    }
}
```

## File: app/Models/GradedExamUnit.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradedExamUnit extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'graded_exam_id', 'unit_number', 'title_ar', 'order_index',
    ];

    protected $casts = [
        'unit_number' => 'integer',
        'order_index' => 'integer',
    ];

    public function gradedExam()
    {
        return $this->belongsTo(GradedExam::class);
    }

    public function questions()
    {
        return $this->hasMany(GradedExamQuestion::class, 'unit_id')->orderBy('order_index');
    }
}
```

## File: app/Models/GradedExamUserAnswerOption.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class GradedExamUserAnswerOption extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_answer_id', 'option_id',
    ];

    public function userAnswer()
    {
        return $this->belongsTo(GradedExamUserAnswer::class, 'user_answer_id');
    }

    public function option()
    {
        return $this->belongsTo(GradedExamOption::class, 'option_id');
    }
}
```

## File: app/Models/Question.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = ['assessment_id', 'dimension_id', 'text_ar', 'order_index', 'is_reversed'];

    protected $casts = [
        'is_reversed' => 'boolean',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }

    public function answerOptions()
    {
        return $this->hasMany(AnswerOption::class)->orderBy('order_index');
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
```

## File: app/Models/Result.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'session_id', 'total_score', 'max_possible_score', 'level', 'calculated_at',
    ];

    protected $casts = [
        'calculated_at' => 'datetime',
    ];

    public function examSession()
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }

    public function dimensionScores()
    {
        return $this->hasMany(DimensionScore::class);
    }
}
```

## File: app/Models/User.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasUuids, Notifiable, SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'role', 'national_id', 'phone', 'gender', 'qualification', 'nationality'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'role' => 'string',
        'password' => 'hashed',
    ];

    public function delete()
    {
        return DB::transaction(fn () => parent::delete());
    }

    public function restore()
    {
        $pattern = '/_deleted_\d+$/';
        $originalEmail = preg_replace($pattern, '', $this->email);

        if (static::where('email', $originalEmail)->whereNull('deleted_at')->where('id', '!=', $this->id)->exists()) {
            throw new \Exception('لا يمكن استرجاع الحساب لوجود حساب نشط آخر بنفس البريد الإلكتروني.');
        }

        return DB::transaction(fn () => parent::restore());
    }

    public static function bulkSoftDelete(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            static::whereIn('id', $ids)->get()->each->delete();
        });
    }

    protected static function booted(): void
    {
        static::deleting(function (User $user) {
            if (!$user->isForceDeleting()) {
                $timestamp = now()->timestamp;
                $user->email = $user->email . '_deleted_' . $timestamp;
                if ($user->national_id) {
                    $user->national_id = $user->national_id . '_deleted_' . $timestamp;
                }
                if ($user->phone) {
                    $user->phone = $user->phone . '_deleted_' . $timestamp;
                }
                $user->saveQuietly();
            }
        });

        static::restoring(function (User $user) {
            $pattern = '/_deleted_\d+$/';
            $user->email = preg_replace($pattern, '', $user->email);
            if ($user->national_id) {
                $user->national_id = preg_replace($pattern, '', $user->national_id);
            }
            if ($user->phone) {
                $user->phone = preg_replace($pattern, '', $user->phone);
            }
            $user->saveQuietly();
        });
    }

    public function getDisplayEmailAttribute(): string
    {
        return preg_replace('/_deleted_\d+$/', '', $this->email);
    }

    public function getDisplayPhoneAttribute(): ?string
    {
        return $this->phone ? preg_replace('/_deleted_\d+$/', '', $this->phone) : null;
    }

    public function getDisplayNationalIdAttribute(): ?string
    {
        return $this->national_id ? preg_replace('/_deleted_\d+$/', '', $this->national_id) : null;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function examSessions()
    {
        return $this->hasMany(ExamSession::class);
    }

    public function createdAssessments()
    {
        return $this->hasMany(Assessment::class, 'created_by');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class)->withPivot('used_count')->withTimestamps();
    }

    public function permittedCoupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupon_permitted_user');
    }
}
```

## File: app/Repositories/AssessmentRepository.php
```php
<?php

namespace App\Repositories;

use App\Models\Assessment;
use App\Repositories\Contracts\AssessmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AssessmentRepository implements AssessmentRepositoryInterface
{
    public function paginated(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Assessment::withCount(['questions', 'dimensions']);
        
        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }
        if (!empty($filters['search'])) {
            $query->where('title_ar', 'like', '%' . $filters['search'] . '%');
        }

        return $query->orderByDesc('created_at')->paginate($perPage);
    }

    public function findWithRelations(string $id): Assessment
    {
        $assessment = Assessment::findOrFail($id);

        $assessment->load([
            'dimensions' => fn ($q) => $q->orderBy('order_index'),
            'dimensions.interpretations',
            'dimensions.questions' => fn ($q) => $q->orderBy('order_index'),
            'dimensions.questions.answerOptions',
            'questions' => fn ($q) => $q->whereNull('dimension_id')->orderBy('order_index'),
            'recommendations',
        ]);

        return $assessment;
    }

    public function create(array $data): Assessment
    {
        return Assessment::create($data);
    }

    public function update(Assessment $assessment, array $data): Assessment
    {
        $assessment->update($data);

        return $assessment->fresh();
    }

    public function delete(Assessment $assessment): void
    {
        \Illuminate\Support\Facades\DB::transaction(function () use ($assessment) {
            $assessment->dimensions()->get()->each->delete();
            $assessment->questions()->get()->each->delete();
            $assessment->recommendations()->delete();
            $assessment->delete();
        });
    }

    public function toggle(Assessment $assessment): Assessment
    {
        $assessment->update(['is_active' => ! $assessment->is_active]);

        return $assessment->fresh();
    }
}
```

## File: app/Repositories/Contracts/UserRepositoryInterface.php
```php
<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * Create a new user record.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * Search and paginate users with their completed exam session count.
     *
     * @return LengthAwarePaginator
     */
    public function searchPaginated(?string $search, int $perPage = 15);

    /**
     * Retrieve completed exam sessions for a specific user.
     *
     * @return Collection
     */
    public function getUserResults(string $userId);
}
```

## File: app/Repositories/QuestionRepository.php
```php
<?php

namespace App\Repositories;

use App\Models\AnswerOption;
use App\Models\Assessment;
use App\Models\Question;
use App\Repositories\Contracts\QuestionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function filteredPaginated(array $filters): LengthAwarePaginator
    {
        /*
         * Use a DB JOIN between questions, assessments and dimensions
         * to retrieve assessment title and dimension name in a single query,
         * avoiding the N+1 problem that the previous with() approach caused.
         */
        $query = DB::table('questions as q')
            ->join('assessments as a', 'a.id', '=', 'q.assessment_id')
            ->leftJoin('dimensions as d', 'd.id', '=', 'q.dimension_id')
            ->whereNull('a.deleted_at')
            ->whereNull('q.deleted_at')
            ->select([
                'q.id',
                'q.text_ar',
                'q.assessment_id',
                'q.dimension_id',
                'q.order_index',
                'q.is_reversed',
                'q.created_at',
                'a.title_ar as assessment_title',
                'd.name_ar  as dimension_name',
            ])
            ->selectSub(
                DB::table('answer_options')->whereNull('deleted_at')->whereColumn('answer_options.question_id', 'q.id')->selectRaw('COUNT(*)'),
                'answer_options_count'
            );

        if (! empty($filters['assessment_id'])) {
            $query->where('q.assessment_id', $filters['assessment_id'])
                ->orderBy('q.order_index');
        } else {
            $query->orderByDesc('q.created_at');
        }

        if (! empty($filters['dimension_id'])) {
            $query->where('q.dimension_id', $filters['dimension_id']);
        }

        if (! empty($filters['search'])) {
            $query->where('q.text_ar', 'like', '%'.$filters['search'].'%');
        }

        $perPage = $filters['per_page'] ?? 25;

        if ($perPage === 'all' || $perPage === 'الكل') {
            $total = $query->count();
            $perPage = $total > 0 ? $total : 25;
        } else {
            $perPage = in_array((int) $perPage, [25, 50, 100]) ? (int) $perPage : 25;
        }

        return $query->paginate($perPage);
    }

    public function byAssessment(Assessment $assessment): Collection
    {
        return $assessment->questions()
            ->with('answerOptions')
            ->orderBy('order_index')
            ->get();
    }

    public function create(array $data, array $options): Question
    {
        $question = Question::create([
            'assessment_id' => $data['assessment_id'],
            'dimension_id' => $data['dimension_id'] ?? null,
            'text_ar' => $data['text_ar'],
            'order_index' => Question::where('assessment_id', $data['assessment_id'])->count(),
            'is_reversed' => $data['is_reversed'] ?? false,
        ]);

        foreach ($options as $index => $opt) {
            AnswerOption::create([
                'question_id' => $question->id,
                'label_ar' => $opt['label_ar'],
                'score_value' => $opt['score_value'],
                'order_index' => $opt['order_index'] ?? $index,
            ]);
        }

        return $question;
    }

    public function update(Question $question, array $data): Question
    {
        $question->update($data);

        return $question->fresh();
    }

    public function delete(Question $question): void
    {
        DB::transaction(function () use ($question) {
            $question->answerOptions()->delete();
            $question->delete();
        });
    }

    public function bulkDelete(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            $questions = Question::whereIn('id', $ids)->get();
            foreach ($questions as $q) {
                $q->answerOptions()->delete();
                $q->delete();
            }
        });
    }

    public function reorder(array $orderedIds): void
    {
        foreach ($orderedIds as $index => $id) {
            Question::where('id', $id)->update(['order_index' => $index]);
        }
    }

    public function bulkAssignDimension(array $ids, ?string $dimensionId): void
    {
        Question::whereIn('id', $ids)->update(['dimension_id' => $dimensionId]);
    }

    public function assignDimension(Question $question, ?string $dimensionId): Question
    {
        $question->update(['dimension_id' => $dimensionId]);

        return $question->fresh();
    }

    public function bulkImport(array $data): int
    {
        $defaultOptions = [
            ['label_ar' => 'نعم',        'score_value' => 2, 'order_index' => 0],
            ['label_ar' => 'إلى حد ما', 'score_value' => 1, 'order_index' => 1],
            ['label_ar' => 'لا',         'score_value' => 0, 'order_index' => 2],
        ];

        $lines = $data['lines'];
        $baseIndex = Question::where('assessment_id', $data['assessment_id'])->count();
        $count = 0;

        foreach ($lines as $offset => $line) {
            if (empty($line)) {
                continue;
            }

            $question = Question::create([
                'assessment_id' => $data['assessment_id'],
                'dimension_id' => $data['dimension_id'] ?? null,
                'text_ar' => $line,
                'order_index' => $baseIndex + $offset,
            ]);

            foreach ($defaultOptions as $opt) {
                AnswerOption::create(array_merge($opt, ['question_id' => $question->id]));
            }

            $count++;
        }

        return $count;
    }
}
```

## File: app/Repositories/UserRepository.php
```php
<?php

namespace App\Repositories;

use App\Models\ExamSession;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function searchPaginated(?string $search, int $perPage = 15)
    {
        $query = User::query()
            ->withCount(['examSessions as completed_exams_count' => function ($q) {
                $q->where('status', 'completed');
            }]);

        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('national_id', 'like', "%{$search}%");
            });
        }

        return $query->paginate($perPage);
    }

    public function getUserResults(string $userId)
    {
        return ExamSession::where('user_id', $userId)
            ->where('status', 'completed')
            ->with(['assessment', 'result'])
            ->orderBy('completed_at', 'desc')
            ->get();
    }
}
```

## File: app/Services/ExamResultService.php
```php
<?php

namespace App\Services;

use App\Models\DimensionScore;
use App\Models\ExamSession;
use App\Models\Result;
use App\Services\Result\DimensionInterpreter;
use App\Services\Result\RecommendationSelector;
use App\Services\Result\ResultFormatter;
use App\Services\Result\ScoreCalculator;
use Carbon\Carbon;

class ExamResultService
{
    public function __construct(
        private readonly ScoreCalculator $scoreCalculator,
        private readonly RecommendationSelector $recommendationSelector,
        private readonly DimensionInterpreter $dimensionInterpreter,
        private readonly ResultFormatter $resultFormatter
    ) {}

    /**
     * Calculate and persist the result for a completed exam session.
     */
    public function calculate(ExamSession $session): Result
    {
        if ($session->result) {
            return $session->result->load('dimensionScores.dimension.interpretations');
        }

        $session->load([
            'assessment.questions.answerOptions',
            'assessment.dimensions.interpretations',
            'assessment.recommendations',
            'userAnswers',
        ]);

        $assessment = $session->assessment;

        // 1. Calculate Scores
        $scoreData = $this->scoreCalculator->calculate($session);

        // 2. Select Recommendation
        $recommendation = $this->recommendationSelector->select($assessment, $scoreData);
        $level = $recommendation ? $recommendation->level : null;

        // 3. Persist Result
        $result = Result::create([
            'session_id' => $session->id,
            'total_score' => $scoreData['total_score'],
            'max_possible_score' => $scoreData['max_score'],
            'level' => $level,
            'calculated_at' => Carbon::now(),
        ]);

        // 4. Persist Dimension Scores with Interpretation
        foreach ($scoreData['dimensions'] as $dimData) {
            $dimension = $assessment->dimensions->firstWhere('id', $dimData['dimension_id']);
            $interp = $this->dimensionInterpreter->interpret($dimension, $dimData['score']);
            
            DimensionScore::create([
                'result_id' => $result->id,
                'dimension_id' => $dimData['dimension_id'],
                'score' => $dimData['score'],
                'max_score' => $dimData['max_score'],
                'level' => $interp ? $interp->level : 'medium',
            ]);
        }

        $session->update([
            'status' => 'completed',
            'completed_at' => Carbon::now(),
        ]);

        return $result->load('dimensionScores.dimension.interpretations');
    }

    /**
     * Get the result formatted as a clean structured array (JSON ready).
     */
    public function getFormattedResult(ExamSession $session): array
    {
        $result = $session->result;

        if (! $result) {
            $result = $this->calculate($session);
        } else {
            $result->load('dimensionScores.dimension.interpretations');
        }

        $assessment = $session->assessment()->with(['recommendations'])->first();
        if (! $assessment) {
            abort(404, 'المقياس المرتبط بهذه الجلسة غير موجود. ربما تمت إعادة تهيئة قاعدة البيانات.');
        }
        $recommendation = $assessment->recommendations->where('level', $result->level)->first();

        return $this->resultFormatter->format($assessment, $result, $recommendation);
    }
}
```

## File: app/Services/FileUploadService.php
```php
<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class FileUploadService
{
    /**
     * Upload an image to a public folder and optionally delete the old file.
     *
     * @param UploadedFile $file
     * @param string $folder Relative folder name under public/ (e.g. 'images/icons')
     * @param string|null $oldUrl Old file URL to delete if present
     * @param string $prefix Optional filename prefix
     * @return string Public relative URL (e.g. '/images/icons/filename.png')
     */
    public function uploadPublicImage(UploadedFile $file, string $folder, ?string $oldUrl = null, string $prefix = ''): string
    {
        $destinationPath = public_path($folder);
        if (! File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $prefixStr = $prefix !== '' ? $prefix . '_' : '';
        $filename = $prefixStr . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $newUrl = '/' . trim($folder, '/') . '/' . $filename;

        // Delete old file if provided
        if ($oldUrl && str_starts_with($oldUrl, '/' . trim($folder, '/') . '/')) {
            $oldFilename = basename($oldUrl);
            $oldPath = public_path(trim($folder, '/') . '/' . $oldFilename);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        return $newUrl;
    }

    /**
     * Delete a public image file.
     */
    public function deletePublicImage(string $url, string $folder): void
    {
        $filename = basename($url);
        $path = public_path(trim($folder, '/') . '/' . $filename);

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
```

## File: app/Services/IconService.php
```php
<?php

namespace App\Services;

use App\Models\Icon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class IconService
{
    public function __construct(
        private readonly FileUploadService $fileUploadService,
    ) {}

    public function getGroupedByCategory(): Collection
    {
        return Icon::orderBy('created_at', 'desc')->get()->groupBy('category');
    }

    public function store(string $name, string $category, UploadedFile $file): Icon
    {
        $iconUrl = $this->fileUploadService->uploadPublicImage($file, 'images/icons');

        return Icon::create([
            'name' => $name,
            'category' => $category,
            'icon_url' => $iconUrl,
        ]);
    }

    public function delete(Icon $icon): void
    {
        $this->fileUploadService->deletePublicImage($icon->icon_url, 'images/icons');
        $icon->delete();
    }
}
```

## File: app/Services/QuestionService.php
```php
<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Question;
use App\Repositories\Contracts\QuestionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class QuestionService
{
    public function __construct(
        private readonly QuestionRepositoryInterface $questions,
    ) {}

    /**
     * @param  array<string, mixed>  $filters
     */
    public function filteredList(array $filters): LengthAwarePaginator
    {
        return $this->questions->filteredPaginated($filters);
    }

    public function byAssessment(Assessment $assessment): Collection
    {
        return $this->questions->byAssessment($assessment);
    }

    /**
     * @param  array<string, mixed>  $data
     * @param  array<int, array<string, mixed>>  $options
     */
    public function create(array $data, array $options): Question
    {
        return $this->questions->create($data, $options);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(Question $question, array $data): Question
    {
        $updateData = array_intersect_key($data, array_flip(['text_ar', 'is_reversed', 'dimension_id']));

        return $this->questions->update($question, $updateData);
    }

    public function delete(Question $question): void
    {
        $this->questions->delete($question);
    }

    /**
     * @param  array<int, string>  $ids
     */
    public function bulkDelete(array $ids): int
    {
        $count = count($ids);
        $this->questions->bulkDelete($ids);

        return $count;
    }

    /**
     * @param  array<int, string>  $orderedIds
     */
    public function reorder(array $orderedIds): void
    {
        $this->questions->reorder($orderedIds);
    }

    /**
     * @param  array<int, string>  $ids
     */
    public function bulkAssignDimension(array $ids, ?string $dimensionId): void
    {
        $this->questions->bulkAssignDimension($ids, $dimensionId);
    }

    public function assignDimension(Question $question, ?string $dimensionId): Question
    {
        return $this->questions->assignDimension($question, $dimensionId);
    }

    /**
     * Bulk-import questions from raw text (one per line).
     *
     * @param  array<string, mixed>  $data  Keys: assessment_id, dimension_id, questions_text
     * @return int Number of questions created
     */
    public function bulkImport(array $data): int
    {
        $lines = array_filter(
            array_map('trim', explode("\n", $data['questions_text']))
        );

        return $this->questions->bulkImport([
            'assessment_id' => $data['assessment_id'],
            'dimension_id' => $data['dimension_id'] ?? null,
            'lines' => array_values($lines),
        ]);
    }

    /**
     * Import questions from a CSV file.
     */
    public function importFromCsv(Assessment $assessment, string $filePath): int
    {
        if (($handle = fopen($filePath, 'r')) === false) {
            throw new \RuntimeException('تعذر فتح ملف CSV.');
        }

        $rowCount = 0;
        $isFirst = true;

        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            if (empty($row) || count($row) < 2) {
                continue;
            }

            // Skip header row if present
            if ($isFirst) {
                $isFirst = false;
                $firstCol = trim($row[0]);
                if (
                    str_contains($firstCol, 'dimension') ||
                    str_contains($firstCol, 'البعد') ||
                    str_contains($firstCol, 'بُعد') ||
                    str_contains(trim($row[1]), 'question') ||
                    str_contains(trim($row[1]), 'السؤال')
                ) {
                    continue;
                }
            }

            $dimName = trim($row[0] ?? '');
            $qText = trim($row[1] ?? '');

            if (empty($qText)) {
                continue;
            }

            $isReversed = filter_var(trim($row[2] ?? '0'), FILTER_VALIDATE_BOOLEAN) || trim($row[2] ?? '0') === '1';
            $optionsStr = trim($row[3] ?? '');

            // Get or create dimension if dimName is provided
            $dimensionId = null;
            if (! empty($dimName)) {
                $dimension = $assessment->dimensions()->firstOrCreate(
                    ['name_ar' => $dimName],
                    [
                        'max_score' => 0,
                        'order_index' => $assessment->dimensions()->count(),
                    ]
                );
                $dimensionId = $dimension->id;
            }

            // Parse options
            $options = [];
            if (! empty($optionsStr)) {
                $optParts = explode('|', $optionsStr);
                foreach ($optParts as $idx => $part) {
                    $pair = explode(':', $part);
                    $label = trim($pair[0] ?? '');
                    $score = intval(trim($pair[1] ?? '0'));
                    if ($label !== '') {
                        $options[] = [
                            'label_ar' => $label,
                            'score_value' => $score,
                            'order_index' => $idx,
                        ];
                    }
                }
            }

            // Default options
            if (empty($options)) {
                $options = [
                    ['label_ar' => 'نعم',        'score_value' => $isReversed ? 0 : 2, 'order_index' => 0],
                    ['label_ar' => 'إلى حد ما', 'score_value' => 1,                   'order_index' => 1],
                    ['label_ar' => 'لا',         'score_value' => $isReversed ? 2 : 0, 'order_index' => 2],
                ];
            }

            $this->questions->create([
                'assessment_id' => $assessment->id,
                'dimension_id' => $dimensionId,
                'text_ar' => $qText,
                'is_reversed' => $isReversed,
            ], $options);

            $rowCount++;
        }

        fclose($handle);

        // Update dimensions max_scores
        foreach ($assessment->dimensions as $dim) {
            $dimQuestions = $dim->questions()->with('answerOptions')->get();
            $dimMax = $dimQuestions->sum(
                fn ($q) => $q->answerOptions->max('score_value') ?? 0
            );
            $dim->update(['max_score' => $dimMax]);
        }

        return $rowCount;
    }
}
```

## File: app/Services/Result/ResultFormatter.php
```php
<?php

namespace App\Services\Result;

use App\Models\Assessment;
use App\Models\Recommendation;
use App\Models\Result;

class ResultFormatter
{
    /**
     * Formats the final result API response into a strictly structured format.
     */
    public function format(Assessment $assessment, Result $result, ?Recommendation $recommendation): array
    {
        $response = [
            'result_id' => $result->id,
            'created_at' => clone $result->calculated_at,
            'assessment' => [
                'id' => $assessment->id,
                'title_ar' => $assessment->title_ar,
                'scoring_type' => $assessment->scoring_type,
            ],
            'category' => $assessment->category,
            'total_score' => $result->total_score,
            'max_score' => $result->max_possible_score,
            'level' => $result->level,
            'recommendation' => $recommendation ? $recommendation->description_ar : null,
        ];
        // Use fields directly from Recommendation if available
        $progIntro = $recommendation ? $recommendation->programs_intro_ar : null;
        $progOutro = $recommendation ? $recommendation->programs_outro_ar : null;
        $progText = $recommendation ? $recommendation->programs_ar : null;
        $programs = is_array($progText) ? $this->formatProgramsArray($progText) : $this->formatProgramsArray($this->parseList($progText));
        
        if (!empty($progIntro)) $response['programs_intro'] = $progIntro;
        if (!empty($programs)) $response['programs'] = $programs;
        if (!empty($progOutro)) $response['programs_outro'] = $progOutro;
        
        $certs_ar = $recommendation ? $recommendation->certificates_ar : null;
        $certsIntro = $recommendation ? $recommendation->certificates_intro_ar : null;
        $certificates = is_array($certs_ar) ? $this->formatCertificatesArray($certs_ar) : $this->parseCertificates($certs_ar);
        if (!empty($certsIntro)) $response['certificates_intro'] = $certsIntro;
        if (!empty($certificates)) $response['certificates'] = $certificates;

        $roadmap_ar = $recommendation ? $recommendation->plan_30_days_ar : null;
        $roadmapIntro = $recommendation ? $recommendation->plan_30_days_intro_ar : null;
        $roadmap = is_array($roadmap_ar) ? $roadmap_ar : $this->parseList($roadmap_ar);
        if (!empty($roadmapIntro)) $response['roadmap_intro'] = $roadmapIntro;
        if (!empty($roadmap)) $response['roadmap'] = $roadmap;

        if ($recommendation) {
            if (!empty($recommendation->title_ar)) $response['recommendation_title'] = $recommendation->title_ar;
            if (!empty($recommendation->strengths_ar)) $response['strengths'] = is_array($recommendation->strengths_ar) ? $recommendation->strengths_ar : $this->parseList($recommendation->strengths_ar);
            if (!empty($recommendation->development_areas_ar)) $response['development_areas'] = is_array($recommendation->development_areas_ar) ? $recommendation->development_areas_ar : $this->parseList($recommendation->development_areas_ar);
            if (!empty($recommendation->how_to_learn_ar)) $response['how_to_learn'] = is_array($recommendation->how_to_learn_ar) ? $recommendation->how_to_learn_ar : $this->parseList($recommendation->how_to_learn_ar);
            if (!empty($recommendation->practical_tips_ar)) $response['practical_tips'] = is_array($recommendation->practical_tips_ar) ? $recommendation->practical_tips_ar : $this->parseList($recommendation->practical_tips_ar);
        }

        $dimensions = [];
        $chartLabels = [];
        $chartData = [];

        foreach ($result->dimensionScores as $ds) {
            // Skip the "عام" dimension as it is a fallback placeholder
            if (trim($ds->dimension->name_ar) === 'عام') {
                continue;
            }

            $interp = $ds->dimension->interpretations->where('level', $ds->level)->first();
            $pct = $ds->max_score > 0 ? round(($ds->score / $ds->max_score) * 100) : 0;

            $cleanName = preg_replace('/^المحور\s+\S+[:：]\s*/u', '', $ds->dimension->name_ar);

            $dimensions[] = [
                'id' => $ds->dimension->id,
                'name' => $cleanName,
                'score' => $ds->score,
                'max_score' => $ds->max_score,
                'percentage' => $pct,
                'level' => $ds->level,
                'display_level' => $this->getDisplayLevel($ds->level),
                'interpretation' => $interp ? $interp->interpretation_text_ar : null,
            ];

            // Chart Data using score / max_score
            $chartLabels[] = $cleanName;
            $chartData[] = $pct;
        }

        if (!empty($dimensions)) {
            $response['dimensions'] = $dimensions;
            if (!empty($chartLabels)) {
                $response['chart_data'] = [
                    'labels' => $chartLabels,
                    'data' => $chartData
                ];
            }
        }

        return $response;
    }

    private function parseList(?string $text): array
    {
        if (empty(trim($text ?? ''))) return [];
        // Clean invalid UTF-8 bytes that might cause preg_split to fail
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
        $split = preg_split('/[,\n،]+/u', $text);
        if (!is_array($split)) return [];
        
        $items = array_map(function($item) {
            return trim(preg_replace('/^[\d\-\.\*\s]+/u', '', $item));
        }, $split);
        return array_values(array_filter($items, fn($i) => !empty($i)));
    }

    private function getDisplayLevel(string $level): string
    {
        $map = [
            'excellent' => 'متميز',
            'advanced'  => 'متقدم',
            'good'      => 'جيد',
            'average'   => 'متوسط',
            'weak'      => 'ضعيف',
            // Legacy/alternative keys
            'high'      => 'مرتفع',
            'medium'    => 'متوسط',
            'low'       => 'منخفض',
        ];
        
        return $map[$level] ?? $level;
    }

    private function parseCertificates(?string $text): array
    {
        if (empty($text)) return [];
        $items = array_map('trim', preg_split('/[,\n،]+/u', $text));
        $items = array_values(array_filter($items, fn($i) => !empty($i)));
        
        return $this->formatCertificatesArray($items);
    }

    private function formatCertificatesArray(array $items): array
    {
        return array_map(function($cert) {
            if (is_array($cert)) {
                return $cert;
            }
            if (is_object($cert)) {
                return (array) $cert;
            }
            return [
                'title' => trim(preg_replace('/^[\d\-\.\*\s]+/u', '', $cert)),
                'description' => 'شهادة احترافية'
            ];
        }, array_filter($items));
    }

    private function formatProgramsArray(array $items): array
    {
        return array_map(function($prog) {
            if (is_array($prog)) {
                return $prog;
            }
            if (is_object($prog)) {
                return (array) $prog;
            }
            return [
                'title' => trim(preg_replace('/^[\d\-\.\*\s]+/u', '', $prog)),
                'icon' => 'bi-journal-bookmark'
            ];
        }, array_filter($items));
    }
}
```

## File: app/Services/SettingService.php
```php
<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public function __construct(
        private readonly FileUploadService $fileUploadService,
    ) {}

    public function getAllAsKeyValue(): array
    {
        return Setting::pluck('value', 'key')->toArray();
    }

    public function updateFromRequest(Request $request, array $validatedData): void
    {
        $textData = collect($validatedData)->except(['stat_users_icon', 'stat_exams_icon', 'stat_assessments_icon', 'stat_fields_icon'])->toArray();

        foreach ($textData as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $iconKeys = ['stat_users_icon', 'stat_exams_icon', 'stat_assessments_icon', 'stat_fields_icon'];
        foreach ($iconKeys as $key) {
            if ($request->hasFile($key)) {
                $oldSetting = Setting::where('key', $key)->first();
                $oldUrl = $oldSetting ? $oldSetting->value : null;

                $newUrl = $this->fileUploadService->uploadPublicImage(
                    $request->file($key),
                    'images/icons',
                    $oldUrl,
                    'sysicon'
                );

                Setting::updateOrCreate(['key' => $key], ['value' => $newUrl]);
            }
        }

        Cache::forget('site_settings');
    }
}
```

## File: app/Services/StatisticsService.php
```php
<?php

namespace App\Services;

use App\Models\Assessment;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StatisticsService
{
    /**
     * Get all assessments for the filter dropdown.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Assessment>
     */
    public function getAssessments()
    {
        return Assessment::all();
    }

    /**
     * Build the full statistics data payload.
     * Uses DB JOINs to avoid N+1 queries.
     *
     * @param  int  $range  Number of days
     * @return array<string, mixed>
     */
    public function getData(int $range): array
    {
        return [
            'dailyData' => $this->getDailySessionData($range),
            'assessments' => $this->getLevelDistribution(),
            'avgScores' => $this->getAverageScores(),
            'topUsers' => $this->getTopUsers(),
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function getDailySessionData(int $range): array
    {
        $from = now()->subDays($range - 1)->startOfDay();

        $rows = DB::table('exam_sessions')
            ->where('status', 'completed')
            ->where('completed_at', '>=', $from)
            ->selectRaw('DATE(completed_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $data = [];
        for ($i = 0; $i < $range; $i++) {
            $date = now()->subDays($range - 1 - $i)->format('Y-m-d');
            $data[] = [
                'date' => $date,
                'count' => $rows->get($date)?->count ?? 0,
            ];
        }

        return $data;
    }

    /**
     * Use a single JOIN query to aggregate level counts per assessment.
     *
     * @return array<int, array<string, mixed>>
     */
    private function getLevelDistribution(): array
    {
        $rows = DB::table('assessments as a')
            ->join('exam_sessions as es', 'es.assessment_id', '=', 'a.id')
            ->join('results as r', 'r.session_id', '=', 'es.id')
            ->whereNull('a.deleted_at')
            ->select([
                'a.id',
                'a.title_ar as title',
                DB::raw("SUM(CASE WHEN r.level = 'high'   THEN 1 ELSE 0 END) as high"),
                DB::raw("SUM(CASE WHEN r.level = 'medium' THEN 1 ELSE 0 END) as medium"),
                DB::raw("SUM(CASE WHEN r.level = 'low'    THEN 1 ELSE 0 END) as low"),
            ])
            ->groupBy('a.id', 'a.title_ar')
            ->get();

        return $rows->map(fn ($r) => [
            'id' => $r->id,
            'title' => $r->title,
            'high' => (int) $r->high,
            'medium' => (int) $r->medium,
            'low' => (int) $r->low,
        ])->values()->toArray();
    }

    /**
     * Use a JOIN to compute average score per assessment in a single query.
     *
     * @return array<int, array<string, mixed>>
     */
    private function getAverageScores(): array
    {
        $rows = DB::table('assessments as a')
            ->leftJoin('exam_sessions as es', 'es.assessment_id', '=', 'a.id')
            ->leftJoin('results as r', 'r.session_id', '=', 'es.id')
            ->whereNull('a.deleted_at')
            ->select([
                'a.title_ar as title',
                DB::raw('ROUND(AVG(r.total_score), 1) as avg'),
            ])
            ->groupBy('a.id', 'a.title_ar')
            ->get();

        return $rows->map(fn ($r) => [
            'title' => $r->title,
            'avg' => (float) ($r->avg ?? 0),
        ])->values()->toArray();
    }

    /**
     * @return Collection<int, object>
     */
    private function getTopUsers()
    {
        return DB::table('users as u')
            ->leftJoin('exam_sessions as es', fn ($j) => $j->on('es.user_id', '=', 'u.id')->where('es.status', 'completed')
            )
            ->where('u.role', 'user')
            ->whereNull('u.deleted_at')
            ->select([
                'u.id',
                'u.name',
                'u.email',
                DB::raw('COUNT(es.id) as exam_sessions_count'),
            ])
            ->groupBy('u.id', 'u.name', 'u.email')
            ->orderByDesc('exam_sessions_count')
            ->limit(10)
            ->get();
    }

    /**
     * Export all completed exam sessions and results to a CSV string.
     */
    public function exportResultsCsv(): string
    {
        $rows = DB::table('exam_sessions as es')
            ->join('users as u', 'u.id', '=', 'es.user_id')
            ->join('assessments as a', 'a.id', '=', 'es.assessment_id')
            ->join('results as r', 'r.session_id', '=', 'es.id')
            ->where('es.status', 'completed')
            ->whereNull('u.deleted_at')
            ->whereNull('a.deleted_at')
            ->select([
                'es.id as session_id',
                'u.name as user_name',
                'u.email as user_email',
                'a.title_ar as assessment_title',
                'r.total_score',
                'r.max_possible_score',
                'r.level',
                'es.completed_at',
            ])
            ->orderByDesc('es.completed_at')
            ->get();

        $output = fopen('php://temp', 'r+');

        // Prepend UTF-8 BOM so Excel opens Arabic letters correctly
        fwrite($output, "\xEF\xBB\xBF");

        // Headers
        fputcsv($output, [
            'معرف الجلسة',
            'اسم المستخدم',
            'البريد الإلكتروني',
            'اسم المقياس',
            'الدرجة المحرزة',
            'الدرجة القصوى',
            'النسبة المئوية',
            'المستوى',
            'تاريخ الإكمال',
        ]);

        foreach ($rows as $row) {
            $percentage = $row->max_possible_score > 0
                ? round(($row->total_score / $row->max_possible_score) * 100).'%'
                : '0%';

            $levelLabel = match ($row->level) {
                'high' => 'مرتفع',
                'medium' => 'متوسط',
                default => 'منخفض',
            };

            fputcsv($output, [
                $row->session_id,
                $row->user_name,
                $row->user_email,
                $row->assessment_title,
                $row->total_score,
                $row->max_possible_score,
                $percentage,
                $levelLabel,
                $row->completed_at,
            ]);
        }

        rewind($output);
        $csvContent = stream_get_contents($output);
        fclose($output);

        return $csvContent;
    }
}
```

## File: app/Services/UserService.php
```php
<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {}

    public function register(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';

        return $this->userRepository->create($data);
    }

    public function searchPaginated(?string $search, int $perPage = 15)
    {
        return $this->userRepository->searchPaginated($search, $perPage);
    }

    public function getUserResults(string $userId)
    {
        return $this->userRepository->getUserResults($userId);
    }
}
```

## File: database/migrations/0001_01_01_000000_create_users_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id', 36)->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
```

## File: database/migrations/2026_07_21_170000_make_assessments_limit_nullable_on_coupons_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->integer('assessments_limit')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->integer('assessments_limit')->default(1)->change();
        });
    }
};
```

## File: database/migrations/2026_07_21_234000_add_perceptual_fields_to_recommendations_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            if (!Schema::hasColumn('recommendations', 'title_ar')) {
                $table->string('title_ar')->nullable()->after('level');
            }
            if (!Schema::hasColumn('recommendations', 'strengths_ar')) {
                $table->text('strengths_ar')->nullable()->after('description_ar');
            }
            if (!Schema::hasColumn('recommendations', 'development_areas_ar')) {
                $table->text('development_areas_ar')->nullable()->after('strengths_ar');
            }
            if (!Schema::hasColumn('recommendations', 'how_to_learn_ar')) {
                $table->text('how_to_learn_ar')->nullable()->after('development_areas_ar');
            }
            if (!Schema::hasColumn('recommendations', 'practical_tips_ar')) {
                $table->text('practical_tips_ar')->nullable()->after('how_to_learn_ar');
            }
        });
    }

    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn([
                'title_ar',
                'strengths_ar',
                'development_areas_ar',
                'how_to_learn_ar',
                'practical_tips_ar'
            ]);
        });
    }
};
```

## File: database/migrations/2026_08_01_000000_add_soft_deletes_to_all_core_tables.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'users',
            'assessments',
            'dimensions',
            'questions',
            'answer_options',
            'exam_sessions',
            'results',
            'recommendations',
            'dimension_interpretations',
            'coupons',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && !Schema::hasColumn($table, 'deleted_at')) {
                Schema::table($table, function (Blueprint $tableBlueprint) {
                    $tableBlueprint->softDeletes();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'coupons',
            'dimension_interpretations',
            'recommendations',
            'results',
            'exam_sessions',
            'answer_options',
            'questions',
            'dimensions',
            'assessments',
            'users',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'deleted_at')) {
                Schema::table($table, function (Blueprint $tableBlueprint) {
                    $tableBlueprint->dropSoftDeletes();
                });
            }
        }
    }
};
```

## File: database/migrations/2026_08_29_000001_create_graded_exams_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// جدول منفصل تمامًا عن assessments الحالي (نظام سيكومتري بالسكور).
// graded_exams مخصص لبنوك الأسئلة الموضوعية (إجابة صحيحة/خطأ محددة)
// زي "الاختبار التجريبي للشهادة الاحترافية في التسويق - IBTA".
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title_ar');
            $table->text('description_ar')->nullable();
            $table->string('category')->nullable();      // مثال: 'marketing_certification'
            $table->integer('total_questions')->default(0); // إجمالي بنك الأسئلة (404)
            $table->integer('time_limit_min')->nullable();
            $table->boolean('is_active')->default(true);
            $table->uuid('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exams');
    }
};
```

## File: database/migrations/2026_08_29_000002_create_graded_exam_units_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// وحدات بنك الأسئلة (13 وحدة). مكافئ مفاهيميًا لـ dimensions
// لكن مفصول تمامًا لتجنّب أي تعارض مع منطق السكور النفسي الحالي.
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('graded_exam_id');
            $table->integer('unit_number');        // 1 إلى 13 (نفس ترقيم المصدر الأصلي)
            $table->string('title_ar');
            $table->integer('order_index')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['graded_exam_id', 'unit_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_units');
    }
};
```

## File: database/migrations/2026_08_29_000003_create_graded_exam_questions_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('graded_exam_id');          // مكرر عمدًا (denormalized) لتسهيل الاستعلامات المباشرة
            $table->uuid('unit_id');
            $table->integer('original_number')->nullable(); // الرقم التسلسلي الأصلي 1-404 (تتبّع فقط)
            $table->enum('level', ['easy', 'medium', 'hard']);
            $table->enum('question_type', ['mcq', 'true_false']);
            $table->text('text_ar');
            $table->text('explanation_ar')->nullable();      // NULL لو مفيش شرح في المصدر
            $table->boolean('is_multi_correct')->default(false);
            $table->string('source_page_ref')->nullable();   // رقم الصفحة المرجعية إن وُجد
            $table->integer('order_index')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_questions');
    }
};
```

## File: database/migrations/2026_08_29_000004_create_graded_exam_options_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_options', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('question_id');
            $table->string('option_label')->nullable();  // 'أ' / 'ب' / 'True' / 'False' ... قد تكون NULL
            $table->text('option_text_ar');
            $table->integer('order_index')->default(0);
            $table->boolean('is_correct')->default(false); // بديل score_value بتاع answer_options القديم
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_options');
    }
};
```

## File: database/migrations/2026_08_29_000005_create_graded_exam_sessions_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// نسخة موازية لـ exam_sessions الحالي، لكن خاصة بامتحانات الأسئلة الموضوعية
// العشوائية (مثال: امتحان 50 سؤال بقيود سهل/متوسط/صعب اللي اتفقنا عليها).
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('graded_exam_id');
            $table->enum('status', ['in_progress', 'completed', 'abandoned'])->default('in_progress');
            $table->integer('total_questions');          // عدد الأسئلة في هذه النسخة (مثال: 50)
            $table->json('constraints_snapshot')->nullable(); // نسخة من constraints.json وقت التوليد
            $table->integer('random_seed')->nullable();
            $table->timestamp('started_at');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_sessions');
    }
};
```

## File: database/migrations/2026_08_29_000006_create_graded_exam_session_questions_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// يحدد فعليًا: أي أسئلة اتسحبت لهذه النسخة من الامتحان، بأي ترتيب،
// وترتيب الخيارات بعد الخلط (shuffle) الخاص بهذه المحاولة تحديدًا.
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_session_questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('session_id');
            $table->uuid('question_id');
            $table->integer('position_in_exam');           // 1 إلى 50 مثلاً
            $table->json('shuffled_options_order')->nullable(); // ترتيب عرض الخيارات لهذه النسخة
            $table->timestamps();

            $table->unique(['session_id', 'question_id']);
            $table->index(['session_id', 'position_in_exam']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_session_questions');
    }
};
```

## File: database/migrations/2026_08_29_000008_create_graded_exam_user_answer_options_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// pivot table: يدعم اختيار أكثر من خيار واحد لكل سؤال
// (ضروري لأن 21 سؤال في البنك ليهم أكثر من إجابة صحيحة).
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_user_answer_options', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_answer_id');
            $table->uuid('option_id');
            $table->timestamps();

            $table->unique(['user_answer_id', 'option_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_user_answer_options');
    }
};
```

## File: database/migrations/2026_08_29_000010_create_graded_exam_constraint_settings_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// إعدادات قابلة للتعديل من لوحة تحكم الأدمن (Runtime settings).
// علاقة 1:1 مع graded_exams. القيم الوصفية/الإحصائية (مثل عدد الأسئلة
// الصعبة المتاحة فعليًا في البنك) تُحسب Live من graded_exam_questions
// وقت التحقق، ولا تُخزَّن هنا أبدًا حتى لا تصبح قديمة (stale).
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_constraint_settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('graded_exam_id')->unique();

            // === القيم اللي الأدمن هيتحكم فيها من الداشبورد ===
            $table->integer('total_questions')->default(50);
            $table->decimal('easy_percentage', 5, 2)->default(50.00);
            $table->decimal('medium_percentage', 5, 2)->default(40.00);
            $table->decimal('hard_percentage', 5, 2)->default(10.00);

            // === إعدادات إضافية (اختيارية دلوقتي، جاهزة للمستقبل) ===
            $table->enum('type_distribution_mode', ['proportional', 'balanced'])->default('proportional');
            $table->enum('mc_position_balance_mode', ['mirror_bank_bias', 'forced_balanced'])->default('forced_balanced');
            $table->integer('max_multi_correct_questions')->default(3);
            $table->integer('max_consecutive_same_answer')->default(3);
            $table->integer('max_consecutive_same_unit')->default(2);

            // مساحة مرنة لأي إعداد مستقبلي تاني من غير ما تحتاج migration جديدة كل مرة
            $table->json('advanced_settings')->nullable();

            $table->uuid('updated_by')->nullable();
            $table->timestamps();

            // القيمة دي بتتفحص في التطبيق (FormRequest) لكن نضيفها هنا للتوثيق:
            // easy_percentage + medium_percentage + hard_percentage يجب أن يساوي 100
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_constraint_settings');
    }
};
```

## File: database/migrations/2026_08_31_000000_make_user_id_nullable_on_graded_exam_sessions_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('graded_exam_sessions', function (Blueprint $table) {
            $table->uuid('user_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('graded_exam_sessions', function (Blueprint $table) {
            $table->uuid('user_id')->nullable(false)->change();
        });
    }
};
```

## File: app/Http/Controllers/Admin/GradedExamController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradedExam;
use App\Models\GradedExamUnit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GradedExamController extends Controller
{
    public function index(): View
    {
        $exams = GradedExam::withCount(['units', 'questions'])->orderBy('created_at', 'desc')->get();
        return view('admin.graded_exams.index', compact('exams'));
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'category' => 'nullable|string',
            'total_questions' => 'nullable|integer|min:1',
            'time_limit_min' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
        ]);

        $validated['created_by'] = auth()->id();
        
        GradedExam::create($validated);

        return response()->json(['success' => true, 'message' => 'تم إنشاء الشهادة بنجاح.']);
    }

    public function update(Request $request, GradedExam $exam): JsonResponse
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'category' => 'nullable|string',
            'total_questions' => 'nullable|integer|min:1',
            'time_limit_min' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
        ]);

        $exam->update($validated);

        return response()->json(['success' => true, 'message' => 'تم تحديث الشهادة بنجاح.']);
    }

    public function destroy(GradedExam $exam): JsonResponse
    {
        $exam->delete();
        return response()->json(['success' => true, 'message' => 'تم حذف الشهادة بنجاح.']);
    }
    
    // Settings Management
    public function settings(GradedExam $exam): JsonResponse
    {
        $settings = $exam->constraintSettings()->firstOrCreate([
            'graded_exam_id' => $exam->id
        ], [
            'total_questions' => 50,
            'easy_percentage' => 50,
            'medium_percentage' => 40,
            'hard_percentage' => 10,
            'max_multi_correct_questions' => 5,
        ]);
        
        return response()->json(['success' => true, 'settings' => $settings]);
    }

    public function updateSettings(Request $request, GradedExam $exam): JsonResponse
    {
        $validated = $request->validate([
            'total_questions' => 'required|integer|min:1',
            'easy_percentage' => 'required|numeric|min:0|max:100',
            'medium_percentage' => 'required|numeric|min:0|max:100',
            'hard_percentage' => 'required|numeric|min:0|max:100',
            'max_multi_correct_questions' => 'required|integer|min:0',
            'max_consecutive_same_answer' => 'nullable|integer|min:0',
            'max_consecutive_same_unit' => 'nullable|integer|min:0',
        ]);

        if (abs(($validated['easy_percentage'] + $validated['medium_percentage'] + $validated['hard_percentage']) - 100) > 0.01) {
            return response()->json(['success' => false, 'message' => 'مجموع النسب يجب أن يساوي 100%.'], 422);
        }

        $settings = $exam->constraintSettings()->firstOrCreate(['graded_exam_id' => $exam->id]);
        $validated['updated_by'] = auth()->id();
        $settings->update($validated);

        return response()->json(['success' => true, 'message' => 'تم تحديث الإعدادات بنجاح.']);
    }
    
    // Units Management
    public function showUnits(GradedExam $exam): JsonResponse
    {
        $units = $exam->units()->orderBy('order_index')->get();
        return response()->json(['success' => true, 'units' => $units]);
    }

    public function storeUnit(Request $request, GradedExam $exam): JsonResponse
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
        ]);
        
        $lastUnit = $exam->units()->max('unit_number') ?? 0;
        
        $exam->units()->create([
            'title_ar' => $validated['title_ar'],
            'unit_number' => $lastUnit + 1,
            'order_index' => $lastUnit + 1,
        ]);

        return response()->json(['success' => true, 'message' => 'تم إضافة الوحدة بنجاح.']);
    }

    public function updateUnit(Request $request, GradedExamUnit $unit): JsonResponse
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
        ]);

        $unit->update($validated);

        return response()->json(['success' => true, 'message' => 'تم تحديث الوحدة بنجاح.']);
    }

    public function destroyUnit(GradedExamUnit $unit): JsonResponse
    {
        $unit->delete();
        return response()->json(['success' => true, 'message' => 'تم حذف الوحدة بنجاح.']);
    }

    public function preview(GradedExam $exam)
    {
        $exam->load(['units.questions' => function($q) {
            $q->orderBy('order_index');
        }, 'units.questions.options' => function($q) {
            $q->orderBy('order_index');
        }]);

        return view('admin.graded_exams.preview', compact('exam'));
    }
}
```

## File: app/Http/Controllers/ExamController.php
```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerQuestionRequest;
use App\Models\Assessment;
use App\Models\Coupon;
use App\Models\ExamSession;
use App\Services\CouponService;
use App\Services\ExamService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function __construct(
        private readonly ExamService $examService,
        private readonly CouponService $couponService,
    ) {}

    /**
     * AJAX endpoint: validate a coupon code for a given assessment,
     * returning discount tier and pricing info.
     */
    public function validateCoupon(Request $request): JsonResponse
    {
        $request->validate([
            'code'          => 'required|string',
            'assessment_id' => 'required|exists:assessments,id,deleted_at,NULL',
        ]);

        $user       = auth()->user();
        $assessment = Assessment::findOrFail($request->assessment_id);

        // Block coupon usage if the admin has disabled it for this assessment
        if ($assessment->hide_coupon_field) {
            return response()->json(['valid' => false, 'message' => 'الكوبون غير مقبول لهذا المقياس.'], 422);
        }

        $hasAnySession = ExamSession::where('user_id', $user->id)
            ->where('assessment_id', $assessment->id)
            ->exists();

        if ($hasAnySession) {
            return response()->json([
                'valid'            => true,
                'coupon_id'        => null,
                'discount'         => 100,
                'price'            => (float) $assessment->price,
                'discount_amount'  => (float) $assessment->price,
                'final_price'      => 0,
                'is_free'          => true,
                'usage_number'     => 1,
                'message'          => 'لديك دخول مسبق لهذا المقياس، سيتم استئنافه فوراً.',
            ]);
        }

        $result = $this->couponService->validateCouponForUser($request->code, $assessment, $user);

        if (!$result['valid']) {
            return response()->json(['valid' => false, 'message' => $result['message']], 422);
        }

        return response()->json([
            'valid'            => true,
            'coupon_id'        => $result['coupon']->id,
            'discount'         => $result['discount'],
            'price'            => $result['price'],
            'discount_amount'  => $result['discount_amount'],
            'final_price'      => $result['final_price'],
            'is_free'          => $result['is_free'],
            'usage_number'     => $result['usage_number'],
            'message'          => $result['message'],
        ]);
    }

    /**
     * AJAX endpoint: get the available public coupon code(s) for a given assessment.
     * Returns the first active coupon that applies to this assessment and is for all users.
     */
    public function getCouponForAssessment(Assessment $assessment): JsonResponse
    {
        // Block if the admin disabled the coupon field for this assessment
        if ($assessment->hide_coupon_field) {
            return response()->json([
                'found'   => false,
                'message' => 'الكوبون غير مقبول لهذا المقياس.',
            ]);
        }

        $user = auth()->user();

        $coupons = Coupon::where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>=', now()->toDateString());
            })
            ->where(function ($q) use ($assessment) {
                // Either applies to all assessments, or specifically to this one
                $q->where('applies_to_all_assessments', true)
                  ->orWhereHas('assessments', fn ($a) => $a->where('assessment_id', $assessment->id));
            })
            ->where(function ($q) use ($user) {
                // Either applies to all users, or specifically to this user
                $q->where('applies_to_all_users', true)
                  ->orWhereHas('permittedUsers', fn ($u) => $u->where('user_id', $user->id));
            })
            ->get();

        if ($coupons->isEmpty()) {
            return response()->json([
                'found' => false,
                'message' => 'لا يوجد كوبون متاح لهذا المقياس حالياً.',
            ]);
        }

        return response()->json([
            'found'    => true,
            'coupons'  => $coupons->map(function($c) {
                return [
                    'code'     => $c->code,
                    'title'    => $c->title,
                    'discount' => $c->discount_percentage,
                    'expires'  => $c->expires_at ? $c->expires_at->format('Y-m-d') : null,
                ];
            })
        ]);
    }

    public function start(Request $request, Assessment $assessment): RedirectResponse
    {
        $userId = auth()->id();
        $user   = auth()->user();

        // If user already has ANY session for this assessment, resume/restart for free
        $hasAnySession = ExamSession::where('user_id', $userId)
            ->where('assessment_id', $assessment->id)
            ->exists();

        $couponId        = null;
        $discountApplied = null;

        if (!$hasAnySession) {
            // New assessment — needs coupon or payment
            if (!$request->filled('coupon_code') && $assessment->price > 0) {
                return redirect()->back()->with('error', 'يجب الدفع أو استخدام كوبون للوصول إلى هذا المقياس.');
            }

            // Block coupon usage if the admin has disabled it for this assessment
            if ($request->filled('coupon_code') && $assessment->hide_coupon_field) {
                return redirect()->back()->with('error', 'الكوبون غير مقبول لهذا المقياس.');
            }

            if ($request->filled('coupon_code')) {
                $result = $this->couponService->validateCouponForUser($request->coupon_code, $assessment, $user);

                if (!$result['valid']) {
                    return redirect()->back()->with('error', $result['message']);
                }

                if (!$result['is_free']) {
                    // If the coupon doesn't make it 100% free, we would normally redirect to the payment gateway here.
                    // For now, since payment gateway isn't implemented, we just return an error with the remaining amount.
                    return redirect()->back()->with('error', 'يجب استكمال الدفع للمبلغ المتبقي: ' . $result['final_price'] . ' ر.س. (بوابة الدفع غير مفعلة حالياً)');
                }

                $couponId        = $result['coupon']->id;
                $discountApplied = $result['discount'];

                // Record usage
                $this->couponService->recordUsage($result['coupon'], $userId);
            }
        }

        $result  = $this->examService->startOrResume($assessment, $userId);
        $session = $result['session'];

        // Store coupon info on session if this is a new session
        if ($couponId && !$result['resumed']) {
            $session->update([
                'coupon_id'        => $couponId,
                'discount_applied' => $discountApplied,
            ]);
        }

        if ($result['resumed']) {
            return redirect()->route('exam.show', $session->id)
                ->with('info', 'لديك جلسة اختبار قيد التقدم، يمكنك الاستمرار من حيث توقفت.');
        }

        return redirect()->route('exam.show', $session->id);
    }

    public function show(ExamSession $session): View|RedirectResponse
    {
        $this->authorizeSession($session);

        if ($session->status === 'completed') {
            return redirect()->route('exam.result', $session->id);
        }

        $data         = $this->examService->getSessionData($session);
        $nextQuestion = $data['nextQuestion'];

        if (!$nextQuestion) {
            $this->examService->getResult($session);
            return redirect()->route('exam.result', $session->id);
        }

        return view('user.exam', [
            'session'      => $session,
            'assessment'   => $data['assessment'],
            'nextQuestion' => $nextQuestion,
            'progress'     => $data['progress'],
        ]);
    }

    public function answer(AnswerQuestionRequest $request, ExamSession $session): JsonResponse
    {
        $this->authorizeSession($session);

        $result = $this->examService->submitAnswer(
            $session,
            $request->validated('question_id'),
            $request->validated('selected_option_id')
        );

        return response()->json(array_merge(['success' => true], $result));
    }

    public function previous(Request $request, ExamSession $session): JsonResponse
    {
        $this->authorizeSession($session);
        $result = $this->examService->previousQuestion($session);
        return response()->json($result);
    }

    public function result(Request $request, ExamSession $session): View|RedirectResponse|JsonResponse
    {
        $this->authorizeSession($session);

        if ($session->status !== 'completed' || !$session->result) {
            return redirect()->route('exam.show', $session->id);
        }

        $data = $this->examService->getResult($session);

        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json($data);
        }

        return view('user.result', array_merge(['session' => $session], $data));
    }

    private function authorizeSession(ExamSession $session): void
    {
        if ($session->user_id !== auth()->id() && !optional(auth()->user())->isAdmin()) {
            abort(403);
        }
    }
}
```

## File: app/Http/Requests/Admin/SaveCouponRequest.php
```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->has('is_active'),
            'applies_to_all_assessments' => $this->has('applies_to_all_assessments'),
            'applies_to_all_users' => $this->has('applies_to_all_users'),
        ]);
    }

    public function rules(): array
    {
        $couponId = $this->route('coupon') ? $this->route('coupon')->id : null;

        return [
            'title' => 'required|string|max:255',
            'code' => ['required', 'string', 'max:50', Rule::unique('coupons')->ignore($couponId)->whereNull('deleted_at')],
            'assessments_limit' => 'nullable|integer|min:1',
            'expires_at' => 'nullable|date',
            'is_active' => 'boolean',
            'discount_percentage' => 'required|integer|min:0|max:100',
            'discount_percentage_2nd' => 'nullable|integer|min:0|max:100',
            'discount_percentage_3rd' => 'nullable|integer|min:0|max:100',
            'discount_percentage_4th' => 'nullable|integer|min:0|max:100',
            'discount_percentage_5th' => 'nullable|integer|min:0|max:100',
            'discount_percentage_6th' => 'nullable|integer|min:0|max:100',
            'discount_percentage_7th' => 'nullable|integer|min:0|max:100',
            'discount_percentage_8th' => 'nullable|integer|min:0|max:100',
            'discount_percentage_9th' => 'nullable|integer|min:0|max:100',
            'discount_percentage_10th' => 'nullable|integer|min:0|max:100',
            'applies_to_all_assessments' => 'boolean',
            'assessment_ids' => 'nullable|array',
            'assessment_ids.*' => 'exists:assessments,id,deleted_at,NULL',
            'applies_to_all_users' => 'boolean',
            'permitted_user_ids' => 'nullable|array',
            'permitted_user_ids.*' => 'exists:users,id,deleted_at,NULL',
        ];
    }
}
```

## File: app/Models/Assessment.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assessment extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'category',
        'type',
        'time_limit_min',
        'is_active',
        'created_by',
        'image_url',
        'subtitle_ar',
        'scoring_type',
        'price',
        'rating',
        'rating_count',
        'hide_coupon_field',
        'icon',
        'report_code',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'hide_coupon_field' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupon_assessment');
    }

    public function dimensions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Dimension::class)->orderBy('order_index');
    }

    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('order_index');
    }

    public function examSessions()
    {
        return $this->hasMany(ExamSession::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
```

## File: app/Models/Coupon.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Coupon extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'code',
        'assessments_limit',
        'expires_at',
        'is_active',
        'discount_percentage',
        'discount_percentage_2nd',
        'discount_percentage_3rd',
        'discount_percentage_4th',
        'discount_percentage_5th',
        'discount_percentage_6th',
        'discount_percentage_7th',
        'discount_percentage_8th',
        'discount_percentage_9th',
        'discount_percentage_10th',
        'applies_to_all_assessments',
        'applies_to_all_users',
    ];

    protected $casts = [
        'expires_at' => 'date',
        'is_active' => 'boolean',
        'applies_to_all_assessments' => 'boolean',
        'applies_to_all_users' => 'boolean',
    ];

    public function delete()
    {
        return DB::transaction(fn () => parent::delete());
    }

    public function restore()
    {
        if ($this->code) {
            $pattern = '/_deleted_\d+$/';
            $originalCode = preg_replace($pattern, '', $this->code);

            if (static::where('code', $originalCode)->whereNull('deleted_at')->where('id', '!=', $this->id)->exists()) {
                throw new \Exception('لا يمكن استرجاع الكوبون لوجود كوبون نشط آخر بنفس الكود.');
            }
        }

        return DB::transaction(fn () => parent::restore());
    }

    public static function bulkSoftDelete(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            static::whereIn('id', $ids)->get()->each->delete();
        });
    }

    protected static function booted(): void
    {
        static::deleting(function (Coupon $coupon) {
            if (!$coupon->isForceDeleting()) {
                $timestamp = now()->timestamp;
                if ($coupon->code) {
                    $coupon->code = $coupon->code . '_deleted_' . $timestamp;
                    $coupon->saveQuietly();
                }
            }
        });

        static::restoring(function (Coupon $coupon) {
            if ($coupon->code) {
                $pattern = '/_deleted_\d+$/';
                $coupon->code = preg_replace($pattern, '', $coupon->code);
                $coupon->saveQuietly();
            }
        });
    }

    public function getDisplayCodeAttribute(): ?string
    {
        return $this->code ? preg_replace('/_deleted_\d+$/', '', $this->code) : null;
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('used_count')->withTimestamps();
    }

    public function assessments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Assessment::class, 'coupon_assessment');
    }

    public function permittedUsers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'coupon_permitted_user');
    }
}
```

## File: app/Models/GradedExamConstraintSetting.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class GradedExamConstraintSetting extends Model
{
    use HasUuids;

    protected $fillable = [
        'graded_exam_id', 'total_questions', 'easy_percentage', 'medium_percentage',
        'hard_percentage', 'type_distribution_mode', 'mc_position_balance_mode',
        'max_multi_correct_questions', 'max_consecutive_same_answer',
        'max_consecutive_same_unit', 'advanced_settings', 'updated_by',
    ];

    protected $casts = [
        'total_questions' => 'integer',
        'easy_percentage' => 'decimal:2',
        'medium_percentage' => 'decimal:2',
        'hard_percentage' => 'decimal:2',
        'max_multi_correct_questions' => 'integer',
        'max_consecutive_same_answer' => 'integer',
        'max_consecutive_same_unit' => 'integer',
        'advanced_settings' => 'array',
    ];

    public function gradedExam()
    {
        return $this->belongsTo(GradedExam::class);
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * عدد الأسئلة المطلوب فعليًا لكل مستوى، محسوب من النسب الحالية.
     */
    public function targetCounts(): array
    {
        return [
            'easy'   => (int) round($this->total_questions * $this->easy_percentage / 100),
            'medium' => (int) round($this->total_questions * $this->medium_percentage / 100),
            'hard'   => (int) round($this->total_questions * $this->hard_percentage / 100),
        ];
    }

    /**
     * تحقق Live من إن النسب المطلوبة أصلاً ممكنة فعليًا بناءً على
     * المخزون الحالي لبنك الأسئلة (مش من ملف تابت) — يُستدعى وقت
     * حفظ الأدمن للإعدادات عشان يمنعه يحط نسبة مستحيلة.
     */
    public function isFeasible(): array
    {
        $targets = $this->targetCounts();
        $errors = [];

        $available = [
            'easy'   => GradedExamQuestion::where('graded_exam_id', $this->graded_exam_id)->easy()->count(),
            'medium' => GradedExamQuestion::where('graded_exam_id', $this->graded_exam_id)->medium()->count(),
            'hard'   => GradedExamQuestion::where('graded_exam_id', $this->graded_exam_id)->hard()->count(),
        ];
        
        $totalAvailable = array_sum($available);

        // Relaxed constraints: we only strictly require that the TOTAL questions available 
        // is at least the total questions requested.
        if ($this->total_questions > $totalAvailable) {
            $errors[] = "إجمالي الأسئلة المطلوبة ({$this->total_questions}) أكبر من إجمالي المتاح في بنك الأسئلة ({$totalAvailable}). يرجى إضافة المزيد من الأسئلة أو تقليل العدد المطلوب.";
        }

        if (abs(($this->easy_percentage + $this->medium_percentage + $this->hard_percentage) - 100) > 0.01) {
            $errors[] = 'مجموع النسب الثلاثة يجب أن يساوي 100%.';
        }

        return [
            'feasible' => empty($errors),
            'errors' => $errors,
            'target_counts' => $targets,
            'available_counts' => $available,
        ];
    }
}
```

## File: app/Models/GradedExamUserAnswer.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class GradedExamUserAnswer extends Model
{
    use HasUuids;

    protected $fillable = [
        'session_id', 'question_id', 'is_correct', 'points_earned', 'answered_at',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
        'answered_at' => 'datetime',
    ];

    public function session()
    {
        return $this->belongsTo(GradedExamSession::class, 'session_id');
    }

    public function question()
    {
        return $this->belongsTo(GradedExamQuestion::class, 'question_id');
    }

    // الخيار/الخيارات اللي المستخدم اختارها (يدعم أكتر من خيار للأسئلة متعددة الإجابات)
    public function selectedOptions()
    {
        return $this->hasMany(GradedExamUserAnswerOption::class, 'user_answer_id');
    }
}
```

## File: app/Models/Recommendation.php
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recommendation extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'assessment_id', 'level', 'title_ar', 'description_ar',
        'strengths_ar', 'development_areas_ar', 'how_to_learn_ar', 'practical_tips_ar',
        'certificates_ar', 'certificates_intro_ar',
        'programs_ar', 'programs_intro_ar', 'programs_outro_ar',
        'plan_30_days_ar', 'plan_30_days_intro_ar',
        'high_threshold', 'low_threshold',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    protected $casts = [
        'strengths_ar' => 'array',
        'development_areas_ar' => 'array',
        'how_to_learn_ar' => 'array',
        'practical_tips_ar' => 'array',
        'certificates_ar' => 'array',
        'programs_ar' => 'array',
        'plan_30_days_ar' => 'array',
    ];
}
```

## File: config/graded_exams.php
```php
<?php

// إعدادات عامة لمحرك توليد الامتحانات العشوائية.
// دي إعدادات على مستوى النظام كله (مش لكل امتحان لوحده - دي موجودة
// في جدول graded_exam_constraint_settings بدل كده).
//
// ملحوظة: تم استبدال آلية "تجنب التكرار بآخر N محاولات" بآلية أدق
// اسمها "موازنة الظهور" (Exposure Balancing) — بتحسب عدد مرات ظهور
// كل سؤال لكل مستخدم عبر كل تاريخه (مش آخر N بس)، وبتفضّل الأسئلة
// الأقل ظهورًا دايمًا. المنطق ده جوه GradedExamGeneratorService
// نفسه ومحتاجش أي إعداد هنا.
return [
    //
];
```

## File: database/migrations/2024_01_01_000002_create_assessments_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title_ar');
            $table->string('category');
            $table->text('description_ar')->nullable();
            $table->string('scoring_type')->default('overall_score');
            $table->integer('time_limit_min')->nullable();
            $table->boolean('is_active')->default(true);
            $table->uuid('created_by');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
```

## File: database/migrations/2024_01_01_000003_create_dimensions_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dimensions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('assessment_id');
            $table->string('name_ar');
            $table->integer('max_score');
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dimensions');
    }
};
```

## File: database/migrations/2024_01_01_000004_create_questions_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('assessment_id');
            $table->uuid('dimension_id')->nullable();
            $table->text('text_ar');
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
```

## File: database/migrations/2024_01_01_000005_create_answer_options_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('answer_options', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('question_id');
            $table->string('label_ar');
            $table->integer('score_value');
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answer_options');
    }
};
```

## File: database/migrations/2024_01_01_000006_create_exam_sessions_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('assessment_id');
            $table->enum('status', ['in_progress', 'completed', 'abandoned'])->default('in_progress');
            $table->timestamp('started_at');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_sessions');
    }
};
```

## File: database/migrations/2024_01_01_000007_create_user_answers_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('session_id');
            $table->uuid('question_id');
            $table->uuid('selected_option_id');
            $table->integer('score_earned');
            $table->timestamps();
            $table->unique(['session_id', 'question_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
```

## File: database/migrations/2024_01_01_000008_create_results_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('session_id');
            $table->integer('total_score');
            $table->integer('max_possible_score');
            $table->string('level')->nullable();
            $table->timestamp('calculated_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
```

## File: database/migrations/2024_01_01_000009_create_dimension_scores_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dimension_scores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('result_id');
            $table->uuid('dimension_id');
            $table->integer('score');
            $table->integer('max_score');
            $table->string('level')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dimension_scores');
    }
};
```

## File: database/migrations/2024_01_01_000010_create_recommendations_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('assessment_id');
            $table->string('level');
            $table->text('description_ar');
            $table->text('programs_ar')->nullable();
            $table->integer('high_threshold')->nullable();
            $table->integer('low_threshold')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
```

## File: database/migrations/2026_06_24_091932_create_dimension_interpretations_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dimension_interpretations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('dimension_id');
            $table->string('level');
            $table->text('interpretation_text_ar');
            $table->integer('high_threshold')->nullable();
            $table->integer('low_threshold')->nullable();
            $table->timestamps();

            $table->unique(['dimension_id', 'level'], 'dim_interpretations_dim_level_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dimension_interpretations');
    }
};
```

## File: database/migrations/2026_07_01_154805_create_coupons_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('assessments_limit')->default(1)->comment('Number of assessments allowed per user');
            $table->date('expires_at')->nullable()->comment('When the coupon expires and can no longer be used');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('coupon_user', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->unsignedBigInteger('coupon_id');
            $table->integer('used_count')->default(0);
            $table->timestamps();

            $table->unique(['user_id', 'coupon_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_user');
        Schema::dropIfExists('coupons');
    }
};
```

## File: database/migrations/2026_07_05_000000_upgrade_coupons_and_users_tables.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Update users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('national_id')->nullable()->unique()->after('email');
            $table->string('phone')->nullable()->unique()->after('national_id');
        });

        // 2. Update coupons table
        Schema::table('coupons', function (Blueprint $table) {
            $table->string('code')->nullable()->unique()->after('title');
            $table->integer('discount_percentage')->default(100)->after('code');
            $table->integer('discount_percentage_2nd')->nullable()->after('discount_percentage');
            $table->integer('discount_percentage_3rd')->nullable()->after('discount_percentage_2nd');
            $table->boolean('applies_to_all_assessments')->default(true)->after('discount_percentage_3rd');
        });

        // 3. Update assessments table
        Schema::table('assessments', function (Blueprint $table) {
            $table->boolean('hide_coupon_field')->default(false)->after('is_active');
        });

        // 4. Update exam_sessions table
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('coupon_id')->nullable()->after('assessment_id');
            $table->integer('discount_applied')->nullable()->after('coupon_id');
        });

        // 5. Create coupon_assessment pivot table
        Schema::create('coupon_assessment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->uuid('assessment_id');
            $table->timestamps();

            $table->unique(['coupon_id', 'assessment_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupon_assessment');

        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropColumn(['coupon_id', 'discount_applied']);
        });

        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('hide_coupon_field');
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn([
                'code',
                'discount_percentage',
                'discount_percentage_2nd',
                'discount_percentage_3rd',
                'applies_to_all_assessments'
            ]);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['national_id', 'phone']);
        });
    }
};
```

## File: database/migrations/2026_07_05_124738_add_user_restrictions_to_coupons.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->boolean('applies_to_all_users')->default(true);
        });

        Schema::create('coupon_permitted_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->uuid('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_permitted_user');

        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn('applies_to_all_users');
        });
    }
};
```

## File: database/migrations/2026_07_17_014000_change_sessions_user_id_to_uuid.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->string('user_id', 36)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });
    }
};
```

## File: database/migrations/2026_08_29_000007_create_graded_exam_user_answers_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_user_answers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('session_id');
            $table->uuid('question_id');
            $table->boolean('is_correct')->nullable(); // NULL لو لم يجب الممتحن
            $table->decimal('points_earned', 5, 2)->default(0);
            $table->timestamp('answered_at')->nullable();
            $table->timestamps();

            $table->unique(['session_id', 'question_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_user_answers');
    }
};
```

## File: database/migrations/2026_08_29_000009_create_graded_exam_results_table.php
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graded_exam_results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('session_id');
            $table->decimal('correct_count', 8, 2)->default(0);
            $table->decimal('incorrect_count', 8, 2)->default(0);
            $table->integer('total_questions');
            $table->decimal('percentage', 5, 2);
            $table->string('pass_status')->nullable(); // 'ناجح' / 'راسب' حسب حد النجاح المعتمد
            $table->timestamp('calculated_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graded_exam_results');
    }
};
```

## File: app/Http/Controllers/Admin/AssessmentController.php
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAssessmentRequest;
use App\Http\Requests\Admin\UpdateAssessmentRequest;
use App\Http\Requests\Admin\UpdateSettingsRequest;
use App\Models\Assessment;
use App\Services\AssessmentService;
use App\Models\Icon;
use App\Models\Result;
use App\Models\DimensionScore;
use App\Models\ExamSession;
use App\Services\Result\ResultFormatter;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class AssessmentController extends Controller
{
    public function __construct(
        private readonly AssessmentService $assessmentService,
    ) {}

    public function index(\Illuminate\Http\Request $request): View
    {
        $filters = $request->only(['category', 'search']);
        $assessments = $this->assessmentService->list($filters);

        return view('admin.assessments.index', compact('assessments'));
    }

    public function store(StoreAssessmentRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/dashboard'), $filename);
            $data['image_url'] = $filename;
        }
        unset($data['image']);

        $assessment = $this->assessmentService->create($data);

        return response()->json([
            'success' => true,
            'message' => 'تم إنشاء المقياس بنجاح.',
            'id' => $assessment->id,
        ]);
    }

    public function show(Assessment $assessment): View
    {
        $assessment = $this->assessmentService->getForManagement($assessment->id);
        $icons = Icon::all()->groupBy('category');
        return view('admin.assessments.show', compact('assessment', 'icons'));
    }

    public function update(UpdateAssessmentRequest $request, Assessment $assessment): JsonResponse
    {
        $this->assessmentService->update($assessment, $request->validated());

        return response()->json(['success' => true, 'message' => 'تم تحديث المقياس.']);
    }

    public function updateSettings(UpdateSettingsRequest $request, Assessment $assessment): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image if it exists and is not one of the default seeded images
            if ($assessment->image_url && ! preg_match('/^([1-9]|1[0-9]|2[0-5])\.png$/', $assessment->image_url)) {
                $oldPath = public_path('images/dashboard/'.$assessment->image_url);
                if (\Illuminate\Support\Facades\File::exists($oldPath)) {
                    \Illuminate\Support\Facades\File::delete($oldPath);
                }
            }

            $file = $request->file('image');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/dashboard'), $filename);
            $data['image_url'] = $filename;
        }
        unset($data['image']);

        if ($request->hasFile('icon_file')) {
            // Delete old icon if it exists and is an uploaded file
            if ($assessment->icon && str_starts_with($assessment->icon, '/images/icons/')) {
                $oldIconPath = public_path(ltrim($assessment->icon, '/'));
                if (\Illuminate\Support\Facades\File::exists($oldIconPath)) {
                    \Illuminate\Support\Facades\File::delete($oldIconPath);
                }
            }

            $file = $request->file('icon_file');
            $filename = 'icon_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/icons'), $filename);
            $data['icon'] = '/images/icons/' . $filename;
        }
        unset($data['icon_file']);


        $this->assessmentService->updateSettings($assessment, $data);

        return response()->json(['success' => true, 'message' => 'تم حفظ الإعدادات بنجاح.']);
    }

    public function destroy(Assessment $assessment): JsonResponse
    {
        $this->assessmentService->delete($assessment);

        return response()->json(['success' => true, 'message' => 'تم حذف المقياس.']);
    }

    public function toggle(Assessment $assessment): JsonResponse
    {
        $updated = $this->assessmentService->toggle($assessment);
        $status = $updated->is_active ? 'تم تفعيل' : 'تم إيقاف';

        return response()->json([
            'success' => true,
            'message' => "$status المقياس.",
            'is_active' => $updated->is_active,
        ]);
    }

    public function previewResult(Assessment $assessment, string $level): View
    {
        // Find recommendation by level or ID
        $recommendation = $assessment->recommendations()
            ->where('level', $level)
            ->orWhere('id', $level)
            ->first();

        $levelKey = $recommendation ? $recommendation->level : $level;
        $scoringType = $assessment->scoring_type ?? 'overall_score';

        // Fallback for perceptual styles if DB recommendations table is empty on server
        if (!$recommendation && $scoringType === 'perceptual_styles') {
            $dataFile = database_path('data/assessments/28/recommendations.php');
            if (!file_exists($dataFile)) {
                $dataFile = database_path('data/assessments/perceptual_styles/recommendations.php');
            }
            if (file_exists($dataFile)) {
                $allRecs = require $dataFile;
                $found = collect($allRecs)->firstWhere('level', $levelKey);
                if ($found) {
                    $recommendation = new \App\Models\Recommendation(array_merge($found, ['assessment_id' => $assessment->id]));
                }
            }
        }

        // Build mock scores based on scoring_type & level
        $mockDimensionScores = collect();
        $totalScore = 0;
        $maxPossible = 0;

        if ($scoringType === 'perceptual_styles') {
            $presetScores = [
                'visual'                    => ['النمط البصري' => 18, 'النمط السمعي' => 12, 'النمط الحسي' => 9],
                'auditory'                  => ['النمط البصري' => 11, 'النمط السمعي' => 19, 'النمط الحسي' => 10],
                'kinesthetic'               => ['النمط البصري' => 10, 'النمط السمعي' => 11, 'النمط الحسي' => 18],
                'balanced'                  => ['النمط البصري' => 15, 'النمط السمعي' => 14, 'النمط الحسي' => 13],
                'dual_visual_auditory'      => ['النمط البصري' => 17, 'النمط السمعي' => 16, 'النمط الحسي' => 10],
                'dual_visual_kinesthetic'   => ['النمط البصري' => 17, 'النمط السمعي' => 10, 'النمط الحسي' => 16],
                'dual_auditory_kinesthetic'  => ['النمط البصري' => 10, 'النمط السمعي' => 17, 'النمط الحسي' => 16],
            ];

            $scoresMap = $presetScores[$levelKey] ?? ['النمط البصري' => 15, 'النمط السمعي' => 14, 'النمط الحسي' => 13];

            foreach ($assessment->dimensions as $dim) {
                $scoreVal = $scoresMap[$dim->name_ar] ?? 12;
                $totalScore += $scoreVal;
                $maxPossible += 20;

                $ds = new DimensionScore([
                    'dimension_id' => $dim->id,
                    'score' => $scoreVal,
                    'max_score' => 20,
                    'level' => $levelKey,
                ]);
                $clonedDim = clone $dim;
                $ds->setRelation('dimension', $clonedDim);
                $mockDimensionScores->push($ds);
            }
        } else {
            $score = $recommendation ? ($recommendation->high_threshold ?? 85) : 85;
            $totalScore = $score;
            $maxPossible = 100;

            foreach ($assessment->dimensions as $dim) {
                $interp = $dim->interpretations()->where('level', $levelKey)->first();
                $ds = new DimensionScore([
                    'dimension_id' => $dim->id,
                    'score' => $interp ? $interp->high_threshold : 10,
                    'max_score' => 10,
                    'level' => $levelKey,
                ]);
                $clonedDim = clone $dim;
                $clonedDim->load('interpretations');
                $ds->setRelation('dimension', $clonedDim);
                $mockDimensionScores->push($ds);
            }
        }

        // Mock Result model
        $result = new Result([
            'id' => 'PREVIEW-' . strtoupper(substr(md5($levelKey), 0, 8)),
            'assessment_id' => $assessment->id,
            'total_score' => $totalScore,
            'max_possible_score' => $maxPossible ?: 60,
            'level' => $levelKey,
            'calculated_at' => now(),
        ]);
        $result->setRelation('dimensionScores', $mockDimensionScores);

        $formatter = app(ResultFormatter::class);
        $formattedData = $formatter->format($assessment, $result, $recommendation);

        $session = tap(new ExamSession([
            'id' => 'PREVIEW-SESSION-' . time(),
            'status' => 'completed',
            'created_at' => now(),
        ]))->setRelation('result', $result)
           ->setRelation('assessment', $assessment);

        return view('user.result', array_merge(['session' => $session], $formattedData));
    }
}
```

## File: app/Services/CouponService.php
```php
<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Coupon;
use App\Models\ExamSession;
use App\Models\User;

class CouponService
{
    /**
     * Create a new coupon with pivot relationships inside a DB transaction.
     */
    public function createCoupon(array $data): Coupon
    {
        return \Illuminate\Support\Facades\DB::transaction(function () use ($data) {
            $coupon = Coupon::create($data);

            if (! $coupon->applies_to_all_assessments && ! empty($data['assessment_ids'])) {
                $coupon->assessments()->sync($data['assessment_ids']);
            }

            if (! $coupon->applies_to_all_users && ! empty($data['permitted_user_ids'])) {
                $coupon->permittedUsers()->sync($data['permitted_user_ids']);
            }

            return $coupon;
        });
    }

    /**
     * Update an existing coupon with pivot relationships inside a DB transaction.
     */
    public function updateCoupon(Coupon $coupon, array $data): Coupon
    {
        return \Illuminate\Support\Facades\DB::transaction(function () use ($coupon, $data) {
            $coupon->update($data);

            if ($coupon->applies_to_all_assessments) {
                $coupon->assessments()->detach();
            } else {
                $coupon->assessments()->sync($data['assessment_ids'] ?? []);
            }

            if ($coupon->applies_to_all_users) {
                $coupon->permittedUsers()->detach();
            } else {
                $coupon->permittedUsers()->sync($data['permitted_user_ids'] ?? []);
            }

            return $coupon->fresh();
        });
    }

    /**
     * Soft-delete a coupon.
     */
    public function deleteCoupon(Coupon $coupon): void
    {
        $coupon->delete();
    }

    /**
     * Validates a coupon code for a specific user and assessment.
     * Returns an array with validation status, message, and pricing details.
     */
    public function validateCouponForUser(string $code, Assessment $assessment, User $user): array
    {
        $coupon = Coupon::where('code', $code)
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>=', now()->toDateString());
            })
            ->first();

        if (!$coupon) {
            return ['valid' => false, 'message' => 'الكوبون غير صالح أو منتهي الصلاحية.'];
        }

        // Check assessment scope
        if (!$coupon->applies_to_all_assessments) {
            $appliesToAssessment = $coupon->assessments()->where('assessment_id', $assessment->id)->exists();
            if (!$appliesToAssessment) {
                return ['valid' => false, 'message' => 'هذا الكوبون لا ينطبق على هذا المقياس.'];
            }
        }

        // Check user scope
        if (!$coupon->applies_to_all_users) {
            $appliesToUser = $coupon->permittedUsers()->where('user_id', $user->id)->exists();
            if (!$appliesToUser) {
                return ['valid' => false, 'message' => 'هذا الكوبون مخصص لمستخدمين محددين فقط وليس لحسابك.'];
            }
        }

        $resolved = $this->resolveDiscount($coupon, $user);

        if ($resolved['exhausted']) {
            return ['valid' => false, 'message' => 'لقد استنفدت جميع فرص الاستخدام لهذا الكوبون.'];
        }

        if ($resolved['discount'] === null) {
            return ['valid' => false, 'message' => 'لا يوجد خصم متاح لك على هذا الكوبون في هذه المرحلة.'];
        }

        $price = (float) ($assessment->price ?? 0);
        $discountAmount = round($price * $resolved['discount'] / 100, 2);
        $finalPrice = max(0, $price - $discountAmount);

        return [
            'valid' => true,
            'coupon' => $coupon,
            'discount' => $resolved['discount'],
            'price' => $price,
            'discount_amount' => $discountAmount,
            'final_price' => $finalPrice,
            'is_free' => $finalPrice <= 0,
            'usage_number' => $resolved['total_used'] + 1,
            'message' => "الكوبون صالح! خصم {$resolved['discount']}% سيُطبق.",
        ];
    }

    /**
     * Records the usage of a coupon for a specific user.
     */
    public function recordUsage(Coupon $coupon, string $userId): void
    {
        $pivot = $coupon->users()->where('user_id', $userId)->first();
        if ($pivot) {
            $coupon->users()->updateExistingPivot($userId, ['used_count' => $pivot->pivot->used_count + 1]);
        } else {
            $coupon->users()->attach($userId, ['used_count' => 1]);
        }
    }

    private const TIER_FIELDS = [
        'discount_percentage',
        'discount_percentage_2nd',
        'discount_percentage_3rd',
        'discount_percentage_4th',
        'discount_percentage_5th',
        'discount_percentage_6th',
        'discount_percentage_7th',
        'discount_percentage_8th',
        'discount_percentage_9th',
        'discount_percentage_10th',
    ];

    /**
     * Resolve the actual discount percentage a user should get for a given coupon.
     * Checks usage across all identities (email, phone, national_id) to prevent fraud.
     */
    private function resolveDiscount(Coupon $coupon, User $user): array
    {
        $totalUsed = $this->countLinkedUsage($coupon, $user);

        $field = self::TIER_FIELDS[$totalUsed] ?? null;
        $discount = ($field && $coupon->{$field} !== null)
            ? (float) $coupon->{$field}
            : (float) $coupon->discount_percentage;

        $exhausted = ($coupon->assessments_limit !== null) && ($totalUsed >= $coupon->assessments_limit);

        return [
            'total_used' => $totalUsed,
            'discount' => $discount,
            'exhausted' => $exhausted,
        ];
    }

    /**
     * Count exam sessions using this coupon across all users sharing
     * the same national_id, phone, or email as the requesting user.
     */
    private function countLinkedUsage(Coupon $coupon, User $user): int
    {
        $linkedUserIds = User::where(function ($q) use ($user) {
            $q->where('email', $user->email);
            if (! empty($user->national_id)) {
                $q->orWhere('national_id', $user->national_id);
            }
            if (! empty($user->phone)) {
                $q->orWhere('phone', $user->phone);
            }
        })->pluck('id');

        return ExamSession::whereIn('user_id', $linkedUserIds)
            ->where('coupon_id', $coupon->id)
            ->count();
    }
}
```

## File: app/Services/Result/RecommendationSelector.php
```php
<?php

namespace App\Services\Result;

use App\Models\Assessment;
use App\Models\Recommendation;

class RecommendationSelector
{
    /**
     * Select the appropriate recommendation based on scoring type and thresholds.
     */
    public function select(Assessment $assessment, array $scoreData): ?Recommendation
    {
        $scoringType = $assessment->scoring_type ?? 'overall_score';

        if ($scoringType === 'perceptual_styles') {
            return $this->selectForPerceptualStyles($assessment, $scoreData['dimensions']);
        }

        if ($scoringType === 'highest_dimension') {
            return $this->selectByHighestDimension($assessment, $scoreData['dimensions']);
        }

        if ($scoringType === 'overall_score') {
            return $this->selectByThresholds($assessment, $scoreData['total_score']);
        }

        return null;
    }

    /**
     * Classification logic for Perceptual Styles (Visual, Auditory, Kinesthetic).
     */
    private function selectForPerceptualStyles(Assessment $assessment, array $dimensions): ?Recommendation
    {
        $vScore = 0;
        $aScore = 0;
        $kScore = 0;

        foreach ($dimensions as $dim) {
            $name = $dim['name'] ?? '';
            if (mb_strpos($name, 'بصري') !== false) {
                $vScore = $dim['score'];
            } elseif (mb_strpos($name, 'سمعي') !== false) {
                $aScore = $dim['score'];
            } elseif (mb_strpos($name, 'حسي') !== false) {
                $kScore = $dim['score'];
            }
        }

        $styles = [
            ['key' => 'visual', 'score' => $vScore],
            ['key' => 'auditory', 'score' => $aScore],
            ['key' => 'kinesthetic', 'score' => $kScore],
        ];

        usort($styles, fn($a, $b) => $b['score'] <=> $a['score']);

        $s1 = $styles[0];
        $s2 = $styles[1];
        $s3 = $styles[2];

        // Rule 1: Balanced Style (difference across all 3 <= 2)
        if (($s1['score'] - $s3['score']) <= 2) {
            $targetLevel = 'balanced';
        }
        // Rule 2: Dual Style (difference between top 2 <= 2 and top 2 vs 3rd >= 3)
        elseif (($s1['score'] - $s2['score']) <= 2 && ($s2['score'] - $s3['score']) >= 3) {
            $keys = [$s1['key'], $s2['key']];
            sort($keys);
            $pair = implode('_', $keys);
            if ($pair === 'auditory_visual') $targetLevel = 'dual_visual_auditory';
            elseif ($pair === 'kinesthetic_visual') $targetLevel = 'dual_visual_kinesthetic';
            elseif ($pair === 'auditory_kinesthetic') $targetLevel = 'dual_auditory_kinesthetic';
            else $targetLevel = 'dual_' . $pair;
        }
        // Rule 3: Single Dominant Style
        else {
            $targetLevel = $s1['key'];
        }
        $rec = $assessment->recommendations->firstWhere('level', $targetLevel);
        if (!$rec) {
            $dataFile = database_path('data/assessments/28/recommendations.php');
            if (!file_exists($dataFile)) {
                $dataFile = database_path('data/assessments/perceptual_styles/recommendations.php');
            }
            if (file_exists($dataFile)) {
                $allRecs = require $dataFile;
                $found = collect($allRecs)->firstWhere('level', $targetLevel);
                if ($found) {
                    $rec = new Recommendation(array_merge($found, ['assessment_id' => $assessment->id]));
                }
            }
        }
        return $rec;
    }

    /**
     * Finds the highest scoring dimension and matches a recommendation by name.
     */
    private function selectByHighestDimension(Assessment $assessment, array $dimensions): ?Recommendation
    {
        if (empty($dimensions)) {
            return null;
        }

        // Find the dimension with the highest score
        $highestDim = null;
        $highestScore = -1;

        foreach ($dimensions as $dim) {
            if ($dim['score'] > $highestScore) {
                $highestScore = $dim['score'];
                $highestDim = $dim;
            }
        }

        if (!$highestDim) {
            return null;
        }

        $highestDimName = trim(str_replace('محور', '', $highestDim['name']));

        return $assessment->recommendations->first(function($rec) use ($highestDimName) {
            return strpos(trim($rec->level), $highestDimName) !== false 
                || strpos($highestDimName, trim($rec->level)) !== false;
        });
    }

    /**
     * Selects recommendation strictly based on database thresholds.
     */
    private function selectByThresholds(Assessment $assessment, int $totalScore): ?Recommendation
    {
        foreach ($assessment->recommendations as $rec) {
            if ($rec->low_threshold !== null && $rec->high_threshold !== null) {
                if ($totalScore >= $rec->low_threshold && $totalScore <= $rec->high_threshold) {
                    return $rec;
                }
            }
        }

        return null;
    }
}
```

## File: app/Services/GradedExamGeneratorService.php
```php
<?php

namespace App\Services;

use App\Models\GradedExam;
use App\Models\GradedExamConstraintSetting;
use App\Models\GradedExamQuestion;
use App\Models\GradedExamSession;
use App\Models\GradedExamSessionQuestion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * المحرك الرئيسي لتوليد امتحان عشوائي يطبّق كل القيود المتفق عليها:
 * توزيع الصعوبة، توازن النوع، تغطية الوحدات، توازن صح/خطأ، توازن مواقع
 * الإجابة الصحيحة، حد أقصى للأسئلة متعددة الإجابات، وتجنب تكرار الأسئلة
 * مع محاولات المستخدم السابقة.
 *
 * كل الأرقام (عدد الأسئلة المتاحة لكل وحدة/مستوى/نوع) تُحسب Live من
 * الداتابيز، مش مخزّنة أو مفترضة، عشان تفضل صحيحة حتى لو الأدمن غيّر
 * بنك الأسئلة بعدين.
 */
class GradedExamGeneratorService
{
    /** أقصى عدد محاولات لموازنة صح/خطأ أو مواقع الإجابة قبل ما نكتفي بأقرب نتيجة ممكنة */
    private const MAX_BALANCE_ATTEMPTS = 200;

    /** كام مرة نحاول نولّد الامتحان من الصفر لو المحاولة فشلت لسبب متعلق بالعشوائية */
    private const MAX_GENERATION_ATTEMPTS = 5;

    public function generate(GradedExam $exam, ?string $userId = null): GradedExamSession
    {
        $settings = $exam->constraintSettings ?? $this->defaultSettings($exam);

        // تحقق سريع أول (مجموع النسب = 100%، إلخ) - رخيص وما يحتاجش نحاول توليد كامل عشانه
        $this->validateFeasibility($exam, $settings);

        $lastException = null;

        for ($attempt = 1; $attempt <= self::MAX_GENERATION_ATTEMPTS; $attempt++) {
            try {
                return $this->attemptGeneration($exam, $settings, $userId);
            } catch (\RuntimeException $e) {
                $lastException = $e;

                \Log::warning('GradedExamGeneratorService: فشلت محاولة توليد امتحان', [
                    'graded_exam_id' => $exam->id,
                    'user_id' => $userId,
                    'attempt' => $attempt,
                    'max_attempts' => self::MAX_GENERATION_ATTEMPTS,
                    'error' => $e->getMessage(),
                ]);
                // نكمل للمحاولة الجاية - كل محاولة بترتيب/خلط عشوائي مختلف
                // (شكل شجرة الاحتمالات بيتغير، فممكن مشكلة عابرة تتحل من نفسها)
            }
        }

        // كل المحاولات الـ5 فشلت بنفس السبب تقريبًا - ده مش عيب عشوائية، ده على
        // الأرجح نقص حقيقي في بنك الأسئلة يحتاج تدخّل الأدمن. نسجّله كـ error
        // واضح (مش warning) عشان يبان في مراقبة اللوجات، ونطلع رسالة نظيفة
        // للمستخدم النهائي من غير تفاصيل داخلية (UUIDs إلخ).
        \Log::error('GradedExamGeneratorService: فشل توليد الامتحان بعد كل المحاولات - على الأرجح نقص بيانات حقيقي في بنك الأسئلة، يحتاج مراجعة الأدمن', [
            'graded_exam_id' => $exam->id,
            'user_id' => $userId,
            'attempts_tried' => self::MAX_GENERATION_ATTEMPTS,
            'last_error' => $lastException?->getMessage(),
        ]);

        throw new \RuntimeException(
            'تعذّر إعداد الاختبار حاليًا بسبب نقص في بعض الأسئلة ضمن معايير التوزيع الحالية. تم إبلاغ فريق الدعم، برجاء المحاولة لاحقًا.',
            0,
            $lastException
        );
    }

    /**
     * محاولة توليد واحدة كاملة (كل الخطوات 1-8). مفصولة في دالة لوحدها
     * عشان generate() يقدر يعيد استدعاءها براحة في حلقة الـ retry.
     */
    private function attemptGeneration(GradedExam $exam, GradedExamConstraintSetting $settings, ?string $userId): GradedExamSession
    {
        return DB::transaction(function () use ($exam, $settings, $userId) {

            // === الخطوة 1: تثبيت تخصيص الوحدات (largest remainder method) ===
            $unitAllocation = $this->allocateUnitCounts($exam->id, $settings->total_questions);

            // === الخطوة 2: توزيع الصعوبة داخل كل وحدة، مع احترام الميزانية العامة ===
            $cells = $this->allocateDifficultyWithinUnits($exam->id, $unitAllocation, $settings);

            // === الخطوة 3: توزيع النوع (اختيار من متعدد / صح خطأ) داخل كل خلية ===
            $cells = $this->allocateTypeWithinCells($exam->id, $cells, $settings);

            // === الخطوة 4: اختيار الأسئلة الفعلية (مع فلاتر: متعدد الإجابات، خيارات غير قياسية، تجنب التكرار) ===
            $questions = $this->selectQuestions($exam->id, $cells, $settings, $userId);

            // === الخطوة 5: موازنة صح/خطأ (best-effort ضمن هامش تفاوت) ===
            $questions = $this->balanceTrueFalseAnswers($exam->id, $questions, $settings);

            // === الخطوة 6: خلط ترتيب الخيارات لكل سؤال (يحل توازن مواقع الإجابة تلقائيًا) ===
            $shuffledMap = $this->shuffleOptionsPerQuestion($questions, $settings);

            // === الخطوة 7: خلط ترتيب الأسئلة + تطبيق قاعدة عدم تجميع نفس الوحدة ===
            $orderedQuestions = $this->sequenceQuestions($questions, $settings);

            // === الخطوة 8: حفظ الجلسة والأسئلة المرتبطة بها ===
            return $this->persistSession($exam, $userId, $orderedQuestions, $shuffledMap, $settings);
        });
    }

    // ============================================================
    // الخطوة 1: تخصيص عدد الأسئلة لكل وحدة (Largest Remainder Method)
    // ============================================================
    private function allocateUnitCounts(string $gradedExamId, int $totalQuestions): array
    {
        $unitCounts = GradedExamQuestion::where('graded_exam_id', $gradedExamId)
            ->selectRaw('unit_id, COUNT(*) as cnt')
            ->groupBy('unit_id')
            ->pluck('cnt', 'unit_id')
            ->toArray();

        $bankTotal = array_sum($unitCounts);
        if ($bankTotal === 0) {
            throw new \RuntimeException('لا يوجد أي سؤال في بنك هذا الامتحان.');
        }

        $raw = [];
        foreach ($unitCounts as $unitId => $count) {
            $raw[$unitId] = ($count / $bankTotal) * $totalQuestions;
        }

        $allocation = array_map('intval', $raw);
        $remainder = $totalQuestions - array_sum($allocation);

        // وزّع الباقي على أعلى الأجزاء الكسرية (largest remainder)
        $fractions = [];
        foreach ($raw as $unitId => $value) {
            $fractions[$unitId] = $value - intval($value);
        }
        arsort($fractions);

        foreach (array_keys($fractions) as $unitId) {
            if ($remainder <= 0) break;
            $allocation[$unitId]++;
            $remainder--;
        }

        // حد أدنى سؤال واحد لكل وحدة لها أسئلة (min_questions_per_unit = 1)
        foreach ($allocation as $unitId => $count) {
            if ($count === 0 && $unitCounts[$unitId] > 0) {
                $allocation[$unitId] = 1;
            }
        }

        return $allocation; // [unit_id => count]
    }

    // ============================================================
    // الخطوة 2: توزيع الصعوبة داخل كل وحدة مع احترام الميزانية الكلية
    // ============================================================
    private function allocateDifficultyWithinUnits(string $gradedExamId, array $unitAllocation, GradedExamConstraintSetting $settings): array
    {
        $levelTargets = $settings->targetCounts(); // ['easy'=>25,'medium'=>20,'hard'=>5]
        $levels = ['easy', 'medium', 'hard'];

        // مخزون كل وحدة لكل مستوى (Live من الداتابيز)
        $supply = GradedExamQuestion::where('graded_exam_id', $gradedExamId)
            ->selectRaw('unit_id, level, COUNT(*) as cnt')
            ->groupBy('unit_id', 'level')
            ->get()
            ->groupBy('unit_id')
            ->map(fn ($rows) => $rows->pluck('cnt', 'level')->toArray());

        $cells = []; // [[unit_id, level, count], ...]
        $remainingLevelBudget = $levelTargets;

        // نبدأ بالوحدات الأصغر تخصيصًا أولاً (أقل مرونة) لتقليل التعارضات
        $unitsSorted = $unitAllocation;
        asort($unitsSorted);

        foreach ($unitsSorted as $unitId => $slotsNeeded) {
            if ($slotsNeeded <= 0) continue;
            $unitSupply = $supply[$unitId] ?? [];

            // وزن كل مستوى = (الميزانية العامة المتبقية له) × (توفره في هذه الوحدة تحديدًا)
            $weights = [];
            foreach ($levels as $lvl) {
                $available = $unitSupply[$lvl] ?? 0;
                $weights[$lvl] = min($available, max($remainingLevelBudget[$lvl], 0));
            }
            $weightSum = array_sum($weights);

            if ($weightSum === 0) {
                // مفيش أي مستوى ليه ميزانية متاحة أو مخزون في الوحدة دي - وزّع بالتساوي كحل أخير
                foreach ($levels as $lvl) {
                    $weights[$lvl] = $unitSupply[$lvl] ?? 0;
                }
                $weightSum = array_sum($weights) ?: 1;
            }

            $picked = [];
            $assigned = 0;
            foreach ($levels as $lvl) {
                $share = $weightSum > 0 ? intval(floor($slotsNeeded * ($weights[$lvl] / $weightSum))) : 0;
                $share = min($share, $unitSupply[$lvl] ?? 0);
                $picked[$lvl] = $share;
                $assigned += $share;
            }

            // وزّع أي باقي بسبب التقريب على أي مستوى لسه عنده مخزون وميزانية
            $leftover = $slotsNeeded - $assigned;
            foreach ($levels as $lvl) {
                if ($leftover <= 0) break;
                $room = ($unitSupply[$lvl] ?? 0) - $picked[$lvl];
                if ($room > 0 && $remainingLevelBudget[$lvl] > 0) {
                    $add = min($leftover, $room);
                    $picked[$lvl] += $add;
                    $leftover -= $add;
                }
            }

            foreach ($levels as $lvl) {
                if ($picked[$lvl] > 0) {
                    $cells[] = ['unit_id' => $unitId, 'level' => $lvl, 'count' => $picked[$lvl]];
                    $remainingLevelBudget[$lvl] -= $picked[$lvl];
                }
            }
        }

        return $cells;
    }

    // ============================================================
    // الخطوة 3: توزيع النوع (mcq/true_false) داخل كل خلية (وحدة × مستوى)
    // ============================================================
    private function allocateTypeWithinCells(string $gradedExamId, array $cells, GradedExamConstraintSetting $settings): array
    {
        $mode = $settings->type_distribution_mode; // proportional | balanced
        $mcqRatio = $mode === 'balanced' ? 0.5 : 0.6139;

        $result = [];
        foreach ($cells as $cell) {
            $supply = GradedExamQuestion::where('graded_exam_id', $gradedExamId)
                ->where('unit_id', $cell['unit_id'])
                ->where('level', $cell['level'])
                ->selectRaw('question_type, COUNT(*) as cnt')
                ->groupBy('question_type')
                ->pluck('cnt', 'question_type')
                ->toArray();

            $mcqAvailable = $supply['mcq'] ?? 0;
            $tfAvailable = $supply['true_false'] ?? 0;

            $mcqWanted = (int) round($cell['count'] * $mcqRatio);
            $tfWanted = $cell['count'] - $mcqWanted;

            // === معالجة قيد type_within_difficulty الحرج: عنق زجاجة صح/خطأ الصعبة ===
            // لو المطلوب أكبر من المتاح، حوّل الفرق لـ mcq بدل ما نفشل التوليد
            if ($tfWanted > $tfAvailable) {
                $deficit = $tfWanted - $tfAvailable;
                $tfWanted = $tfAvailable;
                $mcqWanted += $deficit;
            }
            if ($mcqWanted > $mcqAvailable) {
                $deficit = $mcqWanted - $mcqAvailable;
                $mcqWanted = $mcqAvailable;
                $tfWanted = min($tfAvailable, $tfWanted + $deficit);
            }

            if ($mcqWanted > 0) {
                $result[] = ['unit_id' => $cell['unit_id'], 'level' => $cell['level'], 'type' => 'mcq', 'count' => $mcqWanted];
            }
            if ($tfWanted > 0) {
                $result[] = ['unit_id' => $cell['unit_id'], 'level' => $cell['level'], 'type' => 'true_false', 'count' => $tfWanted];
            }
        }

        return $result;
    }

    // ============================================================
    // الخطوة 4: اختيار الأسئلة الفعلية لكل خلية
    // ============================================================
    private function selectQuestions(string $gradedExamId, array $cells, GradedExamConstraintSetting $settings, ?string $userId): Collection
    {
        $selected = collect();
        $multiCorrectCount = 0;
        $maxMultiCorrect = $settings->max_multi_correct_questions;

        // موازنة الظهور: خريطة [question_id => عدد مرات الظهور] لهذا المستخدم عبر كل محاولاته
        $viewCounts = $userId ? $this->getQuestionViewCounts($userId, $gradedExamId) : [];

        foreach ($cells as $cell) {
            $poolAll = GradedExamQuestion::where('graded_exam_id', $gradedExamId)
                ->where('unit_id', $cell['unit_id'])
                ->where('level', $cell['level'])
                ->where('question_type', $cell['type'])
                ->whereNotIn('id', $selected->pluck('id'))
                ->with('options') // eager load لتجنب N+1 في خطوات لاحقة (موازنة صح/خطأ + خلط الخيارات)
                ->withCount('options')
                ->get();

            // فضّل الأسئلة اللي عدد خياراتها قياسي (4 لاختيار من متعدد، 2 لصح/خطأ) أولاً
            // الفلترة هنا في PHP بدل SQL having() عشان تشتغل بنفس الشكل على أي قاعدة بيانات (MySQL/Postgres/SQLite)
            $standardCount = $cell['type'] === 'mcq' ? 4 : 2;
            $standardPool = $poolAll->where('options_count', '=', $standardCount)->values();
            $fallbackPool = $poolAll->where('options_count', '!=', $standardCount)->values();

            $pool = $standardPool->concat($fallbackPool);

            // === موازنة الظهور (Exposure Balancing) ===
            // خلط عشوائي الأول (لكسر أي ترتيب من الداتابيز)، وبعدين ترتيب حسب
            // "الأقل ظهورًا أولاً" (زي ORDER BY user_views ASC, RANDOM()).
            // النتيجة: الأسئلة اللي الطالب ماشافهاش خالص (عدد = 0) دايمًا في الأول،
            // ولا يتكرر سؤال شافه قبل كده إلا لو الأسئلة الجديدة خلصت ومحتاجين
            // نكمّل نسبة الوحدة/المستوى/النوع المطلوبة (Fetch then Backtrack).
            $pool = $pool->shuffle()->sortBy(
                fn ($q) => $viewCounts[$q->id] ?? 0
            )->values();

            $needed = $cell['count'];
            $chosen = collect();

            // === تمريرة أولى: نحترم حد max_multi_correct_questions (قيد soft) ===
            foreach ($pool as $question) {
                if ($chosen->count() >= $needed) break;

                if ($question->is_multi_correct && $multiCorrectCount >= $maxMultiCorrect) {
                    continue; // تخطّي - وصلنا للحد الأقصى المسموح لأسئلة متعددة الإجابات
                }

                $chosen->push($question);
                if ($question->is_multi_correct) {
                    $multiCorrectCount++;
                }
            }

            // === تمريرة ثانية (fallback): لو لسه ناقص، اكسر حد الأسئلة المتعددة ===
            // تغطية الوحدة/المستوى/النوع قيد "hard" (لازم يتحقق دايمًا)، بينما حد
            // الأسئلة المتعددة قيد "soft" (أفضل جهد). لو الاحترام الصارم للقيد الـ
            // soft هيمنع تحقيق القيد الـ hard، نكسر الـ soft بدل ما نفشل التوليد كله.
            if ($chosen->count() < $needed) {
                foreach ($pool as $question) {
                    if ($chosen->count() >= $needed) break;
                    if ($chosen->contains('id', $question->id)) continue;

                    $chosen->push($question);
                    if ($question->is_multi_correct) {
                        $multiCorrectCount++;
                    }
                }
            }

            if ($chosen->count() < $needed) {
                throw new \RuntimeException(sprintf(
                    'تعذّر إيجاد %d سؤال كافٍ (وحدة: %s، مستوى: %s، نوع: %s). المتاح فعليًا في البنك: %d.',
                    $needed, $cell['unit_id'], $cell['level'], $cell['type'], $pool->count()
                ));
            }

            $selected = $selected->concat($chosen);
        }

        return $selected;
    }

    /**
     * "موازنة الظهور" (Exposure Balancing): بيرجع Map كامل [question_id => عدد مرات الظهور]
     * لهذا المستخدم عبر كل محاولاته السابقة (مش آخر N بس زي القديم) — عشان نضمن
     * تغطية كامل بنك الـ404 سؤال أسرع، بدل الاعتماد على عشوائية بحتة
     * (Coupon Collector's Problem بيقول العشوائية البحتة محتاجة ~49 محاولة
     * لتغطية البنك، والأولوية دي بتقلّلها لـ9-12 محاولة تقريبًا).
     *
     * بنحسبها Live من الداتابيز مش من عمود counter مخزّن، عشان تفضل دقيقة
     * 100% حتى لو session اتلغت أو فشلت في المنتصف.
     */
    private function getQuestionViewCounts(string $userId, string $gradedExamId): array
    {
        $sessionIds = GradedExamSession::where('user_id', $userId)
            ->where('graded_exam_id', $gradedExamId)
            ->pluck('id');

        if ($sessionIds->isEmpty()) {
            return [];
        }

        return GradedExamSessionQuestion::whereIn('session_id', $sessionIds)
            ->selectRaw('question_id, COUNT(*) as views')
            ->groupBy('question_id')
            ->pluck('views', 'question_id')
            ->map(fn ($v) => (int) $v)
            ->toArray();
    }

    // ============================================================
    // الخطوة 5: موازنة صح/خطأ (best-effort)
    // ============================================================
    private function balanceTrueFalseAnswers(string $gradedExamId, Collection $questions, GradedExamConstraintSetting $settings): Collection
    {
        $tfQuestions = $questions->filter(fn ($q) => $q->question_type === 'true_false');
        if ($tfQuestions->isEmpty()) {
            return $questions;
        }

        $trueCount = $tfQuestions->filter(fn ($q) => $q->options->firstWhere('is_correct', true)?->option_text_ar === 'True')->count();
        $total = $tfQuestions->count();
        $truePercentage = $total > 0 ? ($trueCount / $total) * 100 : 50;

        $attempts = 0;
        while (($truePercentage < 35 || $truePercentage > 65) && $attempts < self::MAX_BALANCE_ATTEMPTS) {
            $attempts++;

            $needMoreTrue = $truePercentage < 35;
            $swapOutValue = $needMoreTrue ? false : true;

            // ندور على سؤال صح/خطأ داخل نفس الاختيار الحالي نبدله بسؤال تاني من نفس الوحدة/المستوى بإجابة عكسية
            $candidate = $tfQuestions->first(function ($q) use ($swapOutValue) {
                $correctText = $q->options->firstWhere('is_correct', true)?->option_text_ar;
                return $swapOutValue ? $correctText === 'True' : $correctText === 'False';
            });

            if (!$candidate) break;

            $replacement = GradedExamQuestion::where('graded_exam_id', $gradedExamId)
                ->where('unit_id', $candidate->unit_id)
                ->where('level', $candidate->level)
                ->where('question_type', 'true_false')
                ->whereNotIn('id', $questions->pluck('id'))
                ->with('options')
                ->get()
                ->first(function ($q) use ($needMoreTrue) {
                    $correctText = $q->options->firstWhere('is_correct', true)?->option_text_ar;
                    return $needMoreTrue ? $correctText === 'True' : $correctText === 'False';
                });

            if (!$replacement) break; // مفيش بديل متاح - نكتفي بأقرب نسبة ممكنة

            $questions = $questions->reject(fn ($q) => $q->id === $candidate->id)->push($replacement);
            $tfQuestions = $questions->filter(fn ($q) => $q->question_type === 'true_false');
            $trueCount = $tfQuestions->filter(fn ($q) => $q->options->firstWhere('is_correct', true)?->option_text_ar === 'True')->count();
            $truePercentage = $tfQuestions->count() > 0 ? ($trueCount / $tfQuestions->count()) * 100 : 50;
        }

        return $questions->values();
    }

    // ============================================================
    // الخطوة 6: خلط ترتيب الخيارات لكل سؤال (يحل توازن مواقع الإجابة تلقائيًا)
    // ============================================================
    private function shuffleOptionsPerQuestion(Collection $questions, GradedExamConstraintSetting $settings): array
    {
        $map = [];
        foreach ($questions as $question) {
            $optionIds = $question->options->pluck('id')->shuffle()->values()->toArray();
            $map[$question->id] = $optionIds;
        }
        return $map;
    }

    // ============================================================
    // الخطوة 7: ترتيب الأسئلة النهائي + منع تجميع نفس الوحدة
    // ============================================================
    private function sequenceQuestions(Collection $questions, GradedExamConstraintSetting $settings): Collection
    {
        $shuffled = $questions->shuffle()->values();
        $maxConsecutive = $settings->max_consecutive_same_unit;

        $attempts = 0;
        while ($attempts < self::MAX_BALANCE_ATTEMPTS) {
            $violationIndex = null;
            $consecutive = 1;

            for ($i = 1; $i < $shuffled->count(); $i++) {
                if ($shuffled[$i]->unit_id === $shuffled[$i - 1]->unit_id) {
                    $consecutive++;
                    if ($consecutive > $maxConsecutive) {
                        $violationIndex = $i;
                        break;
                    }
                } else {
                    $consecutive = 1;
                }
            }

            if ($violationIndex === null) break; // مفيش تجميع زيادة عن المسموح

            // دوّر على أول سؤال بعده بوحدة مختلفة وبدّل مكانه
            $swapWith = null;
            for ($j = $violationIndex + 1; $j < $shuffled->count(); $j++) {
                if ($shuffled[$j]->unit_id !== $shuffled[$violationIndex - 1]->unit_id) {
                    $swapWith = $j;
                    break;
                }
            }

            if ($swapWith === null) break; // مفيش تبديل ممكن - نكتفي بالترتيب الحالي

            $tmp = $shuffled[$violationIndex];
            $shuffled[$violationIndex] = $shuffled[$swapWith];
            $shuffled[$swapWith] = $tmp;

            $attempts++;
        }

        return $shuffled;
    }

    // ============================================================
    // الخطوة 8: حفظ الجلسة وأسئلتها
    // ============================================================
    private function persistSession(GradedExam $exam, ?string $userId, Collection $orderedQuestions, array $shuffledMap, GradedExamConstraintSetting $settings): GradedExamSession
    {
        $session = GradedExamSession::create([
            'user_id' => $userId,
            'graded_exam_id' => $exam->id,
            'status' => 'in_progress',
            'total_questions' => $orderedQuestions->count(),
            'constraints_snapshot' => $settings->only([
                'total_questions', 'easy_percentage', 'medium_percentage', 'hard_percentage',
                'type_distribution_mode', 'mc_position_balance_mode',
                'max_multi_correct_questions', 'max_consecutive_same_answer', 'max_consecutive_same_unit',
            ]),
            'random_seed' => null,
            'started_at' => now(),
        ]);

        foreach ($orderedQuestions->values() as $position => $question) {
            GradedExamSessionQuestion::create([
                'session_id' => $session->id,
                'question_id' => $question->id,
                'position_in_exam' => $position + 1,
                'shuffled_options_order' => $shuffledMap[$question->id] ?? [],
            ]);
        }

        return $session->fresh(['sessionQuestions.question.options']);
    }

    // ============================================================
    // أدوات مساعدة
    // ============================================================
    private function defaultSettings(GradedExam $exam): GradedExamConstraintSetting
    {
        return GradedExamConstraintSetting::create([
            'graded_exam_id' => $exam->id,
            'total_questions' => 50,
            'easy_percentage' => 50,
            'medium_percentage' => 40,
            'hard_percentage' => 10,
        ]);
    }

    /**
     * تحقق مبدئي سريع قبل الدخول في التوليد الفعلي: هل الإعدادات ممكنة
     * أصلاً بناءً على المخزون الحالي؟ (يعيد استخدام منطق isFeasible()
     * الموجود في الـ Model نفسه لتفادي التكرار).
     */
    private function validateFeasibility(GradedExam $exam, GradedExamConstraintSetting $settings): void
    {
        $check = $settings->isFeasible();
        if (!$check['feasible']) {
            throw new \RuntimeException('إعدادات القيود غير قابلة للتحقيق: ' . implode(' | ', $check['errors']));
        }
    }
}
```

## File: app/Http/Controllers/AuthController.php
```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {}

    public function showLogin()
    {
        return response()
            ->view('auth.login')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

    public function login(\App\Http\Requests\LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            /** @var \App\Models\User $user */
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.graded_exams.index');
        }

        return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.']);
    }

    public function showRegister()
    {
        return response()
            ->view('auth.register')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = $this->userService->register($request->validated());

        Auth::login($user);

        return redirect()->route('user.graded_exams.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
```

## File: routes/web.php
```php
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
        return redirect()->route('user.graded_exams.index');
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
```

## File: app/Http/Controllers/User/UserGradedExamController.php
```php
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GradedExam;
use App\Models\GradedExamSession;
use App\Models\GradedExamUserAnswer;
use App\Models\GradedExamUserAnswerOption;
use App\Models\GradedExamResult;
use App\Services\GradedExamGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserGradedExamController extends Controller
{
    public function index()
    {
        $exams = GradedExam::where('is_active', true)->get();
        return view('user.graded_exams.index', compact('exams'));
    }

    /**
     * صفحة تأكيد بدء الاختبار (بيانات الاختبار + التعليمات + الموافقة).
     */
    public function intro(GradedExam $exam)
    {
        $exam->loadMissing('constraintSettings');

        $minutes = $exam->time_limit_min;
        if (!$minutes) {
            $timeText = 'غير محدد';
        } else {
            $hours = floor($minutes / 60);
            $mins = $minutes % 60;
            $parts = [];
            if ($hours > 0) $parts[] = $hours . ' ساعة';
            if ($mins > 0) $parts[] = $mins . ' دقيقة';
            $timeText = implode(' و', $parts);
        }

        return view('user.graded_exams.intro', compact('exam', 'timeText'));
    }

    public function progress()
    {
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login');
        }

        $sessions = GradedExamSession::where('user_id', $userId)
            ->where('status', 'completed')
            ->with(['result', 'gradedExam'])
            ->orderBy('completed_at', 'asc')
            ->get();

        $progressByExam = [];
        foreach ($sessions as $session) {
            $examId = $session->graded_exam_id;
            if (!isset($progressByExam[$examId])) {
                $progressByExam[$examId] = [
                    'exam_title' => $session->gradedExam->title_ar ?? 'اختبار غير معروف',
                    'labels' => [],
                    'data' => [],
                    'sessions' => []
                ];
            }
            
            $attemptNum = count($progressByExam[$examId]['labels']) + 1;
            $progressByExam[$examId]['labels'][] = "محاولة $attemptNum";
            $progressByExam[$examId]['data'][] = $session->result ? $session->result->percentage : 0;
            
            // Add session to history (prepend so newest is first in the table)
            array_unshift($progressByExam[$examId]['sessions'], $session);
        }

        return view('user.graded_exams.progress', compact('progressByExam'));
    }

    public function start(Request $request, GradedExam $exam, GradedExamGeneratorService $generator)
    {
        $userId = Auth::id();

        if ($userId) {
            $activeSession = GradedExamSession::where('user_id', $userId)
                ->where('graded_exam_id', $exam->id)
                ->where('status', 'in_progress')
                ->first();

            if ($activeSession) {
                return redirect()->route('user.graded_exams.show', $activeSession->id);
            }
        }

        try {
            $session = $generator->generate($exam, Auth::id());
            return redirect()->route('user.graded_exams.show', $session->id);
        } catch (\Exception $e) {
            // الرسالة الكاملة (بتفاصيل داخلية) اتسجلت بالفعل جوه GradedExamGeneratorService
            // نفسه بعد آخر محاولة فاشلة. هنا بنوري المستخدم رسالة نظيفة بس، من غير أي
            // تفاصيل تقنية داخلية زي UUID الوحدة.
            \Log::error('فشل بدء اختبار للمستخدم', [
                'graded_exam_id' => $exam->id,
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'تعذّر إعداد الاختبار حاليًا، برجاء المحاولة مرة أخرى بعد قليل.');
        }
    }

    public function show(GradedExamSession $session)
    {
        if ($session->user_id !== Auth::id()) {
            abort(403);
        }

        if ($session->status !== 'in_progress') {
            return redirect()->route('user.graded_exams.result', $session->id);
        }

        $session->load(['sessionQuestions.question.options' => function ($q) {
            $q->orderBy('order_index');
        }]);

        return view('user.graded_exams.show', compact('session'));
    }

    /**
     * تصحيح الإجابات فعليًا وحفظها + حساب النتيجة النهائية.
     *
     * صيغة الإدخال من الفورم:
     *   answers[{session_question_id}]   = option_id            (سؤال إجابة واحدة)
     *   answers[{session_question_id}][] = [option_id, option_id, ...]  (سؤال متعدد الإجابات)
     */
    public function answer(Request $request, GradedExamSession $session)
    {
        if ($session->user_id !== Auth::id()) abort(403);
        if ($session->status !== 'in_progress') return redirect()->route('user.graded_exams.result', $session->id);

        $submittedAnswers = $request->input('answers', []);

        $session->load(['sessionQuestions.question.options']);

        DB::transaction(function () use ($session, $submittedAnswers) {
            $totalPointsEarned = 0;
            $incorrectCount = 0; // Keeping this for legacy compatibility, though it might not be strictly counting 'incorrect questions' but rather 'lost points' or similar. We'll count a question as incorrect if points < 1.

            foreach ($session->sessionQuestions as $sq) {
                $question = $sq->question;

                // الخيارات اللي المستخدم اختارها لهذا السؤال (تدعم واحد أو أكتر)
                $raw = $submittedAnswers[$sq->id] ?? null;
                $selectedOptionIds = is_array($raw) ? array_values(array_filter($raw)) : array_filter([$raw]);

                // الخيارات الصحيحة فعليًا لهذا السؤال (من الداتابيز، مش من المستخدم)
                $correctOptionIds = $question->options
                    ->where('is_correct', true)
                    ->pluck('id')
                    ->map(fn ($id) => (string) $id)
                    ->toArray();
                
                $totalCorrectOptions = count($correctOptionIds);
                $pointsEarned = 0;
                $isCorrect = false;

                if ($totalCorrectOptions > 0) {
                    $correctSelected = 0;
                    $incorrectSelected = 0;

                    foreach ($selectedOptionIds as $selId) {
                        if (in_array((string)$selId, $correctOptionIds)) {
                            $correctSelected++;
                        } else {
                            $incorrectSelected++;
                        }
                    }

                    // Partial credit logic:
                    // Only count correctly selected options towards the score.
                    // We can subtract incorrect selected options if we want to penalize guessing, but standard request says:
                    // "كل إجابة صحيحة يختارها الطالب تدّيه نصيبها من الدرجة"
                    // If they select all options (including wrong ones), should they get full marks?
                    // To prevent guessing all, we typically subtract incorrect selections or just score = correct - incorrect.
                    // Let's implement: Max(0, (Correctly Selected - Incorrectly Selected)) / Total Correct
                    $netCorrect = max(0, $correctSelected - $incorrectSelected);
                    $pointsEarned = $netCorrect / $totalCorrectOptions;
                    
                    // Cap at 1 just in case
                    if ($pointsEarned > 1) {
                        $pointsEarned = 1;
                    }

                    $isCorrect = $pointsEarned == 1;
                }

                $userAnswer = GradedExamUserAnswer::create([
                    'session_id' => $session->id,
                    'question_id' => $question->id,
                    'is_correct' => $isCorrect,
                    'points_earned' => $pointsEarned,
                    'answered_at' => now(),
                ]);

                foreach ($selectedOptionIds as $optionId) {
                    GradedExamUserAnswerOption::create([
                        'user_answer_id' => $userAnswer->id,
                        'option_id' => $optionId,
                    ]);
                }

                $totalPointsEarned += $pointsEarned;
                if ($pointsEarned < 1) {
                    $incorrectCount++;
                }
            }

            $total = $session->sessionQuestions->count();
            $percentage = $total > 0 ? round(($totalPointsEarned / $total) * 100, 2) : 0;

            // حد النجاح الافتراضي 60%
            $passThreshold = 60;

            GradedExamResult::create([
                'session_id' => $session->id,
                'correct_count' => $totalPointsEarned, // This now stores points instead of raw count
                'incorrect_count' => $total - $totalPointsEarned, // Math consistency
                'total_questions' => $total,
                'percentage' => $percentage,
                'pass_status' => $percentage >= $passThreshold ? 'ناجح' : 'راسب',
                'calculated_at' => now(),
            ]);

            $session->update([
                'status' => 'completed',
                'completed_at' => now(),
            ]);
        });

        return redirect()->route('user.graded_exams.result', $session->id);
    }

    private function getPerformanceLevel($percentage)
    {
        if ($percentage >= 85) return ['name' => 'متميز', 'class' => 'text-success', 'bar_color' => 'bg-success'];
        if ($percentage >= 75) return ['name' => 'جيد جداً', 'class' => 'text-success', 'bar_color' => 'bg-success'];
        if ($percentage >= 70) return ['name' => 'جيد', 'class' => 'text-warning', 'bar_color' => 'bg-warning'];
        if ($percentage >= 60) return ['name' => 'يحتاج إلى مراجعة', 'class' => 'text-warning', 'bar_color' => 'bg-warning'];
        return ['name' => 'يحتاج إلى تطوير', 'class' => 'text-danger', 'bar_color' => 'bg-danger'];
    }

    private function getReadinessLevel($percentage)
    {
        if ($percentage >= 85) return 'متميز';
        if ($percentage >= 75) return 'جيد جداً';
        if ($percentage >= 70) return 'جيد';
        if ($percentage >= 60) return 'قريب من الجاهزية';
        return 'يحتاج إلى تطوير';
    }

    public function result(GradedExamSession $session)
    {
        if ($session->user_id !== Auth::id()) abort(403);

        $session->load([
            'result', 
            'gradedExam',
            'sessionQuestions.question.unit',
            'sessionQuestions.question.options',
            'userAnswers.selectedOptions' // To see what the user actually chose
        ]);

        $result = $session->result;
        
        $readinessLevel = null;
        $overallPerformance = null;
        $unitsStats = [];
        $highestUnit = null;
        $lowestUnit = null;
        
        if ($result) {
            $readinessLevel = $this->getReadinessLevel($result->percentage);
            $overallPerformance = $this->getPerformanceLevel($result->percentage);

            // Calculate unit breakdown
            $unitData = [];
            
            // Map user answers for quick access
            $userAnswersMap = $session->userAnswers->keyBy('question_id');

            foreach ($session->sessionQuestions as $sq) {
                $q = $sq->question;
                if (!$q || !$q->unit) continue;
                
                $unitId = $q->unit->id;
                if (!isset($unitData[$unitId])) {
                    $unitData[$unitId] = [
                        'name' => $q->unit->title_ar,
                        'total_questions' => 0,
                        'points_earned' => 0,
                    ];
                }

                $unitData[$unitId]['total_questions']++;
                
                $answer = $userAnswersMap->get($q->id);
                if ($answer) {
                    $unitData[$unitId]['points_earned'] += $answer->points_earned;
                }
            }

            foreach ($unitData as $id => $data) {
                $percentage = $data['total_questions'] > 0 
                    ? round(($data['points_earned'] / $data['total_questions']) * 100, 2) 
                    : 0;
                
                $performance = $this->getPerformanceLevel($percentage);

                $unitsStats[] = [
                    'name' => $data['name'],
                    'score' => $data['points_earned'],
                    'total' => $data['total_questions'],
                    'percentage' => $percentage,
                    'level_name' => $performance['name'],
                    'level_class' => $performance['class'],
                    'bar_color' => $performance['bar_color'],
                ];
            }

            // Sort descending by percentage
            usort($unitsStats, function($a, $b) {
                return $b['percentage'] <=> $a['percentage'];
            });

            if (count($unitsStats) > 0) {
                $maxPercentage = $unitsStats[0]['percentage'];
                $minPercentage = $unitsStats[count($unitsStats) - 1]['percentage'];

                $highestUnits = array_filter($unitsStats, fn($u) => $u['percentage'] == $maxPercentage);
                $lowestUnits = array_filter($unitsStats, fn($u) => $u['percentage'] == $minPercentage);

                $highestNames = array_column($highestUnits, 'name');
                $lowestNames = array_column($lowestUnits, 'name');

                $highestUnit = $unitsStats[0];
                $lowestUnit = $unitsStats[count($unitsStats) - 1];

                if (count($highestNames) > 1) {
                    $highestUnit['name'] = count($highestNames) <= 2 ? implode(' و ', $highestNames) : 'عدة وحدات (' . count($highestNames) . ')';
                }
                if (count($lowestNames) > 1) {
                    $lowestUnit['name'] = count($lowestNames) <= 2 ? implode(' و ', $lowestNames) : 'عدة وحدات (' . count($lowestNames) . ')';
                }
            }
        }

        // Prepare review data
        $reviewData = [];
        if ($result) {
            $userAnswersMap = $session->userAnswers->keyBy('question_id');
            
            foreach ($session->sessionQuestions as $index => $sq) {
                $q = $sq->question;
                $answer = $userAnswersMap->get($q->id);
                
                $selectedOptionIds = $answer ? $answer->selectedOptions->pluck('option_id')->toArray() : [];
                $correctOptions = $q->options->where('is_correct', true)->pluck('option_text_ar')->toArray();
                
                $reviewData[] = [
                    'index' => $index + 1,
                    'text' => $q->text_ar,
                    'unit_name' => $q->unit ? $q->unit->title_ar : '',
                    'is_correct' => $answer && $answer->points_earned == 1,
                    'points' => $answer ? $answer->points_earned : 0,
                    'selected_ids' => $selectedOptionIds,
                    'correct_options_text' => implode('، ', $correctOptions),
                    'explanation' => $q->explanation_ar ?: 'لا يوجد تفسير متاح لهذا السؤال',
                    'options' => $q->options
                ];
            }
        }

        return view('user.graded_exams.result', compact(
            'session', 'result', 'readinessLevel', 'overallPerformance', 'unitsStats', 'highestUnit', 'lowestUnit', 'reviewData'
        ));
    }
}
```
