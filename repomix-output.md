This file is a merged representation of a subset of the codebase, containing files not matching ignore patterns, combined into a single document by Repomix.

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
- Files matching these patterns are excluded: repomix-output.xml, repomix-output.md, repomix-migrations.md, database/data/**, database/seeders/**, database/database.sqlite, storage/**, composer.lock, package-lock.json, public/css/report-pdf.css, _ide_helper.php, .phpstorm.meta.php, _ide_helper_models.php, *backup*, *.txt
- Files matching patterns in .gitignore are excluded
- Files matching default ignore patterns are excluded
- Files are sorted by Git change count (files with more changes are at the bottom)

# Directory Structure
```
.editorconfig
.gitattributes
.gitignore
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
artisan
bootstrap/app.php
bootstrap/cache/.gitignore
bootstrap/providers.php
check_questions.php
check-seed.php
compare_qs.php
composer.json
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
database/.gitignore
database/factories/UserFactory.php
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
fix_typos.py
fix_unit12.py
get_current_qs.php
images/1.png
images/10.png
images/11.png
images/12.png
images/13.png
images/14.png
images/15.png
images/16.png
images/17.png
images/18.png
images/19.png
images/2.png
images/20.png
images/21.png
images/22.png
images/23.png
images/24.png
images/25.png
images/26.png
images/27.png
images/3.png
images/4.png
images/5.png
images/6.png
images/7.png
images/8.png
images/9.png
nixpacks.toml
package.json
phpstan.neon
phpunit.xml
Procfile
public/.htaccess
public/css/app.css
public/favicon.ico
public/images/dashboard/1.png
public/images/dashboard/10.png
public/images/dashboard/11.png
public/images/dashboard/12.png
public/images/dashboard/13.png
public/images/dashboard/14.png
public/images/dashboard/15.png
public/images/dashboard/16.png
public/images/dashboard/17.png
public/images/dashboard/1782916324_6a4524e4d5bdb.png
public/images/dashboard/1782990676_6a464754c7321.png
public/images/dashboard/1784449882_6a5c8b5aa75c0.jpeg
public/images/dashboard/1784449958_6a5c8ba66ba8a.jpeg
public/images/dashboard/18.png
public/images/dashboard/19.png
public/images/dashboard/2.png
public/images/dashboard/20.png
public/images/dashboard/21.png
public/images/dashboard/22.png
public/images/dashboard/23.png
public/images/dashboard/24.png
public/images/dashboard/25.png
public/images/dashboard/26.png
public/images/dashboard/27.png
public/images/dashboard/3.png
public/images/dashboard/4.png
public/images/dashboard/5.png
public/images/dashboard/6.png
public/images/dashboard/7.png
public/images/dashboard/8.png
public/images/dashboard/9.png
public/images/dashboard/assess_career_1782904682194.png
public/images/dashboard/assess_emotional_1782904669192.png
public/images/dashboard/assess_time_1782904695583.png
public/images/dashboard/default.png
public/images/dashboard/hero_banner_1782904656284.png
public/images/dashboard/hero_banner_new.jpg
public/images/dashboard/khaleeji_career_guidance_1782909792723.png
public/images/dashboard/khaleeji_communication_1782909834369.png
public/images/dashboard/khaleeji_emotional_intelligence_1782909783914.png
public/images/dashboard/khaleeji_innovation_1782909995331.png
public/images/dashboard/khaleeji_leadership_1782909826341.png
public/images/dashboard/khaleeji_personality_1782909817886.png
public/images/dashboard/khaleeji_problem_solving_1782909986298.png
public/images/dashboard/khaleeji_stress_management_1782910006048.png
public/images/dashboard/khaleeji_teamwork_1782909977067.png
public/images/dashboard/khaleeji_time_management_1782909803311.png
public/images/icons/1783771711_6a52323f613aa.png
public/images/icons/icon_1783783093_6a525eb51c3b0.png
public/images/icons/icon_adaptability_1783774397258.png
public/images/icons/icon_analytics_1783774390320.png
public/images/icons/icon_career_1783774257271.png
public/images/icons/icon_communication_1783774217744.png
public/images/icons/icon_creativity_1783774266259.png
public/images/icons/icon_emotional_intelligence_1783774210262.png
public/images/icons/icon_leadership_1783774201755.png
public/images/icons/icon_motivation_1783774364797.png
public/images/icons/icon_negotiation_1783774374293.png
public/images/icons/icon_planning_1783774241357.png
public/images/icons/icon_problem_solving_1783774233646.png
public/images/icons/icon_public_speaking_1783774382972.png
public/images/icons/icon_stress_1783774355669.png
public/images/icons/icon_teamwork_1783774249961.png
public/images/icons/icon_tech_1783774273048.png
public/images/icons/icon_time_management_1783774226905.png
public/images/logo_backup.png
public/images/logo_transparent.png
public/images/logo.png
public/images/Untitled - July 22, 2026 at 01.04.01.png
public/index.php
public/js/app.js
public/js/json-lists.js
public/robots.txt
README.md
repomix.config.json
resources/css/app.css
resources/js/app.js
resources/js/bootstrap.js
resources/views/admin/assessments/index.blade.php
resources/views/admin/assessments/show.blade.php
resources/views/admin/coupons/create.blade.php
resources/views/admin/coupons/edit.blade.php
resources/views/admin/coupons/index.blade.php
resources/views/admin/dashboard.blade.php
resources/views/admin/exams/create.blade.php
resources/views/admin/graded_exam_questions/index.blade.php
resources/views/admin/graded_exams/index.blade.php
resources/views/admin/graded_exams/preview.blade.php
resources/views/admin/icons/index.blade.php
resources/views/admin/questions/index.blade.php
resources/views/admin/recommendations/index.blade.php
resources/views/admin/settings/index.blade.php
resources/views/admin/statistics/index.blade.php
resources/views/admin/users/index.blade.php
resources/views/auth/login.blade.php
resources/views/auth/register.blade.php
resources/views/layouts/admin.blade.php
resources/views/layouts/user.blade.php
resources/views/user/coming-soon.blade.php
resources/views/user/dashboard.blade.php
resources/views/user/exam.blade.php
resources/views/user/graded_exams/index.blade.php
resources/views/user/graded_exams/intro.blade.php
resources/views/user/graded_exams/progress.blade.php
resources/views/user/graded_exams/result.blade.php
resources/views/user/graded_exams/show.blade.php
resources/views/user/result.blade.php
resources/views/user/selection.blade.php
routes/console.php
routes/web.php
start-container.sh
tests/Feature/Architecture/NoDirectBuilderDeleteTest.php
vite.config.js
```

# Files

## File: .editorconfig
````
root = true

[*]
charset = utf-8
end_of_line = lf
indent_size = 4
indent_style = space
insert_final_newline = true
trim_trailing_whitespace = true

[*.md]
trim_trailing_whitespace = false

[*.{yml,yaml}]
indent_size = 2

[compose.yaml]
indent_size = 4
````

## File: .gitattributes
````
* text=auto eol=lf

*.blade.php diff=html
*.css diff=css
*.html diff=html
*.md diff=markdown
*.php diff=php

/.github export-ignore
CHANGELOG.md export-ignore
.styleci.yml export-ignore
````

## File: .gitignore
````
*.log
.DS_Store
.env
.env.backup
.env.production
.phpactor.json
.phpunit.result.cache
/.fleet
/.idea
/.nova
/.phpunit.cache
/.vscode
/.zed
/auth.json
/node_modules
/public/build
/public/hot
/public/storage
/storage/*.key
/storage/pail
/vendor
Homestead.json
Homestead.yaml
Thumbs.db
````

## File: app/Http/Controllers/Admin/AnswerOptionController.php
````php
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
````

## File: app/Http/Controllers/Admin/DashboardController.php
````php
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
````

## File: app/Http/Controllers/Admin/RecommendationController.php
````php
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
````

## File: app/Http/Controllers/Admin/StatisticsController.php
````php
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
````

## File: app/Http/Controllers/Admin/UserController.php
````php
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
````

## File: app/Http/Controllers/Controller.php
````php
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
````

## File: app/Http/Middleware/AdminMiddleware.php
````php
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
````

## File: app/Http/Middleware/UserMiddleware.php
````php
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
````

## File: app/Http/Requests/Admin/StoreAssessmentRequest.php
````php
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
````

## File: app/Http/Requests/Admin/StoreDimensionRequest.php
````php
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
````

## File: app/Http/Requests/Admin/StoreInterpretationsRequest.php
````php
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
````

## File: app/Http/Requests/Admin/UpdateAssessmentRequest.php
````php
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
````

## File: app/Models/DimensionScore.php
````php
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
````

## File: app/Models/Icon.php
````php
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
````

## File: app/Models/Setting.php
````php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
}
````

## File: app/Models/UserAnswer.php
````php
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
````

## File: app/Providers/AppServiceProvider.php
````php
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
````

## File: app/Repositories/Contracts/AssessmentRepositoryInterface.php
````php
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
````

## File: app/Repositories/Contracts/DimensionRepositoryInterface.php
````php
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
````

## File: app/Repositories/Contracts/ExamSessionRepositoryInterface.php
````php
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
````

## File: app/Repositories/Contracts/QuestionRepositoryInterface.php
````php
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
````

## File: app/Repositories/Contracts/RecommendationRepositoryInterface.php
````php
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
````

## File: app/Repositories/DimensionRepository.php
````php
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
````

## File: app/Repositories/ExamSessionRepository.php
````php
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
````

## File: app/Repositories/RecommendationRepository.php
````php
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
````

## File: app/Services/AdminDashboardService.php
````php
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
````

## File: app/Services/AssessmentService.php
````php
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
````

## File: app/Services/DimensionService.php
````php
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
````

## File: app/Services/ExamService.php
````php
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
````

## File: app/Services/RecommendationService.php
````php
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
````

## File: app/Services/Result/DimensionInterpreter.php
````php
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
````

## File: app/Services/Result/ScoreCalculator.php
````php
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
````

## File: app/Services/UserDashboardService.php
````php
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
````

## File: artisan
````
#!/usr/bin/env php
<?php

use Illuminate\Foundation\Application;
use Symfony\Component\Console\Input\ArgvInput;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel and handle the command...
/** @var Application $app */
$app = require_once __DIR__.'/bootstrap/app.php';

$status = $app->handleCommand(new ArgvInput);

exit($status);
````

## File: bootstrap/app.php
````php
<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');

        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'user' => UserMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
````

## File: bootstrap/cache/.gitignore
````
*
!.gitignore
````

## File: bootstrap/providers.php
````php
<?php

use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
];
````

## File: config/app.php
````php
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
````

## File: config/auth.php
````php
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
````

## File: config/cache.php
````php
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
````

## File: config/database.php
````php
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
````

## File: config/filesystems.php
````php
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
````

## File: config/logging.php
````php
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
````

## File: config/mail.php
````php
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
````

## File: config/queue.php
````php
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
````

## File: config/services.php
````php
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
````

## File: config/session.php
````php
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
````

## File: database/.gitignore
````
*.sqlite*
````

## File: database/factories/UserFactory.php
````php
<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
````

## File: database/migrations/0001_01_01_000001_create_cache_table.php
````php
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
````

## File: database/migrations/0001_01_01_000002_create_jobs_table.php
````php
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
````

## File: database/migrations/2026_06_24_085954_add_performance_indexes_to_tables.php
````php
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
````

## File: database/migrations/2026_06_25_120000_add_is_reversed_to_questions_table.php
````php
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
````

## File: database/migrations/2026_07_01_122729_add_price_and_rating_to_assessments_table.php
````php
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
````

## File: database/migrations/2026_07_01_140449_add_image_url_to_assessments_table.php
````php
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
````

## File: database/migrations/2026_07_03_160643_add_subtitle_ar_to_assessments_table.php
````php
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
````

## File: database/migrations/2026_07_05_153443_create_settings_table.php
````php
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
````

## File: database/migrations/2026_07_05_161859_add_extra_discount_tiers_to_coupons_table.php
````php
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
````

## File: database/migrations/2026_07_05_225427_add_details_to_users_table.php
````php
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
````

## File: database/migrations/2026_07_06_005159_add_report_details_to_assessments_table.php
````php
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
````

## File: database/migrations/2026_07_10_164000_add_intro_and_outro_to_assessments_and_recommendations.php
````php
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
````

## File: database/migrations/2026_07_11_102607_move_report_details_to_recommendations.php
````php
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
````

## File: database/migrations/2026_07_11_104237_add_intro_texts_to_recommendations.php
````php
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
````

## File: database/migrations/2026_07_11_115159_create_icons_table.php
````php
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
````

## File: database/migrations/2026_07_11_132219_add_icon_to_assessments_table.php
````php
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
````

## File: database/migrations/2026_07_15_151418_add_report_code_to_assessments_table.php
````php
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
````

## File: nixpacks.toml
````toml
# nixpacks.toml configuration for Laravel deployment on Railway

[variables]
    DOCUMENT_ROOT = "/public"

[phases.build]
cmds = [
    "composer install --no-interaction --optimize-autoloader --no-dev",
    "npm install && npm run build"
]
````

## File: package.json
````json
{
    "$schema": "https://www.schemastore.org/package.json",
    "private": true,
    "type": "module",
    "scripts": {
        "build": "vite build",
        "dev": "vite"
    },
    "devDependencies": {
        "@tailwindcss/vite": "^4.0.0",
        "axios": "^1.11.0",
        "concurrently": "^9.0.1",
        "laravel-vite-plugin": "^2.0.0",
        "tailwindcss": "^4.0.0",
        "vite": "^7.0.7"
    }
}
````

## File: phpunit.xml
````xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/phpunit/phpunit/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         colors="true"
>
    <testsuites>
        <testsuite name="Unit">
            <directory>tests/Unit</directory>
        </testsuite>
        <testsuite name="Feature">
            <directory>tests/Feature</directory>
        </testsuite>
    </testsuites>
    <source>
        <include>
            <directory>app</directory>
        </include>
    </source>
    <php>
        <env name="APP_ENV" value="testing"/>
        <env name="APP_MAINTENANCE_DRIVER" value="file"/>
        <env name="BCRYPT_ROUNDS" value="4"/>
        <env name="BROADCAST_CONNECTION" value="null"/>
        <env name="CACHE_STORE" value="array"/>
        <env name="DB_CONNECTION" value="sqlite"/>
        <env name="DB_DATABASE" value=":memory:"/>
        <env name="DB_URL" value=""/>
        <env name="MAIL_MAILER" value="array"/>
        <env name="QUEUE_CONNECTION" value="sync"/>
        <env name="SESSION_DRIVER" value="array"/>
        <env name="PULSE_ENABLED" value="false"/>
        <env name="TELESCOPE_ENABLED" value="false"/>
        <env name="NIGHTWATCH_ENABLED" value="false"/>
    </php>
</phpunit>
````

## File: public/.htaccess
````
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Handle X-XSRF-Token Header
    RewriteCond %{HTTP:x-xsrf-token} .
    RewriteRule .* - [E=HTTP_X_XSRF_TOKEN:%{HTTP:X-XSRF-Token}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
````

## File: public/css/app.css
````css
/* ============================================
   Dar Alroaya Exam System — Global Styles
   ============================================ */

:root {
    --font-ar: 'Noto Kufi Arabic', sans-serif;
}

*, body {
    font-family: var(--font-ar) !important;
}

/* Smooth transitions */
.transition-all { transition: all .3s ease; }

/* Card hover lift */
.card {
    transition: box-shadow .2s ease;
}
.card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,.08) !important;
}

/* Custom scrollbar */
::-webkit-scrollbar { width: 6px; height: 6px; }
::-webkit-scrollbar-track { background: #f1f3f5; }
::-webkit-scrollbar-thumb { background: #adb5bd; border-radius: 3px; }
::-webkit-scrollbar-thumb:hover { background: #6c757d; }

/* Badge subtle variants (Bootstrap 5.3 polyfill) */
.bg-success-subtle { background-color: #d1e7dd !important; }
.bg-warning-subtle { background-color: #fff3cd !important; }
.bg-danger-subtle  { background-color: #f8d7da !important; }
.bg-primary-subtle { background-color: #cfe2ff !important; }
.bg-secondary-subtle { background-color: #e2e3e5 !important; }

/* Progress bar animation */
.progress-bar { transition: width 0.8s ease; }

/* Alert container flash */
#alert-container .alert {
    animation: slideDown .3s ease;
}
@keyframes slideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Exam page specific */
.option-card {
    cursor: pointer;
    border: 2px solid #dee2e6;
    border-radius: 12px;
    transition: all .2s ease;
    padding: 14px 16px;
}
.option-card:hover {
    border-color: #0d6efd;
    background: #f0f5ff;
    transform: translateX(-3px);
}
.option-card.selected {
    border-color: #0d6efd;
    background: #e8f0fe;
}

/* Sidebar active glow */
.sidebar .nav-link.active {
    box-shadow: 0 2px 10px rgba(13,110,253,.3);
}

/* Table improvements */
.table th {
    font-weight: 600;
    font-size: .875rem;
    color: #495057;
}

/* Form label */
.form-label {
    color: #495057;
    margin-bottom: .4rem;
}

/* Print styles */
@media print {
    .navbar, .footer, .no-print, .sidebar, .topbar { display: none !important; }
    .card { break-inside: avoid; }
    body { background: #fff !important; }
}
````

## File: public/index.php
````php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
````

## File: public/js/app.js
````javascript
/**
 * Dar Alroaya Exam System — Global JS Helpers
 */

$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

/**
 * Show a dismissible alert in #alert-container
 */
function showAlert(message, type = 'info') {
    const icons = { success: 'check-circle', danger: 'exclamation-triangle', warning: 'exclamation-circle', info: 'info-circle' };
    const icon  = icons[type] || 'info-circle';
    const html  = `
        <div class="alert alert-${type} alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-${icon} me-2"></i>${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;
    $('#alert-container').html(html);
    // Auto-dismiss after 4s
    setTimeout(() => $('#alert-container .alert').alert('close'), 4000);
}

/**
 * Toggle loading state on a button
 */
function setLoading(btn, loading) {
    const spinner = btn.find('.spinner-border');
    const text    = btn.find('.btn-text');
    if (loading) {
        btn.prop('disabled', true);
        text.addClass('d-none');
        spinner.removeClass('d-none');
    } else {
        btn.prop('disabled', false);
        text.removeClass('d-none');
        spinner.addClass('d-none');
    }
}

/**
 * Confirm delete using the shared modal
 */
let _deleteCallback = null;
let _deleteUrl      = null;

function confirmDelete(message, url, onSuccess) {
    _deleteUrl      = url;
    _deleteCallback = onSuccess;
    $('#confirmDeleteMessage').text(message);
    new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
}

$(document).on('click', '#confirmDeleteBtn', function() {
    if (!_deleteUrl) return;
    const btn = $(this);
    btn.prop('disabled', true).text('جاري الحذف...');

    $.ajax({
        url: _deleteUrl,
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal')).hide();
            showAlert(res.message || 'تم الحذف بنجاح.', 'success');
            btn.prop('disabled', false).text('حذف');
            if (typeof _deleteCallback === 'function') _deleteCallback();
        },
        error: function(xhr) {
            showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء الحذف.', 'danger');
            btn.prop('disabled', false).text('حذف');
        }
    });
});
````

## File: public/js/json-lists.js
````javascript
$(document).ready(function() {
    function initJsonList($textarea, fields) {
        $textarea.addClass('d-none json-list-initialized');
        
        const $wrapper = $('<div class="json-list-wrapper border rounded p-3 mb-2 bg-light-subtle"></div>');
        const $list = $('<div class="json-list-items mb-3"></div>');
        
        // Build input form based on fields
        let inputsHtml = '<div class="row g-2 align-items-end"><div class="col-md-12 fw-bold text-muted small mb-1">إضافة عنصر جديد</div>';
        fields.forEach(f => {
            let width = f.width || 'col';
            if (f.type === 'select') {
                let options = f.options.map(o => `<option value="${o.value}">${o.label}</option>`).join('');
                inputsHtml += `<div class="${width}"><label class="small text-muted">${f.label}</label><select class="form-select form-select-sm" data-key="${f.key}">${options}</select></div>`;
            } else {
                inputsHtml += `<div class="${width}"><label class="small text-muted">${f.label}</label><input type="text" class="form-control form-control-sm" data-key="${f.key}" placeholder="${f.placeholder}"></div>`;
            }
        });
        inputsHtml += `<div class="col-auto"><button type="button" class="btn btn-sm btn-primary json-list-add"><i class="bi bi-plus"></i> إضافة</button></div></div>`;
        
        const $inputGroup = $(inputsHtml);
        $wrapper.append($list).append($inputGroup);
        $textarea.after($wrapper);
        
        function normalizeItem(item) {
            if (typeof item === 'string') {
                const normalized = {};
                const hasTitle = fields.some(f => f.key === 'title');
                fields.forEach(f => {
                    if (f.key === 'title') {
                        normalized[f.key] = item;
                    } else if (!hasTitle && f.key === fields[0].key) {
                        normalized[f.key] = item;
                    } else {
                        normalized[f.key] = f.type === 'select' ? (f.options[0]?.value || '') : '';
                    }
                });
                return normalized;
            }
            return item;
        }

        // Load initial data
        let initialData = [];
        try {
            const val = $textarea.val().trim();
            if (val) {
                initialData = JSON.parse(val);
                if (!Array.isArray(initialData)) initialData = [];
            }
        } catch(e) {
            console.error('Failed to parse JSON', e);
        }
        
        initialData.forEach(item => {
            addItem(normalizeItem(item));
        });
        
        function updateTextarea() {
            const currentItems = [];
            $list.find('.json-list-item').each(function() {
                currentItems.push($(this).data('item'));
            });
            $textarea.val(JSON.stringify(currentItems));
        }
        
        function createItemRow(item) {
            let displayHtml = '';
            fields.forEach(f => {
                if (item[f.key]) {
                    if (f.key === 'icon' && (item[f.key].startsWith('http') || item[f.key].startsWith('/'))) {
                        displayHtml += `<div class="me-3"><strong>${f.label}:</strong> <img src="${item[f.key]}" width="20" height="20" class="rounded"></div>`;
                    } else if (f.key === 'icon' && item[f.key].startsWith('bi-')) {
                        displayHtml += `<div class="me-3"><strong>${f.label}:</strong> <i class="bi ${item[f.key]}"></i></div>`;
                    } else {
                        displayHtml += `<div class="me-3"><strong>${f.label}:</strong> ${item[f.key]}</div>`;
                    }
                }
            });
            
            const $itemRow = $(`
                <div class="json-list-item d-flex justify-content-between align-items-center bg-white border shadow-sm rounded px-3 py-2 mb-2">
                    <div class="d-flex flex-wrap small text-dark">${displayHtml}</div>
                    <div>
                        <button type="button" class="btn btn-sm text-primary btn-edit-item py-0 px-2 border-0" title="تعديل"><i class="bi bi-pencil"></i></button>
                        <button type="button" class="btn btn-sm text-danger btn-remove-item py-0 px-2 border-0" title="حذف"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            `);
            $itemRow.data('item', item);
            return $itemRow;
        }

        function addItem(item) {
            // Validate at least one field has content
            if (!fields.some(f => item[f.key] && item[f.key].toString().trim() !== '')) return;
            $list.append(createItemRow(item));
        }

        
        // Add/Save event
        $inputGroup.find('.json-list-add').on('click', function() {
            const newItem = {};
            let hasData = false;
            fields.forEach(f => {
                const val = $inputGroup.find(`[data-key="${f.key}"]`).val().trim();
                newItem[f.key] = val;
                if (val) hasData = true;
            });
            
            if (hasData) {
                const $editingRow = $inputGroup.data('editing-row');
                
                if ($editingRow) {
                    $editingRow.replaceWith(createItemRow(newItem));
                    $inputGroup.removeData('editing-row');
                    $(this).html('<i class="bi bi-plus"></i> إضافة').removeClass('btn-success').addClass('btn-primary');
                } else {
                    addItem(newItem);
                }
                
                updateTextarea();
                fields.forEach(f => {
                    if (f.type !== 'select') {
                        $inputGroup.find(`[data-key="${f.key}"]`).val('');
                    }
                });
                $inputGroup.find(`input`).first().focus();
            }
        });

        
        // Remove event
        $list.on('click', '.btn-remove-item', function() {
            $(this).closest('.json-list-item').remove();
            
            // If deleting the currently edited row, reset the form
            if ($inputGroup.data('editing-row') && $inputGroup.data('editing-row').is($(this).closest('.json-list-item'))) {
                $inputGroup.removeData('editing-row');
                $inputGroup.find('.json-list-add').html('<i class="bi bi-plus"></i> إضافة').removeClass('btn-success').addClass('btn-primary');
                fields.forEach(f => { if (f.type !== 'select') $inputGroup.find(`[data-key="${f.key}"]`).val(''); });
            }
            
            updateTextarea();
        });
        
        // Edit event
        $list.on('click', '.btn-edit-item', function() {
            const $row = $(this).closest('.json-list-item');
            const item = $row.data('item');
            
            fields.forEach(f => {
                $inputGroup.find(`[data-key="${f.key}"]`).val(item[f.key] || '');
            });
            
            $inputGroup.data('editing-row', $row);
            $inputGroup.find('.json-list-add').html('<i class="bi bi-check-circle"></i> حفظ التعديل').removeClass('btn-primary').addClass('btn-success');
        });
        
        // Provide clear function attached to textarea
        $textarea.data('clearItems', function(newVal = null) {
            $list.empty();
            if (newVal) {
                try {
                    const parsed = JSON.parse(newVal);
                    if (Array.isArray(parsed)) {
                        parsed.forEach(i => addItem(normalizeItem(i)));
                    }
                } catch(e){}
            }
            updateTextarea();
        });
    }

    // Build options from APP_ICONS
    function getIconOptions(category, defaultOptions) {
        if (window.APP_ICONS && window.APP_ICONS[category]) {
            return window.APP_ICONS[category].map(icon => ({
                value: icon.icon_url,
                label: icon.name
            }));
        }
        return defaultOptions;
    }

    window.initAllJsonLists = function(container = document) {
        // Initialize specific textareas
        // 1. Certificates
        $(container).find('.json-certificates-data').not('.json-list-initialized').each(function() {
            initJsonList($(this), [
                { key: 'title', label: 'الشهادة', type: 'text', placeholder: 'مثال: PMP', width: 'col-md-4' },
                { key: 'subtitle', label: 'الوصف', type: 'text', placeholder: 'مثال: إدارة المشاريع', width: 'col-md-5' },
                { key: 'icon', label: 'الأيقونة', type: 'select', width: 'col-md-3', options: getIconOptions('certificates', [
                    { value: 'blue-hexagon', label: 'سداسي أزرق (افتراضي)' }
                ])}
            ]);
        });

        // 2. Programs
        $(container).find('.json-programs-data').not('.json-list-initialized').each(function() {
            initJsonList($(this), [
                { key: 'title', label: 'اسم البرنامج', type: 'text', placeholder: 'مثال: قيادة الفرق', width: 'col-md-7' },
                { key: 'icon', label: 'الأيقونة', type: 'select', width: 'col-md-4', options: getIconOptions('programs', [
                    { value: 'bi-journal-bookmark', label: 'كتاب (افتراضي)' }
                ])}
            ]);
        });

        // 3. Plan 30 Days
        $(container).find('.json-plan-data').not('.json-list-initialized').each(function() {
            initJsonList($(this), [
                { key: 'period', label: 'الفترة', type: 'text', placeholder: 'مثال: الأسبوع الأول', width: 'col-md-3' },
                { key: 'title', label: 'الخطوة/المهمة', type: 'text', placeholder: 'مثال: تحديد الأولويات', width: 'col-md-5' },
                { key: 'icon', label: 'الأيقونة', type: 'select', width: 'col-md-3', options: getIconOptions('plan_30_days', [
                    { value: 'bi-calendar-check', label: 'تقويم (افتراضي)' }
                ])}
            ]);
        });
    };

    // Run on document load
    window.initAllJsonLists();
});
````

## File: public/robots.txt
````
User-agent: *
Disallow:
````

## File: README.md
````markdown
<div align="center">
  <h1 align="center">نظام المقاييس والاختبارات المهنية</h1>
  <p align="center">
    <strong>نظام متكامل واحترافي لإدارة المقاييس والاختبارات النفسية والمهنية</strong>
    <br />
    <br />
    <a href="#المميزات-الرئيسية">المميزات</a>
    ·
    <a href="#التقنيات-المستخدمة">التقنيات</a>
    ·
    <a href="#التثبيت-والتشغيل">التشغيل</a>
  </p>
</div>

<hr />

## 🌟 نبذة عن المشروع
**نظام المقاييس والاختبارات المهنية** هو منصة ويب متطورة مبنية باستخدام إطار عمل Laravel. تهدف المنصة إلى توفير بيئة متكاملة للمؤسسات والأفراد لإدارة وإجراء المقاييس والاختبارات (النفسية، المهنية، وغيرها) بمرونة عالية، مع تقديم تقارير تفصيلية ورسومات بيانية تحليلية دقيقة للمستخدمين.

## ✨ المميزات الرئيسية
### 👨‍💼 لوحة تحكم الإدارة (Admin Dashboard)
- **إدارة ديناميكية للمقاييس:** إضافة، تعديل، وحذف المقاييس بكل سهولة (اسم، وصف، صورة، مدة زمنية، سعر).
- **بناء المقاييس بمرونة:** تقسيم المقياس إلى عدة أبعاد (Dimensions) وإضافة أسئلة لكل بعد مع تحديد خيارات الإجابات وأوزانها.
- **التفسير الذكي للنتائج:** إضافة تفسيرات مخصصة لكل بعد بناءً على المستوى (مرتفع، متوسط، منخفض) وتحديد نقاط القوة وجوانب التطوير.
- **نظام الكوبونات والتخفيضات:** إنشاء كوبونات خصم أو وصول مجاني للمقاييس وتحديد عدد الاستخدامات المسموحة وتواريخ الانتهاء.
- **إحصائيات متقدمة:** واجهة رسومية توضح المبيعات، أعداد المستخدمين، المقاييس الأكثر استخداماً، وتحليلات تفصيلية للأداء.

### 👤 بوابة المستخدم (User Portal)
- **تصميم عصري (UI/UX):** واجهة مستخدم احترافية وسريعة الاستجابة على جميع الأجهزة (Mobile Friendly).
- **التخزين المؤقت الذكي (Smart Caching):** أداء فائق السرعة عبر نظام Caching يعتمد على التحديث اللحظي للبيانات.
- **إجراء المقاييس والتوقف المؤقت:** إمكانية بدء المقياس، التوقف في أي وقت، واستئناف الحل لاحقاً دون فقدان البيانات.
- **نظام الدفع والكوبونات:** شاشة منبثقة (Modal) احترافية تتيح للمستخدم إدخال كوبون مجاني أو التوجه للدفع الإلكتروني للحصول على المقياس.
- **تقارير نتائج احترافية:**
  - عرض النتيجة النهائية كنسبة مئوية مع تقييم المستوى.
  - رسم بياني شبكي (Radar Chart) ديناميكي يوضح درجات جميع الأبعاد بحلقات متدرجة.
  - تحليل مفصل لنقاط القوة والضعف (Areas of Improvement) بناءً على درجات المستخدم.

## 🛠️ التقنيات المستخدمة
- **الواجهة الخلفية (Backend):** PHP 8.x, Laravel 11.x
- **قواعد البيانات:** MySQL
- **الواجهة الأمامية (Frontend):** Blade Templates, HTML5, CSS3, Vanilla JavaScript, Bootstrap 5
- **الرسوم البيانية (Charts):** Chart.js
- **الأيقونات (Icons):** Bootstrap Icons
- **معايير الكود:** PSR-12, Laravel Pint (لضمان نظافة الكود Clean Code)

## 🚀 التثبيت والتشغيل
اتبع الخطوات التالية لتشغيل المشروع على بيئتك المحلية:

1. **استنساخ المستودع (Clone):**
   ```bash
   git clone https://github.com/Ahmedsayed732004444/Examinations-Department.git
   cd Examinations-Department
   ```

2. **تثبيت الحزم (Dependencies):**
   ```bash
   composer install
   npm install
   npm run build
   ```

3. **إعداد البيئة:**
   قم بنسخ ملف `.env.example` إلى `.env` وقم بإعداد اتصال قاعدة البيانات الخاصة بك.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **تجهيز قاعدة البيانات (Migrations & Seeding):**
   ```bash
   php artisan migrate --seed
   ```
   *(ملاحظة: يقوم الـ Seeder بإضافة بيانات تجريبية وحسابات مدير لتتمكن من تجربة النظام فوراً)*

5. **ربط مجلد الصور:**
   ```bash
   php artisan storage:link
   ```

6. **تشغيل الخادم المحلي:**
   ```bash
   php artisan serve
   ```
   يمكنك الآن زيارة الموقع عبر الرابط `http://localhost:8000`

## 🔒 الصلاحيات والوصول
- للوصول إلى لوحة الإدارة، يتم استخدام مسارات `admin/` المحمية بـ `AdminMiddleware`.
- بوابة المستخدمين تعمل عبر المسارات الأساسية محمية بـ `UserMiddleware`.

<hr />

<div align="center">
  <sub>تم تطوير هذا النظام باحترافية عالية لتقديم تجربة تقييم مميزة وسلسة.</sub>
</div>
````

## File: resources/css/app.css
````css
@import 'tailwindcss';

@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';
@source '../**/*.blade.php';
@source '../**/*.js';

@theme {
    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
        'Segoe UI Symbol', 'Noto Color Emoji';
}
````

## File: resources/js/app.js
````javascript
import './bootstrap';
````

## File: resources/js/bootstrap.js
````javascript
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
````

## File: resources/views/admin/assessments/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'إدارة المقاييس')
@section('page-title', 'إدارة المقاييس')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="text-muted small">إجمالي: {{ $assessments->total() }} مقياس</div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assessmentModal">
        <i class="bi bi-plus-circle me-1"></i>إضافة مقياس جديد
    </button>
</div>

<!-- Filter Section -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="{{ route('admin.assessments.index') }}" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label small fw-semibold text-muted">البحث</label>
                <input type="text" name="search" class="form-control form-control-sm" placeholder="ابحث باسم المقياس..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold text-muted">تصفية حسب المحور</label>
                <select name="category" class="form-select form-select-sm">
                    <option value="">جميع المحاور</option>
                    <option value="مقاييس التوجيه والتوافق المهني" {{ request('category') == 'مقاييس التوجيه والتوافق المهني' ? 'selected' : '' }}>مقاييس التوجيه والتوافق المهني</option>
                    <option value="الذات والشحصيه" {{ request('category') == 'الذات والشحصيه' ? 'selected' : '' }}>الذات والشخصية</option>
                    <option value="الكفاءة الشخصية والنجاح المهني" {{ request('category') == 'الكفاءة الشخصية والنجاح المهني' ? 'selected' : '' }}>الكفاءة الشخصية والنجاح المهني</option>
                    <option value="مقاييس الاتصال والعلاقات المهنية" {{ request('category') == 'مقاييس الاتصال والعلاقات المهنية' ? 'selected' : '' }}>مقاييس الاتصال والعلاقات المهنية</option>
                    <option value="مقاييس الصحةاملهنية" {{ request('category') == 'مقاييس الصحةاملهنية' ? 'selected' : '' }}>مقاييس الصحة المهنية</option>
                    <option value="مقاييس القيادة والإدارة" {{ request('category') == 'مقاييس القيادة والإدارة' ? 'selected' : '' }}>مقاييس القيادة والإدارة</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-sm px-4">تصفية</button>
                @if(request('search') || request('category'))
                    <a href="{{ route('admin.assessments.index') }}" class="btn btn-outline-secondary btn-sm ms-2">إلغاء</a>
                @endif
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>اسم المقياس</th>
                    <th>المحور</th>
                    <th>الأبعاد</th>
                    <th>الأسئلة</th>
                    <th>الوقت</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody id="assessments-tbody">
                @forelse($assessments as $a)
                <tr data-id="{{ $a->id }}">
                    <td class="fw-medium">{{ $a->title_ar }}</td>
                    <td class="text-muted small">{{ $a->category }}</td>
                    <td>{{ $a->dimensions_count }}</td>
                    <td>{{ $a->questions_count }}</td>
                    <td>{{ $a->time_limit_min ? $a->time_limit_min.' د' : 'بلا حد' }}</td>
                    <td>
                        @if($a->is_active)
                            <span class="badge bg-success-subtle text-success border border-success-subtle">مفعّل</span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">موقوف</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-outline-secondary btn-toggle"
                                    data-id="{{ $a->id }}"
                                    data-url="{{ route('admin.assessments.toggle', $a->id) }}"
                                    title="{{ $a->is_active ? 'إيقاف' : 'تفعيل' }}">
                                <i class="bi {{ $a->is_active ? 'bi-pause-circle' : 'bi-play-circle' }}"></i>
                            </button>
                            <a href="{{ route('admin.assessments.show', $a->id) }}"
                                class="btn btn-sm btn-outline-primary" title="عرض وتعديل المقياس">
                                <i class="bi bi-list-ul"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-danger btn-delete"
                                    data-id="{{ $a->id }}"
                                    data-url="{{ route('admin.assessments.destroy', $a->id) }}"
                                    data-name="{{ $a->title_ar }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">لا توجد مقاييس بعد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-transparent border-0">
        {{ $assessments->links() }}
    </div>
</div>

<!-- Assessment Modal -->
<div class="modal fade" id="assessmentModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إضافة مقياس جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="assessment-form-errors" class="alert alert-danger d-none"></div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">اسم المقياس *</label>
                        <input type="text" class="form-control" id="f-title_ar" placeholder="مثال: مقياس معرفة الذات">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">العنوان الجذاب (وصف قصير)</label>
                        <input type="text" class="form-control" id="f-subtitle_ar" placeholder="مثال: افهم ذاتك بعمق واكتشف نقاط قوتك">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label small fw-medium">المحور / الفئة *</label>
                        <input type="text" class="form-control" id="f-category"
                               list="category-datalist"
                               placeholder="اختر من القائمة أو اكتب مجالاً جديداً">
                        <datalist id="category-datalist">
                            <option value="مقاييس معرفة الذات والشخصية">
                            <option value="مقاييس الكفاءة الشخصية والنجاح المهني">
                            <option value="مقاييس الاتصال والعلاقات المهنية">
                            <option value="مقاييس القيادة والإدارة">
                            <option value="مقاييس التوجيه والتوافق المهني">
                            <option value="مقاييس الصحة المهنية">
                        </datalist>
                        <div class="d-flex flex-wrap gap-1 mt-2">
                            @foreach([
                                'مقاييس معرفة الذات والشخصية',
                                'مقاييس الكفاءة الشخصية والنجاح المهني',
                                'مقاييس الاتصال والعلاقات المهنية',
                                'مقاييس القيادة والإدارة',
                                'مقاييس التوجيه والتوافق المهني',
                                'مقاييس الصحة المهنية',
                            ] as $cat)
                            <span class="badge bg-light text-muted border small py-1 px-2"
                                  style="cursor:pointer"
                                  onclick="document.getElementById('f-category').value='{{ $cat }}'">
                                {{ $cat }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الوصف</label>
                        <textarea class="form-control" id="f-description_ar" rows="2"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">صورة المقياس</label>
                        <input type="file" class="form-control" id="f-image" accept="image/*">
                        <div class="form-text" style="font-size:0.65rem;">اختياري: سيتم عرض صورة افتراضية إن لم تقم برفع صورة.</div>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">وقت الاختبار (دقائق)</label>
                        <input type="number" class="form-control" id="f-time_limit_min" placeholder="بلا حد" min="1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">سعر المقياس (ر.س)</label>
                        <input type="number" class="form-control" id="f-price" placeholder="مثال: 149" step="0.01" min="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">التقييم الابتدائي (1-5)</label>
                        <input type="number" class="form-control" id="f-rating" placeholder="مثال: 4.8" step="0.1" min="1" max="5">
                    </div>
                    <div class="col-12"><hr class="my-2"></div>
                    <div class="col-12 text-primary fw-bold mb-0">بيانات التقرير المتقدمة (اختياري)</div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">الشهادات الاحترافية المناسبة</label>
                        <textarea class="form-control" id="f-certificates_ar" rows="2" placeholder="شهادة 1، شهادة 2..."></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">البرامج التدريبية المقترحة</label>
                        <textarea class="form-control" id="f-programs_ar" rows="2" placeholder="دورة 1، دورة 2..."></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">خطة تطوير (30 يوماً)</label>
                        <textarea class="form-control" id="f-plan_30_days_ar" rows="2" placeholder="الأسبوع 1: ..."></textarea>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-semibold mb-0">الأبعاد الفرعية</h6>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="btn-add-dimension">
                        <i class="bi bi-plus-circle me-1"></i>إضافة بُعد
                    </button>
                </div>
                <div id="dimensions-container"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-assessment">
                    <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ المقياس</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let dimIndex = 0;

function addDimensionRow(name='', max='') {
    const idx = dimIndex++;
    $('#dimensions-container').append(`
        <div class="row g-2 mb-2 dim-row" data-index="${idx}">
            <div class="col-7">
                <input type="text" class="form-control form-control-sm" placeholder="اسم البُعد مثلاً: الوعي بالذات"
                    name="dim_name_${idx}" value="${name}">
            </div>
            <div class="col-3">
                <input type="number" class="form-control form-control-sm" placeholder="الدرجة القصوى"
                    name="dim_max_${idx}" value="${max}" min="1">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-sm btn-outline-danger w-100 btn-remove-dim">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `);
}

// Init with one empty row
addDimensionRow();

$('#btn-add-dimension').on('click', () => addDimensionRow());

$(document).on('click', '.btn-remove-dim', function() {
    $(this).closest('.dim-row').remove();
});

$('#btn-save-assessment').on('click', function() {
    const btn = $(this);
    const dims = [];
    let valid = true;

    $('.dim-row').each(function() {
        const idx = $(this).data('index');
        const name = $(this).find(`[name=dim_name_${idx}]`).val().trim();
        const max  = parseInt($(this).find(`[name=dim_max_${idx}]`).val());
        if (name && max > 0) {
            dims.push({ name_ar: name, max_score: max });
        } else if (name || !isNaN(max)) {
            valid = false;
        }
    });

    if (!valid) {
        showAlert('تأكد من ملء جميع بيانات الأبعاد بشكل صحيح.', 'warning');
        return;
    }

    if (!$('#f-title_ar').val().trim() || !$('#f-category').val().trim()) {
        showAlert('اسم المقياس والمحور مطلوبان.', 'warning');
        return;
    }

    const formData = new FormData();
    formData.append('title_ar', $('#f-title_ar').val().trim());
    formData.append('subtitle_ar', $('#f-subtitle_ar').val().trim());
    formData.append('category', $('#f-category').val().trim());
    
    if ($('#f-description_ar').val().trim()) formData.append('description_ar', $('#f-description_ar').val().trim());
    if ($('#f-time_limit_min').val()) formData.append('time_limit_min', $('#f-time_limit_min').val());
    if ($('#f-price').val()) formData.append('price', $('#f-price').val());
    if ($('#f-rating').val()) formData.append('rating', $('#f-rating').val());
    if ($('#f-certificates_ar').val().trim()) formData.append('certificates_ar', $('#f-certificates_ar').val().trim());
    if ($('#f-programs_ar').val().trim()) formData.append('programs_ar', $('#f-programs_ar').val().trim());
    if ($('#f-plan_30_days_ar').val().trim()) formData.append('plan_30_days_ar', $('#f-plan_30_days_ar').val().trim());
    
    if ($('#f-image')[0].files.length > 0) {
        formData.append('image', $('#f-image')[0].files[0]);
    }

    dims.forEach((d, i) => {
        formData.append(`dimensions[${i}][name_ar]`, d.name_ar);
        formData.append(`dimensions[${i}][max_score]`, d.max_score);
    });

    setLoading(btn, true);
    $.ajax({
        url: '{{ route('admin.assessments.store') }}',
        method: 'POST',
        processData: false,
        contentType: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: formData,
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance($('#assessmentModal')).hide();
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1200);
        },
        error: function(xhr) {
            setLoading(btn, false);
            const msg = xhr.responseJSON?.message || 'حدث خطأ، حاول مرة أخرى.';
            showAlert(msg, 'danger');
        }
    });
});

// Toggle active
$(document).on('click', '.btn-toggle', function() {
    const btn = $(this);
    const url = btn.data('url');
    $.ajax({
        url: url, method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 800);
        }
    });
});

// Delete
$(document).on('click', '.btn-delete', function() {
    const url  = $(this).data('url');
    const name = $(this).data('name');
    confirmDelete(`هل تريد حذف مقياس "${name}"؟ سيتم حذف كل الأسئلة والجلسات المرتبطة به.`, url, () => {
        location.reload();
    });
});
</script>
@endpush
````

## File: resources/views/admin/dashboard.blade.php
````php
@extends('layouts.admin')
@section('title', 'لوحة الإدارة')
@section('page-title', 'لوحة الإدارة')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-people text-primary fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold">{{ $totalUsers }}</div>
                    <div class="text-muted small">إجمالي المستخدمين</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="bg-success bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-clipboard-check text-success fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold">{{ $todaySessions }}</div>
                    <div class="text-muted small">اختبارات اليوم</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-stars text-warning fs-4"></i>
                </div>
                <div>
                    <div class="fs-5 fw-bold text-truncate" style="max-width:130px">
                        {{ $mostUsedAssessment?->title_ar ?? '—' }}
                    </div>
                    <div class="text-muted small">الأكثر استخداماً</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="bg-info bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-bar-chart text-info fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold">{{ round($avgScore ?? 0, 1) }}</div>
                    <div class="text-muted small">متوسط الدرجات</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-semibold"><i class="bi bi-clock-history me-2 text-muted"></i>آخر الجلسات المكتملة</h6>
        <a href="{{ route('admin.statistics.exportCsv') }}" class="btn btn-sm btn-outline-success shadow-sm">
            <i class="bi bi-file-earmark-excel me-1"></i>تصدير جميع النتائج (CSV)
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>المستخدم</th>
                    <th>المقياس</th>
                    <th>وقت الإتمام</th>
                    <th>الدرجة</th>
                    <th>المستوى</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentSessions as $session)
                <tr>
                    <td>
                        <div class="fw-medium">{{ $session->user?->name ?? 'مستخدم محذوف' }}</div>
                        <div class="text-muted small">{{ $session->user?->email ?? '-' }}</div>
                    </td>
                    <td>{{ $session->assessment?->title_ar ?? 'مقياس محذوف' }}</td>
                    <td class="text-muted small">{{ $session->completed_at?->format('Y/m/d H:i') }}</td>
                    <td>
                        @if($session->result)
                            {{ $session->result->total_score }}/{{ $session->result->max_possible_score }}
                        @else — @endif
                    </td>
                    <td>
                        @if($session->result)
                            @php $lc = match($session->result->level) { 'high'=>'success','medium'=>'warning',default=>'danger' }; @endphp
                            @php $ll = match($session->result->level) { 'high'=>'مرتفع','medium'=>'متوسط',default=>'منخفض' }; @endphp
                            <span class="badge bg-{{ $lc }}-subtle text-{{ $lc }} border border-{{ $lc }}-subtle">{{ $ll }}</span>
                        @else — @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">لا توجد جلسات بعد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
````

## File: resources/views/admin/exams/create.blade.php
````php
@extends('layouts.admin')
@section('title', 'إنشاء اختبار جديد')
@section('page-title', 'إنشاء اختبار جديد')

@push('styles')
<style>
/* ── Layout ── */
.sidebar-card  { position:sticky; top:80px; border-radius:16px; border:0; box-shadow:0 4px 20px rgba(0,0,0,.08); }
.main-card     { border-radius:16px; border:0; box-shadow:0 4px 20px rgba(0,0,0,.08); }

/* ── Question pool ── */
.pool-scroll   { max-height:420px; overflow-y:auto; }
.q-pool-item {
    cursor:pointer; border:2px solid #e5e7eb; border-radius:10px;
    transition:all .15s; background:#fff; padding:.6rem .9rem;
}
.q-pool-item:hover  { border-color:#6366f1; background:#f5f3ff; }
.q-pool-item.selected { border-color:#6366f1; background:#ede9fe; }
.q-pool-item .q-num { font-size:.72rem; color:#6366f1; font-weight:700; }

/* ── Selected list ── */
.sel-item {
    background:#fff; border:1px solid #e5e7eb; border-radius:10px;
    padding:.5rem .75rem; display:flex; align-items:center; gap:.5rem;
}
.sel-item .drag-handle { color:#9ca3af; cursor:grab; }
.sel-num {
    width:24px; height:24px; border-radius:50%;
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff; font-size:.72rem; font-weight:700;
    display:flex; align-items:center; justify-content:center; flex-shrink:0;
}
#selected-list { min-height:80px; }

/* ── New question inline ── */
.option-row { background:#f9fafb; border-radius:8px; padding:.5rem; }

/* ── Reversed badge ── */
.rev-label {
    background:#fef3c7; border:1px solid #fcd34d; border-radius:6px;
    color:#92400e; font-size:.72rem; padding:.15rem .5rem;
}

/* ── Tab styling ── */
.nav-pills .nav-link { border-radius:50px; font-size:.85rem; font-weight:600; color:#6b7280; }
.nav-pills .nav-link.active {
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff; box-shadow:0 2px 8px rgba(99,102,241,.35);
}

/* ── Save button ── */
.btn-save-main {
    border:0; border-radius:50px; padding:.65rem 2rem; font-weight:700;
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff; width:100%;
    box-shadow:0 4px 16px rgba(99,102,241,.35); transition:all .2s;
}
.btn-save-main:hover { transform:translateY(-1px); box-shadow:0 6px 20px rgba(99,102,241,.45); color:#fff; }

/* ── Category dropdown ── */
.category-presets { display:flex; flex-wrap:wrap; gap:.4rem; margin-top:.4rem; }
.preset-chip {
    background:#f3f4f6; border:1px solid #e5e7eb; border-radius:50px;
    font-size:.72rem; padding:.2rem .7rem; cursor:pointer; transition:all .15s;
}
.preset-chip:hover { background:#ede9fe; border-color:#6366f1; color:#6366f1; }
</style>
@endpush

@section('content')
<div class="row g-4">

    {{-- ─── LEFT: Assessment info ─────────────────────────────── --}}
    <div class="col-lg-4">
        <div class="card sidebar-card">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-4">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i>بيانات المقياس
                </h6>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">اسم المقياس *</label>
                    <input type="text" class="form-control" id="e-title_ar"
                           placeholder="مثال: مقياس معرفة الذات">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">المجال / الفئة *</label>
                    <input type="text" class="form-control" id="e-category"
                           placeholder="اختر أو اكتب...">
                    <div class="category-presets">
                        @foreach([
                            'مقاييس معرفة الذات والشخصية',
                            'مقاييس الكفاءة الشخصية والنجاح المهني',
                            'مقاييس الاتصال والعلاقات المهنية',
                            'مقاييس القيادة والإدارة',
                            'مقاييس التوجيه والتوافق المهني',
                            'مقاييس الصحة المهنية',
                        ] as $cat)
                        <span class="preset-chip" data-cat="{{ $cat }}">{{ $cat }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">وصف المقياس</label>
                    <textarea class="form-control" id="e-description_ar" rows="3"
                              placeholder="اكتب وصفاً موجزاً للمقياس وهدفه..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-semibold">الوقت المحدد (دقائق)</label>
                    <input type="number" class="form-control" id="e-time_limit_min"
                           placeholder="فارغ = بلا حد زمني" min="1">
                </div>

                <hr>

                {{-- Selected summary --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="small fw-semibold text-muted">الأسئلة المختارة</span>
                    <span class="badge rounded-pill" style="background:linear-gradient(135deg,#6366f1,#8b5cf6)"
                          id="selected-count">0</span>
                </div>

                <div id="selected-list" class="d-flex flex-column gap-2 mb-4">
                    <div class="text-center text-muted small py-3 empty-msg">
                        <i class="bi bi-arrow-left-circle fs-5 d-block mb-1"></i>
                        أضف أسئلة من القسم المجاور
                    </div>
                </div>

                <button class="btn-save-main btn" id="btn-save-exam">
                    <span class="btn-text"><i class="bi bi-save2 me-1"></i>حفظ المقياس</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>

    {{-- ─── RIGHT: Question sources ─────────────────────────── --}}
    <div class="col-lg-8">
        <div class="card main-card">
            <div class="card-body p-4">

                {{-- Tabs --}}
                <ul class="nav nav-pills mb-4 gap-2" id="source-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" data-tab="bank">
                            <i class="bi bi-database me-1"></i>بنك الأسئلة
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-tab="new">
                            <i class="bi bi-plus-circle me-1"></i>سؤال جديد
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-tab="bulk">
                            <i class="bi bi-file-text me-1"></i>استيراد نصي
                        </button>
                    </li>
                </ul>

                {{-- ── Tab 1: Question Bank ── --}}
                <div id="tab-bank">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">فلتر بالمقياس</label>
                            <select class="form-select form-select-sm" id="pool-assessment-filter">
                                <option value="">— كل المقاييس —</option>
                                @foreach($assessments as $a)
                                    <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">بحث في النص</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control" id="pool-search"
                                       placeholder="اكتب للبحث...">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small text-muted" id="pool-count">اختر مقياساً أو ابحث</span>
                        <button class="btn btn-sm btn-outline-primary rounded-pill" id="btn-select-all" style="display:none">
                            تحديد الكل
                        </button>
                    </div>

                    <div class="pool-scroll" id="questions-pool">
                        <div class="text-center text-muted py-5">
                            <i class="bi bi-database fs-2 d-block mb-2 opacity-25"></i>
                            اختر مقياساً أو ابحث لعرض الأسئلة
                        </div>
                    </div>
                </div>

                {{-- ── Tab 2: New Question Inline ── --}}
                <div id="tab-new" class="d-none">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">نص السؤال *</label>
                        <textarea class="form-control" id="new-q-text" rows="3"
                                  placeholder="اكتب نص السؤال هنا..."></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">المقياس *</label>
                            <select class="form-select form-select-sm" id="new-q-assessment">
                                <option value="">— اختر المقياس —</option>
                                @foreach($assessments as $a)
                                    <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">البُعد</label>
                            <select class="form-select form-select-sm" id="new-q-dimension">
                                <option value="">— بدون بُعد —</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="new-q-reversed">
                        <label class="form-check-label small" for="new-q-reversed">
                            سؤال معكوس
                            <span class="rev-label ms-1">نعم=0 | لا=2</span>
                        </label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">خيارات الإجابة</label>
                        <div class="d-flex flex-column gap-2" id="new-options-container">
                            <div class="option-row d-flex gap-2 align-items-center">
                                <span class="badge bg-success-subtle text-success border border-success-subtle small">نعم</span>
                                <input type="number" class="form-control form-control-sm w-25" value="2" data-score-label="نعم" id="opt-score-0" placeholder="الدرجة">
                            </div>
                            <div class="option-row d-flex gap-2 align-items-center">
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle small">إلى حد ما</span>
                                <input type="number" class="form-control form-control-sm w-25" value="1" data-score-label="إلى حد ما" id="opt-score-1" placeholder="الدرجة">
                            </div>
                            <div class="option-row d-flex gap-2 align-items-center">
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle small">لا</span>
                                <input type="number" class="form-control form-control-sm w-25" value="0" data-score-label="لا" id="opt-score-2" placeholder="الدرجة">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-outline-primary rounded-pill px-4" id="btn-add-new-q">
                        <i class="bi bi-plus-circle me-1"></i>إضافة وتأكيد السؤال
                    </button>
                    <div id="new-q-feedback" class="mt-2"></div>
                </div>

                {{-- ── Tab 3: Bulk Text Import ── --}}
                <div id="tab-bulk" class="d-none">
                    <div class="alert alert-info small py-2 mb-3">
                        <i class="bi bi-lightbulb me-1"></i>
                        اكتب كل سؤال في سطر منفصل. ستُضاف تلقائياً بخيارات (نعم=2 / إلى حد ما=1 / لا=0).
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">المقياس *</label>
                            <select class="form-select form-select-sm" id="bulk-assessment">
                                <option value="">— اختر المقياس —</option>
                                @foreach($assessments as $a)
                                    <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">البُعد</label>
                            <select class="form-select form-select-sm" id="bulk-dimension">
                                <option value="">— بدون بُعد —</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">الأسئلة (سطر لكل سؤال)</label>
                        <textarea class="form-control" id="bulk-text" rows="10"
                                  dir="rtl"
                                  placeholder="أعرف نقاط قوتي بوضوح.&#10;أستطيع تحديد نقاط الضعف التي أحتاج إلى تطويرها.&#10;أفهم الأسباب التي تدفعني لاتخاذ قراراتي."></textarea>
                    </div>

                    <button class="btn btn-outline-success rounded-pill px-4" id="btn-bulk-import">
                        <span class="btn-text"><i class="bi bi-cloud-upload me-1"></i>استيراد وإضافة للاختبار</span>
                        <span class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                    <div id="bulk-feedback" class="mt-2"></div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
/* ═══════════════════════════════════════════
   State
═══════════════════════════════════════════ */
let allPoolQuestions = [];
let selectedIds  = [];   // question IDs picked from bank
let inlineQs     = [];   // questions created inline (not yet in DB)

const CSRF = $('meta[name="csrf-token"]').attr('content');

/* ═══════════════════════════════════════════
   Tabs
═══════════════════════════════════════════ */
$('[data-tab]').on('click', function () {
    $('[data-tab]').removeClass('active');
    $(this).addClass('active');
    $('#tab-bank, #tab-new, #tab-bulk').addClass('d-none');
    $(`#tab-${$(this).data('tab')}`).removeClass('d-none');
});

/* ═══════════════════════════════════════════
   Category presets
═══════════════════════════════════════════ */
$(document).on('click', '.preset-chip', function () {
    $('#e-category').val($(this).data('cat'));
});

/* ═══════════════════════════════════════════
   TAB 1 — Question Bank
═══════════════════════════════════════════ */
function loadPool() {
    const assessmentId = $('#pool-assessment-filter').val();
    const search = $('#pool-search').val().trim();

    if (!assessmentId && !search) {
        $('#questions-pool').html('<div class="text-center text-muted py-5"><i class="bi bi-database fs-2 d-block mb-2 opacity-25"></i>اختر مقياساً أو ابحث لعرض الأسئلة</div>');
        $('#pool-count').text('اختر مقياساً أو ابحث');
        $('#btn-select-all').hide();
        return;
    }

    $('#questions-pool').html('<div class="text-center py-4"><div class="spinner-border text-primary"></div></div>');

    let url = '{{ route("admin.questions.index") }}?per_page=all';
    if (assessmentId) url += `&assessment_id=${assessmentId}`;
    if (search)       url += `&search=${encodeURIComponent(search)}`;

    $.get(url, null, null, 'html').fail(function () {
        // fallback: load JSON via by-assessment
        if (assessmentId) {
            $.get(`{{ url('admin/questions/by-assessment') }}/${assessmentId}`, function (data) {
                allPoolQuestions = data;
                const filtered = search ? data.filter(q => q.text_ar.includes(search)) : data;
                renderPool(filtered);
            });
        }
    });

    // Direct JSON endpoint (by-assessment is JSON)
    if (assessmentId) {
        $.get(`{{ url('admin/questions/by-assessment') }}/${assessmentId}`, function (data) {
            allPoolQuestions = data;
            const filtered = search ? data.filter(q => q.text_ar.includes(search)) : data;
            renderPool(filtered);
        });
    }
}

$('#pool-assessment-filter').on('change', loadPool);
$('#pool-search').on('input', function () {
    if ($('#pool-assessment-filter').val()) {
        const q = $(this).val().trim();
        renderPool(q ? allPoolQuestions.filter(x => x.text_ar.includes(q)) : allPoolQuestions);
    } else {
        loadPool();
    }
});

function renderPool(questions) {
    if (!questions.length) {
        $('#questions-pool').html('<div class="text-center text-muted py-5"><i class="bi bi-search fs-2 d-block mb-2 opacity-25"></i>لا توجد أسئلة مطابقة</div>');
        $('#pool-count').text('0 سؤال');
        $('#btn-select-all').hide();
        return;
    }

    $('#pool-count').text(`${questions.length} سؤال`);
    $('#btn-select-all').show();

    let html = '';
    questions.forEach((q, i) => {
        const sel = selectedIds.includes(q.id);
        const rev = q.is_reversed ? '<span class="rev-label ms-1">معكوس</span>' : '';
        html += `<div class="q-pool-item mb-2 ${sel ? 'selected' : ''}" data-id="${q.id}" data-text="${q.text_ar.replace(/"/g,'&quot;')}">
            <div class="d-flex align-items-start gap-2">
                <i class="bi ${sel ? 'bi-check-circle-fill text-primary' : 'bi-circle text-muted'} mt-1 flex-shrink-0 pool-icon"></i>
                <div class="flex-grow-1">
                    <div class="q-num">سؤال ${i+1}${rev}</div>
                    <div class="small mt-1">${q.text_ar}</div>
                </div>
            </div>
        </div>`;
    });
    $('#questions-pool').html(html);
}

// Select all visible
$('#btn-select-all').on('click', function () {
    $('.q-pool-item').each(function () {
        const id   = $(this).data('id');
        const text = $(this).data('text');
        if (!selectedIds.includes(id)) addSelected(id, text);
    });
    syncPool();
});

$(document).on('click', '.q-pool-item', function () {
    const id = $(this).data('id'), text = $(this).data('text');
    selectedIds.includes(id) ? removeSelected(id) : addSelected(id, text);
    syncPool();
});

function syncPool() {
    $('.q-pool-item').each(function () {
        const sel = selectedIds.includes($(this).data('id'));
        $(this).toggleClass('selected', sel);
        $(this).find('.pool-icon').attr('class', `bi ${sel ? 'bi-check-circle-fill text-primary' : 'bi-circle text-muted'} mt-1 flex-shrink-0 pool-icon`);
    });
}

/* ═══════════════════════════════════════════
   TAB 2 — Dimension loader for new Q
═══════════════════════════════════════════ */
function loadDimensions(assessmentId, targetSelect) {
    $(targetSelect).html('<option value="">— جاري التحميل —</option>');
    if (!assessmentId) { $(targetSelect).html('<option value="">— بدون بُعد —</option>'); return; }
    $.get(`{{ url('admin/dimensions/by-assessment') }}/${assessmentId}`, function (data) {
        let opts = '<option value="">— بدون بُعد —</option>';
        data.forEach(d => { opts += `<option value="${d.id}">${d.name_ar}</option>`; });
        $(targetSelect).html(opts);
    });
}

$('#new-q-assessment').on('change', function () { loadDimensions($(this).val(), '#new-q-dimension'); });
$('#bulk-assessment').on('change', function () { loadDimensions($(this).val(), '#bulk-dimension'); });

/* ── Add inline question ── */
$('#btn-add-new-q').on('click', function () {
    const text       = $('#new-q-text').val().trim();
    const assessmentId = $('#new-q-assessment').val();
    const dimensionId  = $('#new-q-dimension').val();
    const isReversed   = $('#new-q-reversed').is(':checked');
    const options = [
        { label_ar: 'نعم',        score_value: parseInt($('#opt-score-0').val()), order_index: 0 },
        { label_ar: 'إلى حد ما', score_value: parseInt($('#opt-score-1').val()), order_index: 1 },
        { label_ar: 'لا',         score_value: parseInt($('#opt-score-2').val()), order_index: 2 },
    ];

    if (!text)         { $('#new-q-feedback').html('<div class="alert alert-warning py-2 small">اكتب نص السؤال.</div>'); return; }
    if (!assessmentId) { $('#new-q-feedback').html('<div class="alert alert-warning py-2 small">اختر المقياس.</div>'); return; }

    const btn = $(this);
    btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> جاري الحفظ...');

    $.ajax({
        url: '{{ route("admin.questions.store") }}', method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': CSRF },
        data: JSON.stringify({ assessment_id: assessmentId, dimension_id: dimensionId || null,
                               text_ar: text, is_reversed: isReversed, options }),
        success(res) {
            btn.prop('disabled', false).html('<i class="bi bi-plus-circle me-1"></i>إضافة وتأكيد السؤال');
            $('#new-q-feedback').html(`<div class="alert alert-success py-2 small"><i class="bi bi-check-circle me-1"></i>تم حفظ السؤال وإضافته للقائمة.</div>`);
            addSelected(res.id, text);
            $('#new-q-text').val('');
            $('#new-q-reversed').prop('checked', false);
        },
        error(xhr) {
            btn.prop('disabled', false).html('<i class="bi bi-plus-circle me-1"></i>إضافة وتأكيد السؤال');
            const msg = xhr.responseJSON?.message || 'حدث خطأ.';
            $('#new-q-feedback').html(`<div class="alert alert-danger py-2 small">${msg}</div>`);
        }
    });
});

/* ═══════════════════════════════════════════
   TAB 3 — Bulk Import
═══════════════════════════════════════════ */
$('#btn-bulk-import').on('click', function () {
    const assessmentId  = $('#bulk-assessment').val();
    const dimensionId   = $('#bulk-dimension').val();
    const questionsText = $('#bulk-text').val().trim();

    if (!assessmentId)  { showAlert('اختر المقياس أولاً.', 'warning'); return; }
    if (!questionsText) { showAlert('اكتب الأسئلة أولاً.', 'warning'); return; }

    const btn = $(this);
    setLoading(btn, true);

    $.ajax({
        url: '{{ route("admin.questions.bulk") }}', method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': CSRF },
        data: JSON.stringify({ assessment_id: assessmentId, dimension_id: dimensionId || null,
                               questions_text: questionsText }),
        success(res) {
            setLoading(btn, false);
            $('#bulk-feedback').html(`<div class="alert alert-success py-2 small"><i class="bi bi-check-circle me-1"></i>${res.message}</div>`);
            $('#bulk-text').val('');
            // Reload pool from this assessment
            $('#pool-assessment-filter').val(assessmentId).trigger('change');
            $('[data-tab="bank"]').trigger('click');
        },
        error(xhr) {
            setLoading(btn, false);
            $('#bulk-feedback').html(`<div class="alert alert-danger py-2 small">${xhr.responseJSON?.message || 'حدث خطأ.'}</div>`);
        }
    });
});

/* ═══════════════════════════════════════════
   Selected list management
═══════════════════════════════════════════ */
function addSelected(id, text) {
    if (selectedIds.includes(id)) return;
    selectedIds.push(id);
    $('.empty-msg').remove();
    const n = selectedIds.length;
    $('#selected-list').append(
        `<div class="sel-item" data-id="${id}">
            <i class="bi bi-grip-vertical drag-handle"></i>
            <span class="sel-num">${n}</span>
            <span class="small flex-grow-1 text-truncate" style="max-width:200px" title="${text}">${text}</span>
            <button type="button" class="btn btn-sm btn-link text-danger p-0 btn-remove-sel flex-shrink-0">
                <i class="bi bi-x-circle"></i>
            </button>
        </div>`
    );
    updateCount();
}

function removeSelected(id) {
    selectedIds = selectedIds.filter(x => x !== id);
    $(`#selected-list .sel-item[data-id="${id}"]`).remove();
    if (!selectedIds.length) $('#selected-list').html('<div class="text-center text-muted small py-3 empty-msg"><i class="bi bi-arrow-left-circle fs-5 d-block mb-1"></i>أضف أسئلة من القسم المجاور</div>');
    renumberSelected();
    updateCount();
}

function renumberSelected() {
    $('#selected-list .sel-num').each(function (i) { $(this).text(i+1); });
}

$(document).on('click', '.btn-remove-sel', function () {
    const id = $(this).closest('.sel-item').data('id');
    removeSelected(id); syncPool();
});

function updateCount() { $('#selected-count').text(selectedIds.length); }

// Sortable for selected
new Sortable(document.getElementById('selected-list'), {
    handle: '.drag-handle', animation: 150,
    onEnd() {
        const order = [];
        $('#selected-list .sel-item').each(function () { order.push($(this).data('id')); });
        selectedIds = order;
        renumberSelected();
    }
});

/* ═══════════════════════════════════════════
   Save exam
═══════════════════════════════════════════ */
$('#btn-save-exam').on('click', function () {
    const btn = $(this);
    if (!selectedIds.length) { showAlert('أضف على الأقل سؤالاً واحداً.', 'warning'); return; }

    const payload = {
        title_ar:       $('#e-title_ar').val().trim(),
        category:       $('#e-category').val().trim(),
        description_ar: $('#e-description_ar').val().trim(),
        time_limit_min: $('#e-time_limit_min').val() || null,
        question_ids:   selectedIds,
        dimensions:     [],
    };

    if (!payload.title_ar || !payload.category) { showAlert('اسم المقياس والمجال مطلوبان.', 'warning'); return; }

    setLoading(btn, true);
    $.ajax({
        url: '{{ route("admin.exams.store") }}', method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': CSRF },
        data: JSON.stringify(payload),
        success(res) {
            setLoading(btn, false);
            showAlert(res.message, 'success');
            setTimeout(() => window.location.href = '{{ route("admin.assessments.index") }}', 1200);
        },
        error(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});
</script>
@endpush
````

## File: resources/views/admin/icons/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'إدارة الأيقونات')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold text-dark"><i class="bi bi-images me-2"></i>إدارة الأيقونات</h4>
            <p class="text-muted small mb-0">قم برفع وإدارة الأيقونات المخصصة للشهادات، البرامج، وخطط التطوير.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addIconModal">
            <i class="bi bi-cloud-arrow-up me-1"></i> رفع أيقونة جديدة
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-3">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
    @endif
    
    @if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm rounded-3">
        <ul class="mb-0 ps-3">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-4">
        @php
            $cats = [
                'certificates' => ['title' => 'أيقونات الشهادات الاحترافية', 'icon' => 'bi-award', 'color' => 'primary'],
                'programs' => ['title' => 'أيقونات البرامج المقترحة', 'icon' => 'bi-journal-bookmark', 'color' => 'success'],
                'plan_30_days' => ['title' => 'أيقونات خطة 30 يوم', 'icon' => 'bi-calendar-check', 'color' => 'info'],
                'assessments' => ['title' => 'أيقونات المقاييس', 'icon' => 'bi-ui-radios', 'color' => 'warning'],
                'system' => ['title' => 'أيقونات النظام والإحصائيات', 'icon' => 'bi-gear-wide-connected', 'color' => 'secondary']
            ];
        @endphp

        @foreach($cats as $catKey => $catData)
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="mb-0 fw-bold text-{{ $catData['color'] }}">
                        <i class="bi {{ $catData['icon'] }} me-2"></i>{{ $catData['title'] }}
                    </h5>
                </div>
                <div class="card-body bg-light">
                    @if(isset($icons[$catKey]) && $icons[$catKey]->count() > 0)
                        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
                            @foreach($icons[$catKey] as $icon)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm rounded-3 text-center position-relative overflow-hidden">
                                    <div class="p-3 d-flex align-items-center justify-content-center" style="height: 100px; background-color: #f8fafc;">
                                        <img src="{{ $icon->icon_url }}" alt="{{ $icon->name }}" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                    </div>
                                    <div class="card-footer bg-white border-top-0 py-2">
                                        <p class="mb-0 small fw-bold text-truncate" title="{{ $icon->name }}">{{ $icon->name }}</p>
                                    </div>
                                    <!-- Delete Button overlay -->
                                    <form action="{{ route('admin.icons.destroy', $icon->id) }}" method="POST" class="position-absolute top-0 end-0 p-1 m-1 bg-white rounded-circle shadow-sm" style="z-index: 10; opacity: 0.9;" onsubmit="return confirm('هل أنت متأكد من حذف هذه الأيقونة؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger p-0 border-0 d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;" title="حذف">
                                            <i class="bi bi-x-circle-fill fs-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="bi bi-inboxes fs-1 mb-2 d-block opacity-50"></i>
                            <p class="mb-0">لا توجد أيقونات مضافة في هذا القسم بعد.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Add Icon Modal -->
<div class="modal fade" id="addIconModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.icons.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-cloud-arrow-up me-2"></i>رفع أيقونة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-medium">اسم الأيقونة *</label>
                        <input type="text" name="name" class="form-control" required placeholder="مثال: أيقونة القيادة، شعار PMP...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium">التصنيف *</label>
                        <select name="category" class="form-select" required>
                            <option value="">-- اختر التصنيف --</option>
                            <option value="certificates">الشهادات الاحترافية</option>
                            <option value="programs">البرامج المقترحة</option>
                            <option value="plan_30_days">خطة تطوير (30 يوماً)</option>
                            <option value="assessments">المقاييس</option>
                            <option value="system">أيقونات النظام (الإحصائيات)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-medium">ملف الأيقونة (صورة) *</label>
                        <input type="file" name="icon_file" class="form-control" accept="image/png, image/jpeg, image/svg+xml, image/webp" required>
                        <div class="form-text mt-2 text-primary">
                            <i class="bi bi-info-circle me-1"></i> الحجم الأقصى المسموح به هو 500 كيلوبايت. يُفضل استخدام أبعاد مربعة (مثل 128x128 أو 256x256) بصيغة PNG شفافة أو SVG.
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i>حفظ ورفع</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
````

## File: resources/views/admin/questions/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'بنك الأسئلة')
@section('page-title', 'بنك الأسئلة')

@section('content')
<!-- Filters -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.questions.index') }}" class="row g-2 align-items-end" id="filter-form">
            <input type="hidden" name="per_page" id="filter-per-page" value="{{ request('per_page', 25) }}">
            <div class="col-md-4">
                <label class="form-label small fw-medium">المقياس</label>
                <select name="assessment_id" class="form-select form-select-sm" id="filter-assessment">
                    <option value="">كل المقاييس</option>
                    @foreach($assessments as $a)
                        <option value="{{ $a->id }}" {{ request('assessment_id') == $a->id ? 'selected' : '' }}>
                            {{ $a->title_ar }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-medium">البُعد</label>
                <select name="dimension_id" class="form-select form-select-sm" id="filter-dimension">
                    <option value="">كل الأبعاد</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-medium">بحث في النص</label>
                <input type="text" name="search" class="form-control form-control-sm"
                    value="{{ request('search') }}" placeholder="كلمة بحث...">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-search me-1"></i>بحث
                </button>
            </div>
        </form>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center gap-2">
        <span class="text-muted small">{{ $questions->total() }} سؤال</span>
        <span class="text-muted small text-black-50">|</span>
        <label class="small text-muted mb-0">عرض:</label>
        <select id="per-page-select" class="form-select form-select-sm d-inline-block w-auto py-0 px-2" style="height: 28px;">
            <option value="25" {{ request('per_page', 25) == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
            <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>الكل</option>
        </select>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#bulkModal">
            <i class="bi bi-upload me-1"></i>استيراد بالجملة
        </button>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#questionModal">
            <i class="bi bi-plus-circle me-1"></i>إضافة سؤال
        </button>
    </div>
</div>

<div id="questions-table-wrapper">
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 40px;" class="text-center">
                        <input type="checkbox" class="form-check-input" id="check-all">
                    </th>
                    @if(request('assessment_id'))
                        <th style="width: 40px;"></th>
                    @endif
                    <th style="width:45%">نص السؤال</th>
                    <th>المقياس</th>
                    <th style="width:20%">البُعد</th>
                    <th>الخيارات</th>
                    <th class="text-end" style="width:100px;">العمليات</th>
                </tr>
            </thead>
            <tbody id="sortable-questions">
                @forelse($questions as $q)
                <tr data-id="{{ $q->id }}">
                    <td class="text-center">
                        <input type="checkbox" class="form-check-input check-row" data-id="{{ $q->id }}">
                    </td>
                    @if(request('assessment_id'))
                        <td>
                            <span class="drag-handle text-muted">
                                <i class="bi bi-grip-vertical fs-5"></i>
                            </span>
                        </td>
                    @endif
                    <td class="question-text-cell small" data-id="{{ $q->id }}">
                        <span class="question-text-display">{{ $q->text_ar }}</span>
                    </td>
                    @php
                        $currentAssessment = $assessments->firstWhere('id', $q->assessment_id);
                    @endphp
                    <td class="small text-muted">{{ $q->assessment_title }}</td>
                    <td>
                        @if(!$currentAssessment || $currentAssessment->dimensions->isEmpty())
                            <span class="text-muted small">لا توجد أبعاد</span>
                        @else
                            <select class="form-select form-select-sm select-dimension" data-question-id="{{ $q->id }}">
                                <option value="">بدون بُعد</option>
                                @foreach($currentAssessment->dimensions as $d)
                                    <option value="{{ $d->id }}" {{ $q->dimension_id == $d->id ? 'selected' : '' }}>
                                        {{ $d->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </td>
                    <td><span class="badge bg-light text-dark border">{{ $q->answer_options_count }}</span></td>
                    <td>
                        <div class="d-flex gap-1 justify-content-end">
                            <button class="btn btn-sm btn-outline-primary btn-edit-q" data-id="{{ $q->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger btn-delete-q"
                                    data-id="{{ $q->id }}"
                                    data-url="{{ route('admin.questions.destroy', $q->id) }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ request('assessment_id') ? 7 : 6 }}" class="text-center text-muted py-4">
                        لا توجد أسئلة.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-transparent border-0">{{ $questions->appends(request()->query())->links() }}</div>
</div>
</div>

<!-- Add Question Modal -->
<div class="modal fade" id="questionModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إضافة سؤال جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المقياس *</label>
                        <select class="form-select" id="q-assessment_id">
                            <option value="">اختر المقياس</option>
                            @foreach($assessments as $a)
                                <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">البُعد</label>
                        <select class="form-select" id="q-dimension_id">
                            <option value="">اختر البُعد</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">نص السؤال *</label>
                        <textarea class="form-control" id="q-text_ar" rows="3" placeholder="اكتب نص السؤال هنا..."></textarea>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 fw-semibold">خيارات الإجابة</h6>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-add-option">
                        <i class="bi bi-plus me-1"></i>إضافة خيار
                    </button>
                </div>
                <div id="options-container"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-question">
                    <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ السؤال</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Import Modal -->
<div class="modal fade" id="bulkModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">استيراد أسئلة بالجملة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المقياس *</label>
                        <select class="form-select" id="bulk-assessment_id">
                            <option value="">اختر المقياس</option>
                            @foreach($assessments as $a)
                                <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">البُعد</label>
                        <select class="form-select" id="bulk-dimension_id">
                            <option value="">اختر البُعد (اختياري)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الأسئلة (سؤال في كل سطر)</label>
                        <textarea class="form-control" id="bulk-questions_text" rows="8"
                            placeholder="السؤال الأول هنا&#10;السؤال الثاني هنا&#10;السؤال الثالث هنا"></textarea>
                        <div class="form-text">سيتم إنشاء خيارات افتراضية: نعم (2) / إلى حد ما (1) / لا (0)</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-bulk-import">
                    <span class="btn-text"><i class="bi bi-upload me-1"></i>استيراد</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .drag-handle {
        cursor: grab;
    }
    .drag-handle:active {
        cursor: grabbing;
    }
    .fs-7 {
        font-size: 0.8rem;
    }
    #bulk-action-bar {
        transition: all 0.3s ease-in-out;
    }
    .question-edit-textarea {
        min-height: 60px;
        resize: none;
    }
</style>
@endpush

@push('scripts')
<script>
let optIndex = 0;

function addOptionRow(label='', score='') {
    const idx = optIndex++;
    $('#options-container').append(`
        <div class="row g-2 mb-2 opt-row">
            <div class="col-7">
                <input type="text" class="form-control form-control-sm opt-label" placeholder="نص الخيار" value="${label}">
            </div>
            <div class="col-3">
                <input type="number" class="form-control form-control-sm opt-score" placeholder="القيمة" value="${score}">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-sm btn-outline-danger w-100 btn-remove-opt">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `);
}

// Default options on modal open
$('#questionModal').on('show.bs.modal', function() {
    $('#options-container').html('');
    optIndex = 0;
    addOptionRow('نعم', 2);
    addOptionRow('إلى حد ما', 1);
    addOptionRow('لا', 0);
});

$('#btn-add-option').on('click', () => addOptionRow());

$(document).on('click', '.btn-remove-opt', function() {
    $(this).closest('.opt-row').remove();
});

// Dynamic dimensions on assessment change
function loadDimensions(assessmentId, targetSelect, selectedId='') {
    let defaultText = 'بدون بُعد';
    if (targetSelect.attr('id') === 'filter-dimension') {
        defaultText = 'كل الأبعاد';
    } else if (targetSelect.attr('id') === 'q-dimension_id') {
        defaultText = 'اختر البُعد';
    } else if (targetSelect.attr('id') === 'bulk-dimension_id') {
        defaultText = 'اختر البُعد (اختياري)';
    } else if (targetSelect.attr('id') === 'bulk-dimension-id') {
        defaultText = 'تعيين البُعد للمحددة...';
    }

    if (!assessmentId) {
        targetSelect.html(`<option value="">${defaultText}</option>`);
        return;
    }

    $.get('{{ route('admin.dimensions.byAssessment', ':id') }}'.replace(':id', assessmentId), function(dims) {
        let opts = `<option value="">${defaultText}</option>`;
        dims.forEach(d => {
            let label = d.name_ar;
            if (targetSelect.attr('id') === 'filter-dimension' && d.questions_count !== undefined) {
                label += ` (${d.questions_count})`;
            }
            opts += `<option value="${d.id}" ${d.id == selectedId ? 'selected' : ''}>${label}</option>`;
        });
        targetSelect.html(opts);
    });
}

$('#q-assessment_id').on('change', function() {
    loadDimensions($(this).val(), $('#q-dimension_id'));
});

$('#bulk-assessment_id').on('change', function() {
    loadDimensions($(this).val(), $('#bulk-dimension_id'));
});

$('#filter-assessment').on('change', function() {
    loadDimensions($(this).val(), $('#filter-dimension'), '');
});

// Initialize filter dimension if assessment already selected
@if(request('assessment_id'))
loadDimensions('{{ request('assessment_id') }}', $('#filter-dimension'), '{{ request('dimension_id') }}');
@endif

// Reload table container via AJAX
function reloadTable() {
    $('#questions-table-wrapper').css('opacity', 0.5);
    $('#questions-table-wrapper').load(window.location.href + ' #questions-table-wrapper > *', function() {
        $('#questions-table-wrapper').css('opacity', 1);
        initSortable();
        resetBulkActions();
    });
}

// Bulk Actions selection logic
$(document).on('change', '#check-all', function() {
    const isChecked = $(this).is(':checked');
    $('.check-row').prop('checked', isChecked);
    updateBulkBar();
});

$(document).on('change', '.check-row', function() {
    const allChecked = $('.check-row').length === $('.check-row:checked').length;
    $('#check-all').prop('checked', allChecked);
    updateBulkBar();
});

function updateBulkBar() {
    const selectedIds = [];
    $('.check-row:checked').each(function() {
        selectedIds.push($(this).data('id'));
    });

    const count = selectedIds.length;
    if (count > 0) {
        $('#selected-count').text(count);
        $('#bulk-action-bar').removeClass('d-none');
    } else {
        $('#bulk-action-bar').addClass('d-none');
    }
}

function resetBulkActions() {
    $('#check-all').prop('checked', false);
    $('.check-row').prop('checked', false);
    $('#bulk-action-bar').addClass('d-none');
}

// Bulk Delete Action
$(document).on('click', '.btn-bulk-delete', function() {
    const selectedIds = [];
    $('.check-row:checked').each(function() {
        selectedIds.push($(this).data('id'));
    });

    if (selectedIds.length === 0) return;

    const url = '{{ route('admin.questions.bulkDelete') }}?' + selectedIds.map(id => `ids[]=${id}`).join('&');
    confirmDelete(`هل تريد حذف ${selectedIds.length} سؤال محدد نهائياً؟`, url, function() {
        reloadTable();
    });
});

// Bulk Assign Dimension Action
$(document).on('click', '.btn-bulk-assign', function() {
    const selectedIds = [];
    $('.check-row:checked').each(function() {
        selectedIds.push($(this).data('id'));
    });

    if (selectedIds.length === 0) return;

    const dimensionId = $('#bulk-dimension-id').val();
    const payload = {
        ids: selectedIds,
        dimension_id: dimensionId === 'none' ? null : dimensionId
    };

    const btn = $(this);
    btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

    $.ajax({
        url: '{{ route('admin.questions.bulkAssignDimension') }}',
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        contentType: 'application/json',
        data: JSON.stringify(payload),
        success: function(res) {
            btn.prop('disabled', false).html('<i class="bi bi-tag me-1"></i>تعيين');
            showAlert(res.message || 'تم تعيين البُعد بنجاح.', 'success');
            reloadTable();
        },
        error: function(xhr) {
            btn.prop('disabled', false).html('<i class="bi bi-tag me-1"></i>تعيين');
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Single inline dimension change
$(document).on('change', '.select-dimension', function() {
    const select = $(this);
    const questionId = select.data('question-id');
    const dimensionId = select.val();

    select.prop('disabled', true);

    $.ajax({
        url: '{{ route('admin.questions.assignDimension', ':id') }}'.replace(':id', questionId),
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { dimension_id: dimensionId },
        success: function(res) {
            select.prop('disabled', false);
            showAlert(res.message || 'تم تحديد البُعد.', 'success');
        },
        error: function(xhr) {
            select.prop('disabled', false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Inline Edit Textarea Auto-resize
$(document).on('input', '.question-edit-textarea', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Inline Edit Click
$(document).on('click', '.btn-edit-q', function() {
    const row = $(this).closest('tr');
    const qId = $(this).data('id');
    const textCell = row.find('.question-text-cell');

    if (textCell.find('.edit-mode-container').length > 0) return;

    const displaySpan = textCell.find('.question-text-display');
    const originalText = displaySpan.text().trim();
    textCell.data('original-text', originalText);

    textCell.html(`
        <div class="edit-mode-container">
            <textarea class="form-control form-control-sm question-edit-textarea">${originalText}</textarea>
            <div class="d-flex gap-1 mt-1 justify-content-end">
                <button class="btn btn-sm btn-success btn-save-inline py-0 px-2 fs-7" data-id="${qId}">حفظ</button>
                <button class="btn btn-sm btn-secondary btn-cancel-inline py-0 px-2 fs-7" data-id="${qId}">إلغاء</button>
            </div>
        </div>
    `);

    row.find('.btn-edit-q, .btn-delete-q').addClass('d-none');

    const textarea = textCell.find('.question-edit-textarea');
    textarea.focus();
    textarea.each(function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
});

// Inline Edit Cancel
$(document).on('click', '.btn-cancel-inline', function() {
    const row = $(this).closest('tr');
    const textCell = row.find('.question-text-cell');
    const originalText = textCell.data('original-text');

    textCell.html(`<span class="question-text-display">${originalText}</span>`);
    row.find('.btn-edit-q, .btn-delete-q').removeClass('d-none');
});

// Inline Edit Save
$(document).on('click', '.btn-save-inline', function() {
    const btn = $(this);
    const row = btn.closest('tr');
    const qId = btn.data('id');
    const textCell = row.find('.question-text-cell');
    const newText = textCell.find('.question-edit-textarea').val().trim();

    if (newText === '') {
        showAlert('نص السؤال مطلوب.', 'warning');
        return;
    }

    btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

    $.ajax({
        url: `{{ route('admin.questions.index') }}/${qId}`,
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { text_ar: newText },
        success: function(res) {
            showAlert(res.message || 'تم تحديث السؤال.', 'success');
            textCell.html(`<span class="question-text-display">${newText}</span>`);
            row.find('.btn-edit-q, .btn-delete-q').removeClass('d-none');
        },
        error: function(xhr) {
            btn.prop('disabled', false).text('حفظ');
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Page size change
$(document).on('change', '#per-page-select', function() {
    $('#filter-per-page').val($(this).val());
    $('#filter-form').submit();
});

// Save question modal
$('#btn-save-question').on('click', function() {
    const btn = $(this);
    const options = [];
    $('.opt-row').each(function(i) {
        const label = $(this).find('.opt-label').val().trim();
        const score = $(this).find('.opt-score').val();
        if (label !== '') {
            options.push({ label_ar: label, score_value: parseInt(score) || 0, order_index: i });
        }
    });

    const payload = {
        assessment_id: $('#q-assessment_id').val(),
        dimension_id:  $('#q-dimension_id').val() || null,
        text_ar:       $('#q-text_ar').val().trim(),
        options:       options,
    };

    if (!payload.assessment_id || !payload.text_ar) {
        showAlert('المقياس ونص السؤال مطلوبان.', 'warning'); return;
    }

    setLoading(btn, true);
    $.ajax({
        url: '{{ route('admin.questions.store') }}',
        method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance($('#questionModal')).hide();
            showAlert(res.message, 'success');
            reloadTable();
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Bulk import modal
$('#btn-bulk-import').on('click', function() {
    const btn = $(this);
    const payload = {
        assessment_id:   $('#bulk-assessment_id').val(),
        dimension_id:    $('#bulk-dimension_id').val() || null,
        questions_text:  $('#bulk-questions_text').val().trim(),
    };
    if (!payload.assessment_id || !payload.questions_text) {
        showAlert('اختر المقياس وأدخل الأسئلة.', 'warning'); return;
    }
    setLoading(btn, true);
    $.ajax({
        url: '{{ route('admin.questions.bulk') }}',
        method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance($('#bulkModal')).hide();
            showAlert(res.message, 'success');
            reloadTable();
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

// Delete question
$(document).on('click', '.btn-delete-q', function() {
    const url = $(this).data('url');
    confirmDelete('هل تريد حذف هذا السؤال نهائياً؟', url, () => reloadTable());
});

// SortableJS initialization
function initSortable() {
    @if(request('assessment_id'))
    const el = document.getElementById('sortable-questions');
    if (el) {
        new Sortable(el, {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function (evt) {
                const order = [];
                $('#sortable-questions tr').each(function() {
                    const id = $(this).data('id');
                    if (id) {
                        order.push(id);
                    }
                });

                $.ajax({
                    url: '{{ route('admin.questions.reorder') }}',
                    method: 'PATCH',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: { order: order },
                    success: function(res) {
                        showAlert('تم تحديث ترتيب الأسئلة بنجاح.', 'success');
                    },
                    error: function(xhr) {
                        showAlert('حدث خطأ أثناء إعادة الترتيب.', 'danger');
                    }
                });
            }
        });
    }
    @endif
}

// Initial calls
$(document).ready(function() {
    initSortable();
});
</script>
@endpush
````

## File: resources/views/admin/recommendations/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'إدارة التوصيات')
@section('page-title', 'إدارة التوصيات')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-muted small mb-0">ضع توصية لكل مستوى (مرتفع / متوسط / منخفض) لكل مقياس.</p>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#recModal">
        <i class="bi bi-plus-circle me-1"></i>إضافة توصية
    </button>
</div>

@forelse($assessments as $assessment)
    @php $recs = $recommendations[$assessment->id] ?? collect(); @endphp
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-transparent border-0 py-3">
            <h6 class="mb-0 fw-semibold">
                <i class="bi bi-collection text-primary me-2"></i>{{ $assessment->title_ar }}
                <span class="text-muted fw-normal small ms-2">{{ $assessment->category }}</span>
            </h6>
        </div>
        <div class="card-body px-4 pb-4 pt-0">
            @if($recs->isEmpty())
                <p class="text-muted small mb-0">لا توجد توصيات لهذا المقياس بعد.</p>
            @else
                <div class="row g-3">
                    @foreach($recs as $rec)
                        @php
                            $lc = match($rec->level) { 'high'=>'success', 'medium'=>'warning', default=>'danger' };
                            $ll = match($rec->level) { 'high'=>'مرتفع', 'medium'=>'متوسط', default=>'منخفض' };
                        @endphp
                        <div class="col-md-4">
                            <div class="border border-{{ $lc }} rounded-3 p-3 h-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-{{ $lc }}-subtle text-{{ $lc }} border border-{{ $lc }}-subtle">{{ $ll }}</span>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary btn-edit-rec"
                                                data-id="{{ $rec->id }}"
                                                data-assessment="{{ $rec->assessment_id }}"
                                                data-level="{{ $rec->level }}"
                                                data-high="{{ $rec->high_threshold }}"
                                                data-low="{{ $rec->low_threshold }}"
                                                data-desc="{{ $rec->description_ar }}"
                                                data-certificates_intro="{{ $rec->certificates_intro_ar }}"
                                                data-certificates="{{ json_encode($rec->certificates_ar ?? []) }}"
                                                data-programs="{{ json_encode($rec->programs_ar ?? []) }}"
                                                data-plan_intro="{{ $rec->plan_30_days_intro_ar }}"
                                                data-plan="{{ json_encode($rec->plan_30_days_ar ?? []) }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger btn-delete-rec"
                                                data-id="{{ $rec->id }}"
                                                data-url="{{ route('admin.recommendations.destroy', $rec->id) }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="small text-muted mb-2">{{ Str::limit($rec->description_ar, 100) }}</p>
                                <div class="small text-muted">
                                    <span class="badge bg-light text-dark border me-1">حد أعلى: {{ $rec->high_threshold }}</span>
                                    <span class="badge bg-light text-dark border">حد أدنى: {{ $rec->low_threshold }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@empty
    <div class="alert alert-info"><i class="bi bi-info-circle me-2"></i>لا توجد مقاييس بعد.</div>
@endforelse

<!-- Recommendation Modal -->
<div class="modal fade" id="recModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إضافة / تحديث توصية</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="r-id" value="">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المقياس *</label>
                        <select class="form-select" id="r-assessment_id">
                            <option value="">اختر المقياس</option>
                            @foreach($assessments as $a)
                                <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المستوى *</label>
                        <select class="form-select" id="r-level">
                            <option value="">اختر المستوى</option>
                            <option value="high">مرتفع</option>
                            <option value="medium">متوسط</option>
                            <option value="low">منخفض</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">حد الدرجة المرتفعة (%) *</label>
                        <input type="number" class="form-control" id="r-high_threshold" placeholder="مثال: 70" min="0" max="100">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">حد الدرجة المنخفضة (%) *</label>
                        <input type="number" class="form-control" id="r-low_threshold" placeholder="مثال: 33" min="0" max="100">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">وصف نتيجة هذا المستوى *</label>
                        <textarea class="form-control" id="r-description_ar" rows="3"
                            placeholder="وصف يظهر للمستخدم بناءً على مستواه..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الجملة الافتتاحية للشهادات (اختياري)</label>
                        <input type="text" class="form-control" id="r-certificates_intro_ar" placeholder="مثال: من أهم الشهادات التي ننصحك بالحصول عليها:">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الشهادات الاحترافية المناسبة *</label>
                        <textarea class="form-control json-certificates-data" id="r-certificates_ar" rows="3"
                            placeholder="إضافة شهادة..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">البرامج والتوصيات المقترحة *</label>
                        <textarea class="form-control json-programs-data" id="r-programs_ar" rows="5"
                            placeholder="إضافة برنامج/توصية..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الجملة الافتتاحية لخطة التطوير (اختياري)</label>
                        <input type="text" class="form-control" id="r-plan_30_days_intro_ar" placeholder="مثال: نقترح عليك خلال الـ 30 يوماً القادمة اتباع الخطوات التالية:">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">خطة تطوير (30 يوماً) *</label>
                        <textarea class="form-control json-plan-data" id="r-plan_30_days_ar" rows="3"
                            placeholder="إضافة خطوة..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-rec">
                    <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التوصية</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.APP_ICONS = @json($icons ?? []);
</script>
<script>
$('#btn-save-rec').on('click', function() {
    const btn = $(this);
    let certs = []; try { certs = JSON.parse($('#r-certificates_ar').val() || '[]'); } catch(e){}
    let progs = []; try { progs = JSON.parse($('#r-programs_ar').val() || '[]'); } catch(e){}
    let plan = []; try { plan = JSON.parse($('#r-plan_30_days_ar').val() || '[]'); } catch(e){}

    const payload = {
        id: $('#r-id').val() || null,
        assessment_id: $('#r-assessment_id').val(),
        level: $('#r-level').val(),
        description_ar: $('#r-description_ar').val().trim(),
        certificates_intro_ar: $('#r-certificates_intro_ar').val().trim(),
        certificates_ar: certs,
        programs_ar: progs,
        plan_30_days_intro_ar: $('#r-plan_30_days_intro_ar').val().trim(),
        plan_30_days_ar: plan,
        high_threshold: parseInt($('#r-high_threshold').val()) || 0,
        low_threshold:  parseInt($('#r-low_threshold').val()) || 0,
    };

    if (!payload.assessment_id || !payload.level || !payload.description_ar) {
        showAlert('يرجى ملء جميع الحقول المطلوبة.', 'warning'); return;
    }

    setLoading(btn, true);
    $.ajax({
        url: '{{ route('admin.recommendations.store') }}',
        method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance($('#recModal')).hide();
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1000);
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

$(document).on('click', '.btn-delete-rec', function() {
    const url = $(this).data('url');
    confirmDelete('هل تريد حذف هذه التوصية؟', url, () => location.reload());
});

$(document).on('click', '.btn-edit-rec', function() {
    const btn = $(this);
    $('#r-id').val(btn.data('id') || '');
    $('#r-assessment_id').val(btn.data('assessment'));
    $('#r-level').val(btn.data('level'));
    $('#r-high_threshold').val(btn.data('high'));
    $('#r-low_threshold').val(btn.data('low'));
    $('#r-description_ar').val(btn.data('desc'));
    $('#r-certificates_intro_ar').val(btn.data('certificates_intro'));
    $('#r-plan_30_days_intro_ar').val(btn.data('plan_intro'));
    
    const certsVal = JSON.stringify(btn.data('certificates') || []);
    const progsVal = JSON.stringify(btn.data('programs') || []);
    const planVal = JSON.stringify(btn.data('plan') || []);
    
    $('#r-certificates_ar').val(certsVal);
    $('#r-programs_ar').val(progsVal);
    $('#r-plan_30_days_ar').val(planVal);
    
    if ($('#r-certificates_ar').data('clearItems')) {
        $('#r-certificates_ar').data('clearItems')(certsVal);
    }
    if ($('#r-programs_ar').data('clearItems')) {
        $('#r-programs_ar').data('clearItems')(progsVal);
    }
    if ($('#r-plan_30_days_ar').data('clearItems')) {
        $('#r-plan_30_days_ar').data('clearItems')(planVal);
    }
    
    $('.modal-title').text('تحديث التوصية');
    new bootstrap.Modal(document.getElementById('recModal')).show();
});

$('[data-bs-target="#recModal"]').on('click', function() {
    clearRecommendationModal();
    $('.modal-title').text('إضافة / تحديث توصية');
});

function clearRecommendationModal() {
    $('#r-id').val('');
    $('#r-assessment_id').val('');
    $('#r-level').val('');
    $('#r-high_threshold').val('');
    $('#r-low_threshold').val('');
    $('#r-description_ar').val('');
    $('#r-certificates_intro_ar').val('');
    $('#r-plan_30_days_intro_ar').val('');
    function clearJsonList(selector) {
        const textarea = $(selector);
        textarea.val('');
        if (textarea.data('clearItems')) {
            textarea.data('clearItems')();
        }
    }

    clearJsonList('#r-certificates_ar');
    clearJsonList('#r-programs_ar');
    clearJsonList('#r-plan_30_days_ar');
}
</script>
@endpush
````

## File: resources/views/admin/settings/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'إعدادات الإحصائيات')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800 fw-bold">إعدادات الإحصائيات</h2>
</div>

<div class="card shadow border-0 rounded-4 mb-4">
    <div class="card-body p-4">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h5 class="fw-bold mb-4 text-primary"><i class="bi bi-graph-up me-2"></i> إحصائيات لوحة تحكم المستخدم</h5>
            
            <div class="mb-4 bg-light p-3 rounded border">
                <label class="form-label fw-bold mb-3">طريقة عرض الإحصائيات (في الرئيسية)</label>
                <div class="d-flex gap-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stats_mode" id="modeManual" value="manual" {{ ($settings['stats_mode'] ?? 'manual') == 'manual' ? 'checked' : '' }}>
                        <label class="form-check-label fw-medium" for="modeManual">
                            أرقام يدوية (تسويقية)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stats_mode" id="modeAuto" value="auto" {{ ($settings['stats_mode'] ?? 'manual') == 'auto' ? 'checked' : '' }}>
                        <label class="form-check-label fw-medium text-primary" for="modeAuto">
                            أرقام تلقائية (حقيقية من قاعدة البيانات)
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">مستخدم من الأفراد والجهات</label>
                    <input type="text" name="stat_users" class="form-control mb-2" value="{{ old('stat_users', $settings['stat_users'] ?? '25,000+') }}" required>
                    <label class="form-label small text-muted">أيقونة القسم (اختياري)</label>
                    @if(isset($settings['stat_users_icon']) && $settings['stat_users_icon'])
                        <img src="{{ asset($settings['stat_users_icon']) }}" class="mb-1 d-block" height="30">
                    @endif
                    <input type="file" name="stat_users_icon" class="form-control form-control-sm" accept="image/*">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">اختبار ومقياس تم إنجازه</label>
                    <input type="text" name="stat_exams" class="form-control mb-2" value="{{ old('stat_exams', $settings['stat_exams'] ?? '10,000+') }}" required>
                    <label class="form-label small text-muted">أيقونة القسم (اختياري)</label>
                    @if(isset($settings['stat_exams_icon']) && $settings['stat_exams_icon'])
                        <img src="{{ asset($settings['stat_exams_icon']) }}" class="mb-1 d-block" height="30">
                    @endif
                    <input type="file" name="stat_exams_icon" class="form-control form-control-sm" accept="image/*">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">مقياس مهني وشخصي معتمد</label>
                    <input type="text" name="stat_assessments" class="form-control mb-2" value="{{ old('stat_assessments', $settings['stat_assessments'] ?? '150+') }}" required>
                    <label class="form-label small text-muted">أيقونة القسم (اختياري)</label>
                    @if(isset($settings['stat_assessments_icon']) && $settings['stat_assessments_icon'])
                        <img src="{{ asset($settings['stat_assessments_icon']) }}" class="mb-1 d-block" height="30">
                    @endif
                    <input type="file" name="stat_assessments_icon" class="form-control form-control-sm" accept="image/*">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">مجال ومهارة مختلفة</label>
                    <input type="text" name="stat_fields" class="form-control mb-2" value="{{ old('stat_fields', $settings['stat_fields'] ?? '50+') }}" required>
                    <label class="form-label small text-muted">أيقونة القسم (اختياري)</label>
                    @if(isset($settings['stat_fields_icon']) && $settings['stat_fields_icon'])
                        <img src="{{ asset($settings['stat_fields_icon']) }}" class="mb-1 d-block" height="30">
                    @endif
                    <input type="file" name="stat_fields_icon" class="form-control form-control-sm" accept="image/*">
                </div>
            </div>

            <hr class="my-4">

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="bi bi-save me-1"></i> حفظ التعديلات
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
````

## File: resources/views/admin/statistics/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'الإحصائيات')
@section('page-title', 'الإحصائيات والتقارير')

@push('styles')
<style>
canvas { max-height: 320px; }
</style>
@endpush

@section('content')
<!-- Range selector & Export -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex gap-2">
        @foreach([7=>'أسبوع', 30=>'شهر', 90=>'3 أشهر'] as $days => $label)
            <button class="btn btn-sm {{ $days == 30 ? 'btn-primary' : 'btn-outline-secondary' }} btn-range" data-range="{{ $days }}">
                {{ $label }}
            </button>
        @endforeach
    </div>
    <a href="{{ route('admin.statistics.exportCsv') }}" class="btn btn-sm btn-success shadow-sm">
        <i class="bi bi-file-earmark-excel me-1"></i>تصدير جميع النتائج (CSV)
    </a>
</div>

<div class="row g-4">
    <!-- Daily sessions chart -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h6 class="fw-semibold mb-3"><i class="bi bi-bar-chart text-primary me-2"></i>الجلسات اليومية</h6>
                <canvas id="dailyChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Level distribution -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h6 class="fw-semibold mb-3"><i class="bi bi-pie-chart text-success me-2"></i>توزيع المستويات</h6>
                <div class="mb-3">
                    <label class="form-label small fw-medium">المقياس</label>
                    <select class="form-select form-select-sm" id="level-assessment-filter">
                        <option value="all">كل المقاييس</option>
                    </select>
                </div>
                <canvas id="levelChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Avg score per assessment -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h6 class="fw-semibold mb-3"><i class="bi bi-graph-up text-warning me-2"></i>متوسط الدرجات</h6>
                <canvas id="avgChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Top users -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 py-3">
                <h6 class="mb-0 fw-semibold"><i class="bi bi-trophy text-warning me-2"></i>أكثر المستخدمين نشاطاً</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 small" id="top-users-table">
                    <thead class="table-light">
                        <tr><th>#</th><th>الاسم</th><th>البريد</th><th>الجلسات</th></tr>
                    </thead>
                    <tbody id="top-users-body">
                        <tr><td colspan="4" class="text-center text-muted py-3">جاري التحميل...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script>
Chart.defaults.font.family = 'Noto Kufi Arabic';
Chart.defaults.plugins.legend.labels.usePointStyle = true;

let dailyChart, levelChart, avgChart;
let currentRange = 30;
let statsData = null;

function initCharts() {
    dailyChart = new Chart(document.getElementById('dailyChart'), {
        type: 'bar',
        data: { labels: [], datasets: [{ label: 'الجلسات', data: [], backgroundColor: 'rgba(13,110,253,.7)', borderRadius: 6 }] },
        options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
    });

    levelChart = new Chart(document.getElementById('levelChart'), {
        type: 'doughnut',
        data: {
            labels: ['مرتفع', 'متوسط', 'منخفض'],
            datasets: [{ data: [0,0,0], backgroundColor: ['#198754','#ffc107','#dc3545'], borderWidth: 2 }]
        },
        options: { cutout: '65%', plugins: { legend: { position: 'bottom' } } }
    });

    avgChart = new Chart(document.getElementById('avgChart'), {
        type: 'bar',
        data: { labels: [], datasets: [{ label: 'متوسط الدرجة', data: [], backgroundColor: 'rgba(255,193,7,.8)', borderRadius: 6 }] },
        options: { indexAxis: 'y', plugins: { legend: { display: false } }, scales: { x: { beginAtZero: true } } }
    });
}

function loadStats(range) {
    $.get('{{ route('admin.statistics.data') }}', { range }, function(data) {
        statsData = data;

        // Daily chart
        dailyChart.data.labels = data.dailyData.map(d => d.date);
        dailyChart.data.datasets[0].data = data.dailyData.map(d => d.count);
        dailyChart.update();

        // Populate assessment filter
        const sel = $('#level-assessment-filter');
        sel.find('option:not([value="all"])').remove();
        data.assessments.forEach(a => sel.append(`<option value="${a.id}">${a.title}</option>`));

        // Level chart (all)
        updateLevelChart('all');

        // Avg chart
        avgChart.data.labels = data.avgScores.map(a => a.title);
        avgChart.data.datasets[0].data = data.avgScores.map(a => a.avg);
        avgChart.update();

        // Top users
        let rows = '';
        data.topUsers.forEach((u, i) => {
            rows += `<tr><td>${i+1}</td><td>${u.name}</td><td class="text-muted">${u.email}</td><td><span class="badge bg-primary">${u.exam_sessions_count}</span></td></tr>`;
        });
        $('#top-users-body').html(rows || '<tr><td colspan="4" class="text-center text-muted">لا بيانات.</td></tr>');
    });
}

function updateLevelChart(assessmentId) {
    if (!statsData) return;
    let high = 0, medium = 0, low = 0;
    statsData.assessments.forEach(a => {
        if (assessmentId === 'all' || a.id === assessmentId) {
            high   += a.high;
            medium += a.medium;
            low    += a.low;
        }
    });
    levelChart.data.datasets[0].data = [high, medium, low];
    levelChart.update();
}

$('#level-assessment-filter').on('change', function() { updateLevelChart($(this).val()); });

$('.btn-range').on('click', function() {
    currentRange = parseInt($(this).data('range'));
    $('.btn-range').removeClass('btn-primary').addClass('btn-outline-secondary');
    $(this).removeClass('btn-outline-secondary').addClass('btn-primary');
    loadStats(currentRange);
});

$(document).ready(function() {
    initCharts();
    loadStats(currentRange);
});
</script>
@endpush
````

## File: resources/views/admin/users/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'المستخدمين والنتائج')
@section('page-title', 'إدارة المستخدمين وجلسات الاختبار')

@section('content')
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <!-- Search & Info -->
        <div class="row g-3 justify-content-between align-items-center">
            <div class="col-md-6">
                <form method="GET" action="{{ route('admin.users.index') }}" class="d-flex gap-2">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="ابحث بالاسم أو البريد أو الجوال أو الهوية..." value="{{ $search }}">
                        @if($search)
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary d-flex align-items-center"><i class="bi bi-x-lg"></i></a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary px-4">بحث</button>
                </form>
            </div>
            <div class="col-md-auto">
                <span class="text-muted small">إجمالي المستخدمين: <strong>{{ $users->total() }}</strong></span>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الجوال</th>
                    <th>رقم الهوية</th>
                    <th>نوع الحساب</th>
                    <th class="text-center">الاختبارات المؤداة</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $index }}</td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $user->name }}</div>
                        </td>
                        <td class="text-muted small">{{ $user->email }}</td>
                        <td class="text-muted small">{{ $user->phone ?? '—' }}</td>
                        <td class="text-muted small">{{ $user->national_id ?? '—' }}</td>
                        <td>
                            @if($user->isAdmin())
                                <span class="badge bg-danger-subtle text-danger px-2.5 py-1.5 rounded-pill small">مدير النظام</span>
                            @else
                                <span class="badge bg-primary-subtle text-primary px-2.5 py-1.5 rounded-pill small">مستخدم</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge bg-secondary rounded-pill px-3 py-1 fw-medium">
                                {{ $user->completed_exams_count }}
                            </span>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-primary px-3 rounded-pill btn-view-results" data-user-id="{{ $user->id }}">
                                <i class="bi bi-eye me-1"></i> عرض النتائج
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-people fs-1 d-block mb-3 text-secondary"></i>
                            لا يوجد مستخدمين يطابقون خيارات البحث.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($users->hasPages())
        <div class="card-footer bg-transparent border-0 py-3">
            {{ $users->appends(['search' => $search])->links() }}
        </div>
    @endif
</div>

<!-- User Results Modal -->
<div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="resultsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title fw-bold" id="resultsModalLabel">
                    <i class="bi bi-mortarboard me-2"></i> سجل اختبارات المستخدم
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- User Details Card -->
                <div class="bg-light p-3 rounded-3 mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-bold text-dark mb-1" id="modal-user-name">...</h6>
                        <span class="text-muted small" id="modal-user-email">...</span>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-3" id="modal-results-count">0 اختبارات مؤداة</span>
                </div>

                <!-- Results Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="results-table">
                        <thead class="table-light">
                            <tr>
                                <th>المقياس / الاختبار</th>
                                <th class="text-center">الدرجة المحققة</th>
                                <th class="text-center">المستوى المستحق</th>
                                <th class="text-center">تاريخ الإكمال</th>
                                <th class="text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody id="modal-results-body">
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <div class="spinner-border spinner-border-sm text-primary me-2" role="status"></div>
                                    جاري تحميل سجل النتائج...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light py-3">
                <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const resultsModal = new bootstrap.Modal(document.getElementById('resultsModal'));

    $('.btn-view-results').on('click', function() {
        const userId = $(this).data('user-id');
        
        // Reset modal to loading state
        $('#modal-user-name').text('...');
        $('#modal-user-email').text('...');
        $('#modal-results-count').text('0 اختبارات مؤداة');
        $('#modal-results-body').html(`
            <tr>
                <td colspan="5" class="text-center py-4 text-muted">
                    <div class="spinner-border spinner-border-sm text-primary me-2" role="status"></div>
                    جاري تحميل سجل النتائج...
                </td>
            </tr>
        `);

        // Show modal immediately
        resultsModal.show();

        // Fetch data
        $.ajax({
            url: `{{ url('/admin/users') }}/${userId}/results`,
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    $('#modal-user-name').text(response.user.name);
                    $('#modal-user-email').text(response.user.email);
                    $('#modal-results-count').text(`${response.results.length} اختبارات مؤداة`);

                    let rowsHtml = '';
                    if (response.results.length === 0) {
                        rowsHtml = `
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-info-circle fs-2 d-block mb-2 text-secondary"></i>
                                    لا يوجد جلسات اختبار مكتملة لهذا المستخدم حتى الآن.
                                </td>
                            </tr>
                        `;
                    } else {
                        response.results.forEach(res => {
                            let badgeClass = 'bg-secondary';
                            if (res.level_raw === 'high') badgeClass = 'bg-success';
                            else if (res.level_raw === 'medium') badgeClass = 'bg-warning text-dark';
                            else if (res.level_raw === 'low') badgeClass = 'bg-danger';

                            // Construct view result URL dynamically
                            const resultUrl = `{{ url('/exam') }}/${res.id}/result`;

                            rowsHtml += `
                                <tr>
                                    <td>
                                        <div class="fw-semibold text-dark">${res.assessment_title}</div>
                                    </td>
                                    <td class="text-center fw-bold text-primary">${res.total_score} / ${res.max_possible_score}</td>
                                    <td class="text-center">
                                        <span class="badge ${badgeClass} px-2.5 py-1.5 rounded-3 fw-medium">${res.level}</span>
                                    </td>
                                    <td class="text-center text-muted small">${res.completed_at}</td>
                                    <td class="text-center">
                                        <a href="${resultUrl}" target="_blank" class="btn btn-sm btn-outline-secondary px-3 rounded-pill">
                                            <i class="bi bi-box-arrow-up-right me-1"></i> التقرير
                                        </a>
                                    </td>
                                </tr>
                            `;
                        });
                    }

                    $('#modal-results-body').html(rowsHtml);
                } else {
                    $('#modal-results-body').html(`
                        <tr>
                            <td colspan="5" class="text-center py-4 text-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i> حدث خطأ أثناء تحميل البيانات.
                            </td>
                        </tr>
                    `);
                }
            },
            error: function() {
                $('#modal-results-body').html(`
                    <tr>
                        <td colspan="5" class="text-center py-4 text-danger">
                            <i class="bi bi-exclamation-triangle me-2"></i> فشل الاتصال بالخادم.
                        </td>
                    </tr>
                `);
            }
        });
    });
});
</script>
@endpush
````

## File: resources/views/auth/login.blade.php
````php
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول — دار الرؤى</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center min-vh-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="دار الرؤى" style="height: 70px; margin-bottom: 10px;">
                <p class="text-muted">نظام مقاييس التميز الشخصي</p>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4 fw-semibold">تسجيل الدخول</h5>

                    @if($errors->any())
                        <div class="alert alert-danger alert-sm py-2">
                            <i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-medium">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="example@email.com" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">كلمة المرور</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label small" for="remember">تذكرني</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-box-arrow-in-right me-1"></i>دخول
                        </button>
                    </form>
                    <hr>
                    <div class="text-center small">
                        ليس لديك حساب؟
                        <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-medium">سجّل الآن</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
````

## File: resources/views/auth/register.blade.php
````php
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب — دار الرؤى</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center min-vh-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="دار الرؤى" style="height: 70px; margin-bottom: 10px;">
                <p class="text-muted">نظام مقاييس التميز الشخصي</p>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4 fw-semibold">تسجيل حساب جديد</h5>

                    @if($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 small">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-medium">الاسم الكامل</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="الاسم الكامل" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="example@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">رقم الجوال</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" placeholder="05xxxxxxxx" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">رقم الهوية الوطنية / الإقامة</label>
                            <input type="text" name="national_id" class="form-control @error('national_id') is-invalid @enderror"
                                value="{{ old('national_id') }}" placeholder="1xxxxxxxxx" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">النوع</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                <option value="" disabled {{ old('gender') ? '' : 'selected' }}>اختر النوع</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>أنثى</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">المؤهل</label>
                            <input type="text" name="qualification" class="form-control @error('qualification') is-invalid @enderror"
                                value="{{ old('qualification') }}" placeholder="مثال: بكالوريوس" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">الجنسية</label>
                            <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror"
                                value="{{ old('nationality') }}" placeholder="مثال: سعودي" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">كلمة المرور</label>
                            <input type="password" name="password" class="form-control" placeholder="8 أحرف على الأقل" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-medium">تأكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="أعد كتابة كلمة المرور" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-person-plus me-1"></i>إنشاء الحساب
                        </button>
                    </form>
                    <hr>
                    <div class="text-center small">
                        لديك حساب بالفعل؟
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-medium">سجّل دخولك</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
````

## File: resources/views/user/exam.blade.php
````php
@extends('layouts.user')
@section('title', $assessment->title_ar)

@push('styles')
<style>
/* ── Layout ── */
.exam-wrapper {
    max-width: 820px;
    margin: 0 auto;
    padding: 24px 16px 60px;
}

/* ── Intro Card ── */
#intro-card {
    border: 0;
    border-radius: 24px;
    background: #ffffff;
    box-shadow: 0 20px 60px -10px rgba(26, 43, 86, 0.12);
    overflow: hidden;
}

.intro-header {
    background: linear-gradient(135deg, #1a2b56 0%, #2d4a8a 60%, #1e3a7e 100%);
    padding: 48px 40px 56px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.intro-header::before {
    content: '';
    position: absolute;
    top: -60px; right: -60px;
    width: 200px; height: 200px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
}

.intro-header::after {
    content: '';
    position: absolute;
    bottom: -80px; left: -40px;
    width: 250px; height: 250px;
    border-radius: 50%;
    background: rgba(255,255,255,0.04);
}

.intro-icon-wrap {
    width: 90px; height: 90px;
    background: rgba(255,255,255,0.15);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
    backdrop-filter: blur(4px);
    border: 2px solid rgba(255,255,255,0.2);
    position: relative; z-index: 1;
}

.intro-title {
    font-size: 1.85rem;
    font-weight: 800;
    color: #ffffff;
    margin: 0;
    line-height: 1.3;
    position: relative; z-index: 1;
}

.intro-subtitle {
    color: rgba(255,255,255,0.75);
    font-size: 0.95rem;
    margin: 10px 0 0;
    position: relative; z-index: 1;
}

.intro-body {
    padding: 40px;
}

/* Chips in header */
.intro-chips {
    display: flex;
    gap: 8px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 14px;
    position: relative;
    z-index: 1;
}

.intro-chip {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 999px;
    padding: 5px 12px;
    font-size: 0.78rem;
    font-weight: 600;
    color: rgba(255,255,255,0.92);
    backdrop-filter: blur(4px);
    white-space: nowrap;
}

.intro-chip i { font-size: 0.8rem; }

/* Guidelines box */
.intro-guidelines {
    background: linear-gradient(135deg, #eff6ff 0%, #f0f9ff 100%);
    border: 1px solid #bfdbfe;
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 32px;
}

.intro-guidelines-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1a2b56;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.guideline-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 12px;
    font-size: 0.9rem;
    color: #334155;
    line-height: 1.6;
}

.guideline-item:last-child { margin-bottom: 0; }

.guideline-dot {
    width: 28px; height: 28px;
    background: #1a2b56;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    color: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    margin-top: 1px;
}

/* Start button */
.btn-start {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 16px 32px;
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: #fff;
    border: 0;
    border-radius: 14px;
    font-size: 1.1rem;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 8px 24px -4px rgba(245, 158, 11, 0.4);
    letter-spacing: 0.01em;
}

.btn-start:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 30px -4px rgba(245, 158, 11, 0.5);
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: #fff;
}

.btn-start:active {
    transform: translateY(0);
}

/* ── Progress ── */
.progress-container { width: 100%; max-width: 250px; }
.progress-track { height: 8px; border-radius: 999px; background: #e2e8f0; overflow: hidden; }
.progress-fill {
    height: 100%; border-radius: 999px;
    background: #1a2b56;
    transition: width .4s ease;
}

/* ── Options ── */
.option-card {
    cursor: pointer;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    transition: all .2s ease;
    background: #fff;
    display: flex;
    align-items: center;
    padding: 1.2rem 1.5rem;
    margin-bottom: 1rem;
}
.option-card:hover { border-color: #cbd5e1; background: #f8fafc; }
.option-card.selected { border-color: #f59e0b; background: #fffbeb; }
.option-card input[type=radio] { display: none; }

.custom-radio {
    width: 24px; height: 24px; border-radius: 50%;
    border: 2px solid #cbd5e1;
    display: flex; align-items: center; justify-content: center;
    margin-left: 15px;
    transition: all .2s;
    flex-shrink: 0;
}
.custom-radio::after {
    content: '';
    width: 12px; height: 12px; border-radius: 50%;
    background: #f59e0b;
    transform: scale(0);
    transition: transform .2s cubic-bezier(0.4, 0, 0.2, 1);
}
.option-card.selected .custom-radio { border-color: #f59e0b; }
.option-card.selected .custom-radio::after { transform: scale(1); }

.option-text {
    flex-grow: 1;
    font-size: 1.1rem;
    color: #334155;
    font-weight: 500;
}
.option-card.selected .option-text { color: #1a2b56; font-weight: 700; }

/* ── Question card ── */
#question-card {
    border-radius: 20px; border: 0;
    box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.08);
    background: #ffffff;
    padding: 40px;
}

/* ── Buttons ── */
#btn-next {
    background: #f59e0b;
    color: #fff;
    border: 0; border-radius: 8px; padding: .6rem 2.5rem;
    font-weight: 700; font-size: 1rem;
    transition: all .2s;
}
#btn-next:not(:disabled):hover { background: #d97706; transform: translateY(-1px); }
#btn-next:disabled { opacity: .5; cursor: not-allowed; }

.btn-prev {
    color: #1a2b56; font-weight: 700; text-decoration: none;
    display: inline-flex; align-items: center; gap: 0.5rem;
    cursor: pointer;
    background: transparent;
    border: none;
    padding: 0;
}
.btn-prev:hover { color: #0d6efd; }
.btn-prev:disabled { opacity: 0.5; cursor: not-allowed; }

.timer-footer { font-size: 0.85rem; color: #64748b; }

/* ── Responsive ── */
@media (max-width: 768px) {
    .intro-header { padding: 32px 20px 40px; }
    .intro-body { padding: 24px 20px; }
    .intro-title { font-size: 1.45rem; }
    .intro-icon-wrap { width: 70px; height: 70px; }
}

@media (max-width: 576px) {
    .exam-wrapper { padding: 0 0 24px; }
    #intro-card { border-radius: 0 0 20px 20px; }
    .intro-header { padding: 24px 16px 32px; }
    .intro-body { padding: 18px 16px 24px; }
    .intro-title { font-size: 1.2rem; }
    .intro-icon-wrap { width: 56px; height: 56px; margin-bottom: 12px; }
    .intro-chip { font-size: 0.72rem; padding: 4px 10px; }
    .intro-guidelines { padding: 14px; }
    .guideline-item { font-size: 0.85rem; }
    .guideline-dot { width: 24px; height: 24px; font-size: 0.7rem; }
    .btn-start { font-size: 0.95rem; padding: 14px 20px; }
    #question-card { padding: 16px 12px; border-radius: 0; }
    .header-desktop { display: none !important; }
    .header-mobile { display: flex !important; }
    .option-card { padding: 0.75rem 1rem; margin-bottom: 0.5rem; }
    .option-text { font-size: 0.9rem; }
    #question-text { font-size: 1.1rem; }
    .alert { padding: 0.5rem 0.8rem; font-size: 0.82rem; }
}
</style>
@endpush

@section('content')
<div class="exam-wrapper">

    @if($progress['current'] == 1)
    <div id="intro-card">

        {{-- Coloured Header --}}
        <div class="intro-header">
            <div class="intro-icon-wrap">
                <i class="bi bi-journal-text" style="font-size: 2rem; color: #fff;"></i>
            </div>
            <h1 class="intro-title">{{ $assessment->title_ar }}</h1>
            @if($assessment->subtitle_ar)
                <p class="intro-subtitle">{{ $assessment->subtitle_ar }}</p>
            @endif

            {{-- Small chips: questions count + time --}}
            <div class="intro-chips">
                <span class="intro-chip">
                    <i class="bi bi-list-check"></i>
                    {{ $progress['total'] }} سؤال
                </span>
                @if($assessment->time_limit_min)
                <span class="intro-chip">
                    <i class="bi bi-clock"></i>
                    {{ $assessment->time_limit_min }} دقيقة
                </span>
                @endif
                @if($assessment->category)
                <span class="intro-chip">
                    <i class="bi bi-tag"></i>
                    {{ $assessment->category }}
                </span>
                @endif
            </div>
        </div>

        {{-- Body --}}
        <div class="intro-body">

            {{-- Guidelines --}}
            <div class="intro-guidelines">
                <div class="intro-guidelines-title">
                    <i class="bi bi-shield-check text-primary"></i>
                    توجيهات هامة قبل البدء
                </div>
                <div class="guideline-item">
                    <div class="guideline-dot">١</div>
                    <span>كن صادقًا مع نفسك في إجاباتك؛ فكلما كانت إجاباتك أكثر دقة وواقعية، كانت نتائج المقياس أكثر فائدة لك.</span>
                </div>
                <div class="guideline-item">
                    <div class="guideline-dot">٢</div>
                    <span>لا توجد إجابات صحيحة أو خاطئة؛ صدقك مع نفسك هو مفتاح الحصول على نتائج تعكس واقعك وتفيدك حقًا.</span>
                </div>
                <div class="guideline-item">
                    <div class="guideline-dot">٣</div>
                    <span>اقرأ كل عبارة بعناية، ثم اختر الإجابة التي تعبر عنك فعلاً دون تفكير مبالغ فيه.</span>
                </div>
            </div>

            {{-- Start Button --}}
            <button type="button" class="btn-start" id="btn-start-exam">
                <span>فهمت ذلك، ابدأ المقياس</span>
                <i class="bi bi-arrow-left"></i>
            </button>

        </div>
    </div>
    @endif

    <div class="card" id="question-card" style="{{ $progress['current'] == 1 ? 'display: none;' : '' }}">
        {{-- Header Desktop --}}
        <div class="d-none d-sm-flex justify-content-between align-items-start mb-5 header-desktop">
            <div class="progress-container mt-2">
                <div class="d-flex justify-content-between small text-muted mb-2">
                    <span id="q-pct" class="fw-bold text-dark">{{ $progress['percentage'] }}%</span>
                    <span>السؤال <strong id="q-current">{{ $progress['current'] }}</strong> من <strong>{{ $progress['total'] }}</strong></span>
                </div>
                <div class="progress-track">
                    <div class="progress-fill" id="progress-bar" style="width:{{ $progress['percentage'] }}%"></div>
                </div>
            </div>

            <div class="text-end">
                <h4 class="fw-bold mb-1" style="color: #1a2b56;">{{ $assessment->title_ar }}</h4>
            </div>

        </div>

        {{-- Header Mobile --}}
        <div class="d-flex d-sm-none flex-column mb-3 header-mobile">
            <div class="text-center mb-3">
                <h6 class="fw-bold mb-1" style="color: #1a2b56;">{{ $assessment->title_ar }}</h6>
            </div>

            <div class="progress-container w-100 mx-auto" style="max-width: 100%;">
                <div class="d-flex justify-content-between text-muted mb-1" style="font-size: 0.8rem;">
                    <span id="q-pct-mobile" class="fw-bold text-dark">{{ $progress['percentage'] }}%</span>
                    <span>السؤال <strong id="q-current-mobile">{{ $progress['current'] }}</strong> من <strong>{{ $progress['total'] }}</strong></span>
                </div>
                <div class="progress-track">
                    <div class="progress-fill" id="progress-bar-mobile" style="width:{{ $progress['percentage'] }}%"></div>
                </div>
            </div>
        </div>

        {{-- Question Text --}}
        <h3 class="text-center fw-bold mb-1 mt-4" id="question-text" style="color: #1a2b56;">{{ $nextQuestion->text_ar }}</h3>
        <p class="text-center text-muted small mb-4" style="font-size: 0.8rem;">اختر الإجابة التي تعبر عن رأيك بدقة</p>

        {{-- Options --}}
        <div class="d-flex flex-column" id="options-container">
            @foreach($nextQuestion->answerOptions as $i => $option)
            <label class="option-card" data-option-id="{{ $option->id }}">
                <input type="radio" name="selected_option" value="{{ $option->id }}">
                <div class="custom-radio"></div>
                <span class="option-text">{{ $option->label_ar }}</span>
                @if(str_contains($option->label_ar, 'نعم') || str_contains($option->label_ar, 'أوافق'))
                    <span class="fs-4 ms-2">👍</span>
                @elseif(str_contains($option->label_ar, 'لا') || str_contains($option->label_ar, 'أرفض'))
                    <span class="fs-4 ms-2">👎</span>
                @elseif(str_contains($option->label_ar, 'حد ما') || str_contains($option->label_ar, 'محايد'))
                    <span class="fs-4 ms-2">😐</span>
                @endif
            </label>
            @endforeach
        </div>

        {{-- Error Banner --}}
        <div id="error-banner" class="alert alert-danger py-2 mt-3 d-none text-center" role="alert">
            <i class="bi bi-wifi-off me-1"></i>مشكلة في الاتصال.
            <button class="btn btn-sm btn-danger ms-2" id="btn-retry">إعادة المحاولة</button>
        </div>

        {{-- Bottom Actions --}}
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <button type="button" class="btn-prev" id="btn-prev" style="{{ $progress['current'] > 1 ? '' : 'visibility: hidden;' }}">
                <i class="bi bi-arrow-right"></i> السابق
            </button>
            
            <button type="button" class="btn ms-auto" id="btn-next" disabled>
                <span id="btn-text">التالي <i class="bi bi-chevron-left ms-1" style="font-size: 0.8em;"></i></span>
                <span id="btn-spinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
            </button>
        </div>

        {{-- Footer Info --}}
        <div class="text-center mt-5 timer-footer d-flex justify-content-center align-items-center gap-2">
            @if($assessment->time_limit_min)
                <span><i class="bi bi-stopwatch"></i> الوقت المتبقي: <span id="timer-text">{{ sprintf('%02d:%02d', $assessment->time_limit_min, 0) }}</span></span>
                <span class="text-muted">|</span>
            @endif
            <span>تبقى <span id="q-remaining">{{ $progress['total'] - $progress['current'] }}</span> سؤال</span>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
const SESSION_ID  = '{{ $session->id }}';
const ANSWER_URL  = '{{ route('exam.answer', $session->id) }}';
const PREV_URL    = '{{ route('exam.previous', $session->id) }}';
const CSRF        = $('meta[name="csrf-token"]').attr('content');
const TIME_LIMIT  = {{ $assessment->time_limit_min ?? 'null' }};
const TOTAL_Q     = {{ $progress['total'] }};
const OPTION_LETTERS = ['أ','ب','ج','د','هـ','و','ز','ح'];

let currentQuestion = {
    id:             '{{ $nextQuestion->id }}',
    text_ar:        {!! Js::from($nextQuestion->text_ar) !!},
    is_reversed:    {{ $nextQuestion->is_reversed ? 'true' : 'false' }},
    dimension_name: {!! Js::from($nextQuestion->dimension?->name_ar) !!},
    options:        {!! json_encode($nextQuestion->answerOptions->map(fn($o) => ['id' => $o->id, 'label_ar' => $o->label_ar])) !!}
};

let selectedOptionId = null;
let pendingAnswer    = null;
let timerInterval    = null;
let timeLeft         = TIME_LIMIT ? TIME_LIMIT * 60 : 0;
const LS_KEY         = `exam_${SESSION_ID}`;

/* ── Timer ── */
let timerStarted = false;
function startTimer() {
    if (TIME_LIMIT && !timerStarted) {
        timerStarted = true;
        timerInterval = setInterval(() => {
            timeLeft--;
            const m = String(Math.floor(timeLeft / 60)).padStart(2,'0');
            const s = String(timeLeft % 60).padStart(2,'0');
            $('#timer-text').text(`${m}:${s}`);
            if (timeLeft <= 0) { clearInterval(timerInterval); submitCurrent(true); }
        }, 1000);
    }
}

if ($('#intro-card').length === 0) {
    startTimer();
}

$('#btn-start-exam').on('click', function() {
    $('#intro-card').fadeOut(250, function() {
        $('#question-card').fadeIn(250);
        startTimer();
    });
});

/* ── Option selection ── */
$(document).on('click', '.option-card', function () {
    $('.option-card').removeClass('selected');
    $('.option-card').find('input[type=radio]').prop('checked', false);
    
    $(this).addClass('selected');
    $(this).find('input[type=radio]').prop('checked', true);
    
    selectedOptionId = $(this).data('option-id');
    $('#btn-next').prop('disabled', false);
});

/* ── Next / Prev ── */
$('#btn-next').on('click', function () { if (selectedOptionId) submitCurrent(false); });
$('#btn-retry').on('click', function () {
    if (pendingAnswer) { $('#error-banner').addClass('d-none'); doSubmit(pendingAnswer.qId, pendingAnswer.optId); }
});

$('#btn-prev').on('click', function () {
    $(this).prop('disabled', true);
    $.ajax({
        url: PREV_URL, method: 'POST',
        headers: { 'X-CSRF-TOKEN': CSRF },
        success(res) {
            updateProgressAndLoadQuestion(res);
            $('#btn-prev').prop('disabled', false);
        },
        error() {
            $('#btn-prev').prop('disabled', false);
            alert('حدث خطأ أثناء العودة للسؤال السابق.');
        }
    });
});

function submitCurrent(isTimeout) {
    const qId  = currentQuestion.id;
    const optId = isTimeout ? (selectedOptionId || currentQuestion.options[0].id) : selectedOptionId;
    pendingAnswer = { qId, optId };
    try { const d = JSON.parse(localStorage.getItem(LS_KEY)||'{}'); d[qId]=optId; localStorage.setItem(LS_KEY,JSON.stringify(d)); } catch(e){}
    doSubmit(qId, optId);
}

function doSubmit(qId, optId) {
    $('#btn-next').prop('disabled', true);
    $('#btn-text').addClass('d-none');
    $('#btn-spinner').removeClass('d-none');
    $.ajax({
        url: ANSWER_URL, method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': CSRF },
        data: JSON.stringify({ question_id: qId, selected_option_id: optId }),
        success(res) {
            $('#btn-spinner').addClass('d-none'); $('#btn-text').removeClass('d-none');
            updateProgressAndLoadQuestion(res);
        },
        error() {
            $('#btn-spinner').addClass('d-none'); $('#btn-text').removeClass('d-none');
            $('#btn-next').prop('disabled', false);
            $('#error-banner').removeClass('d-none');
        }
    });
}

function updateProgressAndLoadQuestion(res) {
    if (res.is_last) {
        clearInterval(timerInterval);
        localStorage.removeItem(LS_KEY);
        window.location.href = res.redirect;
        return;
    }
    // Update progress
    const p = res.progress;
    $('#progress-bar, #progress-bar-mobile').css('width', p.percentage + '%');
    $('#q-current, #q-current-mobile').text(p.current);
    $('#q-pct, #q-pct-mobile').text(p.percentage + '%');
    $('#q-remaining').text(p.total - p.current);
    
    // Toggle Prev Button
    if (p.current > 1) {
        $('#btn-prev').css('visibility', 'visible');
    } else {
        $('#btn-prev').css('visibility', 'hidden');
    }
    
    // Load next
    currentQuestion = res.next_question;
    selectedOptionId = null;
    loadQuestion(res.next_question);
}

function loadQuestion(q) {
    // Dimension badge (if any)
    if (q.dimension_name) {
        $('#dim-name').text(q.dimension_name);
        $('#dim-badge, #dim-badge-wrapper').removeClass('d-none');
    } else {
        $('#dim-badge, #dim-badge-wrapper').addClass('d-none');
    }
    // Reversed notice
    q.is_reversed ? $('#reversed-notice').removeClass('d-none') : $('#reversed-notice').addClass('d-none');
    // Question text
    $('#question-text').text(q.text_ar);
    // Options
    let html = '';
    q.options.forEach((opt) => {
        let emoji = '';
        if(opt.label_ar.includes('نعم') || opt.label_ar.includes('أوافق')) emoji = '👍';
        else if(opt.label_ar.includes('لا') || opt.label_ar.includes('أرفض')) emoji = '👎';
        else if(opt.label_ar.includes('حد ما') || opt.label_ar.includes('محايد')) emoji = '😐';
        
        let emojiHtml = emoji ? `<span class="fs-4 ms-2">${emoji}</span>` : '';
        
        html += `<label class="option-card" data-option-id="${opt.id}">
            <input type="radio" name="selected_option" value="${opt.id}">
            <div class="custom-radio"></div>
            <span class="option-text">${opt.label_ar}</span>
            ${emojiHtml}
        </label>`;
    });
    $('#options-container').html(html);
    $('#btn-next').prop('disabled', true);
    $('#error-banner').addClass('d-none');
    pendingAnswer = null;
    // Animate
    $('#question-card').css('opacity', 0).animate({ opacity: 1 }, 280);
}
</script>
@endpush
````

## File: routes/console.php
````php
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
````

## File: vite.config.js
````javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
````

## File: app/Console/Commands/CleanReversedLabels.php
````php
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
````

## File: app/Console/Commands/ConvertRecommendationsJson.php
````php
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
````

## File: app/Http/Controllers/Admin/CouponController.php
````php
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
````

## File: app/Http/Controllers/Admin/DimensionController.php
````php
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
````

## File: app/Http/Controllers/Admin/ExamController.php
````php
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
````

## File: app/Http/Controllers/Admin/GradedExamQuestionController.php
````php
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
````

## File: app/Http/Controllers/Admin/IconController.php
````php
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
````

## File: app/Http/Controllers/Admin/QuestionController.php
````php
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
````

## File: app/Http/Controllers/Admin/SettingController.php
````php
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
````

## File: app/Http/Controllers/DashboardController.php
````php
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
````

## File: app/Http/Requests/Admin/BulkStoreQuestionsRequest.php
````php
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
````

## File: app/Http/Requests/Admin/StoreQuestionRequest.php
````php
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
````

## File: app/Http/Requests/Admin/StoreRecommendationRequest.php
````php
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
````

## File: app/Http/Requests/Admin/UpdateSettingsRequest.php
````php
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
````

## File: app/Http/Requests/AnswerQuestionRequest.php
````php
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
````

## File: app/Http/Requests/LoginRequest.php
````php
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
````

## File: app/Http/Requests/RegisterRequest.php
````php
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
````

## File: app/Models/AnswerOption.php
````php
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
````

## File: app/Models/Dimension.php
````php
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
````

## File: app/Models/DimensionInterpretation.php
````php
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
````

## File: app/Models/ExamSession.php
````php
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
````

## File: app/Models/GradedExam.php
````php
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
````

## File: app/Models/GradedExamOption.php
````php
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
````

## File: app/Models/GradedExamQuestion.php
````php
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
````

## File: app/Models/GradedExamResult.php
````php
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
````

## File: app/Models/GradedExamSession.php
````php
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
````

## File: app/Models/GradedExamSessionQuestion.php
````php
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
````

## File: app/Models/GradedExamUnit.php
````php
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
````

## File: app/Models/GradedExamUserAnswerOption.php
````php
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
````

## File: app/Models/Question.php
````php
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
````

## File: app/Models/Result.php
````php
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
````

## File: app/Models/User.php
````php
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
````

## File: app/Repositories/AssessmentRepository.php
````php
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
````

## File: app/Repositories/Contracts/UserRepositoryInterface.php
````php
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
````

## File: app/Repositories/QuestionRepository.php
````php
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
````

## File: app/Repositories/UserRepository.php
````php
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
````

## File: app/Services/ExamResultService.php
````php
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
````

## File: app/Services/FileUploadService.php
````php
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
````

## File: app/Services/IconService.php
````php
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
````

## File: app/Services/QuestionService.php
````php
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
````

## File: app/Services/Result/ResultFormatter.php
````php
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
````

## File: app/Services/SettingService.php
````php
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
````

## File: app/Services/StatisticsService.php
````php
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
````

## File: app/Services/UserService.php
````php
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
````

## File: check_questions.php
````php
<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$questions = App\Models\GradedExamQuestion::with('options')->get();
echo "Total questions in DB: " . $questions->count() . "\n";

$count = 0;
foreach ($questions as $q) {
    $text = trim($q->text_ar);
    if (preg_match('/[،,\-:]$/u', $text) || preg_match('/\.\.\.$/', $text) || mb_strlen($text) < 20) {
        echo "Q#{$q->original_number}: {$text}\n";
        $count++;
    }
}
echo "Total flagged: $count\n";
````

## File: check-seed.php
````php
<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
try {
    echo \App\Models\Assessment::count();
} catch (\Exception $e) {
    echo "0";
}
````

## File: compare_qs.php
````php
<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$mdFilePath = 'C:\Users\AIO\Downloads\marketing_404_questions.md';
$phpUnitsPath = base_path('database/data/graded_exams/marketing_ibta/units');

if (!file_exists($mdFilePath)) {
    die("Markdown file not found.\n");
}

// 1. Parse MD file
$mdContent = file_get_contents($mdFilePath);
$mdQuestions = [];

$blocks = explode('### سؤال ', $mdContent);
array_shift($blocks); // remove intro

foreach ($blocks as $block) {
    $lines = explode("\n", $block);
    $qNum = trim($lines[0]);
    
    $qText = '';
    $correctOptions = [];
    $allOptions = [];
    $inOptions = false;
    
    foreach ($lines as $line) {
        $line = trim($line);
        if (str_starts_with($line, '- **نص السؤال:**')) {
            $qText = trim(str_replace('- **نص السؤال:**', '', $line));
        } elseif (str_starts_with($line, '- **الخيارات:**')) {
            $inOptions = true;
        } elseif ($inOptions && str_starts_with($line, '- ')) {
            $optText = trim(substr($line, 2));
            $isCorrect = false;
            if (str_ends_with($optText, '✅')) {
                $isCorrect = true;
                $optText = trim(str_replace('✅', '', $optText));
            }
            $allOptions[] = $optText;
            if ($isCorrect) {
                $correctOptions[] = $optText;
            }
        } elseif ($inOptions && str_starts_with($line, '- **الإجابة الصحيحة')) {
            $inOptions = false;
        }
    }
    
    $mdQuestions[] = [
        'num' => $qNum,
        'text' => $qText,
        'options' => $allOptions,
        'correct' => $correctOptions
    ];
}

echo "Parsed " . count($mdQuestions) . " questions from MD file.\n\n";

// Helper function to normalize text
function normalize($text) {
    // Remove spaces, punctuation, special chars, normalize alef/ya/taa marboota
    $text = mb_strtolower($text);
    $text = preg_replace('/[^\p{L}\p{N}]/u', '', $text); // Keep only letters and numbers
    $text = str_replace(['أ','إ','آ','ا'], 'ا', $text);
    $text = str_replace(['ة','ه'], 'ه', $text);
    $text = str_replace(['ي','ى'], 'ي', $text);
    return $text;
}

// 2. Load PHP questions
$phpQuestions = [];
for ($i = 1; $i <= 13; $i++) {
    $unitNum = str_pad($i, 2, '0', STR_PAD_LEFT);
    $file = $phpUnitsPath . "/unit_{$unitNum}.php";
    if (file_exists($file)) {
        $unitData = require $file;
        if (isset($unitData['questions'])) {
            foreach ($unitData['questions'] as $q) {
                $phpQuestions[] = [
                    'unit' => $i,
                    'text' => $q['text_ar'],
                    'options' => $q['options'],
                    'original' => $q
                ];
            }
        }
    }
}

echo "Loaded " . count($phpQuestions) . " questions from PHP files.\n\n";

// 3. Find duplicates in PHP files
echo "--- Duplicates in PHP Files ---\n";
$seenText = [];
$duplicatesFound = 0;
foreach ($phpQuestions as $idx => $phpQ) {
    $normText = normalize($phpQ['text']);
    if (isset($seenText[$normText])) {
        echo "- Question duplicate found:\n";
        echo "  1) Unit " . $seenText[$normText]['unit'] . ": " . $seenText[$normText]['text'] . "\n";
        echo "  2) Unit " . $phpQ['unit'] . ": " . $phpQ['text'] . "\n";
        $duplicatesFound++;
    } else {
        $seenText[$normText] = ['unit' => $phpQ['unit'], 'text' => $phpQ['text']];
    }
}
if ($duplicatesFound === 0) echo "No duplicates found.\n";
echo "\n";

// 4. Compare answers between PHP and MD
echo "--- Answer Mismatches ---\n";
$mismatches = 0;
foreach ($phpQuestions as $phpQ) {
    $normPhpQ = normalize($phpQ['text']);
    
    // Find matching question in MD
    $matchedMd = null;
    foreach ($mdQuestions as $mdQ) {
        if (normalize($mdQ['text']) === $normPhpQ || strpos($normPhpQ, normalize($mdQ['text'])) !== false || strpos(normalize($mdQ['text']), $normPhpQ) !== false) {
            $matchedMd = $mdQ;
            break;
        }
    }
    
    if ($matchedMd) {
        // Compare options
        $phpCorrectNorm = [];
        foreach ($phpQ['options'] as $opt) {
            if ($opt['is_correct']) {
                $phpCorrectNorm[] = normalize($opt['option_text_ar']);
            }
        }
        
        $mdCorrectNorm = [];
        foreach ($matchedMd['correct'] as $c) {
            $mdCorrectNorm[] = normalize($c);
        }
        
        // If they don't match, report it
        $diff1 = array_diff($phpCorrectNorm, $mdCorrectNorm);
        $diff2 = array_diff($mdCorrectNorm, $phpCorrectNorm);
        
        if (!empty($diff1) || !empty($diff2)) {
            // Wait, maybe the options are written slightly differently? E.g. "أ) ..." vs "...".
            // Let's strip standard prefixes like "أ) ", "ب) ", "a)", "b)", etc. before diffing, or our normalize function already removes punctuation! 
            // Normalize removed all punctuation, so "أ) الخيار" becomes "االخيار".
            // Let's check if they still differ.
            // Often, PHP file has "أ) الإجابة" while MD has "الإجابة". Our normalize removes punctuation but keeps "أ".
            // Let's do a more careful check: see if the core text matches.
            $isRealMismatch = false;
            $phpCorrectRaw = array_filter($phpQ['options'], fn($o) => $o['is_correct']);
            $phpCorrectRawTexts = array_column($phpCorrectRaw, 'option_text_ar');
            
            // To avoid false positives from prefixes like "أ) ", we can check if the MD correct option is a substring of the PHP correct option or vice versa.
            $matchedCount = 0;
            foreach ($phpCorrectNorm as $pC) {
                foreach ($mdCorrectNorm as $mC) {
                    if (strpos($pC, $mC) !== false || strpos($mC, $pC) !== false) {
                        $matchedCount++;
                        break;
                    }
                }
            }
            
            if ($matchedCount !== max(count($phpCorrectNorm), count($mdCorrectNorm))) {
                echo "- Mismatch found for question:\n";
                echo "  Text: " . $phpQ['text'] . "\n";
                echo "  MD  Correct: " . implode(' | ', $matchedMd['correct']) . "\n";
                echo "  PHP Correct: " . implode(' | ', $phpCorrectRawTexts) . "\n\n";
                $mismatches++;
            }
        }
    } else {
        // echo "Could not find MD match for PHP question: " . $phpQ['text'] . "\n";
    }
}
if ($mismatches === 0) echo "No answer mismatches found.\n";

echo "Done.\n";
````

## File: composer.json
````json
{
    "$schema": "https://getcomposer.org/schema.json",
    "name": "laravel/laravel",
    "type": "project",
    "description": "The skeleton application for the Laravel framework.",
    "keywords": ["laravel", "framework"],
    "license": "MIT",
    "require": {
        "php": "^8.2",
        "laravel/framework": "^12.0",
        "laravel/tinker": "^2.10.1"
    },
    "require-dev": {
        "barryvdh/laravel-ide-helper": "*",
        "fakerphp/faker": "^1.23",
        "larastan/larastan": "^3.10",
        "laravel/pail": "^1.2.2",
        "laravel/pint": "^1.24",
        "laravel/sail": "^1.41",
        "mockery/mockery": "^1.6",
        "nunomaduro/collision": "^8.6",
        "nunomaduro/larastan": "^3.10",
        "phpunit/phpunit": "^11.5.50"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "setup": [
            "composer install",
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\"",
            "@php artisan key:generate",
            "@php artisan migrate --force",
            "npm install",
            "npm run build"
        ],
        "dev": [
            "Composer\\Config::disableProcessTimeout",
            "npx concurrently -c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1 --timeout=0\" \"php artisan pail --timeout=0\" \"npm run dev\" --names=server,queue,logs,vite --kill-others"
        ],
        "test": [
            "@php artisan config:clear --ansi",
            "@php artisan test"
        ],
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi",
            "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
            "@php artisan migrate --graceful --ansi"
        ],
        "pre-package-uninstall": [
            "Illuminate\\Foundation\\ComposerScripts::prePackageUninstall"
        ]
    },
    "extra": {
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
````

## File: database/migrations/0001_01_01_000000_create_users_table.php
````php
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
````

## File: database/migrations/2026_07_21_170000_make_assessments_limit_nullable_on_coupons_table.php
````php
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
````

## File: database/migrations/2026_07_21_234000_add_perceptual_fields_to_recommendations_table.php
````php
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
````

## File: database/migrations/2026_08_01_000000_add_soft_deletes_to_all_core_tables.php
````php
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
````

## File: database/migrations/2026_08_29_000001_create_graded_exams_table.php
````php
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
````

## File: database/migrations/2026_08_29_000002_create_graded_exam_units_table.php
````php
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
````

## File: database/migrations/2026_08_29_000003_create_graded_exam_questions_table.php
````php
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
````

## File: database/migrations/2026_08_29_000004_create_graded_exam_options_table.php
````php
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
````

## File: database/migrations/2026_08_29_000005_create_graded_exam_sessions_table.php
````php
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
````

## File: database/migrations/2026_08_29_000006_create_graded_exam_session_questions_table.php
````php
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
````

## File: database/migrations/2026_08_29_000008_create_graded_exam_user_answer_options_table.php
````php
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
````

## File: database/migrations/2026_08_29_000010_create_graded_exam_constraint_settings_table.php
````php
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
````

## File: database/migrations/2026_08_31_000000_make_user_id_nullable_on_graded_exam_sessions_table.php
````php
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
````

## File: fix_typos.py
````python
import os
import glob
import re

units_dir = r"C:\Users\AIO\source\reposVsc\antigravity-exam-system\antigravity-exam-system\antigravity\database\data\graded_exams\marketing_ibta\units"

replacements = [
    (r"الواحدة الأولى", r"الوحدة الأولى"),
    (r"التوزبع", r"التوزيع"),
    (r"الاستبانات والاستطلاعية السرية", r"الاستبيانات والاستطلاعات السرية"),
    (r"الوحدة الثالثة سلوك المستهلك", r"الوحدة الثانية: سلوك المستهلك"),
    (r"الوحدة الثالثة: سلوك المستهلك", r"الوحدة الثانية: سلوك المستهلك"), # Just in case
    (r"م نخفض", r"منخفض"),
    (r"مضوع", r"موضوع"),
    (r"التخزين\.راجع", r"التخزين. راجع"),
    (r"Google Trendsو", r"Google Trends، "),
    (r"ضمنKeyword Generator", r"ضمن Keyword Generator"),
]

# also need to replace English words connected with و like `Google Trendsو Analytics` -> `Google Trends, Analytics`
# Actually, the user asked to replace "و" between english words with ","
def replace_english_waw(text):
    # match English word + و + optional space + English word
    # e.g., "Trendsو Analytics" -> "Trends, Analytics"
    return re.sub(r'([a-zA-Z]+)و\s*([a-zA-Z]+)', r'\1, \2', text)

def fix_punctuation(text):
    # Normalize "ص : 17", "ص: 17", "ص:17" to "ص: 17"
    text = re.sub(r"ص\s*:\s*(\d+)", r"ص: \1", text)
    return text

for file_path in glob.glob(os.path.join(units_dir, "*.php")):
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    orig_content = content
    for old, new in replacements:
        content = re.sub(old, new, content)
    
    content = replace_english_waw(content)
    content = fix_punctuation(content)
    
    if orig_content != content:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Updated {os.path.basename(file_path)}")
print("Done")
````

## File: fix_unit12.py
````python
import os
import glob
import re

units_dir = r"C:\Users\AIO\source\reposVsc\antigravity-exam-system\antigravity-exam-system\antigravity\database\data\graded_exams\marketing_ibta\units"

for file_path in glob.glob(os.path.join(units_dir, "*.php")):
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    orig = content
    
    # Fix the specific line in unit_12
    content = content.replace(
        "تعتبر Google Trends،  Answer the Public Keyword Generatorضمن الأدوات",
        "تعتبر Google Trends, Answer the Public, Keyword Generator ضمن الأدوات"
    )
    
    # Also I will revert and fix Google Trends، if any other exists
    content = content.replace("Google Trends،", "Google Trends,")
    
    if orig != content:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Fixed {os.path.basename(file_path)}")
print("Done")
````

## File: get_current_qs.php
````php
<?php
$files = glob('database/data/graded_exams/marketing_ibta/units/unit_*.php');
$targets = [
    'أي من التالي يُعد من عناصر تحليل السوق الثمانية',
    'يتضمن العناصر الأربعة الرئيسية لخطة', // Catch both variants in Unit 3
    'الطرق الأكثر شيوعا التي تستخدم في تصنيف العملاء',
    'ما هو تمركز العلامة التجارية؟',
    'أي مما يلي لا يجب فعله في التواصل؟'
];
foreach($files as $f){
    $u = require $f;
    foreach($u['questions'] as $q){
        foreach($targets as $t){
            if(strpos($q['text_ar'], $t) !== false){
                echo "\n### السؤال: " . $q['text_ar'] . "\n";
                foreach($q['options'] as $o){
                    echo ($o['is_correct'] ? '✅ ' : '❌ ') . $o['option_text_ar'] . "\n";
                }
            }
        }
    }
}
````

## File: phpstan.neon
````
includes:
    - vendor/larastan/larastan/extension.neon

parameters:
    paths:
        - app/

    # Level 9 is the highest level
    level: 1
````

## File: Procfile
````
web: php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
````

## File: resources/views/admin/coupons/create.blade.php
````php
@extends('layouts.admin')
@section('title', 'إضافة كوبون')
@section('page-title', 'إدارة الكوبونات')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark mb-0">إضافة كوبون جديد</h2>
    <a href="{{ route('admin.coupons.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-right"></i> عودة
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0 small">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="{{ route('admin.coupons.store') }}" method="POST" id="coupon-form">
            @csrf

            {{-- Basic Info --}}
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="title" class="form-label fw-semibold">اسم الكوبون <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="مثال: مبادرة التميز">
                    <div class="form-text">يظهر هذا الاسم للمستخدم عند التحقق من الكوبون.</div>
                </div>
                <div class="col-md-6">
                    <label for="code" class="form-label fw-semibold">رمز الكوبون <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-start" dir="ltr" id="code" name="code" value="{{ old('code') }}" required placeholder="مثال: PROMO100">
                    <div class="form-text">الرمز الذي يدخله المستخدم. يجب أن يكون فريداً.</div>
                </div>
            </div>

            {{-- STEP 1: عدد مرات الاستخدام - يؤثر على حقول الخصم --}}
            <div class="card border-warning border-opacity-50 mb-4" style="background: #fffdf0;">
                <div class="card-header bg-transparent border-0 py-3">
                    <h6 class="fw-bold mb-0 text-warning-emphasis">
                        <i class="bi bi-1-circle-fill me-2 text-warning"></i>
                        الخطوة الأولى: حدد عدد مرات الاستخدام المسموحة لكل مستخدم (اختياري)
                    </h6>
                    <div class="text-muted small mt-1">اتركه فارغاً إذا كنت تريد استخداماً غير محدود بنفس نسبة الخصم.</div>
                </div>
                <div class="card-body pt-0">
                    <div class="row align-items-center g-3">
                        <div class="col-md-5">
                            <label for="assessments_limit" class="form-label fw-semibold">
                                عدد مرات الاستخدام
                            </label>
                            <input type="number"
                                   class="form-control form-control-lg fw-bold text-center"
                                   id="assessments_limit"
                                   name="assessments_limit"
                                   value="{{ old('assessments_limit') }}"
                                   min="1" max="10"
                                   placeholder="اتركه فارغاً لعدد غير محدود"
                                   oninput="renderDiscountFields(this.value)">
                            <div class="form-text">اتركه فارغاً للاستخدام غير المحدود، أو حدد عدداً (1-10) لخصم متدرج.</div>
                        </div>
                        <div class="col-md-7">
                            <div class="p-3 rounded border bg-light text-muted small">
                                <i class="bi bi-info-circle me-1 text-primary"></i>
                                <strong>غير محدود:</strong> اترك الحقل فارغاً ليستفيد المستخدم من نسبة الخصم دائماً بدون حد أقصى.<br>
                                <strong>محدد:</strong> أدخل عدداً (مثال: 3) لربط الكوبون بتدرج خصم محدد بعدد المرات.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 2: نسب الخصم - تظهر ديناميكياً --}}
            <div class="card border-primary border-opacity-25 mb-4" style="background: #f0f4ff;">
                <div class="card-header bg-transparent border-0 py-3">
                    <h6 class="fw-bold mb-0 text-primary">
                        <i class="bi bi-2-circle-fill me-2 text-primary"></i>
                        الخطوة الثانية: حدد نسبة الخصم لكل مرة استخدام
                    </h6>
                    <div class="text-muted small mt-1">حدد خصماً مختلفاً لكل مرة استخدام. مثال: الأولى 100%، الثانية 50%، الثالثة 10%</div>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3" id="discount-fields-container">
                        {{-- تُنشأ ديناميكياً بالـ JavaScript --}}
                    </div>

                    {{-- معاينة حية --}}
                    <div id="discount-preview" class="mt-3 p-3 bg-white rounded border d-none">
                        <div class="text-muted small fw-semibold mb-2">
                            <i class="bi bi-eye me-1 text-primary"></i>معاينة التدرج:
                        </div>
                        <div id="preview-content" class="d-flex flex-wrap gap-2"></div>
                    </div>
                </div>
            </div>

            {{-- Expiry --}}
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="expires_at" class="form-label fw-semibold">تاريخ انتهاء الصلاحية</label>
                    <input type="date" class="form-control" id="expires_at" name="expires_at" value="{{ old('expires_at') }}">
                    <div class="form-text">اختياري. بعد هذا التاريخ لن يكون الكوبون صالحاً.</div>
                </div>
            </div>

            {{-- Assessment Scope --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">نطاق تطبيق الكوبون</label>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="applies_to_all" name="applies_to_all_assessments" value="1" {{ old('applies_to_all_assessments', true) ? 'checked' : '' }} onchange="toggleAssessmentPicker()">
                    <label class="form-check-label fw-medium" for="applies_to_all">ينطبق على جميع المقاييس</label>
                </div>
                <div id="assessment-picker" class="{{ old('applies_to_all_assessments', true) ? 'd-none' : '' }}">
                    <label class="form-label text-muted small">اختر المقاييس التي ينطبق عليها الكوبون:</label>
                    <div class="border rounded p-3" style="max-height: 260px; overflow-y: auto;">
                        @foreach($assessments as $assessment)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="assessment_ids[]"
                                    id="assessment_{{ $assessment->id }}" value="{{ $assessment->id }}"
                                    {{ in_array($assessment->id, old('assessment_ids', [])) ? 'checked' : '' }}>
                                <label class="form-check-label small" for="assessment_{{ $assessment->id }}">
                                    {{ $assessment->title_ar }}
                                    <span class="text-muted">({{ $assessment->category }})</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- User Scope --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">المستخدمين المسموح لهم</label>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="applies_to_all_users" name="applies_to_all_users" value="1" {{ old('applies_to_all_users', true) ? 'checked' : '' }} onchange="toggleUserPicker()">
                    <label class="form-check-label fw-medium" for="applies_to_all_users">صالح لجميع المستخدمين</label>
                </div>
                <div id="user-picker" class="{{ old('applies_to_all_users', true) ? 'd-none' : '' }}">
                    <label class="form-label text-muted small">اختر الأشخاص المعينين (يمكن البحث بالاسم/الجوال):</label>
                    <div class="border rounded p-3" style="max-height: 260px; overflow-y: auto;">
                        @foreach($users as $user)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permitted_user_ids[]"
                                    id="user_{{ $user->id }}" value="{{ $user->id }}"
                                    {{ in_array($user->id, old('permitted_user_ids', [])) ? 'checked' : '' }}>
                                <label class="form-check-label small" for="user_{{ $user->id }}">
                                    {{ $user->name }}
                                    <span class="text-muted">({{ $user->phone ?? $user->email }})</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Status --}}
            <div class="mb-4 form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">الكوبون نشط (متاح للاستخدام)</label>
            </div>

            <button type="submit" class="btn btn-primary px-5">
                <i class="bi bi-save me-1"></i> حفظ الكوبون
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
// ترتيب الأرقام بالعربية
const ordinals = ['الأولى','الثانية','الثالثة','الرابعة','الخامسة','السادسة','السابعة','الثامنة','التاسعة','العاشرة'];
const fieldNames = ['discount_percentage','discount_percentage_2nd','discount_percentage_3rd',
                    'discount_percentage_4th','discount_percentage_5th','discount_percentage_6th',
                    'discount_percentage_7th','discount_percentage_8th','discount_percentage_9th','discount_percentage_10th'];
const oldValues = {
    discount_percentage:       '{{ old("discount_percentage", 100) }}',
    discount_percentage_2nd:   '{{ old("discount_percentage_2nd", "") }}',
    discount_percentage_3rd:   '{{ old("discount_percentage_3rd", "") }}',
};

const badgeColors = ['success','primary','warning','info','secondary','dark','danger','success','primary','warning'];

function renderDiscountFields(count) {
    count = parseInt(count) || 1;
    count = Math.max(1, Math.min(10, count));

    const container = document.getElementById('discount-fields-container');
    const preview   = document.getElementById('discount-preview');
    const previewContent = document.getElementById('preview-content');

    container.innerHTML = '';
    previewContent.innerHTML = '';

    // حساب عرض الأعمدة
    let colClass = 'col-md-4';
    if (count === 1) colClass = 'col-md-4';
    else if (count === 2) colClass = 'col-md-6';
    else if (count <= 4) colClass = 'col-md-3';
    else colClass = 'col-md-4';

    for (let i = 0; i < count; i++) {
        const name  = fieldNames[i] ?? `discount_percentage_${i + 1}`;
        const label = `الاستخدام ${ordinals[i]}`;
        const isFirst = i === 0;
        const savedVal = oldValues[name] ?? '';
        const badgeColor = badgeColors[i];

        const col = document.createElement('div');
        col.className = colClass;
        col.innerHTML = `
            <div class="position-relative">
                <label for="${name}" class="form-label fw-semibold d-flex align-items-center gap-2">
                    <span class="badge bg-${badgeColor} rounded-pill" style="min-width:26px;">${i + 1}</span>
                    ${label}
                    ${isFirst ? '<span class="text-danger">*</span>' : ''}
                </label>
                <div class="input-group">
                    <input type="number"
                           class="form-control discount-input"
                           id="${name}"
                           name="${name}"
                           value="${savedVal || (isFirst ? 100 : '')}"
                           min="0" max="100"
                           ${isFirst ? 'required' : ''}
                           placeholder="${isFirst ? '100' : 'مثال: 50'}"
                           data-index="${i}"
                           oninput="updatePreview()">
                    <span class="input-group-text fw-bold">%</span>
                </div>
                ${isFirst ? '<div class="form-text text-success fw-medium"><i class="bi bi-check-circle me-1"></i>مطلوب</div>' : '<div class="form-text">اختياري</div>'}
            </div>`;
        container.appendChild(col);
    }

    preview.classList.toggle('d-none', count < 1);
    updatePreview();
}

function updatePreview() {
    const inputs = document.querySelectorAll('.discount-input');
    const previewContent = document.getElementById('preview-content');
    previewContent.innerHTML = '';

    inputs.forEach((input, i) => {
        const val = input.value;
        const badge = document.createElement('span');
        const color = badgeColors[i];
        badge.className = `badge bg-${color}-subtle text-${color}-emphasis border border-${color}-subtle px-3 py-2 rounded-pill fs-6`;
        badge.style.fontFamily = 'monospace';
        badge.innerHTML = `<span class="text-muted small ms-1">المرة ${ordinals[i]}:</span> ${val !== '' ? val + '%' : '—'}`;
        previewContent.appendChild(badge);
    });
}

function toggleAssessmentPicker() {
    const all = document.getElementById('applies_to_all');
    document.getElementById('assessment-picker').classList.toggle('d-none', all.checked);
}

function toggleUserPicker() {
    const all = document.getElementById('applies_to_all_users');
    document.getElementById('user-picker').classList.toggle('d-none', all.checked);
}

// تهيئة أولية
const initCount = parseInt(document.getElementById('assessments_limit').value) || 1;
renderDiscountFields(initCount);
</script>
@endpush
````

## File: resources/views/admin/coupons/edit.blade.php
````php
@extends('layouts.admin')
@section('title', 'تعديل كوبون')
@section('page-title', 'إدارة الكوبونات')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark mb-0">تعديل الكوبون: {{ $coupon->title }}</h2>
    <a href="{{ route('admin.coupons.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-right"></i> عودة
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0 small">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="{{ route('admin.coupons.update', $coupon) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Basic Info --}}
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="title" class="form-label fw-semibold">اسم الكوبون <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $coupon->title) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="code" class="form-label fw-semibold">رمز الكوبون <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-start" dir="ltr" id="code" name="code" value="{{ old('code', $coupon->code) }}" required>
                    <div class="form-text">الرمز الذي يدخله المستخدم. يجب أن يكون فريداً.</div>
                </div>
            </div>

            {{-- STEP 1: عدد مرات الاستخدام - يؤثر على حقول الخصم --}}
            <div class="card border-warning border-opacity-50 mb-4" style="background: #fffdf0;">
                <div class="card-header bg-transparent border-0 py-3">
                    <h6 class="fw-bold mb-0 text-warning-emphasis">
                        <i class="bi bi-1-circle-fill me-2 text-warning"></i>
                        الخطوة الأولى: حدد عدد مرات الاستخدام المسموحة لكل مستخدم (اختياري)
                    </h6>
                    <div class="text-muted small mt-1">اتركه فارغاً إذا كنت تريد استخداماً غير محدود بنفس نسبة الخصم.</div>
                </div>
                <div class="card-body pt-0">
                    <div class="row align-items-center g-3">
                        <div class="col-md-5">
                            <label for="assessments_limit" class="form-label fw-semibold">
                                عدد مرات الاستخدام
                            </label>
                            <input type="number"
                                   class="form-control form-control-lg fw-bold text-center"
                                   id="assessments_limit"
                                   name="assessments_limit"
                                   value="{{ old('assessments_limit', $coupon->assessments_limit) }}"
                                   min="1" max="10"
                                   placeholder="اتركه فارغاً لعدد غير محدود"
                                   oninput="renderDiscountFields(this.value)">
                            <div class="form-text">اتركه فارغاً للاستخدام غير المحدود، أو حدد عدداً (1-10) لخصم متدرج.</div>
                        </div>
                        <div class="col-md-7">
                            <div class="p-3 rounded border bg-light text-muted small">
                                <i class="bi bi-info-circle me-1 text-primary"></i>
                                <strong>غير محدود:</strong> اترك الحقل فارغاً ليستفيد المستخدم من نسبة الخصم دائماً بدون حد أقصى.<br>
                                <strong>محدد:</strong> أدخل عدداً (مثال: 3) لربط الكوبون بتدرج خصم محدد بعدد المرات.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 2: نسب الخصم - تظهر ديناميكياً --}}
            <div class="card border-primary border-opacity-25 mb-4" style="background: #f0f4ff;">
                <div class="card-header bg-transparent border-0 py-3">
                    <h6 class="fw-bold mb-0 text-primary">
                        <i class="bi bi-2-circle-fill me-2 text-primary"></i>
                        الخطوة الثانية: حدد نسبة الخصم لكل مرة استخدام
                    </h6>
                    <div class="text-muted small mt-1">حدد خصماً مختلفاً لكل مرة استخدام. مثال: الأولى 100%، الثانية 50%، الثالثة 10%</div>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3" id="discount-fields-container">
                        {{-- تُنشأ ديناميكياً بالـ JavaScript --}}
                    </div>

                    {{-- معاينة حية --}}
                    <div id="discount-preview" class="mt-3 p-3 bg-white rounded border d-none">
                        <div class="text-muted small fw-semibold mb-2">
                            <i class="bi bi-eye me-1 text-primary"></i>معاينة التدرج:
                        </div>
                        <div id="preview-content" class="d-flex flex-wrap gap-2"></div>
                    </div>
                </div>
            </div>

            {{-- Limits & Expiry --}}
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="expires_at" class="form-label fw-semibold">تاريخ انتهاء الصلاحية</label>
                    <input type="date" class="form-control" id="expires_at" name="expires_at" value="{{ old('expires_at', $coupon->expires_at?->format('Y-m-d')) }}">
                </div>
            </div>

            {{-- Assessment Scope --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">نطاق تطبيق الكوبون</label>
                @php $appliesToAll = old('applies_to_all_assessments', $coupon->applies_to_all_assessments); @endphp
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="applies_to_all" name="applies_to_all_assessments" value="1" {{ $appliesToAll ? 'checked' : '' }} onchange="toggleAssessmentPicker()">
                    <label class="form-check-label fw-medium" for="applies_to_all">ينطبق على جميع المقاييس</label>
                </div>

                <div id="assessment-picker" class="{{ $appliesToAll ? 'd-none' : '' }}">
                    <label class="form-label text-muted small">اختر المقاييس التي ينطبق عليها الكوبون:</label>
                    <div class="border rounded p-3" style="max-height: 260px; overflow-y: auto;">
                        @foreach($assessments as $assessment)
                            @php
                                $checked = in_array($assessment->id, old('assessment_ids', $couponAssessmentIds));
                            @endphp
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="assessment_ids[]"
                                    id="assessment_{{ $assessment->id }}" value="{{ $assessment->id }}"
                                    {{ $checked ? 'checked' : '' }}>
                                <label class="form-check-label small" for="assessment_{{ $assessment->id }}">
                                    {{ $assessment->title_ar }}
                                    <span class="text-muted">({{ $assessment->category }})</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- User Scope --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">المستخدمين المسموح لهم</label>
                @php $appliesToAllUsers = old('applies_to_all_users', $coupon->applies_to_all_users); @endphp
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="applies_to_all_users" name="applies_to_all_users" value="1" {{ $appliesToAllUsers ? 'checked' : '' }} onchange="toggleUserPicker()">
                    <label class="form-check-label fw-medium" for="applies_to_all_users">صالح لجميع المستخدمين</label>
                </div>

                <div id="user-picker" class="{{ $appliesToAllUsers ? 'd-none' : '' }}">
                    <label class="form-label text-muted small">اختر الأشخاص المعينين:</label>
                    <div class="border rounded p-3" style="max-height: 260px; overflow-y: auto;">
                        @foreach($users as $user)
                            @php
                                $userChecked = in_array($user->id, old('permitted_user_ids', $couponPermittedUserIds ?? []));
                            @endphp
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permitted_user_ids[]"
                                    id="user_{{ $user->id }}" value="{{ $user->id }}"
                                    {{ $userChecked ? 'checked' : '' }}>
                                <label class="form-check-label small" for="user_{{ $user->id }}">
                                    {{ $user->name }}
                                    <span class="text-muted">({{ $user->phone ?? $user->email }})</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Usage Stats --}}
            <div class="alert alert-light border mb-4">
                <div class="fw-semibold small mb-1"><i class="bi bi-bar-chart me-1"></i>إحصاءات الاستخدام الحالية:</div>
                @php
                    $totalUsages = $coupon->users->sum('pivot.used_count');
                    $uniqueUsers = $coupon->users->count();
                @endphp
                <div class="d-flex gap-4 small text-muted mt-2">
                    <span><i class="bi bi-people me-1"></i>عدد المستخدمين: <strong class="text-dark">{{ $uniqueUsers }}</strong></span>
                    <span><i class="bi bi-hash me-1"></i>إجمالي مرات الاستخدام: <strong class="text-dark">{{ $totalUsages }}</strong></span>
                </div>
            </div>

            {{-- Status --}}
            <div class="mb-4 form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $coupon->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">الكوبون نشط (متاح للاستخدام)</label>
            </div>

            <button type="submit" class="btn btn-primary px-5">
                <i class="bi bi-save me-1"></i> تحديث الكوبون
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
// ترتيب الأرقام بالعربية
const ordinals = ['الأولى','الثانية','الثالثة','الرابعة','الخامسة','السادسة','السابعة','الثامنة','التاسعة','العاشرة'];
const fieldNames = ['discount_percentage','discount_percentage_2nd','discount_percentage_3rd',
                    'discount_percentage_4th','discount_percentage_5th','discount_percentage_6th',
                    'discount_percentage_7th','discount_percentage_8th','discount_percentage_9th','discount_percentage_10th'];
const oldValues = {
    discount_percentage:       '{{ old("discount_percentage", $coupon->discount_percentage) }}',
    discount_percentage_2nd:   '{{ old("discount_percentage_2nd", $coupon->discount_percentage_2nd) }}',
    discount_percentage_3rd:   '{{ old("discount_percentage_3rd", $coupon->discount_percentage_3rd) }}',
    discount_percentage_4th:   '{{ old("discount_percentage_4th", $coupon->discount_percentage_4th) }}',
    discount_percentage_5th:   '{{ old("discount_percentage_5th", $coupon->discount_percentage_5th) }}',
    discount_percentage_6th:   '{{ old("discount_percentage_6th", $coupon->discount_percentage_6th) }}',
    discount_percentage_7th:   '{{ old("discount_percentage_7th", $coupon->discount_percentage_7th) }}',
    discount_percentage_8th:   '{{ old("discount_percentage_8th", $coupon->discount_percentage_8th) }}',
    discount_percentage_9th:   '{{ old("discount_percentage_9th", $coupon->discount_percentage_9th) }}',
    discount_percentage_10th:  '{{ old("discount_percentage_10th", $coupon->discount_percentage_10th) }}',
};

const badgeColors = ['success','primary','warning','info','secondary','dark','danger','success','primary','warning'];

function renderDiscountFields(count) {
    count = parseInt(count) || 1;
    count = Math.max(1, Math.min(10, count));

    const container = document.getElementById('discount-fields-container');
    const preview   = document.getElementById('discount-preview');
    const previewContent = document.getElementById('preview-content');

    container.innerHTML = '';
    previewContent.innerHTML = '';

    // حساب عرض الأعمدة
    let colClass = 'col-md-4';
    if (count === 1) colClass = 'col-md-4';
    else if (count === 2) colClass = 'col-md-6';
    else if (count <= 4) colClass = 'col-md-3';
    else colClass = 'col-md-4';

    for (let i = 0; i < count; i++) {
        const name  = fieldNames[i] ?? `discount_percentage_${i + 1}`;
        const label = `الاستخدام ${ordinals[i]}`;
        const isFirst = i === 0;
        const savedVal = oldValues[name] ?? '';
        const badgeColor = badgeColors[i];

        const col = document.createElement('div');
        col.className = colClass;
        col.innerHTML = `
            <div class="position-relative">
                <label for="${name}" class="form-label fw-semibold d-flex align-items-center gap-2">
                    <span class="badge bg-${badgeColor} rounded-pill" style="min-width:26px;">${i + 1}</span>
                    ${label}
                    ${isFirst ? '<span class="text-danger">*</span>' : ''}
                </label>
                <div class="input-group">
                    <input type="number"
                           class="form-control discount-input"
                           id="${name}"
                           name="${name}"
                           value="${savedVal || (isFirst ? 100 : '')}"
                           min="0" max="100"
                           ${isFirst ? 'required' : ''}
                           placeholder="${isFirst ? '100' : 'مثال: 50'}"
                           data-index="${i}"
                           oninput="updatePreview()">
                    <span class="input-group-text fw-bold">%</span>
                </div>
                ${isFirst ? '<div class="form-text text-success fw-medium"><i class="bi bi-check-circle me-1"></i>مطلوب</div>' : '<div class="form-text">اختياري</div>'}
            </div>`;
        container.appendChild(col);
    }

    preview.classList.toggle('d-none', count < 1);
    updatePreview();
}

function updatePreview() {
    const inputs = document.querySelectorAll('.discount-input');
    const previewContent = document.getElementById('preview-content');
    previewContent.innerHTML = '';

    inputs.forEach((input, i) => {
        const val = input.value;
        const badge = document.createElement('span');
        const color = badgeColors[i];
        badge.className = `badge bg-${color}-subtle text-${color}-emphasis border border-${color}-subtle px-3 py-2 rounded-pill fs-6`;
        badge.style.fontFamily = 'monospace';
        badge.innerHTML = `<span class="text-muted small ms-1">المرة ${ordinals[i]}:</span> ${val !== '' ? val + '%' : '—'}`;
        previewContent.appendChild(badge);
    });
}

function toggleAssessmentPicker() {
    const all = document.getElementById('applies_to_all');
    document.getElementById('assessment-picker').classList.toggle('d-none', all.checked);
}

function toggleUserPicker() {
    const all = document.getElementById('applies_to_all_users');
    document.getElementById('user-picker').classList.toggle('d-none', all.checked);
}

// تهيئة أولية
const initCount = parseInt(document.getElementById('assessments_limit').value) || 1;
renderDiscountFields(initCount);
</script>
@endpush
````

## File: resources/views/admin/coupons/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'الكوبونات')
@section('page-title', 'إدارة الكوبونات')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark mb-0"><i class="bi bi-ticket-perforated me-2 text-primary"></i>الكوبونات</h2>
    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> إضافة كوبون
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>اسم الكوبون</th>
                        <th>رمز الكوبون</th>
                        <th>الخصم المتدرج</th>
                        <th class="text-center">الحد الأقصى</th>
                        <th>النطاق</th>
                        <th>الصلاحية</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coupons as $coupon)
                    <tr>
                        <td class="fw-bold">{{ $coupon->title }}</td>
                        <td>
                            <code class="bg-light border rounded px-2 py-1 text-dark small">{{ $coupon->code ?? '—' }}</code>
                        </td>
                        <td>
                            <div class="d-flex gap-1 flex-wrap">
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">{{ $coupon->discount_percentage }}%</span>
                                @if($coupon->discount_percentage_2nd !== null)
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill">{{ $coupon->discount_percentage_2nd }}%</span>
                                @endif
                                @if($coupon->discount_percentage_3rd !== null)
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill">{{ $coupon->discount_percentage_3rd }}%</span>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            @if($coupon->assessments_limit !== null)
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2">{{ $coupon->assessments_limit }}</span>
                            @else
                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2" title="غير محدود"><i class="bi bi-infinity"></i> غير محدود</span>
                            @endif
                        </td>
                        <td>
                            @if($coupon->applies_to_all_assessments)
                                <span class="text-muted small"><i class="bi bi-globe2 me-1"></i>جميع المقاييس</span>
                            @else
                                <span class="text-muted small"><i class="bi bi-funnel me-1"></i>مقاييس محددة ({{ $coupon->assessments()->count() }})</span>
                            @endif
                        </td>
                        <td>
                            @if($coupon->expires_at)
                                <span class="{{ $coupon->expires_at->isPast() ? 'text-danger' : 'text-success' }} small">
                                    <i class="bi bi-calendar3 me-1"></i>{{ $coupon->expires_at->format('Y-m-d') }}
                                </span>
                            @else
                                <span class="text-muted small"><i class="bi bi-infinity me-1"></i>مفتوح</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($coupon->is_active && (!$coupon->expires_at || !$coupon->expires_at->isPast()))
                                <span class="badge bg-success rounded-pill">نشط</span>
                            @elseif($coupon->expires_at && $coupon->expires_at->isPast())
                                <span class="badge bg-secondary rounded-pill">منتهي الصلاحية</span>
                            @else
                                <span class="badge bg-danger rounded-pill">متوقف</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-sm btn-outline-primary me-1" title="تعديل">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الكوبون؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="حذف"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-5">
                            <i class="bi bi-ticket display-4 d-block mb-3 text-secondary"></i>
                            لا توجد كوبونات مضافة بعد.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($coupons->hasPages())
            <div class="p-3 border-top">
                {{ $coupons->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
````

## File: resources/views/admin/graded_exam_questions/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'أسئلة الشهادات الاحترافية')
@section('page-title', 'أسئلة الشهادات الاحترافية')

@section('content')
<!-- Filters -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.graded_exams.questions.index') }}" class="row g-2 align-items-end" id="filter-form">
            <input type="hidden" name="per_page" id="filter-per-page" value="{{ request('per_page', 25) }}">
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">الشهادة</label>
                <select name="graded_exam_id" class="form-select form-select-sm" id="filter-exam">
                    <option value="">الكل</option>
                    @foreach($exams as $e)
                        <option value="{{ $e->id }}" {{ request('graded_exam_id') == $e->id ? 'selected' : '' }}>
                            {{ $e->title_ar }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">الوحدة</label>
                <select name="unit_id" class="form-select form-select-sm" id="filter-unit">
                    <option value="">الكل</option>
                    @foreach($units as $u)
                        <option value="{{ $u->id }}" {{ request('unit_id') == $u->id ? 'selected' : '' }}>
                            {{ $u->title_ar }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">المستوى</label>
                <select name="level" class="form-select form-select-sm">
                    <option value="">الكل</option>
                    <option value="easy" {{ request('level') == 'easy' ? 'selected' : '' }}>سهل</option>
                    <option value="medium" {{ request('level') == 'medium' ? 'selected' : '' }}>متوسط</option>
                    <option value="hard" {{ request('level') == 'hard' ? 'selected' : '' }}>صعب</option>
                </select>
            </div>
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">النوع</label>
                <select name="question_type" class="form-select form-select-sm">
                    <option value="">الكل</option>
                    <option value="mcq_single" {{ request('question_type') == 'mcq_single' ? 'selected' : '' }}>اختياري (إجابة واحدة)</option>
                    <option value="mcq_multi" {{ request('question_type') == 'mcq_multi' ? 'selected' : '' }}>اختياري (متعدد)</option>
                    <option value="true_false" {{ request('question_type') == 'true_false' ? 'selected' : '' }}>صح / خطأ</option>
                </select>
            </div>
            
            <div class="col-md-1">
                <label class="form-label small fw-medium">الخيارات</label>
                <select name="options_count" class="form-select form-select-sm">
                    <option value="">الكل</option>
                    <option value="2" {{ request('options_count') == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ request('options_count') == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ request('options_count') == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ request('options_count') == '5' ? 'selected' : '' }}>5</option>
                    <option value="other" {{ request('options_count') == 'other' ? 'selected' : '' }}>+5</option>
                </select>
            </div>
            
            <div class="col-md-2">
                <label class="form-label small fw-medium">بحث في النص</label>
                <input type="text" name="search" class="form-control form-control-sm"
                    value="{{ request('search') }}" placeholder="كلمة بحث...">
            </div>
            
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center gap-2">
        <span class="text-muted small">{{ $questions->total() }} سؤال</span>
        <span class="text-muted small text-black-50">|</span>
        <label class="small text-muted mb-0">عرض:</label>
        <select id="per-page-select" class="form-select form-select-sm d-inline-block w-auto py-0 px-2" style="height: 28px;">
            <option value="25" {{ request('per_page', 25) == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
            <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>الكل</option>
        </select>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
            <i class="bi bi-plus-circle me-1"></i>إضافة سؤال
        </button>
    </div>
</div>

<div id="questions-table-wrapper">
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">رقم</th>
                    <th style="width: 45%;">نص السؤال</th>
                    <th>الوحدة</th>
                    <th>المستوى</th>
                    <th>النوع</th>
                    <th class="text-center">الخيارات</th>
                    <th class="text-end" style="width:120px;">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($questions as $q)
                <tr data-id="{{ $q->id }}">
                    <td class="text-muted small">{{ $q->original_number }}</td>
                    
                    <td class="question-text-cell small" data-id="{{ $q->id }}">
                        <span class="question-text-display fw-medium d-block mb-1">{{ $q->text_ar }}</span>
                        @if($q->explanation_ar)
                            <span class="question-explanation-display text-muted" style="font-size: 0.75rem;">
                                <i class="bi bi-info-circle me-1"></i>{{ Str::limit($q->explanation_ar, 80) }}
                            </span>
                            <div class="d-none full-explanation">{{ $q->explanation_ar }}</div>
                        @endif
                        <div class="d-none question-level">{{ $q->level }}</div>
                        <div class="d-none question-type">{{ $q->question_type }}</div>
                    </td>
                    
                    <td class="small text-muted">{{ $q->unit ? $q->unit->title_ar : 'بدون وحدة' }}</td>
                    
                    <td>
                        @if($q->level == 'easy')
                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">سهل</span>
                        @elseif($q->level == 'medium')
                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">متوسط</span>
                        @else
                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">صعب</span>
                        @endif
                    </td>
                    
                    <td class="small text-muted">
                        {{ $q->question_type == 'mcq' ? 'اختياري' : 'صح/خطأ' }}
                    </td>
                    
                    <td class="text-center">
                        <button class="btn btn-sm btn-light border btn-view-options" data-id="{{ $q->id }}">
                            <i class="bi bi-list-ul me-1"></i>{{ $q->options_count }}
                        </button>
                    </td>
                    
                    <td>
                        <div class="d-flex gap-1 justify-content-end">
                            <button class="btn btn-sm btn-outline-primary btn-edit-q" data-id="{{ $q->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger btn-delete-q"
                                    data-id="{{ $q->id }}"
                                    data-url="{{ route('admin.graded_exams.questions.destroy', $q->id) }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                        لا توجد أسئلة مطابقة للبحث.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-transparent border-0">{{ $questions->appends(request()->query())->links() }}</div>
</div>
</div>

<!-- Edit Question Modal (Form approach instead of inline due to complexity) -->
<div class="modal fade" id="editQuestionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">تعديل السؤال</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit-q-id">
                <div class="mb-3">
                    <label class="form-label small fw-medium">نص السؤال</label>
                    <textarea class="form-control" id="edit-q-text" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">التفسير / الشرح (اختياري)</label>
                    <textarea class="form-control text-muted" id="edit-q-explanation" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-medium">المستوى</label>
                        <select class="form-select" id="edit-q-level">
                            <option value="easy">سهل</option>
                            <option value="medium">متوسط</option>
                            <option value="hard">صعب</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-medium">نوع السؤال</label>
                        <select class="form-select" id="edit-q-type">
                            <option value="mcq">اختيار من متعدد</option>
                            <option value="true_false">صح / خطأ</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-edit">حفظ التغييرات</button>
            </div>
        </div>
    </div>
</div>

<!-- View Options Modal -->
<div class="modal fade" id="optionsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">خيارات الإجابة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="list-group list-group-flush" id="options-list">
                    <!-- Loaded via AJAX -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Question Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إضافة سؤال جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">الشهادة *</label>
                        <select class="form-select" id="add-q-exam_id">
                            <option value="">اختر الشهادة</option>
                            @foreach($exams as $e)
                                <option value="{{ $e->id }}">{{ $e->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">الوحدة *</label>
                        <select class="form-select" id="add-q-unit_id">
                            <option value="">اختر الوحدة</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">نص السؤال *</label>
                        <textarea class="form-control" id="add-q-text" rows="3" placeholder="اكتب نص السؤال هنا..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">التفسير / الشرح</label>
                        <textarea class="form-control" id="add-q-explanation" rows="2" placeholder="الشرح (اختياري)"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المستوى *</label>
                        <select class="form-select" id="add-q-level">
                            <option value="easy">سهل</option>
                            <option value="medium">متوسط</option>
                            <option value="hard">صعب</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">نوع السؤال *</label>
                        <select class="form-select" id="add-q-type">
                            <option value="mcq">اختيار من متعدد</option>
                            <option value="true_false">صح / خطأ</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 fw-semibold">خيارات الإجابة</h6>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-add-option">
                        <i class="bi bi-plus me-1"></i>إضافة خيار
                    </button>
                </div>
                <div id="add-options-container"></div>
                <div class="form-text mt-2 multi-correct-hint"><i class="bi bi-info-circle me-1"></i>يمكنك تحديد أكثر من خيار كإجابة صحيحة (سيتحول السؤال تلقائياً إلى سؤال متعدد الإجابات الصحيحة).</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-new-question">
                    <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ السؤال</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Dynamic units dropdown based on exam selection
$('#filter-exam').on('change', function() {
    const examId = $(this).val();
    const unitSelect = $('#filter-unit');
    
    $.get('{{ route('admin.graded_exams.units.byExam') }}', { graded_exam_id: examId }, function(units) {
        let opts = '<option value="">كل الوحدات</option>';
        units.forEach(u => {
            opts += `<option value="${u.id}">${u.title_ar}</option>`;
        });
        unitSelect.html(opts);
    });
});

// Per page select
$('#per-page-select').on('change', function() {
    $('#filter-per-page').val($(this).val());
    $('#filter-form').submit();
});

// View Options
$(document).on('click', '.btn-view-options', function() {
    const qId = $(this).data('id');
    const list = $('#options-list');
    list.html('<div class="p-4 text-center"><div class="spinner-border text-primary spinner-border-sm"></div></div>');
    
    const modal = new bootstrap.Modal(document.getElementById('optionsModal'));
    modal.show();
    
    $.get(`{{ url('admin/graded-exams/questions') }}/${qId}/options`, function(res) {
        if(res.success) {
            list.empty();
            if(res.options.length === 0) {
                list.html('<div class="p-3 text-center text-muted small">لا توجد خيارات</div>');
                return;
            }
            
            res.options.forEach(opt => {
                const icon = opt.is_correct ? '<i class="bi bi-check-circle-fill text-success fs-5"></i>' : '<i class="bi bi-circle text-muted"></i>';
                const bg = opt.is_correct ? 'bg-success bg-opacity-10' : '';
                
                list.append(`
                    <div class="list-group-item d-flex align-items-center gap-3 ${bg}">
                        ${icon}
                        <span class="${opt.is_correct ? 'fw-bold' : ''}">${opt.option_text_ar}</span>
                    </div>
                `);
            });
        }
    });
});

// Edit Question Modal
$(document).on('click', '.btn-edit-q', function() {
    const qId = $(this).data('id');
    const row = $(this).closest('tr');
    
    const text = row.find('.question-text-display').text().trim();
    let explanation = row.find('.full-explanation').text().trim();
    const level = row.find('.question-level').text().trim();
    const type = row.find('.question-type').text().trim();
    
    $('#edit-q-id').val(qId);
    $('#edit-q-text').val(text);
    $('#edit-q-explanation').val(explanation);
    $('#edit-q-level').val(level);
    $('#edit-q-type').val(type);
    
    new bootstrap.Modal(document.getElementById('editQuestionModal')).show();
});

// Save Edit
$('#btn-save-edit').on('click', function() {
    const qId = $('#edit-q-id').val();
    const text = $('#edit-q-text').val().trim();
    const explanation = $('#edit-q-explanation').val().trim();
    const level = $('#edit-q-level').val();
    const type = $('#edit-q-type').val();
    
    if(!text) {
        showAlert('نص السؤال مطلوب', 'warning');
        return;
    }
    
    const btn = $(this);
    setLoading(btn, true);
    
    $.ajax({
        url: `{{ url('admin/graded-exams/questions') }}/${qId}`,
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            text_ar: text,
            explanation_ar: explanation,
            level: level,
            question_type: type
        },
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance(document.getElementById('editQuestionModal')).hide();
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1000);
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert('حدث خطأ أثناء الحفظ', 'danger');
        }
    });
});

// Delete Question
$(document).on('click', '.btn-delete-q', function() {
    const url = $(this).data('url');
    confirmDelete('هل أنت متأكد من حذف هذا السؤال؟', url, () => location.reload());
});

// ------------- ADD QUESTION LOGIC -------------

// Dynamic units for Add modal
$('#add-q-exam_id').on('change', function() {
    const examId = $(this).val();
    const unitSelect = $('#add-q-unit_id');
    
    if (!examId) {
        unitSelect.html('<option value="">اختر الوحدة</option>');
        return;
    }
    
    $.get('{{ route('admin.graded_exams.units.byExam') }}', { graded_exam_id: examId }, function(units) {
        let opts = '<option value="">اختر الوحدة</option>';
        units.forEach(u => {
            opts += `<option value="${u.id}">${u.title_ar}</option>`;
        });
        unitSelect.html(opts);
    });
});

let optIndex = 0;
function addOptionRow(label='', isCorrect=false, isReadonly=false) {
    const checked = isCorrect ? 'checked' : '';
    const readonlyAttr = isReadonly ? 'readonly' : '';
    const removeBtnDisabled = isReadonly ? 'disabled' : '';
    
    $('#add-options-container').append(`
        <div class="row g-2 mb-2 add-opt-row">
            <div class="col-8">
                <input type="text" class="form-control form-control-sm add-opt-label" placeholder="نص الخيار" value="${label}" ${readonlyAttr}>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <div class="form-check m-0">
                    <input class="form-check-input add-opt-correct" type="checkbox" ${checked}>
                    <label class="form-check-label small ms-1">صحيح</label>
                </div>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-sm btn-outline-danger w-100 btn-remove-add-opt" ${removeBtnDisabled}>
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `);
}

function updateOptionsBasedOnType() {
    const type = $('#add-q-type').val();
    $('#add-options-container').empty();
    
    if (type === 'true_false') {
        $('#btn-add-option').hide();
        $('.multi-correct-hint').hide();
        
        // Add True / False specifically
        addOptionRow('صح', true, true);
        addOptionRow('خطأ', false, true);
        
        // Make sure only one can be checked for True/False
        $('.add-opt-correct').on('change', function() {
            if ($(this).is(':checked')) {
                $('.add-opt-correct').not(this).prop('checked', false);
            }
        });
        
    } else {
        $('#btn-add-option').show();
        $('.multi-correct-hint').show();
        
        addOptionRow('أ)', true);
        addOptionRow('ب)', false);
        addOptionRow('ج)', false);
        addOptionRow('د)', false);
    }
}

$('#add-q-type').on('change', updateOptionsBasedOnType);

$('#addQuestionModal').on('show.bs.modal', function() {
    $('#add-q-type').val('mcq'); // Default
    updateOptionsBasedOnType();
});

$('#btn-add-option').on('click', () => addOptionRow());

$(document).on('click', '.btn-remove-add-opt', function() {
    $(this).closest('.add-opt-row').remove();
});

$('#btn-save-new-question').on('click', function() {
    const payload = {
        graded_exam_id: $('#add-q-exam_id').val(),
        unit_id: $('#add-q-unit_id').val(),
        text_ar: $('#add-q-text').val().trim(),
        explanation_ar: $('#add-q-explanation').val().trim(),
        level: $('#add-q-level').val(),
        question_type: $('#add-q-type').val(),
        options: []
    };
    
    $('.add-opt-row').each(function() {
        const label = $(this).find('.add-opt-label').val().trim();
        const isCorrect = $(this).find('.add-opt-correct').is(':checked');
        if (label) {
            payload.options.push({ label_ar: label, is_correct: isCorrect });
        }
    });
    
    if (!payload.graded_exam_id || !payload.unit_id || !payload.text_ar) {
        showAlert('الرجاء تعبئة الشهادة، الوحدة، ونص السؤال.', 'warning');
        return;
    }
    
    if (payload.options.length < 2) {
        showAlert('يجب إدخال خيارين على الأقل.', 'warning');
        return;
    }
    
    if (!payload.options.some(opt => opt.is_correct)) {
        showAlert('يجب تحديد خيار واحد صحيح على الأقل.', 'warning');
        return;
    }
    
    const btn = $(this);
    setLoading(btn, true);
    
    $.ajax({
        url: '{{ route('admin.graded_exams.questions.store') }}',
        method: 'POST',
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance(document.getElementById('addQuestionModal')).hide();
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1000);
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء الإضافة', 'danger');
        }
    });
});
</script>
@endpush
````

## File: resources/views/layouts/admin.blade.php
````php
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'لوحة الإدارة') — إدارة دار الرؤى</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .sidebar { width: 260px; min-height: 100vh; background: #1a1d23; flex-shrink: 0; }
        .sidebar .nav-link { color: #adb5bd; border-radius: 8px; margin: 2px 8px; padding: 10px 16px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #0d6efd; color: #fff; }
        .sidebar .nav-link i { width: 20px; }
        .main-content { flex: 1; overflow-x: hidden; }
        .topbar { background: #fff; border-bottom: 1px solid #dee2e6; padding: 12px 24px; }
        @media print { .sidebar, .topbar, .no-print { display: none !important; } }
    </style>
    @stack('styles')
</head>
<body class="bg-light">
<div class="d-flex">

    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column py-3">
        <div class="px-4 mb-3 text-center pt-2">
            <img src="{{ asset('images/logo.png') }}" alt="دار الرؤى" style="height: 55px; filter: brightness(0) invert(1);">
            <div class="text-muted small mt-2">لوحة الإدارة</div>
        </div>
        <ul class="nav flex-column flex-grow-1 pb-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>الرئيسية
                </a>
            </li>

            <!-- قسم المقاييس -->
            <li class="nav-item mt-3 mb-1 px-3">
                <span class="text-secondary small fw-bold" style="font-size: 0.75rem;">نظام المقاييس</span>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.assessments*') ? 'active' : '' }}" href="{{ route('admin.assessments.index') }}">
                    <i class="bi bi-collection me-2"></i>إدارة المقاييس
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.questions*') ? 'active' : '' }}" href="{{ route('admin.questions.index') }}">
                    <i class="bi bi-question-circle me-2"></i>بنك الأسئلة
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.exams.create') ? 'active' : '' }}" href="{{ route('admin.exams.create') }}">
                    <i class="bi bi-plus-circle me-2"></i>إنشاء اختبار
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.recommendations*') ? 'active' : '' }}" href="{{ route('admin.recommendations.index') }}">
                    <i class="bi bi-lightbulb me-2"></i>إدارة التوصيات
                </a>
            </li>

            <!-- قسم الشهادات الاحترافية -->
            <li class="nav-item mt-3 mb-1 px-3">
                <span class="text-secondary small fw-bold" style="font-size: 0.75rem;">الشهادات الاحترافية</span>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.graded_exams.index') ? 'active' : '' }}" href="{{ route('admin.graded_exams.index') }}">
                    <i class="bi bi-award me-2"></i>إدارة الشهادات والوحدات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.graded_exams.questions.*') ? 'active' : '' }}" href="{{ route('admin.graded_exams.questions.index') }}">
                    <i class="bi bi-question-circle me-2"></i>بنك أسئلة الشهادات
                </a>
            </li>

            <!-- قسم الإدارة العامة -->
            <li class="nav-item mt-3 mb-1 px-3">
                <span class="text-secondary small fw-bold" style="font-size: 0.75rem;">الإدارة العامة</span>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.coupons*') ? 'active' : '' }}" href="{{ route('admin.coupons.index') }}">
                    <i class="bi bi-ticket-perforated me-2"></i>إدارة الكوبونات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.icons*') ? 'active' : '' }}" href="{{ route('admin.icons.index') }}">
                    <i class="bi bi-images me-2"></i>إدارة الأيقونات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.statistics*') ? 'active' : '' }}" href="{{ route('admin.statistics.index') }}">
                    <i class="bi bi-bar-chart-line me-2"></i>الإحصائيات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                    <i class="bi bi-gear me-2"></i>إعدادات الموقع
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="bi bi-people me-2"></i>المستخدمين والنتائج
                </a>
            </li>
        </ul>
        <div class="px-3 mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                    <i class="bi bi-box-arrow-right me-1"></i>تسجيل الخروج
                </button>
            </form>
        </div>
    </nav>

    <!-- Main -->
    <div class="main-content">
        <div class="topbar d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">@yield('page-title', 'لوحة الإدارة')</h6>
            <div class="text-muted small">
                <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
            </div>
        </div>

        <div id="alert-container" class="px-4 pt-2"></div>

        <div class="p-4">
            @yield('content')
        </div>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger"><i class="bi bi-exclamation-triangle me-2"></i>تأكيد الحذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="confirmDeleteMessage">هل أنت متأكد من الحذف؟ لا يمكن التراجع.</div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">حذف</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/json-lists.js') }}"></script>
@stack('scripts')
</body>
</html>
````

## File: resources/views/user/coming-soon.blade.php
````php
@extends('layouts.user')
@section('title', 'قريباً')

@push('styles')
<style>
.coming-soon-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: calc(100vh - 200px);
    padding: 40px 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    text-align: center;
}

.coming-soon-icon {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
    font-size: 3rem;
    color: #ffffff;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 0 0 20px rgba(245, 158, 11, 0);
    }
}

.coming-soon-title {
    color: #1a2b56;
    font-weight: 800;
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.coming-soon-description {
    color: #64748b;
    font-size: 1.1rem;
    max-width: 500px;
    line-height: 1.6;
    margin-bottom: 30px;
}

.back-btn {
    background: #1a2b56;
    color: #ffffff;
    border: none;
    padding: 12px 30px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.back-btn:hover {
    background: #0f172a;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(26, 43, 86, 0.3);
}

.features-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    max-width: 600px;
    margin-top: 40px;
}

.feature-item {
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.feature-item i {
    color: #f59e0b;
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.feature-item h4 {
    color: #1a2b56;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 5px;
}

.feature-item p {
    color: #64748b;
    font-size: 0.85rem;
    margin: 0;
}

@media (max-width: 768px) {
    .coming-soon-container {
        padding: 30px 15px;
        min-height: calc(100vh - 250px);
    }
    
    .coming-soon-icon {
        width: 100px;
        height: 100px;
        font-size: 2.5rem;
    }
    
    .coming-soon-title {
        font-size: 2rem;
    }
    
    .coming-soon-description {
        font-size: 1rem;
    }
    
    .features-list {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@section('content')
<div class="coming-soon-container">
    <div class="coming-soon-icon">
        <i class="bi bi-award"></i>
    </div>
    
    <h1 class="coming-soon-title">الشهادات الاحترافية</h1>
    <p class="coming-soon-description">
        نعمل حالياً على تطوير نظام الشهادات الاحترافية ليقدم لك أفضل تجربة تعليمية وتدريبية. سيتوفر قريباً بإذن الله.
    </p>
    
    <a href="{{ route('selection') }}" class="back-btn">
        <i class="bi bi-arrow-right"></i>
        العودة للقائمة الرئيسية
    </a>
    
    <div class="features-list">
        <div class="feature-item">
            <i class="bi bi-patch-check"></i>
            <h4>شهادات معتمدة</h4>
            <p>اعتراف دولي ومهني</p>
        </div>
        <div class="feature-item">
            <i class="bi bi-mortarboard"></i>
            <h4>برامج تدريبية</h4>
            <p>محتوى تعليمي متخصص</p>
        </div>
        <div class="feature-item">
            <i class="bi bi-trophy"></i>
            <h4>تطوير مهني</h4>
            <p>تعزيز مسارك المهني</p>
        </div>
    </div>
</div>
@endsection
````

## File: resources/views/user/selection.blade.php
````php
@extends('layouts.user')
@section('title', 'اختر الخدمة')

@push('styles')
<style>
.selection-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: calc(100vh - 200px);
    padding: 40px 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.selection-title {
    color: #1a2b56;
    font-weight: 800;
    font-size: 2rem;
    margin-bottom: 10px;
    text-align: center;
}

.selection-subtitle {
    color: #64748b;
    font-size: 1rem;
    margin-bottom: 40px;
    text-align: center;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    max-width: 800px;
    width: 100%;
}

.option-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid transparent;
    text-decoration: none;
    color: inherit;
}

.option-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    border-color: #1a2b56;
}

.option-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 2.5rem;
}

.assessments-icon {
    background: linear-gradient(135deg, #1a2b56 0%, #2d4a7c 100%);
    color: #ffffff;
}

.certificates-icon {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: #ffffff;
}

.option-title {
    color: #1a2b56;
    font-weight: 800;
    font-size: 1.4rem;
    margin-bottom: 10px;
}

.option-description {
    color: #64748b;
    font-size: 0.9rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

.option-features {
    text-align: right;
    margin-top: 20px;
}

.option-features li {
    color: #4a5568;
    font-size: 0.85rem;
    margin-bottom: 8px;
    padding-right: 25px;
    position: relative;
}

.option-features li::before {
    content: "✓";
    position: absolute;
    right: 0;
    color: #10b981;
    font-weight: bold;
}

.coming-soon-badge {
    background: #fbbf24;
    color: #1a2b56;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
    display: inline-block;
    margin-top: 10px;
}

@media (max-width: 768px) {
    .selection-container {
        padding: 30px 15px;
        min-height: calc(100vh - 250px);
    }
    
    .selection-title {
        font-size: 1.5rem;
    }
    
    .options-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .option-card {
        padding: 30px 20px;
    }
}
</style>
@endpush

@section('content')
<div class="selection-container">
    <h1 class="selection-title">مرحباً بك في دار الرؤى</h1>
    <p class="selection-subtitle">اختر الخدمة التي تريدها للبدء</p>
    
    <div class="options-grid">
        <!-- Assessments Option -->
        <a href="{{ route('dashboard.assessments') }}" class="option-card">
            <div class="option-icon assessments-icon">
                <i class="bi bi-journal-check"></i>
            </div>
            <h3 class="option-title">المقاييس</h3>
            <p class="option-description">
                اكتشف قدراتك ومهاراتك من خلال مقاييس علمية معتمدة وتقارير تفصيلية
            </p>
            <ul class="option-features list-unstyled">
                <li>مقاييس شخصية ومهنية متنوعة</li>
                <li>تقارير مفصلة وشاملة</li>
                <li>نتائج فورية ودقيقة</li>
            </ul>
        </a>
        
        <!-- Professional Certificates Option -->
        <a href="{{ route('user.graded_exams.index') }}" class="option-card">
            <div class="option-icon certificates-icon">
                <i class="bi bi-award"></i>
            </div>
            <h3 class="option-title">الشهادات الاحترافية</h3>
            <p class="option-description">
                احصل على شهادات احترافية معتمدة تعزز مسارك المهني
            </p>
            <ul class="option-features list-unstyled">
                <li>شهادات معتمدة دولياً</li>
                <li>برامج تدريبية متخصصة</li>
                <li>اعتراف مهني واسع</li>
            </ul>
        </a>
    </div>
</div>
@endsection
````

## File: start-container.sh
````bash
#!/bin/bash

set -e

if [ "$IS_LARAVEL" = "true" ]; then
  # Clear any cached configurations, routes, and views created during build-time
  # so that migrations and runtime queries read the correct environment variables.
  # We avoid 'optimize:clear' because it triggers 'cache:clear', which fails if the
  # database connection is not yet established (when using a database cache store).
  echo "Clearing cached configurations, routes, and views..."
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear

  if [ "$RAILPACK_SKIP_MIGRATIONS" != "true" ]; then
    echo "Running migrations..."
    php artisan migrate --force

    echo "Checking if database needs seeding..."
    if [ -f "check-seed.php" ]; then
      ASSESSMENT_COUNT=$(php check-seed.php 2>/dev/null || echo "0")
      if [ "$ASSESSMENT_COUNT" = "0" ]; then
        echo "Assessments table is empty. Running database seeders..."
        php artisan db:seed --force
      else
        echo "Assessments table already has $ASSESSMENT_COUNT records. Skipping seeding."
      fi
    else
      echo "check-seed.php not found, running database seeders..."
      php artisan db:seed --force
    fi
  fi

  php artisan storage:link
fi

# Start the FrankenPHP server
docker-php-entrypoint --config /Caddyfile --adapter caddyfile 2>&1
````

## File: app/Http/Controllers/Admin/GradedExamController.php
````php
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
````

## File: app/Http/Controllers/ExamController.php
````php
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
````

## File: app/Http/Requests/Admin/SaveCouponRequest.php
````php
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
````

## File: app/Models/Assessment.php
````php
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
````

## File: app/Models/Coupon.php
````php
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
````

## File: app/Models/GradedExamConstraintSetting.php
````php
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
````

## File: app/Models/GradedExamUserAnswer.php
````php
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
````

## File: app/Models/Recommendation.php
````php
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
````

## File: config/graded_exams.php
````php
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
````

## File: database/migrations/2024_01_01_000002_create_assessments_table.php
````php
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
````

## File: database/migrations/2024_01_01_000003_create_dimensions_table.php
````php
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
````

## File: database/migrations/2024_01_01_000004_create_questions_table.php
````php
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
````

## File: database/migrations/2024_01_01_000005_create_answer_options_table.php
````php
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
````

## File: database/migrations/2024_01_01_000006_create_exam_sessions_table.php
````php
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
````

## File: database/migrations/2024_01_01_000007_create_user_answers_table.php
````php
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
````

## File: database/migrations/2024_01_01_000008_create_results_table.php
````php
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
````

## File: database/migrations/2024_01_01_000009_create_dimension_scores_table.php
````php
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
````

## File: database/migrations/2024_01_01_000010_create_recommendations_table.php
````php
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
````

## File: database/migrations/2026_06_24_091932_create_dimension_interpretations_table.php
````php
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
````

## File: database/migrations/2026_07_01_154805_create_coupons_table.php
````php
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
````

## File: database/migrations/2026_07_05_000000_upgrade_coupons_and_users_tables.php
````php
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
````

## File: database/migrations/2026_07_05_124738_add_user_restrictions_to_coupons.php
````php
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
````

## File: database/migrations/2026_07_17_014000_change_sessions_user_id_to_uuid.php
````php
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
````

## File: database/migrations/2026_08_29_000007_create_graded_exam_user_answers_table.php
````php
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
````

## File: database/migrations/2026_08_29_000009_create_graded_exam_results_table.php
````php
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
````

## File: repomix.config.json
````json
{
  "output": {
    "filePath": "repomix-output.md",
    "style": "markdown"
  },
  "ignore": {
    "customPatterns": [
      "repomix-output.xml",
      "repomix-output.md",
      "repomix-migrations.md",
      "database/data/**",
      "database/seeders/**",
      "database/database.sqlite",
      "storage/**",
      "composer.lock",
      "package-lock.json",
      "public/css/report-pdf.css",
      "_ide_helper.php",
      ".phpstorm.meta.php",
      "_ide_helper_models.php",
      "*backup*",
      "*.txt"
    ]
  }
}
````

## File: resources/views/admin/graded_exams/preview.blade.php
````php
@extends('layouts.user')
@section('title', 'اختبار الأسئلة - ' . $exam->title_ar)

@section('content')
<style>
    body {
        background-color: #f1f5f9;
        direction: rtl;
    }
    .preview-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px 14px 60px;
    }
    @media (min-width: 768px){
        .preview-container { padding: 36px 20px 64px; }
    }
    .question-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        padding: 24px;
        margin-bottom: 24px;
        border: 1px solid #e2e8f0;
    }
    .question-header {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 16px;
    }
    .question-number {
        background: #e0e7ff;
        color: #4338ca;
        padding: 4px 12px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 14px;
        white-space: nowrap;
    }
    .question-text {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        line-height: 1.5;
    }
    .hint-text {
        color: #f59e0b;
        font-size: 0.9rem;
        font-weight: 600;
        margin-top: 4px;
    }
    .options-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .option-label {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
        margin: 0;
        text-align: right;
    }
    .option-label:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }
    .option-label.correct {
        background: #dcfce7;
        border-color: #22c55e;
        color: #166534;
    }
    .option-label.wrong {
        background: #fee2e2;
        border-color: #ef4444;
        color: #991b1b;
    }
    .explanation-box {
        margin-top: 16px;
        padding: 16px;
        background: #f1f5f9;
        border-right: 4px solid #3b82f6;
        border-radius: 4px;
        display: none;
    }
    .explanation-box.show {
        display: block;
    }
    .unit-badge {
        display: inline-block;
        background: #f3f4f6;
        color: #4b5563;
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 4px;
        margin-bottom: 12px;
    }
    /* override bootstrap spacing for radios */
    .form-check-input {
        margin-right: 0 !important;
        margin-left: 12px !important;
    }
</style>

<div class="preview-container">
    <div class="alert alert-info shadow-sm mb-4">
        <h5 class="alert-heading fw-bold mb-2"><i class="bi bi-info-circle me-2"></i>وضع الاختبار السريع (الآدمن)</h5>
        <p class="mb-0">
            هذه الصفحة تعرض <strong>جميع أسئلة الامتحان</strong> في صفحة واحدة لاختبارها ومراجعتها بسرعة.
            <br>
            بمجرد النقر على أي إجابة، سيظهر فوراً ما إذا كانت صحيحة أم خاطئة مع عرض التفسير.
        </p>
    </div>

    @php
        $globalIndex = 1;
    @endphp

    @foreach($exam->units as $unit)
        <h3 class="mb-4 mt-5 text-primary fw-bold" style="border-bottom: 2px solid #e2e8f0; padding-bottom: 8px;">
            {{ $unit->title_ar }}
        </h3>
        
        @foreach($unit->questions as $question)
            @php
                $correctCount = $question->options->where('is_correct', true)->count();
            @endphp
            <div class="question-card" id="q-{{ $question->id }}">
                <div class="unit-badge">{{ $unit->title_ar }} (مستوى: {{ __("app.".$question->level) ?? $question->level }})</div>
                
                <div class="question-header">
                    <span class="question-number"><bdi>{{ $globalIndex++ }}</bdi></span>
                    <div>
                        <h4 class="question-text">{{ $question->text_ar }}</h4>
                        @if($question->is_multi_correct)
                            <div class="hint-text">(حدد {{ $correctCount }} إجابات صحيحة)</div>
                        @endif
                    </div>
                </div>

                <div class="options-list">
                    @foreach($question->options as $option)
                        <label class="option-label" data-q-id="{{ $question->id }}" data-is-correct="{{ $option->is_correct ? 'true' : 'false' }}">
                            <input type="{{ $question->is_multi_correct ? 'checkbox' : 'radio' }}" 
                                   name="q_{{ $question->id }}{{ $question->is_multi_correct ? '[]' : '' }}" 
                                   value="{{ $option->id }}" 
                                   class="form-check-input option-input">
                            <span>{{ $option->option_text_ar }}</span>
                        </label>
                    @endforeach
                </div>

                @if($question->explanation_ar)
                    <div class="explanation-box" id="exp-{{ $question->id }}">
                        <strong>التفسير:</strong>
                        <div class="mt-2">{{ $question->explanation_ar }}</div>
                    </div>
                @endif
            </div>
        @endforeach
    @endforeach
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.option-input').on('change', function() {
            let qId = $(this).closest('.option-label').data('q-id');
            let isMulti = $(this).attr('type') === 'checkbox';
            
            let card = $('#q-' + qId);
            
            if (!isMulti) {
                // For radio buttons, lock the question and show result immediately
                card.find('.option-input').prop('disabled', true);
                
                // Highlight options
                card.find('.option-label').each(function() {
                    let isCorrect = $(this).data('is-correct') === true;
                    let isChecked = $(this).find('.option-input').is(':checked');
                    
                    if (isCorrect) {
                        $(this).addClass('correct');
                    } else if (isChecked && !isCorrect) {
                        $(this).addClass('wrong');
                    }
                });
                
                // Show explanation
                $('#exp-' + qId).addClass('show');
            } else {
                let label = $(this).closest('.option-label');
                let isCorrect = label.data('is-correct') === true;
                let isChecked = $(this).is(':checked');
                
                if (isChecked) {
                    if (isCorrect) {
                        label.addClass('correct');
                    } else {
                        label.addClass('wrong');
                    }
                } else {
                    label.removeClass('correct wrong');
                }
                
                $('#exp-' + qId).addClass('show');
            }
        });
    });
</script>
@endpush
@endsection
````

## File: resources/views/user/graded_exams/intro.blade.php
````php
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $exam->title_ar }}</title>
<!-- Google Fonts: Cairo -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS v3 CDN with Plugins -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Configuration Script -->
<script data-purpose="tailwind-config">
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            cairo: ['Cairo', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#f0f7ff',
              100: '#e0effe',
              500: '#2563eb',
              600: '#1d4ed8',
              700: '#1e40af',
              900: '#0f172a',
            }
          },
          boxShadow: {
            'card': '0 4px 20px -2px rgba(15, 23, 42, 0.05), 0 2px 6px -1px rgba(15, 23, 42, 0.02)',
            'card-subtle': '0 2px 10px rgba(0, 0, 0, 0.03)',
            'btn-blue': '0 8px 20px -4px rgba(37, 99, 235, 0.4)',
          }
        }
      }
    }
  </script>
<!-- Custom Typography & Layout Adjustments -->
<style data-purpose="typography">
    html, body {
      height: 100%;
    }
    body {
      font-family: 'Cairo', sans-serif;
      -webkit-tap-highlight-color: transparent;
      min-height: 100dvh;
    }
  </style>
<style data-purpose="decorations">
    /* Subtle background glow effect for hero illustration */
    .hero-glow {
      background: radial-gradient(circle, rgba(219, 234, 254, 0.8) 0%, rgba(239, 246, 255, 0.1) 70%);
    }
    /* Constrain the page to a phone-sized viewport and let content scroll within it */
    .phone-shell {
      min-height: 100dvh;
      display: flex;
      flex-direction: column;
    }
  </style>
</head>
<body class="bg-[#f4f7fb] text-slate-800 antialiased selection:bg-blue-100">
<div class="phone-shell max-w-[480px] mx-auto px-4 py-3 flex flex-col gap-4 pb-8">
<!-- BEGIN: MainHeader -->
<header class="flex items-center justify-between py-2" data-purpose="page-header">
<!-- Right: Development Institute Logo -->
<div class="flex items-center gap-2" data-purpose="brand-logo">
<div class="flex flex-col items-end">
<div class="flex items-center gap-1">
<svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
<path d="M12 8C12 8 16 12 18 16C20 20 18 26 14 28" stroke="#0ea5e9" stroke-linecap="round" stroke-width="3.5"></path>
<path d="M22 6L28 20L22 34" stroke="#1d4ed8" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5"></path>
<circle cx="10" cy="14" fill="#0ea5e9" r="3"></circle>
<circle cx="20" cy="9" fill="#3b82f6" r="2.5"></circle>
</svg>
<div class="text-right">
<span class="block text-sm font-black tracking-tight text-blue-900 leading-tight">معهد التطوير</span>
<span class="block text-[8px] font-bold tracking-widest text-slate-400 uppercase leading-none">DEVELOPMENT INSTITUTE</span>
</div>
</div>
</div>
</div>
<!-- Left: User Profile Pill and Options Icon -->
<div class="flex items-center gap-2.5" data-purpose="user-navigation">
<a href="{{ route('user.graded_exams.index') }}" aria-label="الرجوع لقائمة الشهادات" class="text-blue-600 hover:text-blue-800 transition-colors p-1">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path d="M18 6L6 18M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</a>
<div class="flex items-center gap-2 bg-white/90 border border-slate-200/80 rounded-full py-1 px-3 shadow-sm">
<span class="text-xs font-bold text-slate-800">{{ auth()->user()->name ?? '' }}</span>
<div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
<path clip-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" fill-rule="evenodd"></path>
</svg>
</div>
</div>
</div>
</header>
<!-- END: MainHeader -->
<!-- BEGIN: HeroCard -->
<section class="bg-white rounded-[26px] p-5 shadow-card border border-slate-100 relative overflow-hidden" data-purpose="hero-section">
<div class="relative z-10">
<!-- Badge & Illustration Row -->
<div class="flex items-start justify-between">
<!-- Text and Badge Content Column -->
<div class="flex-1 pl-2">
<!-- Training Exam Badge -->
<div class="inline-flex items-center gap-1.5 bg-blue-50/90 text-blue-600 px-3.5 py-1 rounded-full text-xs font-bold mb-3 border border-blue-100/60">
<svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
<path d="M12 3L1 9L12 15L21 10.09V17H23V9M5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z"></path>
</svg>
<span>اختبار تدريبي</span>
</div>
<!-- Title -->
<h1 class="text-xl sm:text-2xl font-black text-slate-900 leading-[1.35] tracking-tight">
              {{ $exam->title_ar }}
            </h1>
</div>
<!-- Illustration: Clipboard & Target -->
<div class="w-28 sm:w-32 h-28 sm:h-32 flex-shrink-0 relative flex items-center justify-center">
<!-- Glow background circle -->
<div class="absolute inset-0 hero-glow rounded-full scale-110 -top-1 pointer-events-none"></div>
<svg class="w-full h-full relative z-10 drop-shadow-sm" fill="none" viewBox="0 0 130 130" xmlns="http://www.w3.org/2000/svg">
<!-- Clip board back shadow -->
<rect fill="#E2E8F0" height="90" rx="14" width="70" x="25" y="24"></rect>
<!-- Clip board board -->
<rect fill="#FFFFFF" height="90" rx="14" stroke="#93C5FD" stroke-width="2.5" width="70" x="24" y="20"></rect>
<!-- Clip top tab -->
<path d="M44 14C44 11.7909 45.7909 10 48 10H70C72.2091 10 74 11.7909 74 14V22H44V14Z" fill="#1D4ED8"></path>
<circle cx="59" cy="16" fill="#FFFFFF" r="2.5"></circle>
<!-- Task rows -->
<!-- Row 1 (Checked) -->
<rect fill="#2563EB" height="14" rx="4" width="14" x="33" y="34"></rect>
<path d="M36 41L39 44L44 38" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
<rect fill="#BFDBFE" height="4.5" rx="2.25" width="28" x="52" y="37"></rect>
<!-- Row 2 -->
<rect fill="#F8FAFC" height="14" rx="4" stroke="#93C5FD" stroke-width="1.8" width="14" x="33" y="54"></rect>
<rect fill="#E2E8F0" height="4.5" rx="2.25" width="22" x="52" y="58"></rect>
<!-- Row 3 -->
<rect fill="#F8FAFC" height="14" rx="4" stroke="#93C5FD" stroke-width="1.8" width="14" x="33" y="74"></rect>
<rect fill="#E2E8F0" height="4.5" rx="2.25" width="30" x="52" y="79"></rect>
<!-- Target & Dart (Overlapping bottom right of clip) -->
<!-- Outer ring -->
<circle cx="95" cy="85" fill="white" r="23" stroke="#2563EB" stroke-width="5"></circle>
<!-- Middle ring -->
<circle cx="95" cy="85" fill="none" r="14" stroke="#60A5FA" stroke-width="4.5"></circle>
<!-- Center bullseye -->
<circle cx="95" cy="85" fill="#1D4ED8" r="6"></circle>
<!-- Dart -->
<path d="M102 78L116 64" stroke="#1D4ED8" stroke-linecap="round" stroke-width="4"></path>
<!-- Dart fins -->
<path d="M112 60L120 62L118 70L112 66Z" fill="#2563EB"></path>
<!-- Sparkles -->
<path d="M110 32L116 26M103 24V16M92 20L97 27" stroke="#38BDF8" stroke-linecap="round" stroke-width="2"></path>
</svg>
</div>
</div>
<!-- Description Header -->
<div class="mt-4 flex items-center gap-2 text-slate-800">
<div class="w-5 h-5 rounded-md bg-blue-600 flex items-center justify-center text-white">
<svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
<path d="M4 6h16M4 12h16M4 18h10" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
<span class="text-sm font-black text-slate-900">وصف الاختبار</span>
</div>
<!-- Description Body Text -->
<p class="mt-2 text-xs leading-relaxed text-slate-500 font-medium text-justify">
          {{ $exam->description_ar ?: 'يهدف هذا الاختبار إلى قياس مدى استيعابك للمفاهيم والمعارف الأساسية، ومساعدتك على تقييم جاهزيتك قبل التقدم إلى الاختبار النهائي للشهادة الاحترافية.' }}
        </p>
</div>
</section>
<!-- END: HeroCard -->
<!-- BEGIN: ExamDataCard -->
<section class="bg-white rounded-[26px] p-5 shadow-card border border-slate-100" data-purpose="exam-parameters">
<!-- Section Header -->
<div class="flex items-center justify-between mb-4">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">
            i
          </div>
<h2 class="text-sm font-black text-slate-900">بيانات الاختبار</h2>
</div>
<div class="h-[1px] flex-1 max-w-[170px] bg-slate-200/80 mr-2"></div>
</div>
<!-- 2x2 Grid of Exam Details -->
<div class="grid grid-cols-2 gap-3">
<!-- Item 1: Duration (Top Right, matches RTL reading order) -->
<div class="bg-[#fbfcfe] border border-slate-100 rounded-2xl p-3 flex items-center justify-between shadow-card-subtle">
<div class="text-right">
<div class="text-sm font-black text-slate-900">{{ $timeText }}</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">مدة الاختبار</div>
</div>
<div class="w-9 h-9 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 flex-shrink-0">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path d="M12 6v6l4 2" stroke-linecap="round" stroke-linejoin="round"></path>
<circle cx="12" cy="12" r="9"></circle>
</svg>
</div>
</div>
<!-- Item 2: Number of questions (Top Left) -->
<div class="bg-[#fbfcfe] border border-slate-100 rounded-2xl p-3 flex items-center justify-between shadow-card-subtle">
<div class="text-right">
<div class="text-sm font-black text-slate-900">{{ $questionCount }} سؤال</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">عدد الأسئلة</div>
</div>
<div class="w-9 h-9 rounded-full bg-teal-500 text-white flex items-center justify-center font-bold text-sm shadow-sm flex-shrink-0">
            ?
          </div>
</div>
<!-- Item 3: Question types (Bottom Right) -->
<div class="bg-[#fbfcfe] border border-slate-100 rounded-2xl p-3 flex items-center justify-between shadow-card-subtle">
<div class="text-right">
<div class="text-sm font-black text-slate-900">صح/خطأ واختياري</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">أنواع الأسئلة</div>
</div>
<div class="w-9 h-9 rounded-xl bg-purple-500 text-white flex items-center justify-center flex-shrink-0">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<rect height="18" rx="3" stroke-width="1.5" width="18" x="3" y="3"></rect>
<path d="M7 7l10 10M17 7l-2 2M7 17l2-2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
<!-- Item 4: Attempts (Bottom Left) -->
<div class="bg-[#fbfcfe] border border-slate-100 rounded-2xl p-3 flex items-center justify-between shadow-card-subtle">
<div class="text-right">
<div class="text-sm font-black text-slate-900">محاولات مفتوحة</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">عدد المحاولات</div>
</div>
<div class="w-9 h-9 rounded-full bg-orange-50 flex items-center justify-center text-orange-500 flex-shrink-0">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
</div>
</section>
<!-- END: ExamDataCard -->
<!-- BEGIN: InstructionsCard -->
<section class="bg-white rounded-[26px] p-5 shadow-card border border-slate-100" data-purpose="exam-instructions">
<!-- Section Header -->
<div class="flex items-center justify-between mb-4">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-lg bg-blue-600 text-white flex items-center justify-center shadow-sm">
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
<path d="M4 6h16M4 12h16M4 18h7" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
<h2 class="text-sm font-black text-slate-900">تعليمات هامة</h2>
</div>
<div class="h-[1px] flex-1 max-w-[170px] bg-slate-200/80 mr-2"></div>
</div>
<!-- Numbered Instructions List -->
<div class="space-y-3 mb-4">
<div class="flex items-center gap-3">
<div class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold flex-shrink-0">
            1
          </div>
<p class="text-xs text-slate-700 font-semibold">اقرأ السؤال والبدائل بعناية.</p>
</div>
<div class="flex items-center gap-3">
<div class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold flex-shrink-0">
            2
          </div>
<p class="text-xs text-slate-700 font-semibold">يمكنك مراجعة وتعديل إجاباتك قبل التسليم.</p>
</div>
</div>
<!-- Alert / Warning Container -->
<div class="bg-[#f0f7ff] border border-blue-100 rounded-2xl p-3.5 flex items-center justify-between gap-3 relative overflow-hidden" data-purpose="warning-alert-box">
<!-- Text details -->
<div class="flex-1 text-right">
<div class="flex items-center gap-1 text-blue-600 mb-1">
<svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
<path clip-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" fill-rule="evenodd"></path>
</svg>
<span class="text-xs font-black">تنبيه:</span>
</div>
<p class="text-[11px] text-slate-600 font-medium leading-relaxed">
            حدد الإجابة أو الإجابات الصحيحة بناءً على المطلوب في كل سؤال، حيث قد يتطلب سؤال واحد اختيار أكثر من خيار.
          </p>
</div>
<!-- Lightbulb illustration -->
<div class="w-16 h-16 flex-shrink-0 relative flex items-center justify-center">
<div class="absolute inset-0 bg-blue-200/50 rounded-full blur-md"></div>
<svg class="w-14 h-14 relative z-10" fill="none" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
<!-- Glow rays -->
<path d="M32 6V12M14 18L18 22M50 18L46 22M8 34H14M50 34H56" stroke="#60A5FA" stroke-linecap="round" stroke-width="2"></path>
<!-- Bulb glass -->
<path d="M32 16C24.268 16 18 22.268 18 30C18 34.5 20.5 38.5 24 41V46C24 47.1 24.9 48 26 48H38C39.1 48 40 47.1 40 46V41C43.5 38.5 46 34.5 46 30C46 22.268 39.732 16 32 16Z" fill="#3B82F6"></path>
<!-- Filament lines -->
<path d="M28 32C28 29.7909 29.7909 28 32 28C34.2091 28 36 29.7909 36 32V38H28V32Z" fill="none" stroke="#FFFFFF" stroke-width="1.8"></path>
<!-- Bulb base -->
<rect fill="#1D4ED8" height="3" rx="1" width="8" x="28" y="49"></rect>
<rect fill="#1E40AF" height="2.5" rx="1" width="6" x="29" y="53"></rect>
</svg>
</div>
</div>
</section>
<!-- END: InstructionsCard -->
<!-- BEGIN: ActionControls -->
<form action="{{ route('user.graded_exams.start', $exam->id) }}" method="POST" id="form-start-exam" class="m-0">
@csrf
<section class="bg-white rounded-[26px] p-4 shadow-card border border-slate-100 flex flex-col gap-3.5 mt-auto" data-purpose="actions-panel">
<!-- Terms and Agreement Checkbox -->
<label class="flex items-center gap-2.5 cursor-pointer select-none px-1">
<input id="agreeCheckbox" class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-0 focus:ring-offset-0 cursor-pointer" type="checkbox"/>
<span class="text-xs font-bold text-slate-800">قرأت التعليمات وأوافق على البدء.</span>
</label>
<!-- Action Buttons Row -->
<div class="flex items-center gap-3">
<!-- Start Exam Primary Button -->
<button class="flex-1 py-3.5 px-6 rounded-2xl bg-blue-600 hover:bg-blue-700 active:scale-[0.99] disabled:opacity-50 disabled:cursor-not-allowed transition-all text-white font-bold text-sm flex items-center justify-center gap-2 shadow-btn-blue" data-purpose="start-exam-button" id="btn-confirm-start" type="submit" disabled>
<span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center">
<svg class="w-3.5 h-3.5 fill-current rotate-180" viewBox="0 0 20 20">
<path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" fill-rule="evenodd"></path>
</svg>
</span>
<span>ابدأ الاختبار</span>
</button>
<!-- Cancel Secondary Button -->
<a href="{{ route('user.graded_exams.index') }}" class="flex-1 py-3.5 px-6 rounded-2xl bg-white border border-slate-200 hover:bg-slate-50 active:scale-[0.99] transition-all text-slate-700 font-bold text-sm flex items-center justify-center shadow-sm" data-purpose="cancel-button">
          إلغاء
        </a>
</div>
</section>
</form>
<!-- END: ActionControls -->
</div>

<script>
    document.getElementById('agreeCheckbox').addEventListener('change', function () {
        document.getElementById('btn-confirm-start').disabled = !this.checked;
    });

    document.getElementById('form-start-exam').addEventListener('submit', function () {
        var btn = document.getElementById('btn-confirm-start');
        btn.disabled = true;
        btn.innerHTML = '<span class="w-5 h-5 flex items-center justify-center"><svg class="animate-spin w-4 h-4" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg></span><span>جاري البدء...</span>';
    });
</script>
</body>
</html>
````

## File: resources/views/user/graded_exams/progress.blade.php
````php
@extends('layouts.user')

@section('title', 'تتبع التقدم في الاختبارات')

@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
:root{
    --navy: #14213d;
    --navy-soft: #1e3a5f;
    --accent: #0ea472;
    --bg: #f6f7fb;
    --surface: #ffffff;
    --border: #e6e9f0;
    --text: #1e293b;
    --text-muted: #64748b;
    --radius-lg: 18px;
    --radius-sm: 10px;
    --shadow-sm: 0 2px 10px rgba(15, 23, 42, .05);
}

.progress-page{
    background: var(--bg);
    direction: rtl;
    text-align: right;
    padding: 20px 14px 48px;
}
@media (min-width: 768px){
    .progress-page{ padding: 32px 20px 56px; }
}
.progress-container{ max-width: 1100px; margin: 0 auto; }

.progress-topbar{
    display: flex;
    flex-direction: column;
    gap: 14px;
    margin-bottom: 22px;
}
@media (min-width: 768px){
    .progress-topbar{
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
    }
}
.progress-topbar h2{
    font-weight: 800;
    margin: 0;
    color: var(--navy);
    font-size: 1.25rem;
    display: flex;
    align-items: center;
    gap: 8px;
}
@media (min-width: 768px){
    .progress-topbar h2{ font-size: 1.6rem; }
}
.progress-topbar h2 i{ color: var(--accent); }

.btn-back{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    border: 1px solid var(--border);
    background: var(--surface);
    color: var(--text);
    border-radius: 999px;
    padding: 10px 18px;
    font-weight: 600;
    font-size: .9rem;
    text-decoration: none;
    align-self: flex-start;
    transition: background .15s ease;
}
@media (min-width: 768px){ .btn-back{ align-self: auto; } }
.btn-back:hover{ background: var(--bg); color: var(--text); }

.progress-empty{
    background: var(--surface);
    border: 1px dashed var(--border);
    border-radius: var(--radius-lg);
    text-align: center;
    padding: 56px 20px;
}
.progress-empty i{ font-size: 2.2rem; color: var(--accent); margin-bottom: 12px; display: block; }
.progress-empty h5{ color: var(--navy); font-weight: 700; margin: 0 0 6px; }
.progress-empty p{ color: var(--text-muted); margin: 0; font-size: .9rem; }

.exam-section{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 18px;
    margin-bottom: 22px;
    box-shadow: var(--shadow-sm);
}
@media (min-width: 768px){
    .exam-section{ padding: 26px; margin-bottom: 28px; }
}
.exam-section h4{
    color: var(--navy);
    font-weight: 800;
    font-size: 1.05rem;
    margin-bottom: 18px;
}
@media (min-width: 768px){ .exam-section h4{ font-size: 1.25rem; } }

.section-label{
    color: var(--text-muted);
    font-weight: 700;
    font-size: .85rem;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.section-label i{ color: var(--accent); }

.chart-container{
    position: relative;
    height: 220px;
    width: 100%;
    margin-bottom: 24px;
}
@media (min-width: 992px){
    .chart-container{ height: 280px; margin-bottom: 0; }
}

/* Attempts: card list on mobile, table on larger screens */
.attempts-list{ display: flex; flex-direction: column; gap: 10px; }
.attempt-card{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 12px 14px;
}
.attempt-card .attempt-main{ display: flex; flex-direction: column; gap: 4px; }
.attempt-card .attempt-badge{
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text);
    font-size: .78rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 999px;
    width: fit-content;
}
.attempt-card .attempt-date{
    font-size: .78rem;
    color: var(--text-muted);
    direction: ltr;
    text-align: right;
}
.attempt-card .attempt-score{
    font-weight: 800;
    font-size: .95rem;
    padding: 5px 12px;
    border-radius: 999px;
    color: #fff;
}
.score-success{ background: #10b981; }
.score-warning{ background: #f59e0b; color: #1e293b; }
.score-danger{ background: #ef4444; }
.attempt-card .attempt-view{
    width: 38px; height: 38px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 50%;
    border: 1px solid var(--border);
    color: var(--navy);
    background: var(--surface);
    flex-shrink: 0;
    text-decoration: none;
    transition: background .15s ease;
}
.attempt-card .attempt-view:hover{ background: var(--bg); color: var(--navy); }

@media (min-width: 992px){
    .attempts-list{ max-height: 280px; overflow-y: auto; padding-inline-end: 4px; }
    .attempts-list::-webkit-scrollbar{ width: 4px; }
    .attempts-list::-webkit-scrollbar-thumb{ background: var(--border); border-radius: 10px; }
}
</style>
@endpush

@section('content')
<div class="progress-page">
<div class="progress-container">
    <div class="progress-topbar">
        <h2><i class="bi bi-graph-up-arrow"></i> تتبع التقدم وسجل الاختبارات</h2>
        <a href="{{ route('user.graded_exams.index') }}" class="btn-back">
            <i class="bi bi-arrow-right"></i> العودة للاختبارات
        </a>
    </div>

    @if(empty($progressByExam))
        <div class="progress-empty">
            <i class="bi bi-info-circle"></i>
            <h5>لا يوجد سجل اختبارات مكتملة حتى الآن.</h5>
            <p>ابدأ باجتياز الاختبارات لتتمكن من تتبع مستواك وتقدمك هنا.</p>
        </div>
    @else
        @foreach($progressByExam as $examId => $examData)
            <div class="exam-section">
                <h4>{{ $examData['exam_title'] }}</h4>

                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="section-label"><i class="bi bi-bar-chart-fill"></i> الرسم البياني للتقدم</div>
                        <div class="chart-container">
                            <canvas id="chart-{{ $examId }}"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="section-label"><i class="bi bi-journal-text"></i> سجل المحاولات السابقة</div>
                        @php $totalAttempts = count($examData['sessions']); @endphp
                        <div class="attempts-list">
                            @foreach($examData['sessions'] as $index => $session)
                                @php
                                    $scoreClass = 'score-danger';
                                    if($session->result){
                                        $scoreClass = $session->result->percentage >= 70 ? 'score-success' : ($session->result->percentage >= 50 ? 'score-warning' : 'score-danger');
                                    }
                                @endphp
                                <div class="attempt-card">
                                    <div class="attempt-main">
                                        <span class="attempt-badge">محاولة {{ $totalAttempts - $index }}</span>
                                        <span class="attempt-date">{{ $session->completed_at ? $session->completed_at->format('Y-m-d') : '' }}</span>
                                    </div>
                                    @if($session->result)
                                        <span class="attempt-score {{ $scoreClass }}">{{ $session->result->percentage }}%</span>
                                    @else
                                        <span class="attempt-score score-danger">-</span>
                                    @endif
                                    <a href="{{ route('user.graded_exams.result', $session->id) }}" class="attempt-view" aria-label="عرض النتيجة">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($progressByExam as $examId => $examData)
            @php $safeId = str_replace('-', '', $examId); @endphp
            var ctx{{ $safeId }} = document.getElementById('chart-{{ $examId }}').getContext('2d');
            var gradient{{ $safeId }} = ctx{{ $safeId }}.createLinearGradient(0, 0, 0, 280);
            gradient{{ $safeId }}.addColorStop(0, 'rgba(14, 164, 114, 0.35)');
            gradient{{ $safeId }}.addColorStop(1, 'rgba(14, 164, 114, 0.0)');

            new Chart(ctx{{ $safeId }}, {
                type: 'line',
                data: {
                    labels: {!! json_encode($examData['labels']) !!},
                    datasets: [{
                        label: 'نسبة النجاح %',
                        data: {!! json_encode($examData['data']) !!},
                        borderColor: '#0ea472',
                        backgroundColor: gradient{{ $safeId }},
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#0ea472',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#14213d',
                            padding: 10,
                            titleFont: { family: 'Tajawal', size: 13 },
                            bodyFont: { family: 'Tajawal', size: 13 },
                            callbacks: {
                                label: function(context) { return 'النتيجة: ' + context.parsed.y + '%'; }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: { stepSize: 20, font: { size: 11 }, callback: function(value) { return value + '%'; } },
                            grid: { borderDash: [5, 5], color: '#e6e9f0' }
                        },
                        x: {
                            ticks: { font: { size: 11 } },
                            grid: { display: false }
                        }
                    }
                }
            });
        @endforeach
    });
</script>
@endpush
````

## File: tests/Feature/Architecture/NoDirectBuilderDeleteTest.php
````php
<?php

namespace Tests\Feature\Architecture;

use PHPUnit\Framework\TestCase;

class NoDirectBuilderDeleteTest extends TestCase
{
    /**
     * Test that User and Coupon models are not deleted via direct Builder::delete() calls across app/ and database/seeders/.
     */
    public function test_no_direct_builder_delete_on_models_with_unique_columns(): void
    {
        $baseDir = dirname(__DIR__, 3);
        $directories = [
            $baseDir . '/app',
            $baseDir . '/database/seeders',
        ];

        $violatingFiles = [];

        // Matches User::where...->delete(), Coupon::whereIn...->delete(), etc., across single or multiple lines
        $patterns = [
            '/(?:User|Coupon)::(?:query|where|orWhere|whereIn|whereNotIn|withTrashed|onlyTrashed)[\s\S]{1,200}?->delete\s*\(/i',
        ];

        foreach ($directories as $dir) {
            if (!is_dir($dir)) {
                continue;
            }

            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir));

            foreach ($files as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $content = file_get_contents($file->getPathname());
                    foreach ($patterns as $pattern) {
                        if (preg_match($pattern, $content)) {
                            $violatingFiles[] = $file->getPathname();
                        }
                    }
                }
            }
        }

        $this->assertEmpty(
            $violatingFiles,
            'Direct Builder delete found on User/Coupon models in: ' . implode(', ', $violatingFiles) . '. Use Model::bulkSoftDelete() or $collection->each->delete() instead.'
        );
    }
}
````

## File: app/Http/Controllers/Admin/AssessmentController.php
````php
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
````

## File: app/Services/CouponService.php
````php
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
````

## File: app/Services/Result/RecommendationSelector.php
````php
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
````

## File: resources/views/user/dashboard.blade.php
````php
@extends('layouts.user')
@section('title', 'الرئيسية')

@push('styles')
<style>
/* Reset container padding for full-width mobile experience */
main.container { padding: 0 !important; max-width: 100% !important; background: #fff; }
#alert-container.container { max-width: 100% !important; padding: 0 15px !important; }

/* Global Fonts & Colors */
body { font-family: 'Noto Kufi Arabic', sans-serif; background: #fff; }
.text-primary-custom { color: #1a2b56; } /* Dark Blue */
.text-warning-custom { color: #f59e0b; } /* Gold/Yellow */

/* ── Hero Section ── */
.hero-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 15px;
    background-color: #f8f9fa;
}
.hero-text {
    width: 60%;
    padding-left: 10px;
}
.hero-text h1 {
    color: #1a2b56;
    font-weight: 800;
    font-size: 1.4rem;
    line-height: 1.3;
    margin-bottom: 10px;
}
.hero-text p {
    color: #4a5568;
    font-size: 0.75rem;
    line-height: 1.5;
    margin-bottom: 0;
}
.hero-image-wrap {
    width: 40%;
}
.hero-image {
    width: 100%;
    border-radius: 12px;
}

/* ── Category Filter ── */
.category-filter {
    display: flex;
    justify-content: space-between;
    padding: 15px 10px;
    gap: 8px;
    overflow-x: auto;
    scrollbar-width: none;
}
.category-filter::-webkit-scrollbar { display: none; }
.cat-btn {
    flex: 1;
    text-align: center;
    white-space: nowrap;
    padding: 8px 6px;
    border-radius: 8px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #4a5568;
    font-weight: 700;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-decoration: none;
}
.cat-btn.active {
    background: #1a2b56;
    color: #ffffff;
    border-color: #1a2b56;
}

/* ── Stats Row ── */
.stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
    padding: 15px 10px;
    background: #fff;
    border-top: 1px solid #f1f5f9;
    border-bottom: 1px solid #f1f5f9;
}
.stat-box {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.stat-box i { font-size: 1.4rem; color: #d97706; margin-bottom: 6px; }
.stat-box h5 { margin: 0; font-weight: 800; color: #1a2b56; font-size: 0.9rem; }
.stat-box p { margin: 0; font-size: 0.6rem; color: #64748b; line-height: 1.3; }

/* ── Assessments Grid ── */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 15px 15px;
    background: #fff;
}
.section-header h3 {
    color: #1a2b56;
    font-weight: 800;
    font-size: 1.2rem;
    margin: 0;
}
.section-header a {
    color: #64748b;
    font-size: 0.75rem;
    text-decoration: none;
    font-weight: 700;
}
.assessments-grid {
    padding: 0 4px 20px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    align-items: stretch;
    gap: 10px;
    background: #fff;
}
.assessment-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #f1f5f9;
    border-top: 4px solid #00b4d8;
    padding: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;
    min-width: 0;
}
.card-header-top {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 12px;
}
.card-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1.5px solid #1a2b56;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1a2b56;
    font-size: 0.8rem;
    flex-shrink: 0;
    margin-top: 2px;
}
.card-title-area {
    text-align: right;
    flex-grow: 1;
    min-height: 70px;
}
.card-title {
    color: #1a2b56;
    font-weight: bold;
    font-size: 0.8rem;
    line-height: 1.3;
    margin-bottom: 2px;
    min-height: 32px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.card-desc {
    color: #64748b;
    font-size: 0.6rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.assessment-card img.cover {
    width: 100%;
    height: 60px;
    object-fit: cover;
    object-position: center 30%;
    border-radius: 8px;
    margin-bottom: 12px;
}
.card-meta {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 0;
    margin-bottom: 12px;
    font-size: 0.55rem;
    color: #475569;
    font-weight: 700;
}
.card-meta div {
    display: flex;
    align-items: center;
    gap: 4px;
}
.card-meta .divider {
    color: #cbd5e1;
    font-weight: 300;
}
.card-price-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    gap: 6px;
}
.card-price {
    color: #1e3a8a;
    font-weight: 900;
    font-size: 0.85rem;
    white-space: nowrap;
}
.card-price span { font-size: 0.55rem; font-weight: bold; color: #64748b; }
.btn-primary-custom {
    background: #1a2b56;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 6px 0;
    font-weight: 800;
    font-size: 0.7rem;
    white-space: nowrap;
    width: 100%;
    text-align: center;
    box-shadow: 0 4px 6px rgba(26, 43, 86, 0.15);
}
.btn-primary-custom:hover {
    background: #0f172a;
}
.btn-secondary-custom {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    width: 100%;
    color: #3b82f6;
    background: transparent;
    border: none;
    padding: 4px 0;
    font-size: 0.65rem;
    font-weight: 800;
    text-decoration: none;
    transition: all 0.2s;
}
.btn-secondary-custom:hover {
    color: #2563eb;
    text-decoration: underline;
}

/* ── Desktop Overrides for Assessments Grid ── */
@media (min-width: 768px) {
    .stats-row { grid-template-columns: repeat(4, 1fr); }
    .assessments-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        padding: 0 15px 20px;
    }
    .assessment-card { padding: 16px; }
    .card-header-top { gap: 12px; margin-bottom: 12px; }
    .card-icon { width: 32px; height: 32px; font-size: 0.9rem; margin-top: 2px; }
    .card-title { font-size: 0.95rem; line-height: 1.3; min-height: auto; }
    .card-desc { font-size: 0.65rem; -webkit-line-clamp: 2; line-height: 1.4; margin-bottom: 10px; }
    .assessment-card img.cover { height: 90px; border-radius: 8px; margin-bottom: 16px; }
    .card-meta { justify-content: space-between; font-size: 0.6rem; margin-bottom: 16px; gap: 8px; }
    .card-price-row { margin-bottom: 12px; gap: 8px; }
    .card-price { font-size: 1rem; }
    .card-price span { font-size: 0.75rem; }
    .btn-primary-custom { width: auto; padding: 6px 12px; font-size: 0.75rem; border-radius: 6px; }
    .btn-secondary-custom { padding: 6px 12px; font-size: 0.75rem; border-radius: 6px; }
}

@media (min-width: 992px) {
    .assessments-grid { grid-template-columns: repeat(4, 1fr); }
    .assessment-card img.cover { height: 120px; }
    .card-title { font-size: 1.1rem; }
    .card-price { font-size: 1.2rem; }
}

/* ── Features Section ── */
.features-section {
    padding: 20px 15px;
    background: #fff;
    border-top: 1px solid #f1f5f9;
}
.features-title {
    color: #1a2b56;
    font-weight: 800;
    margin-bottom: 20px;
    font-size: 1.1rem;
}
.features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}
.feature-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 6px;
}
.feature-box i { font-size: 1.5rem; color: #d97706; }
.feature-box h6 { color: #1a2b56; font-weight: 800; margin-bottom: 2px; font-size: 0.75rem; }
.feature-box p { color: #64748b; font-size: 0.55rem; margin: 0; line-height: 1.4; }

/* ── Testimonials ── */
.testimonials-section {
    padding: 20px 15px;
    background: #fff;
    border-top: 1px solid #f1f5f9;
}
.testimonials-title {
    color: #1a2b56;
    font-weight: 800;
    margin-bottom: 20px;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 8px;
}
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
}
.testimonial-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 12px;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.testimonial-text {
    font-size: 0.65rem;
    color: #4a5568;
    line-height: 1.6;
    font-weight: 600;
    margin-bottom: 15px;
    text-align: center;
}
.testimonial-text::before { content: "❝"; font-size: 0.9rem; color: #f59e0b; margin-left: 2px; }
.testimonial-text::after { content: "❞"; font-size: 0.9rem; color: #f59e0b; margin-right: 2px; }
.testimonial-user {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 5px;
}
.testimonial-user img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
}
.testimonial-user h6 { margin: 0; color: #1a2b56; font-weight: 800; font-size: 0.65rem; }
.testimonial-user p { margin: 0; color: #64748b; font-size: 0.55rem; }
.stars { color: #f59e0b; font-size: 0.6rem; margin-top: 4px; }

/* ── Footer CTA ── */
.footer-cta {
    background: #1a2b56;
    color: #ffffff;
    padding: 20px 15px;
    text-align: center;
    border-radius: 16px 16px 0 0;
    margin: 15px 15px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.footer-cta-text {
    text-align: right;
}
.footer-cta h4 { font-weight: 800; margin-bottom: 6px; font-size: 1rem; }
.footer-cta p { font-size: 0.65rem; opacity: 0.9; margin-bottom: 0; }
.btn-cta {
    background: #d97706;
    color: #ffffff;
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 0.75rem;
    text-decoration: none;
    white-space: nowrap;
}
</style>
@endpush

@section('content')

<!-- Hero Section -->
<div class="hero-section" style="padding: 30px 20px; background: linear-gradient(to left, #ffffff, #f8f9fa); border-radius: 0 0 20px 20px; gap: 20px;">
    <div class="hero-text" style="width: 55%; padding-left: 15px;">
        <h1 class="fw-bolder" style="color: #1a2b56; font-size: clamp(1.6rem, 4vw, 3rem); line-height: 1.4; margin-bottom: 12px;">
            المقاييس المهنية<br>والشخصية
        </h1>
        <p style="color: #4a5568; font-size: clamp(0.75rem, 1.5vw, 1.1rem); line-height: 1.6; margin-bottom: 0;">
            اكتشف قدراتك ومهاراتك من خلال مقاييس علمية معتمدة وتقارير تفصيلية تساعدك على التطوير واتخاذ القرارات بثقة.
        </p>
    </div>
    <div class="hero-image-wrap" style="width: 45%; text-align: left;">
        <img src="{{ asset('images/dashboard/hero_banner_new.jpg') }}" alt="Hero Banner" class="hero-image" style="width: 100%; max-height: 400px; border-radius: 12px; object-fit: cover;">
    </div>
</div>

<!-- Category Filter -->
<div class="category-filter">
    <a href="javascript:void(0)" class="cat-btn btn-category active" data-filter="all"><i class="bi bi-grid-fill"></i> جميع المقاييس</a>
    @php
        // Extract unique categories from active assessments
        $uniqueCategories = $assessments->pluck('category')->filter()->unique()->sort()->values();

        // Icon map – add any new category here or fallback to default
        $categoryIcons = [
            'مقاييس معرفة الذات والشخصية'          => 'bi-person-bounding-box',
            'مقاييس الكفاءة الشخصية والنجاح المهني' => 'bi-graph-up-arrow',
            'مقاييس الاتصال والعلاقات المهنية'       => 'bi-chat-quote',
            'مقاييس القيادة والإدارة'                => 'bi-award',
            'مقاييس التوجيه والتوافق المهني'         => 'bi-compass',
            'مقاييس الصحة المهنية'                   => 'bi-heart-pulse',
        ];
    @endphp
    @foreach($uniqueCategories as $cat)
        @php
            $icon = $categoryIcons[$cat] ?? 'bi-bookmark';
        @endphp
        <a href="javascript:void(0)" class="cat-btn btn-category" data-filter="{{ $cat }}">
            <i class="bi {{ $icon }}"></i> {{ $cat }}
        </a>
    @endforeach
</div>

<!-- Stats Row -->
<div class="stats-row">
    <div class="stat-box">
        @if(isset($siteSettings['stat_fields_icon']) && $siteSettings['stat_fields_icon'])
            <img src="{{ asset($siteSettings['stat_fields_icon']) }}" style="height: 38px; width: auto; object-fit: contain; margin-bottom: 12px; display: inline-block;">
        @else
            <i class="bi bi-pie-chart"></i>
        @endif
        <h5>{{ $siteSettings['stat_fields'] ?? '50+' }}</h5>
        <p>مجال ومهارة<br>مختلفة</p>
    </div>
    <div class="stat-box">
        @if(isset($siteSettings['stat_assessments_icon']) && $siteSettings['stat_assessments_icon'])
            <img src="{{ asset($siteSettings['stat_assessments_icon']) }}" style="height: 38px; width: auto; object-fit: contain; margin-bottom: 12px; display: inline-block;">
        @else
            <i class="bi bi-mortarboard"></i>
        @endif
        <h5>{{ $siteSettings['stat_assessments'] ?? '150+' }}</h5>
        <p>مقياس مهني<br>وشخصي معتمد</p>
    </div>
    <div class="stat-box">
        @if(isset($siteSettings['stat_exams_icon']) && $siteSettings['stat_exams_icon'])
            <img src="{{ asset($siteSettings['stat_exams_icon']) }}" style="height: 38px; width: auto; object-fit: contain; margin-bottom: 12px; display: inline-block;">
        @else
            <i class="bi bi-journal-check"></i>
        @endif
        <h5>{{ $siteSettings['stat_exams'] ?? '10,000+' }}</h5>
        <p>اختبار ومقياس<br>تم إنجازه</p>
    </div>
    <div class="stat-box">
        @if(isset($siteSettings['stat_users_icon']) && $siteSettings['stat_users_icon'])
            <img src="{{ asset($siteSettings['stat_users_icon']) }}" style="height: 38px; width: auto; object-fit: contain; margin-bottom: 12px; display: inline-block;">
        @else
            <i class="bi bi-people"></i>
        @endif
        <h5>{{ $siteSettings['stat_users'] ?? '25,000+' }}</h5>
        <p>مستخدم من الأفراد<br>والجهات</p>
    </div>
</div>

<!-- Assessments Section -->
<div class="section-header">
    <h3>أشهر المقاييس</h3>
</div>

<div class="assessments-grid" id="assessments-container">
    @php
        // Images are now loaded directly from $assessment->image_url
        $icons = [
            'معرفة الذات' => 'bi-person-bounding-box',
            'الشخصية' => 'bi-person-lines-fill',
            'الثقة' => 'bi-person-up',
            'إيجابية' => 'bi-brightness-high',
            'العاطفي' => 'bi-heart-pulse',
            'النجاح' => 'bi-trophy',
            'الإبداع' => 'bi-lightbulb',
            'الوقت' => 'bi-hourglass-split',
            'تخطط' => 'bi-calendar2-check',
            'القرار' => 'bi-signpost-split',
            'الاتصال' => 'bi-chat-right-quote',
            'التفاوض' => 'bi-briefcase',
            'فريق' => 'bi-people',
            'القيادي' => 'bi-award',
            'التحويلي' => 'bi-lightning-charge',
            'الإدارة' => 'bi-diagram-3',
            'تحفيز' => 'bi-stars',
            'التوجيه' => 'bi-compass',
            'حب العمل' => 'bi-heart',
            'ولاؤك' => 'bi-bookmark-star',
            'الرضا' => 'bi-emoji-smile',
            'ضغوط' => 'bi-speedometer2',
            'الاحتراق' => 'bi-fire',
            'الإرهاق' => 'bi-battery-half',
            'السلامة' => 'bi-shield-check',
        ];
        
        $categoryColors = [
            'مقاييس معرفة الذات والشخصية' => ['iconColor' => '#8b5cf6', 'iconBg' => '#f5f3ff', 'titleColor' => '#6d28d9'],
            'مقاييس الكفاءة الشخصية والنجاح المهني' => ['iconColor' => '#3b82f6', 'iconBg' => '#eff6ff', 'titleColor' => '#1d4ed8'],
            'مقاييس الاتصال والعلاقات المهنية' => ['iconColor' => '#14b8a6', 'iconBg' => '#f0fdfa', 'titleColor' => '#0f766e'],
            'مقاييس القيادة والإدارة' => ['iconColor' => '#f59e0b', 'iconBg' => '#fffbeb', 'titleColor' => '#b45309'],
            'مقاييس التوجيه والتوافق المهني' => ['iconColor' => '#f43f5e', 'iconBg' => '#fff1f2', 'titleColor' => '#be123c'],
            'مقاييس الصحة المهنية' => ['iconColor' => '#10b981', 'iconBg' => '#ecfdf5', 'titleColor' => '#047857'],
        ];
    @endphp

    @foreach($assessments as $index => $assessment)
        @php
            $imageName = $assessment->image_url ?: 'default.png'; // admin uploaded image or fallback
            $iconName = $assessment->icon ?: 'bi-journal-text'; // dynamic from DB or default
            
            // Basic icon mapping (optional, but keep it minimal or remove entirely)
            // If the user wants no hardcoding, we can just use a default icon for all
            
            $theme = $categoryColors[$assessment->category] ?? ['iconColor' => '#1a2b56', 'iconBg' => '#f8fafc', 'titleColor' => '#1a2b56'];
        @endphp
        <div class="assessment-card" data-category="{{ $assessment->category }}">
            <div class="card-header-top">
                <div class="card-icon" style="color: {{ $theme['iconColor'] }}; background-color: {{ $theme['iconBg'] }}; border: 1.5px solid {{ $theme['iconColor'] }};">
                    @if(str_starts_with($iconName, '/') || str_starts_with($iconName, 'http'))
                        <img src="{{ asset($iconName) }}" alt="Icon" style="width: 24px; height: 24px; object-fit: contain;">
                    @else
                        <i class="bi {{ $iconName }}"></i>
                    @endif
                </div>
                <div class="card-title-area">
                    @php $r = $assessment->rating ?: 0; @endphp
                    @if($r > 0)
                    <div class="d-flex align-items-center gap-1 mb-1" style="font-size: 0.55rem; color: #f59e0b;">
                        <span class="fw-bold" style="color: #334155;">{{ number_format($r, 1) }}</span>
                        <div class="d-flex" style="padding-top: 1px;">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $r)
                                    <i class="bi bi-star-fill"></i>
                                @elseif($i - 0.5 <= $r)
                                    <i class="bi bi-star-half"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span style="color: #94a3b8;">({{ $assessment->rating_count ?: 0 }})</span>
                    </div>
                    @else
                    <div style="height: 16px; margin-bottom: 4px;"></div>
                    @endif
                    <h4 class="card-title" style="color: {{ $theme['titleColor'] }};">{{ $assessment->title_ar }}</h4>
                    <p class="card-desc">{{ $assessment->subtitle_ar ?: ($assessment->description_ar ?: 'لا يوجد وصف متاح') }}</p>
                </div>
            </div>
            
            @php
                $userSession = $userSessions->firstWhere('assessment_id', $assessment->id);
                $isCompleted = $userSession && $userSession->status === 'completed';
                $isInProgress = $userSession && $userSession->status === 'in_progress';
                $priceLabel = $assessment->price > 0 ? number_format($assessment->price, 0) . ' <span style="font-size:0.5rem; font-weight:normal;">ر.س</span>' : 'مجاني';
            @endphp
            
            <div style="position: relative;">
                <img src="{{ asset('images/dashboard/' . $imageName) }}" alt="{{ $assessment->title_ar }}" class="cover">
            </div>
            
            <div class="card-meta">
                <div><i class="bi bi-file-earmark-text"></i> تقرير مفصل</div>
                <span class="divider">|</span>
                <div><i class="bi bi-ui-checks"></i> {{ $assessment->questions_count ?: 0 }} سؤال</div>
                <span class="divider">|</span>
                <div><i class="bi bi-clock"></i> {{ $assessment->time_limit_min ? $assessment->time_limit_min . ' دقيقة' : 'مفتوح' }}</div>
            </div>

            <div style="margin-top: auto; display: flex; flex-direction: column; gap: 8px;">
                <div class="card-price-row">
                    @if($isCompleted)
                        <form method="POST" action="{{ route('exam.start', $assessment->id) }}" class="m-0" style="flex: 1;">
                            @csrf
                            <button type="submit" class="btn-primary-custom w-100">إعادة المقياس</button>
                        </form>
                    @elseif($isInProgress)
                        <form method="POST" action="{{ route('exam.start', $assessment->id) }}" class="m-0" style="flex: 1;">
                            @csrf
                            <button type="submit" class="btn-primary-custom w-100" style="background: #f59e0b;">استئناف المقياس</button>
                        </form>
                    @else
                        <div style="flex: 1; display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                            <div class="card-price" style="white-space: nowrap;">
                                {!! $assessment->price > 0 ? number_format($assessment->price, 0) . ' <span style="font-size:0.5rem; font-weight:normal;">ر.س</span>' : '<span style="background: #10b981; color: #fff; padding: 2px 8px; border-radius: 4px; font-size: 0.7rem;">مجاني</span>' !!}
                            </div>
                            <button type="button" class="btn-primary-custom" style="flex: 1;" data-bs-toggle="modal" data-bs-target="#paymentCouponModal" data-assessment-id="{{ $assessment->id }}" data-assessment-title="{{ $assessment->title_ar }}" data-assessment-price="{{ $assessment->price > 0 ? number_format($assessment->price, 0) : '0' }}" data-hide-coupon="{{ $assessment->hide_coupon_field ? '1' : '0' }}">
                                ابدأ المقياس
                            </button>
                        </div>
                    @endif
                </div>

                @if(!$isCompleted && !$isInProgress && !$assessment->hide_coupon_field)
                <a href="#" class="btn-reveal-coupon w-100"
                   data-assessment-id="{{ $assessment->id }}"
                   data-assessment-title="{{ $assessment->title_ar }}"
                   data-assessment-price="{{ $assessment->price > 0 ? number_format($assessment->price, 0) : '0' }}"
                   data-hide-coupon="{{ $assessment->hide_coupon_field ? '1' : '0' }}"
                   style="background-color: #f0f7ff; border-radius: 8px; padding: 6px 8px; display: flex; align-items: center; justify-content: center; gap: 6px; text-decoration: none; cursor: pointer; border: 1.2px dashed #2563eb; transition: all 0.2s;">
                    <i class="bi bi-gift-fill" style="color: #2563eb; font-size: 0.95rem; flex-shrink: 0;"></i>
                    <span style="color: #1e3a8a; font-size: 0.68rem; font-weight: 700; text-align: center; white-space: nowrap;">
                        احصل على كوبون <span style="text-decoration: underline; color: #2563eb;">من هنا</span>
                    </span>
                </a>
                @endif

                @if($isCompleted)
                    <a href="{{ route('exam.result', $userSession->id) }}" class="btn-secondary-custom">
                        عرض التقرير <i class="bi bi-eye"></i>
                    </a>
                @else
                    <a href="#" onclick="alert('ليس لديك نتيجة في هذا المقياس حتى الآن. يرجى أداء المقياس أولاً لاستخراج تقريرك.'); return false;" class="btn-secondary-custom" style="opacity: 0.7;">
                        عرض التقرير <i class="bi bi-eye"></i>
                    </a>
                @endif
            </div>
        </div>
    @endforeach
</div>

@if($myCoupons->count() > 0)
@php
    // Check if there's at least one active coupon to show the container
    $hasActiveCoupon = false;
    foreach($myCoupons as $coupon) {
        $used = $coupon->pivot->used_count ?? 0;
        $isUnlimited = $coupon->assessments_limit === null;
        $remaining = $isUnlimited ? null : max(0, $coupon->assessments_limit - $used);
        $isExpired = $coupon->expires_at && \Carbon\Carbon::parse($coupon->expires_at)->isPast();
        if (!$isExpired && ($isUnlimited || $remaining > 0)) $hasActiveCoupon = true;
    }
@endphp

@if($hasActiveCoupon)
<div class="my-coupons-section mt-5 mb-5 p-4 rounded-4 shadow-sm" style="background-color: #fff; border: 1px solid #e2e8f0;">
    <h4 class="fw-bold mb-4" style="color: #1a2b56;"><i class="bi bi-ticket-perforated text-warning me-2"></i> باقاتي (كوبوناتي النشطة)</h4>
    <div class="row g-4">
        @foreach($myCoupons as $coupon)
            @php
                $used = $coupon->pivot->used_count ?? 0;
                $isUnlimited = $coupon->assessments_limit === null;
                $remaining = $isUnlimited ? null : max(0, $coupon->assessments_limit - $used);
                $isExpired = $coupon->expires_at && \Carbon\Carbon::parse($coupon->expires_at)->isPast();
            @endphp
            @if(!$isExpired && ($isUnlimited || $remaining > 0))
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 10px; border: 1px solid #e2e8f0; background: #fff;">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h6 class="fw-bold text-navy mb-1"><i class="bi bi-ticket-detailed me-1 text-warning"></i> {{ $coupon->title }}</h6>
                                <span class="badge bg-success rounded-pill" style="font-size: 0.7rem;">فعال</span>
                            </div>
                            <div class="text-end">
                                <span class="text-muted" style="font-size: 0.75rem;">المتبقي</span>
                                @if($coupon->assessments_limit !== null)
                                    <div class="fw-bold text-primary" style="font-size: 1.1rem;">{{ $remaining }} <span class="text-muted" style="font-size: 0.75rem;">/ {{ $coupon->assessments_limit }}</span></div>
                                @else
                                    <div class="fw-bold text-primary" style="font-size: 1.1rem;"><i class="bi bi-infinity me-1"></i>غير محدود</div>
                                @endif
                            </div>
                        </div>
                        
                        @if($coupon->expires_at)
                            <div class="countdown-timer d-flex justify-content-between align-items-center rounded-3 p-2 mt-2" style="background: #f8fafc; border: 1px solid #f1f5f9;" data-expires="{{ \Carbon\Carbon::parse($coupon->expires_at)->endOfDay()->toIso8601String() }}">
                                <div class="text-muted" style="font-size: 0.7rem;"><i class="bi bi-clock-history me-1"></i> ينتهي خلال:</div>
                                <div class="d-flex gap-1 text-navy fw-bold" dir="ltr" style="font-size: 0.8rem;">
                                    <div><span class="days">00</span><small class="text-muted ms-1" style="font-size:0.6rem">يوم</small></div>:
                                    <div><span class="hours">00</span><small class="text-muted ms-1" style="font-size:0.6rem">س</small></div>:
                                    <div><span class="minutes">00</span><small class="text-muted ms-1" style="font-size:0.6rem">د</small></div>:
                                    <div><span class="seconds">00</span><small class="text-muted ms-1" style="font-size:0.6rem">ث</small></div>
                                </div>
                            </div>
                        @else
                            <div class="text-muted mt-2" style="font-size: 0.75rem;"><i class="bi bi-infinity me-1"></i> صلاحية الكوبون مفتوحة</div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endif
@endif

<!-- Features Section -->
<div class="features-section">
    <h3 class="features-title">ماذا ستحصل بعد إكمال المقياس؟</h3>
    <div class="features-grid">
        <div class="feature-box">
            <i class="bi bi-graph-up-arrow"></i>
            <h6>توصيات عملية</h6>
            <p>توصيات قابلة للتطبيق<br>في عملك وحياتك</p>
        </div>
        <div class="feature-box">
            <i class="bi bi-shield-check"></i>
            <h6>فرص التحسين</h6>
            <p>اكتشف المهارات التي تحتاج<br>لتطوير وخطة التحسين</p>
        </div>
        <div class="feature-box">
            <i class="bi bi-bullseye"></i>
            <h6>نقاط القوة</h6>
            <p>تعرف على نقاط قوتك<br>واستخدمها بذكاء</p>
        </div>
        <div class="feature-box">
            <i class="bi bi-file-earmark-richtext"></i>
            <h6>تقرير تفصيلي</h6>
            <p>عن نقاط قوتك<br>وفرص التحسين</p>
        </div>
    </div>
</div>

<!-- Footer CTA -->
<div class="footer-cta">
    <h4>ابدأ رحلتك نحو تطوير ذاتك اليوم</h4>
    <p>اختر المقياس المناسب لك واحصل على تقرير تفصيلي الآن</p>
    <a href="#" class="btn-cta">استعرض جميع المقاييس</a>
</div>

<style>
.custom-pills .nav-link {
    color: #64748b;
    background: #f8fafc;
    border-radius: 10px;
    margin: 0 4px;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}
.custom-pills .nav-link.active {
    background: #1a2b56;
    color: #fff;
    border-color: #1a2b56;
    box-shadow: 0 4px 6px -1px rgba(26, 43, 86, 0.2);
}
.custom-pills .nav-link:hover:not(.active) {
    background: #f1f5f9;
}
</style>

{{-- ============================================================
     Coupon Reveal Modal  ("من هنا" button target)
     ============================================================ --}}
<div class="modal fade" id="couponRevealModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">

            {{-- Header --}}
            <div class="modal-header border-0 pb-0 pt-4 px-4" style="background: linear-gradient(135deg,#eff6ff 0%,#dbeafe 100%);">
                <div>
                    <h5 class="modal-title fw-bold mb-0" style="color:#1a2b56;" id="revealModalTitle">كوبون المقياس</h5>
                    <p class="text-muted small mb-0" id="revealModalSub">اضغط لنسخ الكوبون ثم فعّله</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body px-4 pt-3 pb-4" style="background: linear-gradient(135deg,#eff6ff 0%,#dbeafe 100%);">

                {{-- Loading --}}
                <div id="revealLoading" class="text-center py-4">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="text-muted small mt-2 mb-0">جارٍ البحث عن كوبون...</p>
                </div>

                {{-- No coupon --}}
                <div id="revealNoCoupon" class="d-none text-center py-3">
                    <i class="bi bi-emoji-frown" style="font-size:2.5rem;color:#94a3b8;"></i>
                    <p class="text-muted mt-2 mb-0 small">لا يوجد كوبون متاح لهذا المقياس حالياً.</p>
                </div>

                {{-- Coupons Container --}}
                <div id="revealCouponsContainer" class="d-none" style="max-height: 450px; overflow-y: auto; padding-right: 5px;">
                    <!-- Dynamically populated by JS -->
                </div>

            </div>
        </div>
    </div>
</div>

{{-- ============================================================
     Payment / Coupon Modal
     ============================================================ --}}
<div class="modal fade" id="paymentCouponModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pt-4 px-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold mb-1" style="color: #1a2b56;" id="modalAssessmentTitle">عنوان المقياس</h5>
                    <div class="text-muted small" id="modalAssessmentPriceLabel"></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-4 pb-4 pt-3">

                {{-- Coupon section --}}
                <div id="couponSection">
                    <form method="POST" action="" id="couponStartForm">
                        @csrf
                        <input type="hidden" name="coupon_code" id="hiddenCouponCode">

                        {{-- Step 1: Enter code --}}
                        <div id="couponInputArea">
                            <label class="form-label fw-semibold small text-dark">رمز الكوبون</label>
                            <div class="input-group mb-2">
                                <input type="text" id="couponCodeInput" class="form-control form-control-lg text-start" dir="ltr"
                                    placeholder="أدخل رمز الكوبون..." style="border-radius: 10px 0 0 10px; letter-spacing: 1px;">
                                <button type="button" id="btnVerifyCoupon" class="btn btn-primary px-3" style="border-radius: 0 10px 10px 0;">
                                    <span id="verifyCouponText"><i class="bi bi-search me-1"></i>تحقق</span>
                                    <span id="verifyCouponSpinner" class="spinner-border spinner-border-sm d-none"></span>
                                </button>
                            </div>
                            <div id="couponError" class="text-danger small d-none"></div>
                        </div>

                        {{-- Step 2: Discount breakdown --}}
                        <div id="couponSuccessArea" class="d-none">
                            <div class="rounded-3 p-3 mb-3" style="background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 100%); border: 1px solid #bbf7d0;">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#10b981;color:#fff;font-size:1rem;flex-shrink:0;">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold small text-success" id="couponSuccessMsg">الكوبون صالح!</div>
                                        <div class="text-muted" style="font-size:0.7rem;" id="couponUsageLabel"></div>
                                    </div>
                                    <button type="button" id="btnChangeCoupon" class="btn btn-sm btn-outline-secondary ms-auto py-0 px-2" style="font-size:0.7rem;">تغيير</button>
                                </div>

                                <div id="pricingBreakdown" class="small pt-2 border-top border-success border-opacity-25">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted">السعر الأصلي</span>
                                        <span id="breakdownOriginal" class="fw-medium"></span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-success"><i class="bi bi-tag me-1"></i>خصم <span id="breakdownPct"></span>%</span>
                                        <span class="text-success fw-medium" id="breakdownDiscount"></span>
                                    </div>
                                    <div class="d-flex justify-content-between fw-bold" style="border-top: 1px dashed #86efac; padding-top:6px; margin-top:4px;">
                                        <span class="text-dark">المبلغ المستحق</span>
                                        <span class="text-primary fs-6" id="breakdownFinal"></span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" id="btnStartFree" class="btn btn-success w-100 fw-bold py-2 d-none" style="border-radius: 10px;">
                                <i class="bi bi-play-circle me-1"></i> ابدأ المقياس مجاناً
                            </button>

                            <div id="partialPayArea" class="d-none">
                                <div class="alert alert-info small border-0 py-2 mb-2">
                                    <i class="bi bi-info-circle me-1"></i>
                                    يوجد مبلغ متبقٍ. سيُطبق الكوبون بعد إتمام الدفع التجريبي.
                                </div>
                                <button type="submit" class="btn btn-primary w-100 fw-bold py-2" style="border-radius: 10px;">
                                    <i class="bi bi-credit-card me-1"></i> إتمام الدفع التجريبي وبدء المقياس
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <span class="text-muted small">لا يوجد لديك كوبون؟ </span>
                        <button type="button" class="btn btn-link btn-sm small p-0 text-primary text-decoration-none" id="btnSwitchToPay">الدفع الإلكتروني</button>
                    </div>
                </div>

                {{-- Direct Pay section --}}
                <div id="paySection" class="d-none">
                    <div class="text-center py-3">
                        <div class="display-6 fw-bold mb-2" style="color:#1a2b56;" id="payDirectPrice">— ر.س</div>
                        <p class="text-muted small">بوابة الدفع الإلكتروني قيد التجهيز حالياً.</p>
                        <button type="button" class="btn btn-secondary w-100" disabled>متابعة الدفع (قريباً)</button>
                    </div>
                    <div id="btnSwitchToCouponWrap" class="text-center mt-2">
                        <button type="button" class="btn btn-link btn-sm small p-0 text-muted text-decoration-none" id="btnSwitchToCoupon">
                            <i class="bi bi-ticket-perforated me-1"></i>استخدام كوبون
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    /* ── Category filter ── */
    const filterBtns = document.querySelectorAll('.btn-category');
    const assessmentCards = document.querySelectorAll('.assessment-card');
    
    // Normalize string for better matching (handling ة/ه and أ/ا)
    const normalize = (str) => {
        return str.replace(/ة/g, 'ه')
                  .replace(/[أإآ]/g, 'ا')
                  .replace('مقاييس ', '')
                  .replace('معرفة ', '')
                  .trim();
    };

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            assessmentCards.forEach(card => {
                if (filterValue === 'all') {
                    card.style.display = 'flex';
                } else {
                    const cardCat = card.getAttribute('data-category') || '';
                    const searchStr = normalize(filterValue);
                    const targetStr = normalize(cardCat);
                    
                    const show = targetStr.includes(searchStr) || searchStr.includes(targetStr);
                    card.style.display = show ? 'flex' : 'none';
                }
            });
        });
    });

    /* ── Modal logic ── */
    let currentAssessmentId   = null;
    let currentAssessmentPrice = 0;

    const modal = document.getElementById('paymentCouponModal');
    if (!modal) return;

    modal.addEventListener('show.bs.modal', function (event) {
        const btn       = event.relatedTarget;
        if (!btn) return;
        const title     = btn.getAttribute('data-assessment-title');
        const price     = parseFloat(btn.getAttribute('data-assessment-price') || '0');
        const aId       = btn.getAttribute('data-assessment-id');
        const hideCoup  = btn.getAttribute('data-hide-coupon') === '1';

        currentAssessmentId    = aId;
        currentAssessmentPrice = price;

        document.getElementById('modalAssessmentTitle').textContent = title;
        document.getElementById('modalAssessmentPriceLabel').innerHTML =
            price > 0 ? '<span style="color:#d97706;font-weight:700;">' + price + ' ر.س</span>' : '<span class="text-success fw-bold">مجاني</span>';
        document.getElementById('payDirectPrice').innerHTML =
            price > 0 ? price + ' <span class="fs-6">ر.س</span>' : '<span class="text-success">مجاني</span>';

        resetCouponUI();

        var couponSection = document.getElementById('couponSection');
        var paySection    = document.getElementById('paySection');
        var switchWrap    = document.getElementById('btnSwitchToCouponWrap');

        if (hideCoup) {
            couponSection.classList.add('d-none');
            paySection.classList.remove('d-none');
            switchWrap.classList.add('d-none');
        } else {
            couponSection.classList.remove('d-none');
            paySection.classList.add('d-none');
            switchWrap.classList.remove('d-none');
        }

        // Free assessment — quick start
        if (price === 0 && !hideCoup) {
            var form2 = document.getElementById('couponStartForm');
            form2.action = '/exam/' + aId + '/start';
            document.getElementById('couponInputArea').classList.add('d-none');
            document.getElementById('couponSuccessArea').classList.remove('d-none');
            document.getElementById('couponSuccessMsg').textContent = 'هذا المقياس مجاني!';
            document.getElementById('couponUsageLabel').textContent = '';
            document.getElementById('pricingBreakdown').classList.add('d-none');
            document.getElementById('btnStartFree').classList.remove('d-none');
            document.getElementById('partialPayArea').classList.add('d-none');
            document.getElementById('hiddenCouponCode').value = '';
        }
    });

    function resetCouponUI() {
        document.getElementById('couponCodeInput').value = '';
        document.getElementById('couponError').classList.add('d-none');
        document.getElementById('couponError').textContent = '';
        document.getElementById('couponInputArea').classList.remove('d-none');
        document.getElementById('couponSuccessArea').classList.add('d-none');
        document.getElementById('btnStartFree').classList.add('d-none');
        document.getElementById('partialPayArea').classList.add('d-none');
        document.getElementById('pricingBreakdown').classList.remove('d-none');
        document.getElementById('hiddenCouponCode').value = '';
    }

    /* Verify coupon via AJAX */
    document.getElementById('btnVerifyCoupon').addEventListener('click', async function () {
        var code = document.getElementById('couponCodeInput').value.trim();
        var errEl = document.getElementById('couponError');

        if (!code) { errEl.textContent = 'يرجى إدخال رمز الكوبون.'; errEl.classList.remove('d-none'); return; }
        errEl.classList.add('d-none');

        var btnText = document.getElementById('verifyCouponText');
        var spinner = document.getElementById('verifyCouponSpinner');
        btnText.classList.add('d-none'); spinner.classList.remove('d-none');
        this.disabled = true;

        try {
            var res = await fetch('/coupon/validate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ code: code, assessment_id: currentAssessmentId }),
            });

            var data = await res.json();

            if (data.valid) {
                document.getElementById('hiddenCouponCode').value = code;
                document.getElementById('couponStartForm').action = '/exam/' + currentAssessmentId + '/start';

                document.getElementById('couponSuccessMsg').textContent = data.message;
                document.getElementById('couponUsageLabel').textContent = 'استخدام رقم ' + data.usage_number;
                document.getElementById('breakdownPct').textContent = data.discount;
                document.getElementById('breakdownOriginal').textContent = data.price + ' ر.س';
                document.getElementById('breakdownDiscount').textContent = '‑' + data.discount_amount + ' ر.س';
                document.getElementById('breakdownFinal').textContent = data.is_free ? 'مجاني 🎉' : data.final_price + ' ر.س';

                document.getElementById('couponInputArea').classList.add('d-none');
                document.getElementById('couponSuccessArea').classList.remove('d-none');

                if (data.is_free) {
                    document.getElementById('btnStartFree').classList.remove('d-none');
                    document.getElementById('partialPayArea').classList.add('d-none');
                } else {
                    document.getElementById('btnStartFree').classList.add('d-none');
                    document.getElementById('partialPayArea').classList.remove('d-none');
                }
            } else {
                errEl.textContent = data.message || 'الكوبون غير صالح.';
                errEl.classList.remove('d-none');
            }
        } catch (e) {
            errEl.textContent = 'حدث خطأ أثناء الاتصال بالخادم. حاول مرة أخرى.';
            errEl.classList.remove('d-none');
        } finally {
            btnText.classList.remove('d-none'); spinner.classList.add('d-none');
            this.disabled = false;
        }
    });

    document.getElementById('btnChangeCoupon').addEventListener('click', resetCouponUI);

    document.getElementById('btnSwitchToPay').addEventListener('click', function () {
        document.getElementById('couponSection').classList.add('d-none');
        document.getElementById('paySection').classList.remove('d-none');
    });
    document.getElementById('btnSwitchToCoupon').addEventListener('click', function () {
        document.getElementById('paySection').classList.add('d-none');
        document.getElementById('couponSection').classList.remove('d-none');
    });

    /* ── Countdown Timers ── */
    document.querySelectorAll('.countdown-timer').forEach(function(timer) {
        var expiresAt = new Date(timer.getAttribute('data-expires')).getTime();
        var daysEl    = timer.querySelector('.days');
        var hoursEl   = timer.querySelector('.hours');
        var minsEl    = timer.querySelector('.minutes');
        var secsEl    = timer.querySelector('.seconds');

        var tick = setInterval(function() {
            var diff = expiresAt - Date.now();
            if (diff < 0) {
                clearInterval(tick);
                timer.innerHTML = '<div class="alert alert-danger m-0 py-2 border-0"><i class="bi bi-exclamation-circle me-1"></i> انتهت صلاحية الكوبون</div>';
                return;
            }
            daysEl.textContent  = String(Math.floor(diff / 86400000)).padStart(2, '0');
            hoursEl.textContent = String(Math.floor((diff % 86400000) / 3600000)).padStart(2, '0');
            minsEl.textContent  = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
            secsEl.textContent  = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
        }, 1000);
    });
    /* ── Coupon Reveal Modal logic ── */
    let revealAssessmentId   = null;
    let revealAssessmentPrice = 0;
    let revealAssessmentTitle = '';
    let revealHideCoupon = false;
    let revealedCouponCode = '';

    document.querySelectorAll('.btn-reveal-coupon').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            revealAssessmentId    = this.getAttribute('data-assessment-id');
            revealAssessmentPrice = parseFloat(this.getAttribute('data-assessment-price') || '0');
            revealAssessmentTitle = this.getAttribute('data-assessment-title');
            revealHideCoupon      = this.getAttribute('data-hide-coupon') === '1';

            // Reset UI
            document.getElementById('revealLoading').classList.remove('d-none');
            document.getElementById('revealNoCoupon').classList.add('d-none');
            document.getElementById('revealModalTitle').textContent = revealAssessmentTitle;
            document.getElementById('revealModalSub').textContent = 'جارٍ البحث عن كوبون...';

            var revealModal = new bootstrap.Modal(document.getElementById('couponRevealModal'));
            revealModal.show();

            // Fetch coupon(s)
            fetch('/coupon/for-assessment/' + revealAssessmentId, {
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
            })
            .then(r => r.json())
            .then(function(data) {
                document.getElementById('revealLoading').classList.add('d-none');
                if (!data.found || !data.coupons || data.coupons.length === 0) {
                    document.getElementById('revealNoCoupon').classList.remove('d-none');
                    document.getElementById('revealModalSub').textContent = '';
                    return;
                }
                
                let html = '';
                data.coupons.forEach(function(coupon) {
                    html += `
                    <div class="rounded-3 p-4 text-center mb-3" style="background:#fff; border: 2px dashed #1d4ed8; position:relative;">
                        <div class="mb-2">
                            <i class="bi bi-ticket-perforated" style="font-size:2rem; color:#1d4ed8;"></i>
                        </div>
                        <div class="text-muted small mb-1">${coupon.title || 'كوبون المقياس'}</div>
                        <div class="fw-bold mb-2" style="font-size:0.85rem; color:#64748b;">خصم ${coupon.discount}%</div>
                        <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
                            <span style="font-size:1.6rem; font-weight:800; letter-spacing:4px; color:#1a2b56; font-family:monospace;">${coupon.code}</span>
                        </div>
                        <div class="text-muted mb-3" style="font-size:0.7rem;">${coupon.expires ? 'صالح حتى: ' + coupon.expires : 'بدون تاريخ انتهاء'}</div>
                        
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-primary fw-semibold btn-copy-multi" data-code="${coupon.code}" style="border-radius:10px; flex:1;">
                                <i class="bi bi-clipboard me-1"></i> نسخ
                            </button>
                            <button type="button" class="btn fw-bold btn-apply-multi" data-code="${coupon.code}" style="border-radius:10px; background:#f59e0b; color:#fff; border:none; flex:2;">
                                <i class="bi bi-arrow-left-circle me-1"></i> تطبيق وبدء
                            </button>
                        </div>
                    </div>`;
                });
                
                const container = document.getElementById('revealCouponsContainer');
                container.innerHTML = html;
                document.getElementById('revealModalSub').textContent = 'انسخ الكود واضغط تطبيق وبدء';
                container.classList.remove('d-none');
                
                // Add event listeners for dynamic buttons
                container.querySelectorAll('.btn-copy-multi').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const code = this.getAttribute('data-code');
                        navigator.clipboard.writeText(code).then(() => {
                            const originalHtml = this.innerHTML;
                            this.innerHTML = '<i class="bi bi-clipboard-check me-1"></i> تم';
                            this.classList.remove('btn-outline-primary');
                            this.classList.add('btn-success');
                            setTimeout(() => {
                                this.innerHTML = originalHtml;
                                this.classList.add('btn-outline-primary');
                                this.classList.remove('btn-success');
                            }, 2000);
                        });
                    });
                });
                
                container.querySelectorAll('.btn-apply-multi').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const code = this.getAttribute('data-code');
                        bootstrap.Modal.getInstance(document.getElementById('couponRevealModal')).hide();
                        
                        setTimeout(function() {
                            currentAssessmentId    = revealAssessmentId;
                            currentAssessmentPrice = revealAssessmentPrice;
                            var payModal = new bootstrap.Modal(document.getElementById('paymentCouponModal'));
                            payModal.show();
                            
                            setTimeout(function() {
                                document.getElementById('couponCodeInput').value = code;
                                document.getElementById('btnVerifyCoupon').click();
                            }, 500);
                        }, 400);
                    });
                });
            })
            .catch(function() {
                document.getElementById('revealLoading').classList.add('d-none');
                document.getElementById('revealNoCoupon').classList.remove('d-none');
            });
        });
    });

    // Legacy coupon buttons were removed; dynamic handlers are defined inside the fetch promise above.

});
</script>

@endsection
````

## File: app/Services/GradedExamGeneratorService.php
````php
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
````

## File: resources/views/layouts/user.blade.php
````php
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'نظام المقاييس') — دار الرؤى</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Kufi Arabic', sans-serif;
            background-color: #f8f9fa;
            color: #1a2b56;
        }

        /* ── Top Navbar ── */
        .top-navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 1020;
        }
        .navbar-brand {
            color: #1a2b56;
            font-weight: 800;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
        }
        .navbar-brand span {
            color: #f59e0b; /* Accent color for the VR logo part */
        }
        .navbar-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .icon-btn {
            background: none;
            border: none;
            color: #4a5568;
            font-size: 1.3rem;
            position: relative;
        }
        .notification-dot {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 8px;
            height: 8px;
            background-color: #f59e0b;
            border-radius: 50%;
        }


        /* ── Utilities ── */
        .text-navy {
            color: #1a2b56;
        }
        .bg-navy {
            background-color: #1a2b56;
        }
        
        @media (min-width: 992px) {
            body {
                padding-bottom: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Top Navbar -->
<nav class="top-navbar">
    <div class="container d-flex justify-content-between align-items-center px-3">
        <!-- Logo -->
        <a class="navbar-brand text-decoration-none" href="{{ route('selection') }}">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="دار الرؤى" style="height: 48px;">
            </div>
        </a>

        <!-- User Menu -->
        <div class="d-flex align-items-center gap-2">
            <span class="fw-medium text-secondary" style="font-size: 0.9rem;">
                <i class="bi bi-person-circle text-muted fs-5 align-middle me-1"></i> {{ auth()->user()?->name ?? 'معاينة بالنظام' }}
            </span>
            <div class="dropdown">
                <button class="btn btn-link text-secondary p-0 ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                    <i class="bi bi-three-dots-vertical fs-5"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width: 150px; border-radius: 12px; padding: 8px;">
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger fw-bold d-flex align-items-center gap-2 rounded" style="padding: 8px 12px;">
                                <i class="bi bi-box-arrow-right"></i> تسجيل الخروج
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div id="alert-container" class="container mt-2"></div>

<main>
    @if(session('info'))
        <div class="container mt-3">
            <div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="bi bi-info-circle me-2"></i>{{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @yield('content')
</main>

<footer class="text-center text-muted py-4 mt-5 mb-lg-0 mb-5 small bg-white border-top">
    &copy; {{ date('Y') }} دار الرؤى — نظام مقاييس التميز الشخصي والاحتراف المهني
</footer>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
        window.location.reload();
    }
});
</script>
@stack('scripts')
</body>
</html>
````

## File: app/Http/Controllers/AuthController.php
````php
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
````

## File: resources/views/admin/assessments/show.blade.php
````php
@extends('layouts.admin')
@section('title', 'تفاصيل المقياس: ' . $assessment->title_ar)
@section('page-title', 'إدارة المقياس')

@push('styles')
<style>
    /* Premium layout styles */
    .nav-tabs-custom {
        border-bottom: 2px solid #dee2e6;
        gap: 8px;
    }
    .nav-tabs-custom .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #495057;
        font-weight: 500;
        padding: 12px 20px;
        transition: all 0.2s ease-in-out;
        font-size: 0.95rem;
    }
    .nav-tabs-custom .nav-link:hover {
        color: #0d6efd;
        background: rgba(13, 110, 253, 0.05);
        border-radius: 8px 8px 0 0;
    }
    .nav-tabs-custom .nav-link.active {
        color: #0d6efd;
        border-bottom-color: #0d6efd;
        background: transparent;
        font-weight: 600;
    }
    
    /* Sortable handles and rows */
    .dim-drag-handle, .q-drag-handle {
        cursor: grab;
        color: #adb5bd;
        padding: 4px 8px;
        display: inline-flex;
        align-items: center;
        transition: color 0.15s;
    }
    .dim-drag-handle:hover, .q-drag-handle:hover {
        color: #495057;
    }
    .dim-drag-handle:active, .q-drag-handle:active {
        cursor: grabbing;
    }
    
    /* Accordion Custom Styling */
    .accordion-custom .accordion-item {
        border: 1px solid #dee2e6;
        border-radius: 12px !important;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.03);
        overflow: hidden;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .accordion-custom .accordion-item:hover {
        border-color: #b5d5ff;
        box-shadow: 0 6px 12px rgba(13, 110, 253, 0.05);
    }
    .accordion-custom .accordion-header {
        background-color: #f8fafd;
        border-bottom: 1px solid #dee2e6;
        border-right: 4px solid #cbd5e1;
        transition: border-right-color 0.2s, background-color 0.2s;
    }
    .accordion-custom .accordion-item.is-expanded .accordion-header,
    .accordion-custom .accordion-item:has(.accordion-collapse.show) .accordion-header {
        background-color: #edf5ff;
        border-right-color: #0d6efd;
        border-bottom: 1px solid #b5d5ff;
    }
    .accordion-custom .accordion-button {
        background-color: transparent;
        box-shadow: none;
        padding: 16px 20px;
        color: #344054;
        font-weight: 600;
        transition: color 0.2s;
    }
    .accordion-custom .accordion-button:not(.collapsed) {
        background-color: transparent;
        color: #0959cc;
    }
    .accordion-custom .accordion-button::after {
        margin-right: auto;
        margin-left: 0;
    }
    .accordion-custom .accordion-collapse {
        border-top: 1px solid #dee2e6;
    }
    
    /* Question list item */
    .question-row {
        background: #fff;
        border-bottom: 1px solid #f1f3f5;
        padding: 12px 16px;
        transition: background-color 0.15s;
    }
    .question-row:hover {
        background-color: #fdfdfe;
    }
    .question-row:last-child {
        border-bottom: none;
    }
    
    /* Recommendation Cards */
    .recommendation-card {
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.03);
        height: 100%;
        transition: transform 0.2s;
    }
    .recommendation-card:hover {
        transform: translateY(-2px);
    }
    
    /* Custom input/textarea adjustments */
    .auto-resize-textarea {
        min-height: 60px;
        resize: none;
        overflow-y: hidden;
    }
    .no-caret::after {
        display: none !important;
    }
</style>
@endpush

@section('content')
<!-- Header Area -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3 px-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <h4 class="mb-0 fw-bold text-dark" id="header-assessment-title">{{ $assessment->title_ar }}</h4>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1" id="header-assessment-category">
                    {{ $assessment->category }}
                </span>
            </div>
            <div class="text-muted small">
                <i class="bi bi-clock me-1"></i>
                <span id="header-assessment-time">{{ $assessment->time_limit_min ? $assessment->time_limit_min . ' دقيقة' : 'بلا حد للوقت' }}</span>
                <span class="mx-2">•</span>
                <i class="bi bi-calendar3 me-1"></i>
                تاريخ الإنشاء: {{ $assessment->created_at->format('Y-m-d') }}
            </div>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <div class="form-check form-switch ps-0 pe-5 fs-5">
                <input class="form-check-input ms-0 me-2 cursor-pointer" type="checkbox" role="switch" id="header-is-active" 
                       {{ $assessment->is_active ? 'checked' : '' }} 
                       data-url="{{ route('admin.assessments.toggle', $assessment->id) }}">
                <label class="form-check-label text-dark small fw-medium" for="header-is-active" id="header-active-label">
                    {{ $assessment->is_active ? 'مفعّل' : 'موقف' }}
                </label>
            </div>
            
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="previewDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-eye me-1"></i>معاينة نتائج المقياس
                </button>
                <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="previewDropdown" style="max-height: 350px; overflow-y: auto;">
                    @if($assessment->scoring_type === 'perceptual_styles')
                        @php
                            $perceptualReports = [
                                'visual' => 'النمط البصري',
                                'auditory' => 'النمط السمعي',
                                'kinesthetic' => 'النمط الحسي (العملي)',
                                'balanced' => 'نمط متوازن',
                                'dual_visual_auditory' => 'نمط مزدوج (بصري – سمعي)',
                                'dual_visual_kinesthetic' => 'نمط مزدوج (بصري – حسي)',
                                'dual_auditory_kinesthetic' => 'نمط مزدوج (سمعي – حسي)',
                            ];
                        @endphp
                        @foreach($perceptualReports as $lvlKey => $lvlTitle)
                            <li>
                                <a class="dropdown-item py-2" target="_blank" href="{{ route('admin.assessments.preview', ['assessment' => $assessment->id, 'level' => $lvlKey]) }}">
                                    <i class="bi bi-file-earmark-bar-graph text-primary me-2"></i>{{ $lvlTitle }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        @forelse($assessment->recommendations as $rec)
                            <li>
                                <a class="dropdown-item py-2" target="_blank" href="{{ route('admin.assessments.preview', ['assessment' => $assessment->id, 'level' => $rec->level]) }}">
                                    <i class="bi bi-file-earmark-bar-graph text-primary me-2"></i>{{ $rec->title_ar ?? $rec->level }}
                                </a>
                            </li>
                        @empty
                            <li><a class="dropdown-item disabled text-muted" href="#">لا توجد توصيات مسجلة</a></li>
                        @endforelse
                    @endif
                </ul>
            </div>

            <a href="{{ route('admin.assessments.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-right me-1"></i>العودة للمقاييس
            </a>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<ul class="nav nav-tabs nav-tabs-custom mb-4" id="assessmentTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="dimensions-tab" data-bs-toggle="tab" data-bs-target="#tab-dimensions-questions" type="button" role="tab" aria-controls="tab-dimensions-questions" aria-selected="true">
            <i class="bi bi-collection-play me-1"></i>الأبعاد والأسئلة
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="recommendations-tab" data-bs-toggle="tab" data-bs-target="#tab-recommendations" type="button" role="tab" aria-controls="tab-recommendations" aria-selected="false">
            <i class="bi bi-lightbulb me-1"></i>ملخص التقرير
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#tab-settings" type="button" role="tab" aria-controls="tab-settings" aria-selected="false">
            <i class="bi bi-gear-wide-connected me-1"></i>إعدادات المقياس
        </button>
    </li>
</ul>

<!-- Tabs Content -->
<div class="tab-content" id="assessmentTabsContent">
    
    <!-- Tab 1: الأبعاد والأسئلة -->
    <div class="tab-pane fade show active" id="tab-dimensions-questions" role="tabpanel" aria-labelledby="dimensions-tab">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0 text-dark">هيكل الأبعاد والأسئلة</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkImportModal">
                <i class="bi bi-file-earmark-arrow-up me-1"></i>استيراد أسئلة بالجملة
            </button>
        </div>
        
        <!-- Dimensions Accordion List -->
        <div class="accordion accordion-custom" id="dimensions-accordion">
            @forelse($assessment->dimensions as $dim)
                @php
                    $dimRecs = $dim->interpretations->keyBy('level');
                    $firstRec = $dim->interpretations->first();
                    $lowThreshold = $firstRec ? $firstRec->low_threshold : '';
                    $highThreshold = $firstRec ? $firstRec->high_threshold : '';
                    $highText = $dimRecs->has('high') ? $dimRecs->get('high')->interpretation_text_ar : '';
                    $mediumText = $dimRecs->has('medium') ? $dimRecs->get('medium')->interpretation_text_ar : '';
                    $lowText = $dimRecs->has('low') ? $dimRecs->get('low')->interpretation_text_ar : '';
                @endphp
                <div class="accordion-item" data-id="{{ $dim->id }}">

                    <div class="accordion-header d-flex align-items-center justify-content-between px-3">
                        <div class="d-flex align-items-center flex-grow-1 py-1">
                            <span class="dim-drag-handle me-2" title="اسحب لإعادة ترتيب الأبعاد">
                                <i class="bi bi-grip-vertical fs-5"></i>
                            </span>
                            
                            <!-- Dimension Display Mode -->
                            <div class="dim-display-container d-flex align-items-center gap-2 flex-grow-1" id="dim-display-{{ $dim->id }}">
                                <span class="accordion-button collapsed py-2 px-1 border-0 bg-transparent fw-semibold" 
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $dim->id }}" 
                                        aria-expanded="false" aria-controls="collapse-{{ $dim->id }}">
                                    <span class="dim-name-text">{{ $dim->name_ar }}</span>
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle ms-2 rounded-pill px-2 py-1 fs-xs dim-q-count">
                                        {{ $dim->questions->count() }} سؤال
                                    </span>
                                    <span class="badge bg-info-subtle text-info border border-info-subtle ms-2 rounded-pill px-2 py-1 fs-xs">
                                        الدرجة القصوى: <span class="dim-max-score-text">{{ $dim->max_score }}</span>
                                    </span>
                                </span>
                                
                                <div class="ms-auto d-flex gap-1 align-items-center btn-actions-group">
                                    <button class="btn btn-sm btn-outline-secondary btn-edit-dim" data-id="{{ $dim->id }}" title="تعديل البعد">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger btn-delete-dim" 
                                            data-url="{{ route('admin.dimensions.destroy', $dim->id) }}" 
                                            data-name="{{ $dim->name_ar }}" title="حذف البعد">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Dimension Edit Mode Form (Hidden by default) -->
                            <div class="dim-edit-container d-none w-100 py-2 d-flex align-items-center gap-2" id="dim-edit-{{ $dim->id }}">
                                <input type="text" class="form-control form-control-sm w-50 input-dim-name" value="{{ $dim->name_ar }}" placeholder="اسم البعد">
                                <input type="number" class="form-control form-control-sm w-20 input-dim-max" value="{{ $dim->max_score }}" placeholder="الدرجة القصوى" min="1">
                                <button class="btn btn-sm btn-success btn-save-dim" data-id="{{ $dim->id }}">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                                <button class="btn btn-sm btn-secondary btn-cancel-dim" data-id="{{ $dim->id }}">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapse-{{ $dim->id }}" class="accordion-collapse collapse" data-bs-parent="#dimensions-accordion">
                        <div class="accordion-body p-0 bg-white">
                            <!-- Questions List (Sortable) -->
                            <div class="questions-list" data-dimension-id="{{ $dim->id }}">
                                @forelse($dim->questions as $qIdx => $q)
                                    <div class="question-row d-flex align-items-center justify-content-between" data-id="{{ $q->id }}">
                                        <div class="d-flex align-items-center flex-grow-1">
                                            <span class="q-drag-handle me-2" title="اسحب لإعادة ترتيب الأسئلة">
                                                <i class="bi bi-grip-vertical"></i>
                                            </span>
                                            <span class="text-muted me-2 small fw-semibold q-number">{{ $qIdx + 1 }}.</span>
                                            
                                            <!-- Question Text Container -->
                                            <div class="flex-grow-1 me-3">
                                                <span class="q-display-text text-dark" id="q-display-{{ $q->id }}">{{ $q->text_ar }}</span>
                                                @if($q->is_reversed)
                                                    <span class="badge ms-2 rounded-pill"
                                                          style="background:#fef3c7;color:#92400e;border:1px solid #fcd34d;font-size:.68rem"
                                                          title="سؤال معكوس: نعم=0 | إلى حد ما=1 | لا=2">
                                                        ⇄ معكوس
                                                    </span>
                                                @endif
                                                <div class="q-edit-container d-none mt-1" id="q-edit-{{ $q->id }}">
                                                    <textarea class="form-control form-control-sm auto-resize-textarea input-q-text">{{ $q->text_ar }}</textarea>
                                                    <div class="mt-2 d-flex gap-1 justify-content-end">
                                                        <button class="btn btn-sm btn-secondary btn-cancel-q" data-id="{{ $q->id }}">إلغاء</button>
                                                        <button class="btn btn-sm btn-success btn-save-q" data-id="{{ $q->id }}">حفظ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Actions -->
                                        <div class="d-flex gap-1 align-items-center q-actions" id="q-actions-{{ $q->id }}">
                                            <button class="btn btn-sm btn-outline-info border-0 btn-manage-options" data-id="{{ $q->id }}" title="خيارات الإجابة">
                                                <i class="bi bi-list-check"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary border-0 btn-edit-q" data-id="{{ $q->id }}" title="تعديل نص السؤال">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm border-0 btn-toggle-reversed"
                                                    data-id="{{ $q->id }}"
                                                    data-reversed="{{ $q->is_reversed ? '1' : '0' }}"
                                                    data-url="{{ route('admin.questions.update', $q->id) }}"
                                                    title="{{ $q->is_reversed ? 'إلغاء العكس' : 'تفعيل كسؤال معكوس' }}"
                                                    style="color:{{ $q->is_reversed ? '#d97706' : '#9ca3af' }}">
                                                <i class="bi bi-arrow-left-right"></i>
                                            </button>
                                            
                                            <!-- Move Dropdown -->
                                            <div class="dropdown d-inline">
                                                <button class="btn btn-sm btn-outline-secondary border-0 no-caret" data-bs-toggle="dropdown" title="نقل إلى بُعد آخر">
                                                    <i class="bi bi-folder-symlink"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                    <li><h6 class="dropdown-header">نقل إلى البُعد:</h6></li>
                                                    @foreach($assessment->dimensions as $dOption)
                                                        @if($dOption->id != $dim->id)
                                                            <li><button class="dropdown-item btn-move-q" data-question-id="{{ $q->id }}" data-dimension-id="{{ $dOption->id }}">{{ $dOption->name_ar }}</button></li>
                                                        @endif
                                                    @endforeach
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><button class="dropdown-item btn-move-q text-danger" data-question-id="{{ $q->id }}" data-dimension-id="">بدون بُعد (عام)</button></li>
                                                </ul>
                                            </div>
                                            
                                            <button class="btn btn-sm btn-outline-danger border-0 btn-delete-q" 
                                                    data-url="{{ route('admin.questions.destroy', $q->id) }}" title="حذف السؤال">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center text-muted py-3 small bg-light-subtle">لا توجد أسئلة في هذا البعد بعد.</div>
                                @endforelse
                            </div>
                            
                            <!-- Inline Add Question Form -->
                            <div class="p-3 bg-light border-top d-flex gap-2 align-items-center">
                                <input type="text" class="form-control form-control-sm flex-grow-1 input-add-q-text" placeholder="اكتب نص السؤال واضغط إضافة...">
                                <button class="btn btn-sm btn-outline-primary px-3 btn-add-q-inline" data-dimension-id="{{ $dim->id }}">
                                    <i class="bi bi-plus-lg me-1"></i>إضافة سؤال
                                </button>
                            </div>

                            <!-- Dimension Interpretations Form -->
                            <div class="p-4 border-top bg-light-subtle">
                                <h6 class="fw-bold mb-3 text-dark"><i class="bi bi-journal-text me-2 text-primary"></i>تفسيرات هذا البُعد ومستويات الدرجة</h6>
                                <form class="dimension-interpretations-ajax-form" data-dimension-id="{{ $dim->id }}">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-medium text-muted">الحد الأقصى للمستوى المنخفض (%) *</label>
                                            <input type="number" class="form-control form-control-sm input-dim-low-threshold" value="{{ $lowThreshold }}" required min="0" max="100" placeholder="مثال: 33">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-medium text-muted">الحد الأدنى للمستوى المرتفع (%) *</label>
                                            <input type="number" class="form-control form-control-sm input-dim-high-threshold" value="{{ $highThreshold }}" required min="0" max="100" placeholder="مثال: 70">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label small fw-medium text-success">تفسير المستوى المرتفع (High) *</label>
                                            <textarea class="form-control form-control-sm auto-resize-textarea textarea-dim-high-text" rows="3" required placeholder="التفسير في حال كانت الدرجة مرتفعة...">{{ $highText }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-medium text-warning">تفسير المستوى المتوسط (Medium) *</label>
                                            <textarea class="form-control form-control-sm auto-resize-textarea textarea-dim-medium-text" rows="3" required placeholder="التفسير في حال كانت الدرجة متوسطة...">{{ $mediumText }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-medium text-danger">تفسير المستوى المنخفض (Low) *</label>
                                            <textarea class="form-control form-control-sm auto-resize-textarea textarea-dim-low-text" rows="3" required placeholder="التفسير في حال كانت الدرجة منخفضة...">{{ $lowText }}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary btn-sm px-4 btn-save-dim-interpretations">
                                            <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التفسيرات والحدود</span>
                                            <span class="spinner-border spinner-border-sm d-none"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="card border-0 shadow-sm p-4 text-center text-muted mb-3">
                    <i class="bi bi-folder2-open display-6 mb-2"></i>
                    <div>لا توجد أبعاد فرعية لهذا المقياس بعد. يرجى إضافة بُعد بالأسفل للبدء.</div>
                </div>
            @endforelse
        </div>
        
        <!-- Questions without Dimension Section -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom-0">
                @if($assessment->dimensions->isEmpty())
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-question-square me-2 text-primary"></i>أسئلة المقياس</h6>
                    <span class="badge bg-primary-subtle text-dark border border-primary-subtle rounded-pill px-2 py-1 small">
                        {{ $assessment->questions->count() }} سؤال
                    </span>
                @else
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-question-square me-2 text-warning"></i>أسئلة بدون بُعد فرعي</h6>
                    <span class="badge bg-warning-subtle text-dark border border-warning-subtle rounded-pill px-2 py-1 small">
                        {{ $assessment->questions->count() }} سؤال معلّق
                    </span>
                @endif
            </div>
            <div class="card-body p-0">
                <div class="unassigned-questions-list">
                    @forelse($assessment->questions as $qIdx => $q)
                        <div class="question-row d-flex align-items-center justify-content-between border-top">
                            <div class="d-flex align-items-center flex-grow-1">
                                <span class="text-muted me-2 small fw-semibold">{{ $qIdx + 1 }}.</span>
                                
                                <div class="flex-grow-1 me-3">
                                    <span class="q-display-text text-dark" id="q-display-{{ $q->id }}">{{ $q->text_ar }}</span>
                                    <div class="q-edit-container d-none mt-1" id="q-edit-{{ $q->id }}">
                                        <textarea class="form-control form-control-sm auto-resize-textarea input-q-text">{{ $q->text_ar }}</textarea>
                                        <div class="mt-2 d-flex gap-1 justify-content-end">
                                            <button class="btn btn-sm btn-secondary btn-cancel-q" data-id="{{ $q->id }}">إلغاء</button>
                                            <button class="btn btn-sm btn-success btn-save-q" data-id="{{ $q->id }}">حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex gap-1 align-items-center q-actions" id="q-actions-{{ $q->id }}">
                                <button class="btn btn-sm btn-outline-info border-0 btn-manage-options" data-id="{{ $q->id }}" title="خيارات الإجابة">
                                    <i class="bi bi-list-check"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary border-0 btn-edit-q" data-id="{{ $q->id }}" title="تعديل السؤال">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                
                                @if(!$assessment->dimensions->isEmpty())
                                    <!-- Move Dropdown -->
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-sm btn-outline-secondary border-0 no-caret" data-bs-toggle="dropdown" title="تعيين لبعد">
                                            <i class="bi bi-folder-symlink"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                            <li><h6 class="dropdown-header">تعيين للبُعد:</h6></li>
                                            @foreach($assessment->dimensions as $dOption)
                                                <li><button class="dropdown-item btn-move-q" data-question-id="{{ $q->id }}" data-dimension-id="{{ $dOption->id }}">{{ $dOption->name_ar }}</button></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <button class="btn btn-sm btn-outline-danger border-0 btn-delete-q" 
                                        data-url="{{ route('admin.questions.destroy', $q->id) }}" title="حذف السؤال">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        @if($assessment->dimensions->isEmpty())
                            <div class="text-center text-muted py-4 small">لا توجد أسئلة في هذا المقياس بعد.</div>
                        @else
                            <div class="text-center text-muted py-4 small">جميع الأسئلة مسندة لأبعاد فرعية بشكل صحيح!</div>
                        @endif
                    @endforelse
                </div>
                
                <!-- Inline Add Question Form for Unassigned Questions -->
                <div class="p-3 bg-light border-top d-flex gap-2 align-items-center">
                    <input type="text" class="form-control form-control-sm flex-grow-1 input-add-q-text-unassigned" placeholder="اكتب نص السؤال العام واضغط إضافة...">
                    <button class="btn btn-sm btn-outline-warning px-3 btn-add-q-inline-unassigned">
                        <i class="bi bi-plus-lg me-1"></i>إضافة سؤال عام
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Add Dimension Form Inline -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-plus-circle-dotted me-2 text-primary"></i>إنشاء بُعد فرعي جديد</h6>
            </div>
            <div class="card-body pt-0">
                <div class="row g-3" id="add-dimension-inline-form">
                    <div class="col-md-7">
                        <input type="text" class="form-control form-control-sm" id="inline-dim-name" placeholder="اسم البعد الفرعي (مثال: الوعي العاطفي)">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control form-control-sm" id="inline-dim-max" placeholder="الدرجة القصوى" min="1">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm w-100" id="btn-save-dim-inline">
                            <span class="btn-text"><i class="bi bi-plus-lg me-1"></i>إضافة بُعد</span>
                            <span class="spinner-border spinner-border-sm d-none"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tab 2: التوصيات -->
    <div class="tab-pane fade" id="tab-recommendations" role="tabpanel" aria-labelledby="recommendations-tab">
        @php
            $recs = $assessment->recommendations;
        @endphp
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-1 text-dark fw-bold"><i class="bi bi-star-fill text-warning me-2"></i>التوصيات وتفسيرات النتيجة</h5>
                <p class="text-muted small mb-0">إدارة التوصيات التي تظهر للمستفيدين بناءً على المجموع أو النمط.</p>
            </div>
            <button class="btn btn-primary btn-sm" onclick="addNewRecommendationCard()">
                <i class="bi bi-plus-lg me-1"></i>إضافة توصية جديدة
            </button>
        </div>

        <div class="row g-4" id="recommendations-container">
            @forelse($recs as $index => $rec)
                @php $key = $rec->id; @endphp
                <div class="col-lg-4 rec-col" id="rec-col-{{ $key }}">
                    <div class="card border-0 border-start border-4 border-primary recommendation-card shadow-sm h-100">
                        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded">
                                <i class="bi bi-bar-chart-fill me-1"></i>{{ $rec->level }}
                            </span>
                        </div>
                        <div class="card-body">
                            <!-- Saved Recommendation View -->
                            <div class="rec-card-view-mode" id="rec-view-{{ $key }}">
                                <div class="mb-3">
                                    <label class="small text-muted mb-1 d-block">نطاق الدرجات</label>
                                    <div class="fw-bold text-dark fs-5">
                                        @if($rec->low_threshold !== null && $rec->high_threshold !== null)
                                            من {{ $rec->low_threshold }} إلى {{ $rec->high_threshold }} درجة
                                        @else
                                            <span class="text-muted fs-6">يعتمد على النمط أو المحور الأعلى</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small text-muted mb-1 d-block">الوصف العيادي</label>
                                    <div class="text-dark whitespace-pre-wrap small bg-light p-3 rounded" style="min-height: 80px;">{{ $rec->description_ar }}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="small text-muted mb-1 d-block">البرامج الإرشادية والتوصيات المقترحة</label>
                                    <div class="text-dark small bg-light p-3 rounded" style="min-height: 80px;">
                                        @php
                                            $lines = is_array($rec->programs_ar) ? $rec->programs_ar : (is_string($rec->programs_ar) ? array_filter(array_map('trim', explode("\n", $rec->programs_ar))) : []);
                                        @endphp
                                        @if(count($lines) > 0)
                                            <ul class="mb-0 ps-0 list-unstyled">
                                                @foreach($lines as $line)
                                                    <li class="mb-1"><i class="bi bi-check2 text-primary me-1"></i>{{ is_array($line) ? ($line['title'] ?? '') : (is_object($line) ? ($line->title ?? '') : $line) }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">لا يوجد برامج مسجلة.</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.assessments.preview', ['assessment' => $assessment->id, 'level' => $rec->level]) }}" target="_blank" class="btn btn-outline-success btn-sm flex-grow-1" title="معاينة التقرير لهذا النمط">
                                        <i class="bi bi-eye me-1"></i>معاينة التقرير
                                    </a>
                                    <button class="btn btn-outline-primary btn-sm btn-toggle-rec-edit" data-level="{{ $key }}" title="تعديل التوصية">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm btn-delete-rec" data-url="{{ route('admin.recommendations.destroy', $rec->id) }}" data-name="{{ $rec->level }}" title="حذف التوصية">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Form container -->
                            <div class="rec-form-container d-none" id="rec-form-{{ $key }}">
                                <form class="recommendation-ajax-form" data-level="{{ $key }}">
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">اسم المستوى / النمط (مثال: مستوى مرتفع، النمط الأوتوقراطي)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-level-name" value="{{ $rec->level }}" required>
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label small fw-medium text-muted">الحد الأدنى للدرجة</label>
                                            <input type="number" class="form-control form-control-sm rec-input-low" value="{{ $rec->low_threshold }}" min="0">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label small fw-medium text-muted">الحد الأقصى للدرجة</label>
                                            <input type="number" class="form-control form-control-sm rec-input-high" value="{{ $rec->high_threshold }}" min="0">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الوصف العيادي للتوصية</label>
                                        <textarea class="form-control form-control-sm rec-textarea-desc" rows="4" required placeholder="ادخل تفاصيل تشخيص هذا المستوى..." style="min-height: 80px;">{{ $rec->description_ar }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الجملة الافتتاحية للشهادات (اختياري)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-certs-intro" placeholder="مثال: من أهم الشهادات التي ننصحك بالحصول عليها:" value="{{ $rec->certificates_intro_ar }}">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control form-control-sm rec-textarea-certificates json-certificates-data" rows="3" placeholder="إضافة شهادة...">{{ is_array($rec->certificates_ar) ? json_encode($rec->certificates_ar) : $rec->certificates_ar }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الجملة الافتتاحية للبرامج التدريبية (اختياري)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-programs-intro" placeholder="مثال: من أبرز البرامج التدريبية التي ننصحك بالالتحاق بها:" value="{{ $rec->programs_intro_ar }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">البرامج التدريبية المقترحة</label>
                                        <textarea class="form-control form-control-sm rec-textarea-programs json-programs-data" rows="3" placeholder="إضافة برنامج...">{{ is_array($rec->programs_ar) ? json_encode($rec->programs_ar) : $rec->programs_ar }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الجملة الختامية للبرامج التدريبية (اختياري)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-programs-outro" placeholder="مثال: يمكنك الاطلاع على هذه البرامج والتسجيل فيها عبر المنصات المعتمدة." value="{{ $rec->programs_outro_ar }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الجملة الافتتاحية لخطة التطوير (اختياري)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-plan-intro" placeholder="مثال: نقترح عليك خلال الـ 30 يوماً القادمة اتباع الخطوات التالية:" value="{{ $rec->plan_30_days_intro_ar }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">خطة تطوير (30 يوماً)</label>
                                        <textarea class="form-control form-control-sm rec-textarea-plan json-plan-data" rows="3" placeholder="إضافة خطوة...">{{ is_array($rec->plan_30_days_ar) ? json_encode($rec->plan_30_days_ar) : $rec->plan_30_days_ar }}</textarea>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-success btn-sm flex-grow-1 btn-save-recommendation">
                                            <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التوصية</span>
                                            <span class="spinner-border spinner-border-sm d-none"></span>
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-sm btn-cancel-rec-edit" data-level="{{ $key }}">إلغاء</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5" id="no-recs-placeholder">
                    <i class="bi bi-inbox text-muted display-4"></i>
                    <p class="text-muted mt-3 mb-0">لا توجد توصيات لهذا المقياس حتى الآن.</p>
                </div>
            @endforelse
        </div>

        <!-- Template for new recommendation -->
        <template id="new-rec-template">
            <div class="col-lg-4 rec-col" id="rec-col-NEW_ID">
                <div class="card border-0 border-start border-4 border-success recommendation-card shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded">توصية جديدة</span>
                    </div>
                    <div class="card-body">
                        <div class="rec-form-container" id="rec-form-NEW_ID">
                            <form class="recommendation-ajax-form" data-level="NEW_ID">
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">اسم المستوى / النمط</label>
                                    <input type="text" class="form-control form-control-sm rec-input-level-name" placeholder="مثال: مستوى مرتفع" required>
                                </div>
                                <div class="row g-2 mb-3">
                                    <div class="col-6">
                                        <label class="form-label small fw-medium text-muted">الحد الأدنى للدرجة</label>
                                        <input type="number" class="form-control form-control-sm rec-input-low" min="0">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small fw-medium text-muted">الحد الأقصى للدرجة</label>
                                        <input type="number" class="form-control form-control-sm rec-input-high" min="0">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الوصف العيادي للتوصية</label>
                                    <textarea class="form-control form-control-sm rec-textarea-desc" rows="4" required style="min-height: 80px;"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الجملة الافتتاحية للشهادات (اختياري)</label>
                                    <input type="text" class="form-control form-control-sm rec-input-certs-intro" placeholder="مثال: من أهم الشهادات التي ننصحك بالحصول عليها:">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الشهادات الاحترافية المناسبة</label>
                                    <textarea class="form-control form-control-sm rec-textarea-certificates json-certificates-data" rows="3" placeholder="إضافة شهادة..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الجملة الافتتاحية للبرامج التدريبية (اختياري)</label>
                                    <input type="text" class="form-control form-control-sm rec-input-programs-intro" placeholder="مثال: من أبرز البرامج التدريبية التي ننصحك بالالتحاق بها:">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">البرامج التدريبية المقترحة</label>
                                    <textarea class="form-control form-control-sm rec-textarea-programs json-programs-data" rows="3" placeholder="إضافة برنامج..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الجملة الختامية للبرامج التدريبية (اختياري)</label>
                                    <input type="text" class="form-control form-control-sm rec-input-programs-outro" placeholder="مثال: يمكنك الاطلاع على هذه البرامج والتسجيل فيها عبر المنصات المعتمدة.">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الجملة الافتتاحية لخطة التطوير (اختياري)</label>
                                    <input type="text" class="form-control form-control-sm rec-input-plan-intro" placeholder="مثال: نقترح عليك خلال الـ 30 يوماً القادمة اتباع الخطوات التالية:">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">خطة تطوير (30 يوماً)</label>
                                    <textarea class="form-control form-control-sm rec-textarea-plan json-plan-data" rows="3" placeholder="إضافة خطوة..."></textarea>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-success btn-sm flex-grow-1 btn-save-recommendation">
                                        <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التوصية</span>
                                        <span class="spinner-border spinner-border-sm d-none"></span>
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-sm btn-cancel-rec-edit" data-level="NEW_ID">إلغاء</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        </div>
    </div>
    
    <!-- Tab 3: إعدادات المقياس -->
    <div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="settings-tab">
        <div class="row">
            <div class="col-md-8">
                <!-- Metadata settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-sliders me-2 text-primary"></i>تعديل بيانات المقياس الأساسية</h6>
                    </div>
                    <div class="card-body">
                        <form id="assessment-settings-form">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">اسم المقياس العربي *</label>
                                    <input type="text" class="form-control" id="settings-title" value="{{ $assessment->title_ar }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">العنوان الجذاب (وصف قصير)</label>
                                    <input type="text" class="form-control" id="settings-subtitle" value="{{ $assessment->subtitle_ar }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">المحور / الفئة *</label>
                                    <input type="text" class="form-control" id="settings-category" value="{{ $assessment->category }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">أيقونة المقياس (اختياري)</label>
                                    @if($assessment->icon && str_starts_with($assessment->icon, '/'))
                                        <div class="mb-1">
                                            <img src="{{ asset($assessment->icon) }}" alt="Icon" style="height: 30px; object-fit: contain;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control text-start" dir="ltr" id="settings-icon-file" accept="image/*">
                                    <div class="form-text" style="font-size:0.65rem;">ارفع صورة الأيقونة. يفضل خلفية شفافة (PNG).</div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="form-label small fw-semibold text-dark">طريقة حساب النتيجة والتوصية *</label>
                                    <select class="form-select" id="settings-scoring-type">
                                        <option value="overall_score" {{ ($assessment->scoring_type ?? 'overall_score') == 'overall_score' ? 'selected' : '' }}>بناءً على الدرجة الكلية (مثل: مرتفع/متوسط/منخفض)</option>
                                        <option value="highest_dimension" {{ ($assessment->scoring_type ?? 'overall_score') == 'highest_dimension' ? 'selected' : '' }}>بناءً على المحور الأعلى درجة (مثل: الأنماط القيادية)</option>
                                        <option value="dimension_only" {{ ($assessment->scoring_type ?? 'overall_score') == 'dimension_only' ? 'selected' : '' }}>لا يوجد تقييم كلي (تقييم الأبعاد فقط)</option>
                                         <option value="perceptual_styles" {{ ($assessment->scoring_type ?? '') == 'perceptual_styles' ? 'selected' : '' }}>أنماط إدراكية (بصري، سمعي، حسي، أنماط مزدوجة ومتوازنة)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-dark">وصف المقياس</label>
                                <textarea class="form-control" id="settings-description" rows="4" placeholder="اكتب نبذة أو وصف عيادي قصير للمقياس...">{{ $assessment->description_ar }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-dark">صورة المقياس</label>
                                @if($assessment->image_url)
                                    <div class="mb-2">
                                        <img src="{{ asset('images/dashboard/' . $assessment->image_url) }}" alt="Current Image" style="height: 60px; border-radius: 4px; border: 1px solid #dee2e6;">
                                    </div>
                                @endif
                                <input type="file" class="form-control text-start" dir="ltr" id="settings-image" accept="image/*">
                                <div class="form-text" style="font-size:0.65rem;">اختر صورة جديدة إذا أردت استبدال الصورة الحالية. سيتم مسح الصورة القديمة (إن لم تكن من الصور الافتراضية).</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-dark">وقت الاختبار (دقائق)</label>
                                    <input type="number" class="form-control" id="settings-time-limit" value="{{ $assessment->time_limit_min }}" placeholder="بلا حد للوقت" min="1">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-dark">السعر (ر.س)</label>
                                    <input type="number" class="form-control" id="settings-price" value="{{ $assessment->price }}" step="0.01" min="0">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-dark">التقييم (1-5)</label>
                                    <input type="number" class="form-control" id="settings-rating" value="{{ $assessment->rating }}" step="0.1" min="1" max="5">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-dark">بادئة كود التقرير (مثال: VR)</label>
                                    <input type="text" class="form-control" id="settings-report-code" value="{{ $assessment->report_code }}" placeholder="بادئة رقم التقرير" maxlength="50">
                                </div>
                                <div class="col-12 mt-2 d-flex align-items-end flex-wrap gap-3">
                                    <div class="form-check form-switch ps-0 pe-5 mb-2 fs-6">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" role="switch" id="settings-is-active" {{ $assessment->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark fw-medium" for="settings-is-active">
                                            مفعّل وظاهر للمستفيدين
                                        </label>
                                    </div>
                                    <div class="form-check form-switch ps-0 pe-5 mb-2 fs-6">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" role="switch" id="settings-hide-coupon" {{ $assessment->hide_coupon_field ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark fw-medium" for="settings-hide-coupon">
                                            إخفاء حقل الكوبون في شاشة الدفع للمستخدمين
                                        </label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <hr class="my-4">

                            <button type="submit" class="btn btn-primary" id="btn-save-settings">
                                <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التعديلات</span>
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <!-- Danger zone card -->
                <div class="card border-danger border-opacity-25 bg-danger-subtle bg-opacity-10 shadow-sm">
                    <div class="card-header bg-transparent border-danger border-opacity-10 py-3">
                        <h6 class="fw-bold text-danger mb-0"><i class="bi bi-exclamation-octagon me-2"></i>منطقة الخطر</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">
                            عند حذف المقياس نهائياً، سيتم حذف جميع الأبعاد، الأسئلة، التوصيات، وجلسات الاختبار المرتبطة بالمقياس فوراً. هذا الإجراء لا يمكن التراجع عنه.
                        </p>
                        <button class="btn btn-danger w-100 btn-delete-assessment" 
                                data-url="{{ route('admin.assessments.destroy', $assessment->id) }}" 
                                data-name="{{ $assessment->title_ar }}">
                            <i class="bi bi-trash3 me-1"></i>حذف المقياس بالكامل
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Answer Options Modal -->
<div class="modal fade" id="optionsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">خيارات الإجابة للسؤال</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light">
                <p class="text-muted small mb-3">السؤال: <strong id="modal-q-text" class="text-dark"></strong></p>
                
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white py-2 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold small">إضافة خيار جديد</span>
                    </div>
                    <div class="card-body py-2">
                        <form id="add-option-form" class="row g-2 align-items-end">
                            <input type="hidden" id="modal-q-id">
                            <div class="col-sm-6">
                                <label class="form-label small text-muted mb-1">نص الخيار (مثال: نعم، أحياناً)</label>
                                <input type="text" id="add-opt-label" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label small text-muted mb-1">قيمة الدرجة (Score)</label>
                                <input type="number" id="add-opt-score" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-sm w-100">إضافة</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover align-middle mb-0" id="options-table">
                            <thead class="table-light">
                                <tr>
                                    <th>نص الخيار</th>
                                    <th>الدرجة</th>
                                    <th style="width: 100px;">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="options-tbody">
                                <!-- Options injected via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light d-flex justify-content-between">
                <button type="button" class="btn btn-outline-primary btn-sm" id="btn-sync-options">
                    <i class="bi bi-files me-1"></i>تعميم هذه الخيارات على جميع أسئلة المقياس
                </button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Import Modal -->
<div class="modal fade" id="bulkImportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-file-earmark-arrow-up text-primary me-2"></i>استيراد أسئلة بالجملة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs mb-3" id="bulkImportTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active small py-2" id="import-text-tab" data-bs-toggle="tab" data-bs-target="#import-text" type="button" role="tab" aria-controls="import-text" aria-selected="true">استيراد نصي</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link small py-2" id="import-csv-tab" data-bs-toggle="tab" data-bs-target="#import-csv" type="button" role="tab" aria-controls="import-csv" aria-selected="false">استيراد ملف CSV</button>
                    </li>
                </ul>

                <div class="tab-content" id="bulkImportTabsContent">
                    <!-- Tab 1: Text Import -->
                    <div class="tab-pane fade show active" id="import-text" role="tabpanel" aria-labelledby="import-text-tab">
                        <div class="mb-3">
                            <label class="form-label small fw-medium">المقياس المختار</label>
                            <input type="text" class="form-control form-control-sm bg-light" value="{{ $assessment->title_ar }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">اسناد للأبعاد الفرعية</label>
                            <select class="form-select form-select-sm" id="modal-bulk-dimension-id">
                                <option value="">-- بدون بُعد (أسئلة عامة معلّقة) --</option>
                                @foreach($assessment->dimensions as $d)
                                    <option value="{{ $d->id }}">{{ $d->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">الأسئلة (اكتب كل سؤال في سطر مستقل) *</label>
                            <textarea class="form-control" id="modal-bulk-questions-text" rows="8" placeholder="مثال:&#10;هل تشعر بالتوتر بشكل متكرر؟&#10;هل تجد صعوبة في النوم ليلاً؟" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="button" class="btn btn-sm btn-primary" id="modal-btn-bulk-import">
                                <span class="btn-text"><i class="bi bi-cloud-arrow-down me-1"></i>بدء الاستيراد</span>
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Tab 2: CSV Import -->
                    <div class="tab-pane fade" id="import-csv" role="tabpanel" aria-labelledby="import-csv-tab">
                        <form id="csv-import-form" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label small fw-medium">المقياس المختار</label>
                                <input type="text" class="form-control form-control-sm bg-light" value="{{ $assessment->title_ar }}" disabled>
                            </div>
                            <div class="mb-3 bg-light p-3 rounded border">
                                <h6 class="small fw-bold text-dark mb-2"><i class="bi bi-info-circle me-1 text-primary"></i>تعليمات ملف CSV:</h6>
                                <p class="small text-muted mb-2">تأكد من أن ملف CSV يحتوي على الأعمدة التالية وبنفس الترتيب:</p>
                                <code class="small d-block mb-2 bg-white p-2 border rounded text-ltr text-start" style="font-family: monospace;">
                                    اسم البعد,نص السؤال,معكوس,الخيارات
                                </code>
                                <p class="small text-muted mb-0">يمكنك ترك عمود الأبعاد فارغاً لإضافة أسئلة عامة. عمود الخيارات اختياري ويقبل الصيغة: <code class="bg-white px-1">نعم:2|لا:0</code></p>
                                <a href="{{ route('admin.questions.template') }}" class="btn btn-sm btn-outline-secondary mt-2 px-3 py-1 small">
                                    <i class="bi bi-download me-1"></i>تحميل قالب الاستيراد (CSV)
                                </a>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-medium">اختر ملف CSV *</label>
                                <input type="file" class="form-control form-control-sm" id="csv_file" name="csv_file" accept=".csv" required>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-sm btn-success" id="modal-btn-csv-import">
                                    <span class="btn-text"><i class="bi bi-file-earmark-arrow-up me-1"></i>استيراد الملف</span>
                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.APP_ICONS = @json($icons ?? []);
</script>
<script>
$(document).ready(function() {
    
    // Accordion active styling helper (class toggle)
    $(document).on('show.bs.collapse', '.accordion-collapse', function () {
        $(this).closest('.accordion-item').addClass('is-expanded');
    });
    $(document).on('hide.bs.collapse', '.accordion-collapse', function () {
        $(this).closest('.accordion-item').removeClass('is-expanded');
    });
    
    // Toggle active state from header
    $('#header-is-active').on('change', function() {
        const toggle = $(this);
        const url = toggle.data('url');
        
        $.ajax({
            url: url,
            method: 'POST',
            success: function(res) {
                showAlert(res.message, 'success');
                $('#header-active-label').text(res.is_active ? 'مفعّل' : 'موقف');
                // Sync settings switch
                $('#settings-is-active').prop('checked', res.is_active);
            },
            error: function() {
                showAlert('فشل تغيير حالة المقياس.', 'danger');
                toggle.prop('checked', !toggle.is(':checked'));
            }
        });
    });

    // Auto-sync settings switch changes to header switch
    $('#settings-is-active').on('change', function() {
        $('#header-is-active').prop('checked', $(this).is(':checked')).trigger('change');
    });

    /* ==========================================================================
       TAB 1: DIMENSIONS & QUESTIONS ACTIONS
       ========================================================================== */

    // Initialize SortableJS
    function initSortables() {
        // Dimension reordering
        const accordionEl = document.getElementById('dimensions-accordion');
        if (accordionEl) {
            new Sortable(accordionEl, {
                handle: '.dim-drag-handle',
                animation: 150,
                onEnd: function() {
                    const order = [];
                    $('#dimensions-accordion > .accordion-item').each(function() {
                        order.push($(this).data('id'));
                    });
                    
                    $.ajax({
                        url: '{{ route('admin.dimensions.reorder') }}',
                        method: 'PATCH',
                        contentType: 'application/json',
                        data: JSON.stringify({ order: order }),
                        success: function(res) {
                            showAlert(res.message, 'success');
                        },
                        error: function() {
                            showAlert('فشل إعادة ترتيب الأبعاد.', 'danger');
                        }
                    });
                }
            });
        }

        // Question reordering per dimension
        document.querySelectorAll('.questions-list').forEach(function(el) {
            new Sortable(el, {
                handle: '.q-drag-handle',
                animation: 150,
                onEnd: function() {
                    const order = [];
                    $(el).find('.question-row').each(function() {
                        order.push($(this).data('id'));
                    });
                    
                    $.ajax({
                        url: '{{ route('admin.questions.reorder') }}',
                        method: 'PATCH',
                        contentType: 'application/json',
                        data: JSON.stringify({ order: order }),
                        success: function() {
                            showAlert('تم تحديث ترتيب الأسئلة بنجاح.', 'success');
                            // Re-calculate visual indexes
                            $(el).find('.question-row').each(function(index) {
                                $(this).find('.q-number').text((index + 1) + '.');
                            });
                        },
                        error: function() {
                            showAlert('فشل إعادة ترتيب الأسئلة.', 'danger');
                        }
                    });
                }
            });
        });
    }
    
    initSortables();

    // Reload tab 1 DOM section dynamically via AJAX and preserve accordion state
    function reloadTab1() {
        const openCollapseId = $('.accordion-collapse.show').attr('id');
        
        return $.ajax({
            url: window.location.href,
            method: 'GET',
            success: function(html) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#tab-dimensions-questions');
                
                $('#tab-dimensions-questions').html(newContent.innerHTML);
                
                // Keep the active accordion item open
                if (openCollapseId) {
                    const collapseEl = document.getElementById(openCollapseId);
                    if (collapseEl) {
                        $(collapseEl).addClass('show');
                        $(collapseEl).closest('.accordion-item').addClass('is-expanded');
                        $(`[data-bs-target="#${openCollapseId}"]`).removeClass('collapsed').attr('aria-expanded', 'true');
                    }
                }
                
                initSortables();
            }
        });
    }

    // Inline Dimension Editing Toggle (Stop Propagation to prevent collapse trigger)
    $(document).on('click', '.btn-edit-dim', function(e) {
        e.stopPropagation();
        const id = $(this).data('id');
        $(`#dim-display-${id}`).addClass('d-none');
        $(`#dim-edit-${id}`).removeClass('d-none');
    });

    $(document).on('click', '.btn-cancel-dim', function(e) {
        e.stopPropagation();
        const id = $(this).data('id');
        $(`#dim-edit-${id}`).addClass('d-none');
        $(`#dim-display-${id}`).removeClass('d-none');
    });

    // Save Dimension Inline Edit
    $(document).on('click', '.btn-save-dim', function(e) {
        e.stopPropagation();
        const id = $(this).data('id');
        const container = $(`#dim-edit-${id}`);
        const name = container.find('.input-dim-name').val().trim();
        const maxScore = container.find('.input-dim-max').val();
        
        if (!name || maxScore < 1) {
            showAlert('اسم البعد والدرجة مطلوبان.', 'warning');
            return;
        }
        
        const btn = $(this);
        btn.prop('disabled', true);
        
        $.ajax({
            url: `/admin/dimensions/${id}`,
            method: 'PATCH',
            contentType: 'application/json',
            data: JSON.stringify({ name_ar: name, max_score: maxScore }),
            success: function(res) {
                showAlert(res.message, 'success');
                // Update display values
                const display = $(`#dim-display-${id}`);
                display.find('.dim-name-text').text(name);
                display.find('.dim-max-score-text').text(maxScore);
                
                $(`#dim-edit-${id}`).addClass('d-none');
                $(`#dim-display-${id}`).removeClass('d-none');
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء حفظ التعديلات.', 'danger');
            },
            complete: function() {
                btn.prop('disabled', false);
            }
        });
    });

    // Delete Dimension
    $(document).on('click', '.btn-delete-dim', function(e) {
        e.stopPropagation();
        const url = $(this).data('url');
        const name = $(this).data('name');
        
        confirmDelete(`هل تريد حذف بُعد "${name}"؟ سيتم نقل كافة الأسئلة التابعة له إلى قائمة (بدون بُعد).`, url, function() {
            reloadTab1();
        });
    });

    // Inline Add Dimension (Form at bottom of Tab 1)
    $('#btn-save-dim-inline').on('click', function() {
        const btn = $(this);
        const name = $('#inline-dim-name').val().trim();
        const max = $('#inline-dim-max').val();
        
        if (!name || !max) {
            showAlert('اسم البعد والدرجة القصوى مطلوبان.', 'warning');
            return;
        }
        
        setLoading(btn, true);
        
        $.ajax({
            url: `/admin/assessments/{{ $assessment->id }}/dimensions`,
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ name_ar: name, max_score: max }),
            success: function(res) {
                showAlert(res.message, 'success');
                $('#inline-dim-name').val('');
                $('#inline-dim-max').val('');
                reloadTab1();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل إضافة البعد.', 'danger');
            },
            complete: function() {
                setLoading(btn, false);
            }
        });
    });

    // Inline Question Adding (Inside dimension accordion body)
    $(document).on('click', '.btn-add-q-inline', function() {
        const btn = $(this);
        const dimId = btn.data('dimension-id');
        const container = btn.closest('.accordion-body');
        const input = container.find('.input-add-q-text');
        const text = input.val().trim();
        
        if (!text) {
            showAlert('نص السؤال مطلوب.', 'warning');
            return;
        }
        
        btn.prop('disabled', true);
        
        // Payload with default options: نعم (2), إلى حد ما (1), لا (0)
        const payload = {
            assessment_id: '{{ $assessment->id }}',
            dimension_id: dimId,
            text_ar: text,
            options: [
                { label_ar: 'نعم', score_value: 2, order_index: 0 },
                { label_ar: 'إلى حد ما', score_value: 1, order_index: 1 },
                { label_ar: 'لا', score_value: 0, order_index: 2 }
            ]
        };
        
        $.ajax({
            url: '{{ route('admin.questions.store') }}',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                showAlert(res.message, 'success');
                input.val('');
                reloadTab1();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء إضافة السؤال.', 'danger');
            },
            complete: function() {
                btn.prop('disabled', false);
            }
        });
    });

    // Inline Question Adding for Unassigned Questions
    $(document).on('click', '.btn-add-q-inline-unassigned', function() {
        const btn = $(this);
        const input = $('.input-add-q-text-unassigned');
        const text = input.val().trim();
        
        if (!text) {
            showAlert('نص السؤال مطلوب.', 'warning');
            return;
        }
        
        btn.prop('disabled', true);
        
        const payload = {
            assessment_id: '{{ $assessment->id }}',
            dimension_id: null,
            text_ar: text,
            options: [
                { label_ar: 'نعم', score_value: 2, order_index: 0 },
                { label_ar: 'إلى حد ما', score_value: 1, order_index: 1 },
                { label_ar: 'لا', score_value: 0, order_index: 2 }
            ]
        };
        
        $.ajax({
            url: '{{ route('admin.questions.store') }}',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                showAlert(res.message, 'success');
                input.val('');
                reloadTab1();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء إضافة السؤال.', 'danger');
            },
            complete: function() {
                btn.prop('disabled', false);
            }
        });
    });

    // Inline Question text Editing Toggle
    $(document).on('click', '.btn-edit-q', function() {
        const id = $(this).data('id');
        $(`#q-display-${id}`).addClass('d-none');
        $(`#q-actions-${id}`).addClass('d-none');
        $(`#q-edit-${id}`).removeClass('d-none');
        
        // Auto-focus and auto-resize textarea
        const textarea = $(`#q-edit-${id} textarea`);
        textarea.focus();
        textarea.css('height', 'auto').css('height', textarea[0].scrollHeight + 'px');
    });

    $(document).on('click', '.btn-cancel-q', function() {
        const id = $(this).data('id');
        $(`#q-edit-${id}`).addClass('d-none');
        $(`#q-display-${id}`).removeClass('d-none');
        $(`#q-actions-${id}`).removeClass('d-none');
    });

    // Auto-resize textareas as user types
    $(document).on('input', '.auto-resize-textarea', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Save Inline Question Edit
    $(document).on('click', '.btn-save-q', function() {
        const id = $(this).data('id');
        const container = $(`#q-edit-${id}`);
        const text = container.find('textarea').val().trim();
        
        if (!text) {
            showAlert('نص السؤال مطلوب.', 'warning');
            return;
        }
        
        const btn = $(this);
        btn.prop('disabled', true);
        
        $.ajax({
            url: `/admin/questions/${id}`,
            method: 'PATCH',
            contentType: 'application/json',
            data: JSON.stringify({ text_ar: text }),
            success: function(res) {
                showAlert(res.message, 'success');
                $(`#q-display-${id}`).text(text);
                $(`#q-edit-${id}`).addClass('d-none');
                $(`#q-display-${id}`).removeClass('d-none');
                $(`#q-actions-${id}`).removeClass('d-none');
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل تحديث السؤال.', 'danger');
            },
            complete: function() {
                btn.prop('disabled', false);
            }
        });
    });

    // Move / Assign Dimension Dropdown handler
    $(document).on('click', '.btn-move-q', function(e) {
        e.preventDefault();
        const qId = $(this).data('question-id');
        const dimId = $(this).data('dimension-id') || null;
        
        $.ajax({
            url: `/admin/questions/${qId}/dimension`,
            method: 'PATCH',
            contentType: 'application/json',
            data: JSON.stringify({ dimension_id: dimId }),
            success: function(res) {
                showAlert(res.message, 'success');
                reloadTab1();
            },
            error: function() {
                showAlert('حدث خطأ أثناء نقل السؤال.', 'danger');
            }
        });
    });

    // Delete Question
    $(document).on('click', '.btn-delete-q', function() {
        const url = $(this).data('url');
        confirmDelete('هل تريد حذف هذا السؤال نهائياً؟', url, function() {
            reloadTab1();
        });
    });

    // Bulk Import Questions AJAX Submission
    $('#modal-btn-bulk-import').on('click', function() {
        const btn = $(this);
        const dimId = $('#modal-bulk-dimension-id').val() || null;
        const text = $('#modal-bulk-questions-text').val().trim();
        
        if (!text) {
            showAlert('الرجاء كتابة أسئلة للاستيراد.', 'warning');
            return;
        }
        
        setLoading(btn, true);
        
        const payload = {
            assessment_id: '{{ $assessment->id }}',
            dimension_id: dimId,
            questions_text: text
        };
        
        $.ajax({
            url: '{{ route('admin.questions.bulk') }}',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                setLoading(btn, false);
                bootstrap.Modal.getInstance(document.getElementById('bulkImportModal')).hide();
                showAlert(res.message, 'success');
                $('#modal-bulk-questions-text').val('');
                reloadTab1();
            },
            error: function(xhr) {
                setLoading(btn, false);
                showAlert(xhr.responseJSON?.message || 'فشل استيراد الأسئلة.', 'danger');
            }
        });
    });

    // CSV Import Questions AJAX Submission
    $('#csv-import-form').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const btn = $('#modal-btn-csv-import');
        const fileInput = $('#csv_file')[0];
        
        if (fileInput.files.length === 0) {
            showAlert('الرجاء اختيار ملف CSV أولاً.', 'warning');
            return;
        }

        const formData = new FormData();
        formData.append('csv_file', fileInput.files[0]);

        setLoading(btn, true);

        $.ajax({
            url: '{{ route('admin.questions.importCsv', $assessment->id) }}',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                setLoading(btn, false);
                bootstrap.Modal.getInstance(document.getElementById('bulkImportModal')).hide();
                showAlert(res.message, 'success');
                form[0].reset();
                reloadTab1();
            },
            error: function(xhr) {
                setLoading(btn, false);
                showAlert(xhr.responseJSON?.message || 'فشل استيراد ملف CSV.', 'danger');
            }
        });
    });


    /* ==========================================================================
       TAB 2: RECOMMENDATIONS ACTIONS
       ========================================================================== */

    // Dynamically reload Tab 2 contents to reflect new models
    function reloadTab2() {
        return $.ajax({
            url: window.location.href,
            method: 'GET',
            success: function(html) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#tab-recommendations');
                $('#tab-recommendations').html(newContent.innerHTML);
                
                // Re-initialize dynamic lists and JSON lists after replacing DOM
                if (typeof window.initDynamicLists === 'function') {
                    window.initDynamicLists('#tab-recommendations');
                }
                if (typeof window.initAllJsonLists === 'function') {
                    window.initAllJsonLists('#tab-recommendations');
                }
            }
        });
    }

    window.addNewRecommendationCard = function() {
        $('#no-recs-placeholder').addClass('d-none');
        
        if ($('#rec-col-NEW_ID').length > 0) {
            $('#rec-col-NEW_ID').find('input').first().focus();
            return;
        }
        
        const template = document.getElementById('new-rec-template');
        if (!template) return;
        
        const clone = template.content.cloneNode(true);
        $('#recommendations-container').append(clone);
        
        if (typeof window.initAllJsonLists === 'function') {
            window.initAllJsonLists('#rec-col-NEW_ID');
        }
        
        $('html, body').animate({
            scrollTop: $('#rec-col-NEW_ID').offset().top - 100
        }, 300);
        
        $('#rec-col-NEW_ID').find('input').first().focus();
    };

    // Toggle forms
    $(document).on('click', '.btn-expand-rec-form', function() {
        const level = $(this).data('level');
        $(`#rec-add-placeholder-${level}`).addClass('d-none');
        $(`#rec-form-${level}`).removeClass('d-none');
    });

    $(document).on('click', '.btn-toggle-rec-edit', function() {
        const level = $(this).data('level');
        $(`#rec-view-${level}`).addClass('d-none');
        $(`#rec-form-${level}`).removeClass('d-none');
    });

    $(document).on('click', '.btn-cancel-rec-edit', function() {
        const level = $(this).data('level');
        if (level === 'NEW_ID') {
            $('#rec-col-NEW_ID').remove();
            if ($('#recommendations-container').children('.rec-col').length === 0) {
                $('#no-recs-placeholder').removeClass('d-none');
            }
        } else {
            $(`#rec-form-${level}`).addClass('d-none');
            $(`#rec-view-${level}`).removeClass('d-none');
        }
    });

    // Delete recommendation
    $(document).on('click', '.btn-delete-rec', function() {
        const url = $(this).data('url');
        const name = $(this).data('name');
        
        confirmDelete(`هل أنت متأكد من حذف التوصية الخاصة بمستوى "${name}"؟`, url, function() {
            reloadTab2();
        });
    });

    // Save/Update recommendation
    $(document).on('submit', '.recommendation-ajax-form', function(e) {
        e.preventDefault();
        const form = $(this);
        const levelData = form.data('level');
        const levelName = form.find('.rec-input-level-name').val().trim();
        const btn = form.find('.btn-save-recommendation');
        
        let certs = []; try { certs = JSON.parse(form.find('.rec-textarea-certificates').val() || '[]'); } catch(e){}
        let progs = []; try { progs = JSON.parse(form.find('.rec-textarea-programs').val() || '[]'); } catch(e){}
        let plan = []; try { plan = JSON.parse(form.find('.rec-textarea-plan').val() || '[]'); } catch(e){}

        const payload = {
            id: levelData !== 'NEW_ID' ? levelData : null,
            assessment_id: '{{ $assessment->id }}',
            level: levelName,
            low_threshold: form.find('.rec-input-low').val(),
            high_threshold: form.find('.rec-input-high').val(),
            description_ar: form.find('.rec-textarea-desc').val().trim(),
            certificates_intro_ar: form.find('.rec-input-certs-intro').val().trim(),
            certificates_ar: certs,
            programs_intro_ar: form.find('.rec-input-programs-intro').val().trim(),
            programs_ar: progs,
            programs_outro_ar: form.find('.rec-input-programs-outro').val().trim(),
            plan_30_days_intro_ar: form.find('.rec-input-plan-intro').val().trim(),
            plan_30_days_ar: plan
        };
        
        setLoading(btn, true);
        
        $.ajax({
            url: '{{ route('admin.recommendations.store') }}',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                showAlert(res.message, 'success');
                reloadTab2();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل حفظ التوصية.', 'danger');
                setLoading(btn, false);
            }
        });
    });


    /* ==========================================================================
       TAB 3: ASSESSMENT SETTINGS
       ========================================================================== */

    // Save Basic Assessment Settings
    $('#assessment-settings-form').on('submit', function(e) {
        e.preventDefault();
        const btn = $('#btn-save-settings');
        
        const formData = new FormData();
        formData.append('_method', 'PATCH');
        formData.append('title_ar', $('#settings-title').val().trim());
        formData.append('subtitle_ar', $('#settings-subtitle').val().trim());
        formData.append('category', $('#settings-category').val().trim());
        formData.append('scoring_type', $('#settings-scoring-type').val());
        
        if ($('#settings-description').val().trim()) formData.append('description_ar', $('#settings-description').val().trim());
        if ($('#settings-time-limit').val()) formData.append('time_limit_min', $('#settings-time-limit').val());
        if ($('#settings-price').val()) formData.append('price', $('#settings-price').val());
        if ($('#settings-rating').val()) formData.append('rating', $('#settings-rating').val());
        formData.append('is_active', $('#settings-is-active').is(':checked') ? 1 : 0);
        formData.append('hide_coupon_field', $('#settings-hide-coupon').is(':checked') ? 1 : 0);
        formData.append('report_code', $('#settings-report-code').val().trim());
        
        if ($('#settings-image')[0].files.length > 0) {
            formData.append('image', $('#settings-image')[0].files[0]);
        }

        if ($('#settings-icon-file')[0].files.length > 0) {
            formData.append('icon_file', $('#settings-icon-file')[0].files[0]);
        }
        
        setLoading(btn, true);
        
        $.ajax({
            url: '{{ route('admin.assessments.settings', $assessment->id) }}',
            method: 'POST', // Must be POST with _method=PATCH for FormData
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: formData,
            success: function(res) {
                showAlert(res.message, 'success');
                // Dynamically update the header metadata
                $('#header-assessment-title').text($('#settings-title').val().trim());
                $('#header-assessment-category').text($('#settings-category').val().trim());
                
                const timeLimit = $('#settings-time-limit').val();
                const timeText = timeLimit ? timeLimit + ' دقيقة' : 'بلا حد للوقت';
                $('#header-assessment-time').text(timeText);
                
                const isActive = $('#settings-is-active').is(':checked');
                $('#header-is-active').prop('checked', isActive);
                $('#header-active-label').text(isActive ? 'مفعّل' : 'موقف');
                
                // If there's an image uploaded, reload to show it (or we could just let them see the success message)
                if ($('#settings-image')[0].files.length > 0) {
                    setTimeout(() => location.reload(), 1000);
                }
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل تحديث الإعدادات.', 'danger');
            },
            complete: function() {
                setLoading(btn, false);
            }
        });
    });

    // Delete entire Assessment (Danger Zone)
    $('.btn-delete-assessment').on('click', function() {
        const url = $(this).data('url');
        const name = $(this).data('name');
        
        confirmDelete(`هل أنت متأكد من حذف مقياس "${name}" بالكامل؟ سيؤدي ذلك إلى مسح كافة الأبعاد والأسئلة والتوصيات ومحاضر الجلسات نهائياً ولا يمكن الرجوع!`, url, function() {
            window.location.href = '{{ route('admin.assessments.index') }}';
        });
    });

    // Save Dimension Interpretations
    $(document).on('submit', '.dimension-interpretations-ajax-form', function(e) {
        e.preventDefault();
        const form = $(this);
        const dimId = form.data('dimension-id');
        const btn = form.find('.btn-save-dim-interpretations');
        
        const payload = {
            high_threshold: form.find('.input-dim-high-threshold').val(),
            low_threshold: form.find('.input-dim-low-threshold').val(),
            interpretations: {
                high: form.find('.textarea-dim-high-text').val().trim(),
                medium: form.find('.textarea-dim-medium-text').val().trim(),
                low: form.find('.textarea-dim-low-text').val().trim()
            }
        };
        
        setLoading(btn, true);
        
        $.ajax({
            url: `/admin/dimensions/${dimId}/interpretations`,
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                showAlert(res.message, 'success');
                reloadTab1();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل حفظ التفسيرات.', 'danger');
                setLoading(btn, false);
            }
        });
    });
});

/* ── Toggle reversed question ── */
$(document).on('click', '.btn-toggle-reversed', function () {
    const btn      = $(this);
    const qId      = btn.data('id');
    const current  = btn.data('reversed') === 1 || btn.data('reversed') === '1';
    const newVal   = !current;

    $.ajax({
        url: btn.data('url'), method: 'PATCH', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify({ is_reversed: newVal }),
        success() {
            btn.data('reversed', newVal ? '1' : '0');
            btn.css('color', newVal ? '#d97706' : '#9ca3af');
            btn.attr('title', newVal ? 'إلغاء العكس' : 'تفعيل كسؤال معكوس');
            // Toggle badge next to question text
            const badge = btn.closest('.question-row').find('.q-display-text').siblings('.badge');
            if (newVal) {
                if (!badge.length) {
                    btn.closest('.question-row').find('.q-display-text').after(
                        `<span class="badge ms-2 rounded-pill"
                               style="background:#fef3c7;color:#92400e;border:1px solid #fcd34d;font-size:.68rem"
                               title="سؤال معكوس: نعم=0 | إلى حد ما=1 | لا=2">⇄ معكوس</span>`
                    );
                }
            } else {
                badge.remove();
            }
            showAlert(newVal ? 'تم تفعيل السؤال المعكوس.' : 'تم إلغاء العكس.', 'success');
        },
        error() { showAlert('فشل تحديث السؤال.', 'danger'); }
    });
});

/* ── Answer Options Management ── */
let currentQuestionId = null;

$(document).on('click', '.btn-manage-options', function () {
    const btn = $(this);
    currentQuestionId = btn.data('id');
    const qText = $(`#q-display-${currentQuestionId}`).text();
    
    $('#modal-q-id').val(currentQuestionId);
    $('#modal-q-text').text(qText);
    
    // Fetch options
    loadOptions();
    
    const modal = new bootstrap.Modal(document.getElementById('optionsModal'));
    modal.show();
});

function loadOptions() {
    $('#options-tbody').html('<tr><td colspan="3" class="text-center text-muted">جاري التحميل...</td></tr>');
    $.ajax({
        url: `/admin/questions/${currentQuestionId}/options`,
        method: 'GET',
        success: function(options) {
            let html = '';
            if (options.length === 0) {
                html = '<tr><td colspan="3" class="text-center text-muted small">لا توجد خيارات لهذا السؤال.</td></tr>';
            } else {
                options.forEach(opt => {
                    html += `
                        <tr data-id="${opt.id}">
                            <td>
                                <span class="opt-label-display">${opt.label_ar}</span>
                                <input type="text" class="form-control form-control-sm opt-label-edit d-none" value="${opt.label_ar}">
                            </td>
                            <td>
                                <span class="opt-score-display">${opt.score_value}</span>
                                <input type="number" class="form-control form-control-sm opt-score-edit d-none" value="${opt.score_value}">
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm opt-actions-view">
                                    <button type="button" class="btn btn-outline-secondary btn-edit-opt" title="تعديل"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-delete-opt" title="حذف"><i class="bi bi-trash"></i></button>
                                </div>
                                <div class="btn-group btn-group-sm opt-actions-edit d-none">
                                    <button type="button" class="btn btn-success btn-save-opt"><i class="bi bi-check2"></i></button>
                                    <button type="button" class="btn btn-secondary btn-cancel-opt"><i class="bi bi-x"></i></button>
                                </div>
                            </td>
                        </tr>
                    `;
                });
            }
            $('#options-tbody').html(html);
        },
        error: function() {
            $('#options-tbody').html('<tr><td colspan="3" class="text-center text-danger">فشل تحميل الخيارات.</td></tr>');
        }
    });
}

$('#add-option-form').on('submit', function(e) {
    e.preventDefault();
    const btn = $(this).find('button[type="submit"]');
    
    const payload = {
        label_ar: $('#add-opt-label').val().trim(),
        score_value: $('#add-opt-score').val()
    };
    
    setLoading(btn, true);
    
    $.ajax({
        url: `/admin/questions/${currentQuestionId}/options`,
        method: 'POST',
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            $('#add-opt-label').val('');
            $('#add-opt-score').val('');
            loadOptions();
            showAlert(res.message, 'success');
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'فشل إضافة الخيار', 'danger');
        }
    });
});

$(document).on('click', '.btn-edit-opt', function() {
    const tr = $(this).closest('tr');
    tr.find('.opt-label-display, .opt-score-display, .opt-actions-view').addClass('d-none');
    tr.find('.opt-label-edit, .opt-score-edit, .opt-actions-edit').removeClass('d-none');
});

$(document).on('click', '.btn-cancel-opt', function() {
    const tr = $(this).closest('tr');
    tr.find('.opt-label-display, .opt-score-display, .opt-actions-view').removeClass('d-none');
    tr.find('.opt-label-edit, .opt-score-edit, .opt-actions-edit').addClass('d-none');
});

$(document).on('click', '.btn-save-opt', function() {
    const tr = $(this).closest('tr');
    const optId = tr.data('id');
    const btn = $(this);
    
    const payload = {
        label_ar: tr.find('.opt-label-edit').val().trim(),
        score_value: tr.find('.opt-score-edit').val()
    };
    
    const originalHtml = btn.html();
    btn.html('<span class="spinner-border spinner-border-sm"></span>');
    
    $.ajax({
        url: `/admin/options/${optId}`,
        method: 'PUT',
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            btn.html(originalHtml);
            loadOptions();
            showAlert(res.message, 'success');
        },
        error: function(xhr) {
            btn.html(originalHtml);
            showAlert(xhr.responseJSON?.message || 'فشل التحديث', 'danger');
        }
    });
});

$(document).on('click', '.btn-delete-opt', function() {
    const tr = $(this).closest('tr');
    const optId = tr.data('id');
    
    if(!confirm('هل أنت متأكد من حذف هذا الخيار؟')) return;
    
    $.ajax({
        url: `/admin/options/${optId}`,
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            loadOptions();
            showAlert(res.message, 'success');
        }
    });
});

$('#btn-sync-options').on('click', function() {
    if(!confirm('تحذير: سيتم مسح كافة خيارات الإجابة الحالية لجميع الأسئلة الأخرى في هذا المقياس، واستبدالها بالخيارات الحالية لهذا السؤال. هل تريد الاستمرار؟')) return;
    
    const btn = $(this);
    const originalHtml = btn.html();
    btn.html('<i class="bi bi-hourglass-split me-1"></i>جاري التعميم...');
    btn.prop('disabled', true);
    
    $.ajax({
        url: `/admin/questions/${currentQuestionId}/sync-options`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            btn.html(originalHtml);
            btn.prop('disabled', false);
            showAlert(res.message, 'success');
        },
        error: function(xhr) {
            btn.html(originalHtml);
            btn.prop('disabled', false);
            showAlert('حدث خطأ أثناء التعميم.', 'danger');
        }
    });
});


    // Dynamic List Editor Initializer
    window.initDynamicLists = function(container = document) {
        $(container).find('.dynamic-list-data').not('.dynamic-list-initialized').each(function() {
            const $textarea = $(this);
            $textarea.addClass('dynamic-list-initialized d-none');
            const placeholder = $textarea.attr('placeholder') || 'إضافة عنصر جديد...';
            
            // Create UI wrapper
            const $wrapper = $('<div class="dynamic-list-wrapper"></div>');
            const $list = $('<div class="dynamic-list-items mb-2"></div>');
            const $inputGroup = $(`
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control dynamic-list-input" placeholder="${placeholder}">
                    <button type="button" class="btn btn-primary dynamic-list-add"><i class="bi bi-plus"></i> إضافة</button>
                </div>
            `);
            
            $wrapper.append($list).append($inputGroup);
            $textarea.after($wrapper);
            
            // Render initial items
            const val = $textarea.val().trim();
            const items = val ? val.split('\n') : [];
            items.forEach(item => {
                if(item.trim()) addItem(item.trim());
            });
            
            function updateTextarea() {
                const currentItems = [];
                $list.find('.dynamic-list-item-text').each(function() {
                    currentItems.push($(this).text().trim());
                });
                $textarea.val(currentItems.join('\n'));
            }
            
            function addItem(text) {
                const $item = $(`
                    <div class="d-flex justify-content-between align-items-center bg-white border border-light-subtle shadow-sm rounded px-3 py-2 mb-2">
                        <span class="dynamic-list-item-text text-dark fw-medium small"><i class="bi bi-check-circle-fill text-success me-2"></i>${text}</span>
                        <button type="button" class="btn btn-sm text-danger btn-remove-item py-0 px-2 border-0"><i class="bi bi-x-lg"></i></button>
                    </div>
                `);
                $list.append($item);
            }
            
            // Add event
            $inputGroup.find('.dynamic-list-add').on('click', function() {
                const $input = $inputGroup.find('.dynamic-list-input');
                const newText = $input.val().trim();
                if (newText) {
                    addItem(newText);
                    updateTextarea();
                    $input.val('');
                    $input.focus();
                }
            });
            
            $inputGroup.find('.dynamic-list-input').on('keypress', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    $inputGroup.find('.dynamic-list-add').click();
                }
            });
            
            // Remove event
            $list.on('click', '.btn-remove-item', function() {
                $(this).closest('div').remove();
                updateTextarea();
            });
        });
    };

    $(document).ready(function() {
        window.initDynamicLists();
    });
</script>
@endpush
````

## File: resources/views/admin/graded_exams/index.blade.php
````php
@extends('layouts.admin')
@section('title', 'إدارة الشهادات والوحدات')
@section('page-title', 'إدارة الشهادات والوحدات')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">الشهادات الاحترافية</h5>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addExamModal">
        <i class="bi bi-plus-circle me-1"></i>إضافة شهادة جديدة
    </button>
</div>

<div class="row">
    @foreach($exams as $exam)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title fw-bold text-primary mb-0">{{ $exam->title_ar }}</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu shadow-sm text-end">
                            <li><a class="dropdown-item btn-edit-exam" href="#" data-id="{{ $exam->id }}" data-title="{{ $exam->title_ar }}" data-desc="{{ $exam->description_ar }}" data-time="{{ $exam->time_limit_min }}" data-active="{{ $exam->is_active ? 1 : 0 }}"><i class="bi bi-pencil me-2"></i>تعديل الشهادة</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger btn-delete-exam" href="#" data-url="{{ route('admin.graded_exams.destroy', $exam->id) }}"><i class="bi bi-trash me-2"></i>حذف الشهادة</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-muted small mb-3" style="min-height: 40px;">{{ $exam->description_ar ?: 'لا يوجد وصف' }}</p>
                
                <div class="d-flex justify-content-between mb-3 small">
                    <span class="text-muted"><i class="bi bi-journal-text me-1"></i>{{ $exam->units_count }} وحدة</span>
                    <span class="text-muted"><i class="bi bi-question-circle me-1"></i>{{ $exam->questions_count }} سؤال</span>
                    <span class="badge {{ $exam->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $exam->is_active ? 'مفعل' : 'معطل' }}</span>
                </div>
                
                <hr>
                
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0 fw-semibold text-secondary" style="font-size: 0.85rem;">الوحدات الدراسية</h6>
                    <div>
                        <button class="btn btn-sm btn-outline-secondary py-0 px-2 btn-settings me-1" data-id="{{ $exam->id }}" style="font-size: 0.75rem;">
                            <i class="bi bi-sliders"></i> إعدادات
                        </button>
                        <button class="btn btn-sm btn-outline-primary py-0 px-2 btn-add-unit" data-id="{{ $exam->id }}" style="font-size: 0.75rem;">
                            <i class="bi bi-plus"></i> إضافة وحدة
                        </button>
                    </div>
                </div>
                
                <div class="list-group list-group-flush small" style="max-height: 200px; overflow-y: auto;">
                    @forelse($exam->units as $unit)
                        <div class="list-group-item px-1 py-2 d-flex justify-content-between align-items-center">
                            <span class="text-truncate" title="{{ $unit->title_ar }}">{{ $unit->title_ar }}</span>
                            <div>
                                <button class="btn btn-sm text-primary p-0 mx-1 btn-edit-unit" data-id="{{ $unit->id }}" data-title="{{ $unit->title_ar }}" data-url="{{ route('admin.graded_exams.units.update', $unit->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm text-danger p-0 btn-delete-unit" data-url="{{ route('admin.graded_exams.units.destroy', $unit->id) }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted small py-2">لا توجد وحدات</div>
                    @endforelse
                </div>
                
            </div>
            <div class="card-footer bg-white border-top-0 pt-0 d-flex flex-column gap-2">
                <a href="{{ route('admin.graded_exams.questions.index', ['graded_exam_id' => $exam->id]) }}" class="btn btn-light btn-sm w-100">
                    <i class="bi bi-gear me-1"></i>إدارة بنك أسئلة الشهادة
                </a>
                <a href="{{ route('admin.graded_exams.preview', $exam->id) }}" class="btn btn-outline-primary btn-sm w-100">
                    <i class="bi bi-play-circle me-1"></i>اختبار الأسئلة (Preview)
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Add/Edit Exam Modal -->
<div class="modal fade" id="examModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="examModalTitle">إضافة شهادة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="e-id">
                <div class="mb-3">
                    <label class="form-label small fw-medium">اسم الشهادة *</label>
                    <input type="text" class="form-control" id="e-title">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">الوصف</label>
                    <textarea class="form-control" id="e-desc" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-medium">مدة الاختبار (بالدقائق)</label>
                    <input type="number" class="form-control" id="e-time-limit" min="1" value="60" placeholder="مثال: 60 لساعة واحدة">
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="e-active" checked>
                    <label class="form-check-label small" for="e-active">مفعلة وتظهر للمستخدمين</label>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-exam">حفظ</button>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Unit Modal -->
<div class="modal fade" id="unitModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="unitModalTitle">إضافة وحدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="u-exam-id">
                <input type="hidden" id="u-id">
                <input type="hidden" id="u-url">
                <div class="mb-3">
                    <label class="form-label small fw-medium">اسم الوحدة *</label>
                    <input type="text" class="form-control" id="u-title">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-unit">حفظ</button>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إعدادات وضوابط الامتحان</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="s-exam-id">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">إجمالي الأسئلة في الجلسة</label>
                        <input type="number" class="form-control form-control-sm" id="s-total" min="1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">حد أسئلة "متعدد الإجابات"</label>
                        <input type="number" class="form-control form-control-sm" id="s-max-multi" min="0">
                    </div>
                    
                    <div class="col-12 mt-4 mb-1">
                        <h6 class="fw-semibold text-primary" style="font-size:0.85rem">نسبة الصعوبة المطلوبة (%)</h6>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">سهل</label>
                        <input type="number" class="form-control form-control-sm pct-input" id="s-easy" min="0" max="100">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">متوسط</label>
                        <input type="number" class="form-control form-control-sm pct-input" id="s-medium" min="0" max="100">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">صعب</label>
                        <input type="number" class="form-control form-control-sm pct-input" id="s-hard" min="0" max="100">
                    </div>
                    
                    <div class="col-12 text-center mt-1">
                        <span id="s-total-pct" class="badge bg-secondary">المجموع: 100%</span>
                    </div>

                    <div class="col-12 mt-3 mb-1">
                        <h6 class="fw-semibold text-primary" style="font-size:0.85rem">قيود التكرار (لتجنب الأنماط)</h6>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">أقصى تكرار لنفس موقع الإجابة</label>
                        <input type="number" class="form-control form-control-sm" id="s-max-ans" min="0" placeholder="مثال: 3">
                        <div class="form-text" style="font-size:0.7rem">ضع 0 للتعطيل</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">أقصى تكرار من نفس الوحدة</label>
                        <input type="number" class="form-control form-control-sm" id="s-max-unit" min="0" placeholder="مثال: 4">
                        <div class="form-text" style="font-size:0.7rem">ضع 0 للتعطيل</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-settings">حفظ الإعدادات</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Exam Logic
let isExamEdit = false;

$('[data-bs-target="#addExamModal"]').on('click', function() {
    isExamEdit = false;
    $('#examModalTitle').text('إضافة شهادة جديدة');
    $('#e-id').val('');
    $('#e-title').val('');
    $('#e-desc').val('');
    $('#e-time-limit').val('60'); // Default to 60 minutes
    $('#e-active').prop('checked', true);
    new bootstrap.Modal(document.getElementById('examModal')).show();
});

$('.btn-edit-exam').on('click', function(e) {
    e.preventDefault();
    isExamEdit = true;
    $('#examModalTitle').text('تعديل الشهادة');
    $('#e-id').val($(this).data('id'));
    $('#e-title').val($(this).data('title'));
    $('#e-desc').val($(this).data('desc'));
    $('#e-time-limit').val($(this).data('time'));
    $('#e-active').prop('checked', $(this).data('active') == 1);
    new bootstrap.Modal(document.getElementById('examModal')).show();
});

$('#btn-save-exam').on('click', function() {
    const id = $('#e-id').val();
    const payload = {
        title_ar: $('#e-title').val().trim(),
        description_ar: $('#e-desc').val().trim(),
        time_limit_min: $('#e-time-limit').val() ? parseInt($('#e-time-limit').val()) : null,
        is_active: $('#e-active').is(':checked') ? 1 : 0
    };
    
    if(!payload.title_ar) {
        showAlert('اسم الشهادة مطلوب', 'warning');
        return;
    }
    
    const url = isExamEdit ? `{{ url('admin/graded-exams') }}/${id}` : `{{ route('admin.graded_exams.store') }}`;
    const method = isExamEdit ? 'PUT' : 'POST';
    
    const btn = $(this);
    setLoading(btn, true);
    
    $.ajax({
        url: url,
        method: method,
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1000);
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert('خطأ أثناء الحفظ', 'danger');
        }
    });
});

$('.btn-delete-exam').on('click', function(e) {
    e.preventDefault();
    confirmDelete('سيتم حذف الشهادة. هل أنت متأكد؟', $(this).data('url'), () => location.reload());
});


// Unit Logic
let isUnitEdit = false;

$('.btn-add-unit').on('click', function() {
    isUnitEdit = false;
    $('#unitModalTitle').text('إضافة وحدة جديدة');
    $('#u-exam-id').val($(this).data('id'));
    $('#u-id').val('');
    $('#u-title').val('');
    new bootstrap.Modal(document.getElementById('unitModal')).show();
});

$('.btn-edit-unit').on('click', function(e) {
    e.preventDefault();
    isUnitEdit = true;
    $('#unitModalTitle').text('تعديل الوحدة');
    $('#u-id').val($(this).data('id'));
    $('#u-title').val($(this).data('title'));
    $('#u-url').val($(this).data('url'));
    new bootstrap.Modal(document.getElementById('unitModal')).show();
});

$('#btn-save-unit').on('click', function() {
    const title = $('#u-title').val().trim();
    if(!title) {
        showAlert('اسم الوحدة مطلوب', 'warning');
        return;
    }
    
    const examId = $('#u-exam-id').val();
    const updateUrl = $('#u-url').val();
    
    const url = isUnitEdit ? updateUrl : `{{ url('admin/graded-exams') }}/${examId}/units`;
    const method = isUnitEdit ? 'PUT' : 'POST';
    
    const btn = $(this);
    setLoading(btn, true);
    
    $.ajax({
        url: url,
        method: method,
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify({ title_ar: title }),
        success: function(res) {
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1000);
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert('خطأ أثناء الحفظ', 'danger');
        }
    });
});

$('.btn-delete-unit').on('click', function(e) {
    e.preventDefault();
    confirmDelete('هل أنت متأكد من حذف هذه الوحدة؟', $(this).data('url'), () => location.reload());
});

// Settings Logic
$('.btn-settings').on('click', function() {
    const examId = $(this).data('id');
    $('#s-exam-id').val(examId);
    
    const btn = $(this);
    setLoading(btn, true);
    
    $.get(`{{ url('admin/graded-exams') }}/${examId}/settings`, function(res) {
        setLoading(btn, false);
        if(res.success) {
            $('#s-total').val(res.settings.total_questions);
            $('#s-max-multi').val(res.settings.max_multi_correct_questions);
            $('#s-easy').val(parseFloat(res.settings.easy_percentage));
            $('#s-medium').val(parseFloat(res.settings.medium_percentage));
            $('#s-hard').val(parseFloat(res.settings.hard_percentage));
            $('#s-max-ans').val(res.settings.max_consecutive_same_answer || 0);
            $('#s-max-unit').val(res.settings.max_consecutive_same_unit || 0);
            updatePctBadge();
            new bootstrap.Modal(document.getElementById('settingsModal')).show();
        }
    }).fail(function() {
        setLoading(btn, false);
        showAlert('خطأ في جلب الإعدادات', 'danger');
    });
});

$('.pct-input').on('input', updatePctBadge);

function updatePctBadge() {
    const easy = parseFloat($('#s-easy').val()) || 0;
    const med = parseFloat($('#s-medium').val()) || 0;
    const hard = parseFloat($('#s-hard').val()) || 0;
    const total = easy + med + hard;
    
    const badge = $('#s-total-pct');
    badge.text(`المجموع: ${total}%`);
    
    if(Math.abs(total - 100) > 0.01) {
        badge.removeClass('bg-secondary bg-success').addClass('bg-danger');
    } else {
        badge.removeClass('bg-secondary bg-danger').addClass('bg-success');
    }
}

$('#btn-save-settings').on('click', function() {
    const examId = $('#s-exam-id').val();
    
    const payload = {
        total_questions: parseInt($('#s-total').val()) || 0,
        max_multi_correct_questions: parseInt($('#s-max-multi').val()) || 0,
        easy_percentage: parseFloat($('#s-easy').val()) || 0,
        medium_percentage: parseFloat($('#s-medium').val()) || 0,
        hard_percentage: parseFloat($('#s-hard').val()) || 0,
        max_consecutive_same_answer: parseInt($('#s-max-ans').val()) || null,
        max_consecutive_same_unit: parseInt($('#s-max-unit').val()) || null,
    };
    
    if(Math.abs((payload.easy_percentage + payload.medium_percentage + payload.hard_percentage) - 100) > 0.01) {
        showAlert('يجب أن يكون مجموع النسب 100% تماماً', 'warning');
        return;
    }
    
    const btn = $(this);
    setLoading(btn, true);
    
    $.ajax({
        url: `{{ url('admin/graded-exams') }}/${examId}/settings`,
        method: 'PUT',
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            showAlert(res.message, 'success');
            bootstrap.Modal.getInstance(document.getElementById('settingsModal')).hide();
        },
        error: function(xhr) {
            setLoading(btn, false);
            const msg = xhr.responseJSON?.message || 'خطأ أثناء الحفظ';
            showAlert(msg, 'danger');
        }
    });
});

</script>
@endpush
````

## File: resources/views/user/result.blade.php
````php
@extends('layouts.user')
@section('title', 'تقرير نتيجة المقياس - ' . (is_array($assessment) ? $assessment['title_ar'] : $assessment->title_ar))

@push('styles')
<link href="{{ asset('css/report-pdf.css') }}?v={{ filemtime(public_path('css/report-pdf.css')) }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endpush

@section('content')
@php
    // 1. Recover Eloquent Models from Session
    $assessmentObj = $session->assessment;
    $resObj = $session->result;
    $recObj = $assessmentObj->recommendations()->where('level', $resObj->level)->first();

    // 2. Map basic variables
    $pct = $max_score > 0 ? round($total_score / $max_score * 100) : 0;
    
    $lvlData = [
        'excellent' => ['label' => 'متميز', 'degree' => 'متميز'],
        'advanced'  => ['label' => 'متقدم', 'degree' => 'متقدم'],
        'good'      => ['label' => 'جيد', 'degree' => 'جيد'],
        'average'   => ['label' => 'متوسط', 'degree' => 'متوسط'],
        'weak'      => ['label' => 'ضعيف', 'degree' => 'ضعيف'],
        'high'   => ['label' => 'متميز', 'degree' => 'متميز'],
        'medium' => ['label' => 'جيد', 'degree' => 'جيد'],
        'low'    => ['label' => 'ضعيف', 'degree' => 'ضعيف'],
    ];

    $isHighestDimension = $assessmentObj->scoring_type === 'highest_dimension';
    if ($isHighestDimension) {
        $highestLabel = $level;
        if (empty(trim($highestLabel))) {
            $highestScore = -1;
            foreach ($resObj->dimensionScores as $ds) {
                if ($ds->score > $highestScore) {
                    $highestScore = $ds->score;
                    $highestLabel = trim(str_replace('محور', '', $ds->dimension->name_ar));
                }
            }
        }
        $mainLvl = ['label' => $highestLabel, 'degree' => $highestLabel];
        
        // Define levelKey based on the overall percentage score to align color themes (Green/Yellow/Red) with the gauge and progress bar
        if ($pct >= 70) $levelKey = 'high';
        elseif ($pct >= 40) $levelKey = 'medium';
        else $levelKey = 'low';
    } else {
        $levelKey = $resObj->level ?? $level ?? 'medium';
        if (!array_key_exists($levelKey, $lvlData)) {
            if ($pct >= 70) $levelKey = 'high';
            elseif ($pct >= 40) $levelKey = 'medium';
            else $levelKey = 'low';
        }
        $mainLvl = $lvlData[$levelKey];
    }

    // 3. Strengths & Weaknesses
    $strengths = [];
    $weaknesses = [];
    foreach($resObj->dimensionScores as $ds) {
        $ds_score_pct = $ds->max_score > 0 ? round(($ds->score / $ds->max_score) * 100) : 0;
        if (in_array($ds->level, ['excellent', 'advanced', 'high']) || $ds_score_pct >= 60) {
            $strengths[] = (object)['title' => $ds->dimension->name_ar, 'desc' => 'تمتلك قدرة عالية في هذا الجانب.'];
        } elseif (in_array($ds->level, ['weak', 'low']) || $ds_score_pct < 40) {
            $weaknesses[] = (object)['title' => $ds->dimension->name_ar, 'desc' => 'تحتاج إلى تطوير واهتمام لتحسين الأداء.'];
        } else {
            $weaknesses[] = (object)['title' => $ds->dimension->name_ar, 'desc' => 'فرصة لتعزيز وتنمية المهارة.'];
        }
    }

    // 4. Recommendation text parsing
    $parsedRecommendation = '';
    $improvementPoints = [];
    if ($recObj && !empty($recObj->description_ar)) {
        $text = strip_tags(Str::markdown($recObj->description_ar));
        if (mb_strpos($text, ':') !== false) {
            $parts = explode(':', $text, 2);
            if (mb_strlen($parts[0]) < 100 && (mb_strpos($parts[0], 'درجة') !== false || mb_strpos($parts[0], 'مستوى') !== false)) {
                $text = trim($parts[1]);
            }
        }
        $introWords = ['تشير نتيجتك', 'تشير نتائجك', 'أنت مستثمر'];
        foreach($introWords as $iw) {
            $pos = mb_strpos($text, $iw);
            if ($pos !== false && $pos < 50) {
                $text = $iw . explode($iw, $text, 2)[1];
                break;
            }
        }
        if (!empty($text) && !in_array(mb_substr(trim($text), -1), ['.', '!', '؟', ':'])) {
            $text = trim($text) . '.';
        } else {
            $text = trim($text);
        }
        $parsedRecommendation = $text;
    }
    // 5. Lists (Certificates, Programs, Roadmap)
    // Convert arrays to objects for the views to consume seamlessly
    $certs = json_decode(json_encode($certificates ?? []));
    $progs = json_decode(json_encode($programs ?? []));
    $planSteps = $roadmap ?? [];

    $tempPlanSteps = json_decode(json_encode($planSteps), true);
    $planSteps = [];
    if (!empty($tempPlanSteps)) {
        foreach($tempPlanSteps as $k => $step) {
            if(is_array($step)) {
                $planSteps[] = (object)[
                    'period' => $step['period'] ?? ('الخطوة ' . ($k + 1)),
                    'title' => $step['title'] ?? '',
                    'icon' => $step['icon'] ?? 'bi-calendar-check',
                ];
            } else if (is_string($step)) {
                $planSteps[] = (object)[
                    'period' => 'الخطوة ' . ($k + 1),
                    'title' => $step,
                    'icon' => 'bi-calendar-check',
                ];
            }
        }
    }

    $radarLabels = $chart_data['labels'] ?? [];
    $radarData = $chart_data['data'] ?? [];

    // Replace the global $assessment array with the Object!
    $assessment = $assessmentObj;
    $result = $resObj;

    // Calculate colors based on result level
    $circleColor = '#1a2b56';
    $lc = 'primary'; 
    if (isset($levelKey)) {
        if ($levelKey === 'high' || $levelKey === 'excellent' || $levelKey === 'advanced') {
            $circleColor = '#22c55e';
            $lc = 'success';
        } elseif ($levelKey === 'medium' || $levelKey === 'good' || $levelKey === 'average') {
            $circleColor = '#f59e0b';
            $lc = 'warning';
        } elseif ($levelKey === 'low' || $levelKey === 'poor' || $levelKey === 'weak') {
            $circleColor = '#ef4444';
            $lc = 'danger';
        }
    } else {
        // For highest_dimension scoring (e.g. Leadership Style)
        $lbl = $mainLvl['label'] ?? '';
        if (mb_strpos($lbl, 'ديمقراط') !== false || mb_strpos($lbl, 'متميز') !== false || mb_strpos($lbl, 'مرتفع') !== false) {
            $circleColor = '#22c55e';
            $lc = 'success';
        } elseif (mb_strpos($lbl, 'أوتوقراط') !== false || mb_strpos($lbl, 'تسلط') !== false || mb_strpos($lbl, 'ضعيف') !== false || mb_strpos($lbl, 'منخفض') !== false) {
            $circleColor = '#ef4444';
            $lc = 'danger';
        } else {
            $circleColor = '#f59e0b';
            $lc = 'warning';
        }
    }
@endphp


<div class="infographic-report">
    <!-- ==================== PAGE 1 ==================== -->
    <div class="a4-page">
        
        <!-- Header -->
        <div class="report-header px-4 pt-3">
            <div class="header-logo">
                <img src="{{ asset('images/logo.png') }}" alt="dar al rouaa" style="height: 50px; filter: brightness(0) invert(1); margin: 0;">
            </div>
            <div class="header-badge">
                <i class="bi bi-patch-check-fill me-1"></i> تقرير احترافي مدعوم بالتحليل العلمي
            </div>
        </div>

        <div class="text-center mt-3 px-4">
            <h1 class="report-main-title mb-2">تقرير نتائج {{ $assessment->title_ar }}</h1>
            <p class="report-subtitle mb-0">{{ $assessment->subtitle_ar ?? 'تقرير احترافي يساعدك على فهم نتائجك واتخاذ قرارات تطوير أكثر وضوحاً.' }}</p>
        </div>

        <div class="page-padding mt-4">
            
            <!-- Metadata - Print View Only (1x3 Grid) -->
            <div class="d-none d-print-block print-metadata-wrapper mb-4">
                <table class="print-metadata-table w-100">
                    <tr>
                        <td style="width: 33.33%; border-left: 1px solid rgba(8, 145, 178, 0.08) !important;">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="print-meta-icon print-meta-solid"><i class="bi bi-person-fill"></i></div>
                                <div class="ms-3 text-end">
                                    <div class="print-meta-label">المستفيد</div>
                                    <div class="print-meta-value">{{ auth()->user()?->name ?? 'معاينة بالنظام' }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="width: 33.33%; border-left: 1px solid rgba(8, 145, 178, 0.08) !important;">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="print-meta-icon print-meta-soft"><i class="bi bi-calendar3-fill"></i></div>
                                <div class="ms-3 text-end">
                                    <div class="print-meta-label">تاريخ التنفيذ</div>
                                    <div class="print-meta-value">{{ \Carbon\Carbon::parse($result->created_at ?? $result->calculated_at ?? now())->format('d M Y') }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="width: 33.33%;">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="print-meta-icon print-meta-soft"><i class="bi bi-clipboard-fill"></i></div>
                                <div class="ms-3 text-end">
                                    <div class="print-meta-label">رقم التقرير</div>
                                    <div class="print-meta-value">{{ !empty($assessment->report_code) ? strtoupper($assessment->report_code) : 'REP' }}-{{ strtoupper(substr($result->id, 0, 8)) }}</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Metadata - Screen View Only (3 horizontal cards with vertical dividers) -->
            <div class="meta-container-card mb-4 d-print-none">
                <div class="row g-0 align-items-center">
                    <div class="col-4 py-2 border-left-divider">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center text-center">
                            <div class="meta-icon-box meta-icon-solid mb-2 mb-sm-0"><i class="bi bi-person-fill"></i></div>
                            <div class="text-sm-end ms-sm-3">
                                <div class="meta-label">المستفيد</div>
                                <div class="meta-value" style="font-size: 0.8rem; white-space: normal;">{{ auth()->user()?->name ?? 'معاينة بالنظام' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 py-2 border-left-divider">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center text-center">
                            <div class="meta-icon-box meta-icon-soft mb-2 mb-sm-0"><i class="bi bi-calendar3-fill"></i></div>
                            <div class="text-sm-end ms-sm-3">
                                <div class="meta-label">تاريخ التنفيذ</div>
                                <div class="meta-value" style="font-size: 0.8rem; white-space: normal;">{{ \Carbon\Carbon::parse($result->created_at ?? $result->calculated_at ?? now())->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 py-2">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center text-center">
                            <div class="meta-icon-box meta-icon-soft mb-2 mb-sm-0"><i class="bi bi-clipboard-fill"></i></div>
                            <div class="text-sm-end ms-sm-3">
                                <div class="meta-label">رقم التقرير</div>
                                <div class="meta-value" style="font-size: 0.8rem; white-space: normal;">{{ !empty($assessment->report_code) ? strtoupper($assessment->report_code) : 'REP' }}-{{ strtoupper(substr($result->id, 0, 8)) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($assessmentObj->scoring_type === 'perceptual_styles')
            @php
                $styleScores = ['visual' => 0, 'auditory' => 0, 'kinesthetic' => 0];
                foreach($resObj->dimensionScores as $ds) {
                    $n = $ds->dimension->name_ar;
                    if (mb_strpos($n, 'بصري') !== false) $styleScores['visual'] = $ds->score;
                    elseif (mb_strpos($n, 'سمعي') !== false) $styleScores['auditory'] = $ds->score;
                    elseif (mb_strpos($n, 'حسي') !== false) $styleScores['kinesthetic'] = $ds->score;
                }

                $recTitle = $recObj?->title_ar ?? $recommendation_title ?? 'النمط الإدراكي الغالب';
                $recDesc = $recObj?->description_ar ?? (!empty($parsedRecommendation) ? $parsedRecommendation : '');

                $howToLearn = is_array($recObj?->how_to_learn_ar) && !empty($recObj->how_to_learn_ar) 
                    ? $recObj->how_to_learn_ar 
                    : (!empty($how_to_learn) && is_array($how_to_learn) ? $how_to_learn : []);

                $strengthsData = is_array($recObj?->strengths_ar) && !empty($recObj->strengths_ar) 
                    ? $recObj->strengths_ar 
                    : (isset($strengths_list) && is_array($strengths_list) ? $strengths_list : []);

                $devAreasData = is_array($recObj?->development_areas_ar) && !empty($recObj->development_areas_ar) 
                    ? $recObj->development_areas_ar 
                    : (!empty($development_areas) && is_array($development_areas) ? $development_areas : []);

                $practicalTips = is_array($recObj?->practical_tips_ar) && !empty($recObj->practical_tips_ar) 
                    ? $recObj->practical_tips_ar 
                    : (!empty($practical_tips) && is_array($practical_tips) ? $practical_tips : []);

                $progsData = is_array($recObj?->programs_ar) && !empty($recObj->programs_ar) 
                    ? $recObj->programs_ar 
                    : (!empty($programs) && is_array($programs) ? $programs : []);

                $progsIntro = $recObj?->programs_intro_ar ?? $programs_intro ?? 'البرامج التدريبية المقترحة لك';
                $progsOutro = $recObj?->programs_outro_ar ?? $programs_outro ?? '';

                $parseStringItem = function($val) {
                    if (is_object($val)) {
                        return $val->title ?? $val->name ?? $val->desc ?? '';
                    }
                    if (is_array($val)) {
                        return $val['title'] ?? $val['name'] ?? $val['desc'] ?? '';
                    }
                    return (string) $val;
                };

                // Main icon for dominant style
                $mainIcon = 'bi-brain';
                if (mb_strpos($recTitle, 'بصري') !== false && mb_strpos($recTitle, 'سمعي') === false && mb_strpos($recTitle, 'حسي') === false) {
                    $mainIcon = 'bi-eye-fill';
                } elseif (mb_strpos($recTitle, 'سمعي') !== false && mb_strpos($recTitle, 'بصري') === false && mb_strpos($recTitle, 'حسي') === false) {
                    $mainIcon = 'bi-headphones';
                } elseif (mb_strpos($recTitle, 'حسي') !== false && mb_strpos($recTitle, 'بصري') === false && mb_strpos($recTitle, 'سمعي') === false) {
                    $mainIcon = 'bi-hand-index-thumb-fill';
                } elseif (mb_strpos($recTitle, 'متوازن') !== false) {
                    $mainIcon = 'bi-diagram-3-fill';
                } else {
                    $mainIcon = 'bi-intersect';
                }
            @endphp

            <!-- Perceptual Styles Custom Report View -->
            <div class="perceptual-styles-report">
                
                <!-- Main Style Summary Banner -->
                <div class="row g-4 mb-4 align-items-stretch">
                    <!-- Dominant Style Info Card -->
                    <div class="col-md-7 col-12 d-flex">
                        <div class="main-score-card w-100 p-4 d-flex flex-column justify-content-between border-0 shadow-sm rounded-4" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); color: #ffffff;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-bold" style="font-size: 0.8rem;">
                                        <i class="bi bi-star-fill text-warning me-1"></i> النمط الإدراكي الغالب لديك
                                    </span>
                                </div>
                                <div class="fs-2 text-warning"><i class="bi {{ $mainIcon }}"></i></div>
                            </div>

                            <div class="my-2">
                                <h2 class="fw-extrabold text-white mb-2" style="font-size: 1.8rem; font-family: 'Tajawal', sans-serif;">{{ $recTitle }}</h2>
                                <p class="text-light opacity-90 lh-base mb-0" style="font-size: 0.92rem; text-align: justify;">
                                    {{ $recDesc }}
                                </p>
                            </div>

                            <div class="d-flex align-items-center justify-content-between pt-3 mt-2 border-top border-white border-opacity-10">
                                <div class="small text-light opacity-75">مقياس ثلاثي الأنماط المعيارية (20 درجة لكل نمط)</div>
                                <div class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold fs-6">
                                    <i class="bi bi-check-circle-fill me-1"></i> تشخيص مؤكد
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Scores Breakdown Card -->
                    <div class="col-md-5 col-12 d-flex">
                        <div class="card w-100 p-4 border-0 shadow-sm rounded-4 d-flex flex-column justify-content-between" style="background: #ffffff;">
                            <h5 class="fw-bold text-darkblue mb-3">
                                <i class="bi bi-bar-chart-steps text-primary me-2"></i> درجاتك في الأنماط الإدراكية
                            </h5>

                            <div class="d-flex flex-column gap-3 my-auto">
                                <!-- Visual -->
                                <div class="style-progress-item p-3 rounded-3" style="background: #f0f7ff; border: 1px solid #dbeafe;">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="fw-bold text-navy"><i class="bi bi-eye-fill text-primary me-2"></i> النمط البصري</span>
                                        <span class="fw-extrabold text-primary">{{ $styleScores['visual'] }} / 20</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background-color: #dbeafe; border-radius: 10px;">
                                        <div class="progress-bar bg-primary rounded-pill" style="width: {{ round(($styleScores['visual'] / 20) * 100) }}%;"></div>
                                    </div>
                                </div>

                                <!-- Auditory -->
                                <div class="style-progress-item p-3 rounded-3" style="background: #f0fdf4; border: 1px solid #dcfce7;">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="fw-bold text-navy"><i class="bi bi-headphones text-success me-2"></i> النمط السمعي</span>
                                        <span class="fw-extrabold text-success">{{ $styleScores['auditory'] }} / 20</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background-color: #dcfce7; border-radius: 10px;">
                                        <div class="progress-bar bg-success rounded-pill" style="width: {{ round(($styleScores['auditory'] / 20) * 100) }}%;"></div>
                                    </div>
                                </div>

                                <!-- Kinesthetic -->
                                <div class="style-progress-item p-3 rounded-3" style="background: #fffbebfb; border: 1px solid #fef3c7;">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="fw-bold text-navy"><i class="bi bi-hand-index-thumb-fill text-warning me-2"></i> النمط الحسي (العملي)</span>
                                        <span class="fw-extrabold text-warning-emphasis">{{ $styleScores['kinesthetic'] }} / 20</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background-color: #fef3c7; border-radius: 10px;">
                                        <div class="progress-bar bg-warning rounded-pill" style="width: {{ round(($styleScores['kinesthetic'] / 20) * 100) }}%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- How to Learn Best Section -->
                @if(!empty($howToLearn))
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #ffffff;">
                    <h5 class="fw-bold text-darkblue mb-3">
                        <i class="bi bi-lightbulb-fill text-warning me-2"></i> كيف تتعلم بشكل أفضل؟
                    </h5>
                    <div class="row g-3">
                        @foreach($howToLearn as $item)
                        <div class="col-md-6 col-12">
                            <div class="d-flex align-items-center p-3 rounded-3 h-100" style="background: #f8fafc; border: 1px solid #f1f5f9;">
                                <div class="badge bg-primary-subtle text-primary rounded-circle p-2 me-3" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="bi bi-check2-circle fs-5"></i>
                                </div>
                                <span class="fw-semibold text-dark fs-6" style="line-height: 1.4;">{{ $parseStringItem($item) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Strengths & Development Areas Side-by-Side -->
                <div class="row g-4 mb-4">
                    <!-- Strengths -->
                    @if(!empty($strengthsData))
                    <div class="col-md-6 col-12 d-flex">
                        <div class="card w-100 border-0 shadow-sm rounded-4 p-4" style="background: #ffffff; border-top: 4px solid #10b981 !important;">
                            <h5 class="fw-bold text-success mb-3">
                                <i class="bi bi-patch-check-fill me-2"></i> نقاط القوة لديك
                            </h5>
                            <div class="d-flex flex-column gap-2">
                                @foreach($strengthsData as $s)
                                <div class="d-flex align-items-start p-2 rounded-2" style="background: #f0fdf4;">
                                    <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                    <span class="fw-medium text-dark small" style="line-height: 1.5;">{{ $parseStringItem($s) }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Development Areas -->
                    @if(!empty($devAreasData))
                    <div class="col-md-6 col-12 d-flex">
                        <div class="card w-100 border-0 shadow-sm rounded-4 p-4" style="background: #ffffff; border-top: 4px solid #f59e0b !important;">
                            <h5 class="fw-bold text-warning-emphasis mb-3">
                                <i class="bi bi-graph-up-arrow me-2"></i> الجوانب التي يمكن تطويرها
                            </h5>
                            <div class="d-flex flex-column gap-2">
                                @foreach($devAreasData as $d)
                                <div class="d-flex align-items-start p-2 rounded-2" style="background: #fffbeb;">
                                    <i class="bi bi-arrow-up-right-circle-fill text-warning me-2 mt-1"></i>
                                    <span class="fw-medium text-dark small" style="line-height: 1.5;">{{ $parseStringItem($d) }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Suggested Training Programs -->
                @if(!empty($progsData))
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #ffffff;">
                    <h5 class="fw-bold text-darkblue mb-1">
                        <i class="bi bi-journal-bookmark-fill text-primary me-2"></i> البرامج التدريبية المقترحة لك
                    </h5>
                    @if($progsIntro)
                    <p class="text-muted small mb-3">{{ $progsIntro }}</p>
                    @endif
                    <div class="row g-3">
                        @foreach($progsData as $prog)
                        @php
                            $pTitle = $parseStringItem($prog);
                            $pIcon = is_array($prog) ? ($prog['icon'] ?? 'bi-book') : (is_object($prog) ? ($prog->icon ?? 'bi-book') : 'bi-book');
                        @endphp
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="p-3 rounded-3 h-100 d-flex align-items-center gap-3 border shadow-2hover" style="background: #f8fafc; border-color: #e2e8f0 !important; transition: all 0.2s;">
                                <div class="rounded-circle p-2 bg-white text-primary shadow-sm flex-shrink-0" style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                                    <i class="bi {{ $pIcon }}"></i>
                                </div>
                                <span class="fw-bold text-navy small" style="line-height: 1.3;">{{ $pTitle }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($progsOutro)
                    <div class="alert alert-light border border-opacity-50 mt-3 mb-0 text-muted small text-center rounded-3" style="background: #f8fafc;">
                        <i class="bi bi-info-circle text-primary me-1"></i> {{ $progsOutro }}
                    </div>
                    @endif
                </div>
                @endif

                <!-- Practical Tips Section -->
                @if(!empty($practicalTips))
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-2" style="background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%); border: 1px solid #dbeafe !important;">
                    <h5 class="fw-bold text-darkblue mb-3">
                        <i class="bi bi-gear-wide-connected text-primary me-2"></i> نصائح عملية لك
                    </h5>
                    <div class="row g-3">
                        @foreach($practicalTips as $tip)
                        <div class="col-md-6 col-12">
                            <div class="d-flex align-items-start p-3 bg-white rounded-3 border shadow-sm">
                                <i class="bi bi-shield-check text-primary fs-5 me-2 mt-0"></i>
                                <span class="fw-semibold text-dark small" style="line-height: 1.4;">{{ $parseStringItem($tip) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
            @else
            <!-- Score & Summary side-by-side row -->
            <div class="row g-4 mb-4 align-items-start score-summary-row">
                <!-- Score Card -->
                <div class="col-md-6 col-12 d-flex">
                    <div class="main-score-card w-100 p-4 d-flex flex-column justify-content-between">
                        <!-- Card Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-section-title mb-0">النتيجة العامة</h4>
                            <div class="card-section-icon"><i class="bi bi-award"></i></div>
                        </div>

                        <div class="row align-items-center">
                            <!-- Gauge -->
                            <div class="col-sm-5 col-5 text-center py-2 d-flex justify-content-center align-items-center">
                                <div class="rounded-circle d-flex justify-content-center align-items-center shadow-sm score-gauge-wrapper" 
                                     style="width: 120px; height: 120px; background: conic-gradient({{ $circleColor }} 0% {{ $pct }}%, #f3f4f6 {{ $pct }}% 100%); padding: 9px; position: relative;">
                                    <div class="rounded-circle bg-white d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 100%;">
                                        <span style="font-size: 1.9rem; font-weight: 900; color: #1a2b56; line-height: 1;">{{ $pct }}%</span>
                                        <span style="font-size: 0.58rem; color: #64748b; font-weight: bold; margin-top: 4px; white-space: nowrap;">النتيجة الكلية</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Level Info -->
                            <div class="col-sm-7 col-7 py-2 text-start px-2">
                                <div class="score-level-label">{{ $isHighestDimension ? 'النمط السائد:' : 'مستوى الجاهزية:' }}</div>
                                <div class="score-level-value text-{{ $lc }} mb-1">{{ $mainLvl['label'] }}</div>
                                <div class="score-level-range text-muted" style="font-size: 0.72rem; font-weight: 500;">
                                    @if($lc === 'success')
                                        النطاق (70 - 100)
                                    @elseif($lc === 'warning')
                                        النطاق (40 - 69)
                                    @else
                                        النطاق (0 - 39)
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="progress-container mt-4 mb-2">
                            @php
                                $pinPos = $pct; 
                            @endphp
                            <div class="progress-pin text-darkblue" style="right: {{ $pinPos }}%;"><i class="bi bi-geo-alt-fill"></i></div>
                            <div class="progress-track">
                                <div class="progress-segment" style="background-color: #ef4444;"></div>
                                <div class="progress-segment" style="background-color: #f59e0b;"></div>
                                <div class="progress-segment" style="background-color: #22c55e;"></div>
                            </div>
                            <div class="progress-labels d-flex justify-content-between mt-2" style="font-size: 0.68rem; font-weight: 500;">
                                <div class="progress-label text-danger" style="text-align: right;">منخفض<br>(0 - 39)</div>
                                <div class="progress-label text-warning" style="text-align: center;">متوسط<br>(40 - 69)</div>
                                <div class="progress-label text-success" style="text-align: left;">مرتفع<br>(70 - 100)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Card -->
                <div class="col-md-6 col-12 d-flex">
                    <div class="summary-card w-100 p-4 d-flex flex-column">
                        <!-- Card Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-section-title mb-0">ملخص التقرير</h4>
                            <div class="card-section-icon"><i class="bi bi-file-text"></i></div>
                        </div>
                        <div class="flex-grow-1">
                            @php
                                $sentences = array_filter(array_map('trim', explode('.', $parsedRecommendation)));
                            @endphp
                            <div class="summary-text mb-0" style="text-align: justify; font-size: 0.88rem; line-height: 1.7; color: #475569;">
                                @foreach($sentences as $sentence)
                                    @if(!empty($sentence))
                                        <div class="mb-2 d-flex align-items-start gap-2">
                                            <span class="text-primary" style="font-weight: bold;">•</span>
                                            <span>{{ $sentence }}.</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Radar Chart -->
            @if(!$isHighestDimension && count($radarLabels) > 1)
            <div class="row gx-4 mb-4">
                @if(count($radarLabels) >= 3)
                <div class="col-12 mb-4">
                    <div class="radar-card text-center">
                        <div class="fw-bold text-darkblue mb-3" style="font-size: 1.3rem;">مستوى المهارات</div>
                        <div style="position: relative; height: 350px; max-width: 500px; margin: 0 auto; width: 100%;">
                            <canvas id="skillsRadar"></canvas>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <!-- Dimensions Results Accordion -->
            @if(!empty($dimensions) && count($dimensions) > 0)
                @php
                    $hasAnyInterpretation = false;
                    foreach($dimensions as $d) {
                        if(!empty($d['interpretation'])) {
                            $hasAnyInterpretation = true;
                            break;
                        }
                    }
                @endphp
                @if($hasAnyInterpretation)
                <h2 class="p2-main-title mt-4 mb-3"><i class="bi bi-layers text-darkblue"></i>تفسير المهارات</h2>
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-0">
                        <div class="accordion" id="dimensionsAccordion">
                            @foreach($dimensions as $index => $dim)
                            @php $hasInterp = !empty($dim['interpretation']); @endphp
                            <div class="accordion-item border-0 {{ !$loop->last ? 'border-bottom' : '' }} dimension-detail-item">
                                @if($hasInterp)
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button collapsed px-4 py-3 fw-bold text-darkblue bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}" style="box-shadow: none;">
                                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center w-100 pe-3 gap-2">
                                                <span style="font-size: 1.05rem;">{{ $dim['name'] }}</span>
                                                <span class="badge bg-primary rounded-pill px-3 py-2" style="font-size: 0.85rem; font-weight: normal;">
                                                     الدرجة: {{ $dim['score'] }} من {{ $dim['max_score'] }}@if(!$isHighestDimension) | المستوى: {{ $dim['display_level'] ?? $dim['level'] }}@endif
                                                 </span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#dimensionsAccordion">
                                        <div class="accordion-body px-4 pb-4 pt-1">
                                            <p class="text-muted mb-0" style="line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                                                {{ $dim['interpretation'] }}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="px-4 py-3 fw-bold text-darkblue bg-white d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center w-100 gap-2">
                                        <span style="font-size: 1.05rem;">{{ $dim['name'] }}</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2" style="font-size: 0.85rem; font-weight: normal; margin-left: 20px;">
                                             الدرجة: {{ $dim['score'] }} من {{ $dim['max_score'] }}@if(!$isHighestDimension) | المستوى: {{ $dim['display_level'] ?? $dim['level'] }}@endif
                                         </span>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            @endif

        </div>
    </div>


    <!-- ==================== PAGE 2 ==================== -->
    <div class="a4-page">
        <div class="page-padding pt-5 mt-4">
            
            <!-- Training Programs Section -->
            @if(!empty($progs))
            <div class="mb-4">
                <div class="p2-section-title mb-3"><i class="bi bi-mortarboard-fill text-darkblue"></i> البرامج التدريبية المقترحة</div>
                
                @if(!empty($programs_intro))
                    <p class="mb-3" style="color: #1a2b56; line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                        {{ $programs_intro }}
                    </p>
                @endif

                <!-- Training Programs Grid View (All Viewports) -->
                <div>
                    <div class="row row-cols-3 row-cols-sm-3 row-cols-md-4 g-2 g-md-3 justify-content-center">
                        @foreach($progs as $prog)
                        <div class="col">
                            <div class="program-card h-100 text-center">
                                <div class="program-icon-wrapper">
                                    @if(isset($prog->icon) && (str_starts_with($prog->icon, 'http') || str_starts_with($prog->icon, '/')))
                                        <img src="{{ str_starts_with($prog->icon, '/') ? asset($prog->icon) : $prog->icon }}" alt="{{ $prog->title ?? '' }}" class="program-img-icon">
                                    @else
                                        <i class="bi {{ $prog->icon ?? 'bi-journal-bookmark' }} program-bi-icon"></i>
                                    @endif
                                </div>
                                <h5 class="program-title">{{ $prog->title ?? '' }}</h5>
                                <p class="program-desc mb-0 d-none d-sm-block">{{ $prog->description ?? 'برنامج تدريبي مخصص لتنمية المهارات وتعزيز الكفاءة المهنية.' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if(!empty($programs_outro))
                    <p class="mt-3 mb-2" style="color: #1a2b56; line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                        {{ $programs_outro }}
                    </p>
                @endif
            </div>
            @endif

            <!-- Certificates Section -->
            @if(!empty($certs))
            <div class="mb-4">
                <div class="p2-section-title mb-3"><i class="bi bi-award-fill text-darkblue"></i> الشهادات الاحترافية المناسبة</div>
                <div class="p2-section-subtitle mb-3 text-muted small">قد تكون مناسبة لك بناءً على نتائج هذا المقياس</div>
                
                @if(!empty($certificates_intro))
                    <p class="mb-3" style="color: #1a2b56; line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                        {{ $certificates_intro }}
                    </p>
                @endif
                
                <div class="row row-cols-3 row-cols-sm-3 row-cols-md-4 g-2 g-md-3 justify-content-center pt-2">
                    @foreach($certs as $cert)
                    <div class="col">
                        <div class="program-card h-100 text-center">
                            <div class="program-icon-wrapper">
                                @if(isset($cert->icon) && (str_starts_with($cert->icon, 'http') || str_starts_with($cert->icon, '/')))
                                    <img src="{{ str_starts_with($cert->icon, '/') ? asset($cert->icon) : $cert->icon }}" alt="{{ $cert->title ?? '' }}" class="program-img-icon">
                                @else
                                    <div class="cert-icon-inner {{ $cert->icon ?? 'blue-hexagon' }}">
                                        {{ substr(strtoupper($cert->title ?? ''), 0, 4) }}
                                    </div>
                                @endif
                            </div>
                            <h5 class="program-title">{{ $cert->title ?? '' }}</h5>
                            @if(!empty($cert->subtitle))
                                <p class="program-desc d-none d-sm-block">{{ $cert->subtitle }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- 30 Day Plan Section -->
            @if(count($planSteps) > 0)
            <div class="mb-4">
                <div class="p2-section-title mb-3"><i class="bi bi-calendar3 text-darkblue"></i> خطة تطوير مقترحة</div>
                
                @if(!empty($roadmap_intro))
                    <p class="mb-3" style="color: #1a2b56; line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                        {{ $roadmap_intro }}
                    </p>
                @endif

                <div class="row gx-2 gy-3 mt-3 justify-content-center align-items-stretch">
                    @foreach($planSteps as $index => $step)
                    <div class="col-lg-{{ count($planSteps) >= 4 ? '3' : (count($planSteps) == 3 ? '4' : (count($planSteps) == 2 ? '6' : '12')) }} col-md-6 col-4 d-flex align-items-stretch position-relative">
                        <div class="plan-card w-100">
                            <div class="plan-card-header d-flex justify-content-between align-items-center">
                                <span class="plan-card-period">{{ $step->period }}</span>
                                <div class="plan-card-icon"><i class="bi {{ $step->icon ?? 'bi-calendar-check' }}"></i></div>
                            </div>
                            <div class="plan-card-body">
                                <p class="plan-card-text">{{ $step->title }}</p>
                            </div>
                        </div>
                        @if(!$loop->last && count($planSteps) > 1 && count($planSteps) <= 4)
                        <div class="plan-arrow d-none d-lg-flex"><i class="bi bi-chevron-left text-muted"></i></div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endif

        </div>

        <!-- Footer Page 2 -->
        <div class="mt-auto py-4 text-center quote-footer-card">
            <h6 class="text-darkblue fw-bold mb-2">رسالتنا لك</h6>
            <p class="mb-0 mx-auto quote-footer-text">
                نتائج هذا المقياس تمثل نقطة بداية لفهم قدراتك. وننصحك بالاستفادة منها في وضع خطة تطوير مستمرة تتناسب مع أهدافك المهنية والشخصية.
            </p>
        </div>
    </div>
</div>

<div class="container mt-4 mb-5 no-print d-flex justify-content-center" style="gap: 15px;">
    <a href="{{ route('dashboard.assessments') }}" class="btn btn-light rounded-circle shadow-sm text-darkblue" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;" title="العودة للرئيسية">
        <i class="bi bi-house-door-fill"></i>
    </a>
    <button onclick="window.print()" class="btn btn-primary rounded-circle shadow-lg" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;" title="طباعة التقرير">
        <i class="bi bi-printer-fill"></i>
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('skillsRadar');
    if(ctx) {
        const labels = {!! json_encode($radarLabels) !!};
        const data = {!! json_encode($radarData) !!};
        
        // If there are less than 3 dimensions, a radar chart won't render a polygon. Use bar instead.
        const chartType = labels.length < 3 ? 'bar' : 'radar';
        
        const config = {
            type: chartType,
            data: {
                labels: labels,
                datasets: [{
                    label: 'النسبة المئوية',
                    data: data,
                    backgroundColor: chartType === 'bar' ? '#1e3a8a' : 'rgba(196, 209, 228, 0.7)',
                    borderColor: '#1e3a8a',
                    borderWidth: 2,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#1e3a8a',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverBackgroundColor: '#1e3a8a',
                    pointHoverBorderColor: '#ffffff'
                }]
            },
            options: {
                layout: { padding: 35 },
                responsive: true,
                maintainAspectRatio: false,
                animation: false,
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        display: false
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        if (chartType === 'radar') {
            config.options.scales = {
                r: {
                    min: 0,
                    max: 100,
                    angleLines: { color: '#e2e8f0' },
                    grid: { color: '#e2e8f0' },
                    pointLabels: {
                        font: { family: 'Tajawal', size: 11, weight: 'bold' },
                        color: '#0f172a',
                        callback: function(label, index) {
                            if (typeof index !== 'undefined' && data && typeof data[index] !== 'undefined') {
                                return [label, data[index] + '%'];
                            }
                            return label;
                        }
                    },
                    ticks: { display: false, stepSize: 20 }
                }
            };
        } else {
            config.options.scales = {
                y: {
                    min: 0, max: 100,
                    grid: { color: '#e2e8f0' },
                    ticks: { font: { family: 'Tajawal' } }
                },
                x: {
                    grid: { display: false },
                    ticks: { font: { family: 'Tajawal', weight: 'bold' }, color: '#0f172a' }
                }
            };
        }

        new Chart(ctx, config);
    }
});
</script>
@endsection
````

## File: routes/web.php
````php
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
````

## File: app/Http/Controllers/User/UserGradedExamController.php
````php
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
````

## File: resources/views/user/graded_exams/result.blade.php
````php
@extends('layouts.user')
@section('title', 'نتيجة الاختبار')

@push('styles')
<style>
:root{
    --navy: #14213d;
    --navy-soft: #1e3a5f;
    --accent: #0ea472;
    --bg: #f6f7fb;
    --surface: #ffffff;
    --border: #e6e9f0;
    --text: #1e293b;
    --text-muted: #64748b;
    --radius-lg: 18px;
    --radius-md: 14px;
    --radius-sm: 10px;
    --shadow-sm: 0 2px 10px rgba(15, 23, 42, .05);
}

.result-page{
    background: var(--bg);
    min-height: 100vh;
    min-height: 100dvh;
    padding: 20px 14px 56px;
    display: flex;
    flex-direction: column;
}
@media (min-width: 768px){
    .result-page{ padding: 36px 20px 64px; }
}
.result-container{ max-width: 960px; margin: 0 auto; }

.result-hero{ text-align: center; margin-bottom: 28px; }
.result-hero h1{
    color: var(--navy);
    font-weight: 800;
    font-size: 1.3rem;
    margin-bottom: 8px;
}
@media (min-width: 768px){ .result-hero h1{ font-size: 1.75rem; } }
.result-hero p{ color: var(--text-muted); font-size: .95rem; margin: 0; }

/* Summary card */
.summary-card{
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border);
    overflow: hidden;
    margin-bottom: 28px;
}
.summary-grid{
    display: grid;
    grid-template-columns: 1fr;
}
@media (min-width: 640px){
    .summary-grid{ grid-template-columns: 1fr 1fr; }
}
.summary-cell{
    padding: 24px;
    text-align: center;
}
.summary-cell:first-child{
    border-bottom: 1px solid var(--border);
}
@media (min-width: 640px){
    .summary-cell:first-child{
        border-bottom: none;
        border-inline-end: 1px solid var(--border);
    }
}
.summary-cell h5{ color: var(--text-muted); font-size: .9rem; margin-bottom: 8px; font-weight: 600; }
.readiness-label{ font-weight: 800; font-size: 1.5rem; margin: 0; }
@media (min-width: 768px){ .readiness-label{ font-size: 1.75rem; } }
.score-big{
    font-weight: 800;
    color: var(--navy);
    font-size: 2.6rem;
    margin: 0;
    line-height: 1.1;
}
@media (min-width: 768px){ .score-big{ font-size: 3.4rem; } }
.score-fraction{ color: var(--text-muted); margin-top: 6px; font-size: .95rem; }
.score-perf{ font-weight: 700; margin-top: 8px; font-size: 1rem; }

/* Units breakdown: cards on mobile, table on desktop */
.units-card{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    margin-bottom: 20px;
    overflow: hidden;
}
.units-card-header{
    background: var(--navy);
    color: #fff;
    padding: 14px 18px;
    font-weight: 700;
    font-size: .95rem;
}
.unit-row{
    padding: 16px 18px;
    border-bottom: 1px solid var(--border);
}
.unit-row:last-child{ border-bottom: none; }
.unit-row-top{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
    gap: 10px;
}
.unit-name{ font-weight: 700; color: var(--text); font-size: .95rem; }
.unit-pct{ font-weight: 800; font-size: 1.05rem; }
.unit-bar{
    height: 8px;
    background: var(--bg);
    border-radius: 999px;
    overflow: hidden;
    margin-bottom: 8px;
}
.unit-bar > div{ height: 100%; border-radius: 999px; }
.unit-row-bottom{
    display: flex;
    justify-content: space-between;
    font-size: .82rem;
    color: var(--text-muted);
}

@media (min-width: 768px){
    .units-card-header{ display: none; }
    .units-table-wrap{ overflow: hidden; }
}

/* Highlight boxes */
.highlight-grid{
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
    margin-bottom: 24px;
}
@media (min-width: 640px){
    .highlight-grid{ grid-template-columns: 1fr 1fr; }
}
.highlight-box{
    border-radius: var(--radius-md);
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.highlight-box.is-danger{ background: #fef2f2; border: 1px solid #fecaca; }
.highlight-box.is-success{ background: #ecfdf5; border: 1px solid #a7f3d0; }
.highlight-icon{
    width: 52px; height: 52px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.3rem;
    flex-shrink: 0;
    background: #fff;
}
.highlight-box.is-danger .highlight-icon{ color: #dc2626; border: 2px solid #dc2626; }
.highlight-box.is-success .highlight-icon{ color: #059669; border: 2px solid #059669; }
.highlight-box h6{ font-size: .85rem; margin-bottom: 2px; font-weight: 700; }
.highlight-box.is-danger h6{ color: #dc2626; }
.highlight-box.is-success h6{ color: #059669; }
.highlight-box small{ color: var(--text-muted); font-size: .75rem; display: block; margin-bottom: 6px; }
.highlight-box .value{ font-weight: 800; font-size: 1.2rem; margin: 0; }

/* Legend */
.legend-card{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    padding: 18px;
    margin-bottom: 28px;
}
.legend-grid{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px;
    text-align: center;
}
@media (min-width: 640px){
    .legend-grid{ grid-template-columns: repeat(4, 1fr); }
}
.legend-dot{
    width: 10px; height: 10px; border-radius: 50%;
    display: inline-block; margin-inline-end: 6px;
}

/* Actions */
.result-actions{
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 20px;
}
@media (min-width: 640px){
    .result-actions{ flex-direction: row; justify-content: center; }
}
.result-actions .btn{
    border-radius: 999px;
    font-weight: 700;
    padding: 13px 24px;
}

@media print {
    .no-print, #reviewAnswers, #answersAccordion, .btn, .top-navbar, footer { display: none !important; }
    body { background-color: #fff !important; }
    .result-page{ padding: 0; background: #fff; }
    .container { max-width: 100% !important; width: 100% !important; margin: 0 !important; padding: 0 !important; }
    h1.display-3 { font-size: 2.5rem !important; }
    .py-5, .mb-5, .my-5 { padding-top: 1rem !important; padding-bottom: 1rem !important; margin-bottom: 1.5rem !important; }
    .row { display: flex !important; flex-wrap: wrap !important; margin-right: -10px !important; margin-left: -10px !important; }
    .col-md-8 { width: 100% !important; max-width: 100% !important; flex: 0 0 100% !important; margin: 0 auto !important; }
    .col-md-6 { width: 50% !important; flex: 0 0 50% !important; max-width: 50% !important; padding: 0 10px !important; }
    .row.g-4, .card, .units-card, .summary-card { page-break-inside: avoid !important; break-inside: avoid !important; }
    .table-responsive { overflow: visible !important; }
    .card { box-shadow: none !important; }
    * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
    .progress { border: 1px solid #dee2e6; background-color: #f8f9fa !important; }
    .table { break-inside: avoid; font-size: 0.9rem !important; }
    .table th, .table td { padding: 6px !important; }
    .units-card-header{ display: block !important; }
}
</style>
@endpush

@section('content')
<div class="result-page">
<div class="result-container">
    @if($result)
        <div class="result-hero">
            <h1>أداؤك حسب وحدات الاختبار</h1>
            <p>ترتيب الوحدات من أعلى درجة إلى أقل درجة</p>
        </div>

        <!-- Top Summary -->
        <div class="summary-card">
            <div class="summary-grid">
                <div class="summary-cell">
                    <h5>مستوى الجاهزية</h5>
                    @php
                        $readinessColor = '#f59e0b';
                        if ($result->percentage >= 75) $readinessColor = '#059669';
                        elseif ($result->percentage < 60) $readinessColor = '#dc2626';
                    @endphp
                    <p class="readiness-label" style="color: {{ $readinessColor }};">{{ $readinessLevel }}</p>
                </div>
                <div class="summary-cell">
                    <h5>النتيجة الإجمالية</h5>
                    <p class="score-big">{{ floatval($result->percentage) }}%</p>
                    <p class="score-fraction">{{ floatval($result->correct_count) }} من {{ $session->total_questions }} درجة</p>
                    <p class="score-perf {{ $overallPerformance['class'] }}">{{ $overallPerformance['name'] }}</p>
                </div>
            </div>
        </div>

        <!-- Units Breakdown -->
        <div class="units-card">
            <div class="units-card-header">تفاصيل الأداء حسب الوحدة</div>

            <!-- Mobile card rows -->
            <div class="d-block d-md-none">
                @foreach($unitsStats as $stat)
                    <div class="unit-row">
                        <div class="unit-row-top">
                            <span class="unit-name">{{ $stat['name'] }}</span>
                            <span class="unit-pct {{ $stat['level_class'] }}">{{ $stat['percentage'] }}%</span>
                        </div>
                        <div class="unit-bar">
                            <div class="progress-bar {{ $stat['bar_color'] }}" style="width: {{ $stat['percentage'] }}%"></div>
                        </div>
                        <div class="unit-row-bottom">
                            <span>{{ floatval($stat['score']) }} من {{ $stat['total'] }}</span>
                            <span class="fw-bold {{ $stat['level_class'] }}">{{ $stat['level_name'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Desktop table -->
            <div class="table-responsive d-none d-md-block">
                <table class="table table-borderless table-hover mb-0 align-middle">
                    <thead class="bg-light text-center">
                        <tr>
                            <th class="py-3 px-4 text-end" style="width: 30%">الوحدة</th>
                            <th class="py-3" style="width: 20%">الدرجة</th>
                            <th class="py-3" style="width: 25%">شريط التقدم</th>
                            <th class="py-3" style="width: 10%">النسبة</th>
                            <th class="py-3" style="width: 15%">مستوى الأداء</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($unitsStats as $stat)
                            <tr class="border-bottom">
                                <td class="py-3 px-4 text-end fw-bold">{{ $stat['name'] }}</td>
                                <td class="py-3">{{ floatval($stat['score']) }} من {{ $stat['total'] }}</td>
                                <td class="py-3">
                                    <div class="progress rounded-pill" style="height: 10px;">
                                        <div class="progress-bar {{ $stat['bar_color'] }}" role="progressbar" style="width: {{ $stat['percentage'] }}%" aria-valuenow="{{ $stat['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="py-3 fw-bold fs-5">{{ $stat['percentage'] }}%</td>
                                <td class="py-3 fw-bold {{ $stat['level_class'] }}">{{ $stat['level_name'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Highlight boxes -->
        <div class="highlight-grid">
            <div class="highlight-box is-danger">
                <div class="highlight-icon"><i class="bi bi-graph-down-arrow"></i></div>
                <div>
                    <h6>أولوية المراجعة</h6>
                    <small>(أقل وحدة حصلت فيها على درجة)</small>
                    @if($lowestUnit && $lowestUnit['percentage'] == 100)
                        <p class="value" style="color:#059669;">أداء مثالي 🌟</p>
                    @else
                        <p class="value" style="color:#dc2626;">{{ $lowestUnit ? $lowestUnit['name'].' — '.$lowestUnit['percentage'].'%' : '-' }}</p>
                    @endif
                </div>
            </div>
            <div class="highlight-box is-success">
                <div class="highlight-icon"><i class="bi bi-graph-up-arrow"></i></div>
                <div>
                    <h6>أعلى أداء</h6>
                    <small>(أعلى وحدة حصلت فيها على درجة)</small>
                    <p class="value" style="color:#059669;">{{ $highestUnit ? $highestUnit['name'].' — '.$highestUnit['percentage'].'%' : '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Legend -->
        <div class="legend-card">
            <div class="legend-grid">
                <div>
                    <div><span class="legend-dot" style="background:#10b981;"></span><span class="fw-bold" style="color:#10b981;">80% فأكثر</span></div>
                    <small class="text-muted fw-bold">متميز / جيد جداً</small>
                </div>
                <div>
                    <div><span class="legend-dot" style="background:#f59e0b;"></span><span class="fw-bold" style="color:#f59e0b;">70%-79%</span></div>
                    <small class="text-muted fw-bold">جيد</small>
                </div>
                <div>
                    <div><span class="legend-dot" style="background:#fd7e14;"></span><span class="fw-bold" style="color:#fd7e14;">60%-69%</span></div>
                    <small class="text-muted fw-bold">مراجعة</small>
                </div>
                <div>
                    <div><span class="legend-dot" style="background:#ef4444;"></span><span class="fw-bold" style="color:#ef4444;">أقل من 60%</span></div>
                    <small class="text-muted fw-bold">تطوير</small>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="result-actions no-print">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="bi bi-printer me-2"></i> طباعة التقرير
            </button>
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#reviewAnswers" aria-expanded="false" aria-controls="reviewAnswers">
                <i class="bi bi-journal-text me-2"></i> مراجعة الإجابات التفصيلية
            </button>
        </div>

        <!-- Review Answers Section -->
        <div class="collapse" id="reviewAnswers">
            <div class="card shadow-sm border-0 rounded-4 mb-5">
                <div class="card-body p-0">
                    <div class="accordion accordion-flush" id="answersAccordion">
                        @foreach($reviewData as $review)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $review['index'] }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $review['index'] }}" aria-expanded="false" aria-controls="collapse{{ $review['index'] }}">
                                        <div class="d-flex w-100 flex-column flex-md-row justify-content-between align-items-start align-items-md-center pe-3 gap-2">
                                            <div class="fw-bold">
                                                <span class="badge bg-secondary me-2">{{ $review['index'] }}</span>
                                                {{ $review['text'] }}
                                                @if($review['unit_name'])
                                                    <span class="badge bg-light text-secondary border ms-2 fw-normal" style="font-size: 0.8rem;"><i class="bi bi-book me-1"></i> {{ $review['unit_name'] }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                @if($review['points'] == 1)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> صحيح</span>
                                                @elseif($review['points'] > 0)
                                                    <span class="badge bg-warning"><i class="bi bi-dash-circle me-1"></i> صحيح جزئياً ({{ floatval($review['points']) }})</span>
                                                @else
                                                    <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> خاطئ</span>
                                                @endif
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse{{ $review['index'] }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $review['index'] }}" data-bs-parent="#answersAccordion">
                                    <div class="accordion-body bg-light">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <h6 class="fw-bold text-muted">إجابتك:</h6>
                                                <ul class="list-unstyled mb-0">
                                                    @forelse($review['options'] as $option)
                                                        @if(in_array($option->id, $review['selected_ids']))
                                                            <li class="mb-1"><i class="bi bi-check2-square text-primary me-2"></i> {{ $option->option_text_ar }}</li>
                                                        @endif
                                                    @empty
                                                        <li class="text-muted">لم تقم باختيار إجابة</li>
                                                    @endforelse
                                                    @if(empty($review['selected_ids']))
                                                        <li class="text-muted">لم تقم باختيار إجابة</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <h6 class="fw-bold text-muted">الإجابة الصحيحة:</h6>
                                                <p class="mb-0 text-success fw-bold"><i class="bi bi-check-circle-fill me-2"></i> {{ $review['correct_options_text'] }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <h6 class="fw-bold text-muted"><i class="bi bi-info-circle me-2"></i> التفسير:</h6>
                                            <p class="mb-0">{{ $review['explanation'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">جاري التحميل...</span>
            </div>
            <p class="text-muted mt-3">جاري حساب النتيجة...</p>
        </div>
    @endif

    <div class="text-center mt-4 no-print">
        <a href="{{ route('user.graded_exams.index') }}" class="btn btn-secondary px-4 rounded-pill">
            العودة للقائمة
        </a>
    </div>
</div>
</div>
@endsection
````

## File: resources/views/user/graded_exams/index.blade.php
````php
@extends('layouts.user')
@section('title', 'الشهادات الاحترافية')

@push('styles')
<style>
/* ===== Design tokens (shared visual language for the exams module) ===== */
:root{
    --navy: #14213d;
    --navy-soft: #1e3a5f;
    --accent: #0ea472;
    --accent-dark: #0b8a5f;
    --warning: #f5a623;
    --danger: #e5484d;
    --bg: #f6f7fb;
    --surface: #ffffff;
    --border: #e6e9f0;
    --text: #1e293b;
    --text-muted: #64748b;
    --radius-lg: 18px;
    --radius-md: 14px;
    --radius-sm: 10px;
    --shadow-sm: 0 2px 10px rgba(15, 23, 42, .05);
    --shadow-md: 0 10px 30px rgba(15, 23, 42, .09);
}

.exams-page{
    background: var(--bg);
    min-height: 100%;
    padding: 24px 16px 48px;
}
@media (min-width: 768px){
    .exams-page{ padding: 40px 24px 64px; }
}

.exams-container{
    max-width: 880px;
    margin: 0 auto;
}

/* Header */
.exams-header{
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 28px;
}
@media (min-width: 768px){
    .exams-header{
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 36px;
    }
}
.exams-header h1{
    color: var(--navy);
    font-weight: 800;
    font-size: 1.5rem;
    margin: 0 0 6px;
}
@media (min-width: 768px){
    .exams-header h1{ font-size: 2rem; }
}
.exams-header p{
    color: var(--text-muted);
    margin: 0;
    font-size: .95rem;
}
.btn-progress{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: var(--navy);
    color: #fff;
    border: none;
    border-radius: 999px;
    padding: 12px 22px;
    font-weight: 700;
    font-size: .92rem;
    text-decoration: none;
    white-space: nowrap;
    transition: transform .15s ease, box-shadow .15s ease, background .15s ease;
}
.btn-progress:hover, .btn-progress:focus-visible{
    background: var(--navy-soft);
    color: #fff;
    box-shadow: var(--shadow-md);
}
.btn-progress:active{ transform: scale(.97); }

/* Alert */
.exams-alert{
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #991b1b;
    border-radius: var(--radius-sm);
    padding: 14px 16px;
    margin-bottom: 20px;
    font-size: .9rem;
}

/* Exam card */
.exams-list{
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.exam-card{
    background: var(--surface);
    border-radius: var(--radius-lg);
    padding: 18px;
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    transition: box-shadow .2s ease, border-color .2s ease;
}
@media (min-width: 768px){
    .exam-card{
        padding: 26px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }
}
.exam-card:hover{
    box-shadow: var(--shadow-md);
    border-color: #d6dbe6;
}

.exam-info h3{
    color: var(--navy);
    font-weight: 700;
    font-size: 1.08rem;
    line-height: 1.4;
    margin: 0 0 6px;
}
@media (min-width: 768px){
    .exam-info h3{ font-size: 1.25rem; }
}
.exam-info p{
    color: var(--text-muted);
    font-size: .9rem;
    line-height: 1.6;
    margin: 0 0 14px;
}
@media (min-width: 768px){
    .exam-info p{ max-width: 520px; }
}

.exam-meta{
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 4px;
}
@media (min-width: 768px){
    .exam-meta{ margin-bottom: 0; }
}
.exam-meta span{
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--bg);
    color: var(--text-muted);
    padding: 6px 12px;
    border-radius: 999px;
    border: 1px solid var(--border);
    font-size: .82rem;
    font-weight: 600;
}
.exam-meta span i{ color: var(--accent); }

.exam-action{ margin-top: 16px; }
@media (min-width: 768px){
    .exam-action{ margin-top: 0; flex-shrink: 0; }
}

.btn-start-exam{
    background: var(--accent);
    color: #fff;
    border: none;
    padding: 15px 24px;
    border-radius: var(--radius-sm);
    font-weight: 700;
    font-size: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    width: 100%;
    min-height: 50px;
    cursor: pointer;
    text-decoration: none;
    transition: background .2s ease, transform .15s ease, box-shadow .15s ease;
}
@media (min-width: 768px){
    .btn-start-exam{ width: auto; padding: 13px 28px; }
}
.btn-start-exam:hover, .btn-start-exam:focus-visible{
    background: var(--accent-dark);
    color: #fff;
    box-shadow: 0 8px 18px rgba(14, 164, 114, .25);
}
.btn-start-exam:active{ transform: scale(.98); }

/* Empty state */
.exams-empty{
    text-align: center;
    padding: 64px 20px;
    background: var(--surface);
    border-radius: var(--radius-lg);
    border: 1px dashed var(--border);
}
.exams-empty .icon-wrap{
    width: 72px; height: 72px;
    display: inline-flex; align-items: center; justify-content: center;
    background: var(--bg);
    border-radius: 50%;
    margin-bottom: 16px;
}
.exams-empty .icon-wrap i{ font-size: 2rem; color: var(--text-muted); }
.exams-empty h5{ color: var(--text-muted); font-weight: 700; margin: 0; }
</style>
@endpush

@section('content')
<div class="exams-page">
<div class="exams-container">
    <div class="exams-header text-center text-md-end">
        <div>
            <h1>الشهادات الاحترافية</h1>
            <p>اختر الشهادة التي ترغب في أداء اختبارها</p>
        </div>
        <a href="{{ route('user.graded_exams.progress') }}" class="btn-progress">
            <i class="bi bi-graph-up-arrow"></i> تتبع تقدمي وسجل الاختبارات
        </a>
    </div>

    @if(session('error'))
        <div class="exams-alert">{{ session('error') }}</div>
    @endif

    <div class="exams-list">
        @forelse($exams as $exam)
            <div class="exam-card">
                <div class="exam-info">
                    <h3>{{ $exam->title_ar }}</h3>
                    <p>{{ $exam->description_ar ?: 'لا يوجد وصف متوفر.' }}</p>
                    <div class="exam-meta">
                        <span><i class="bi bi-file-earmark-text"></i> {{ $exam->constraintSettings ? $exam->constraintSettings->total_questions : 50 }} سؤال</span>
                        @if($exam->time_limit_min)
                            <span><i class="bi bi-stopwatch"></i> {{ $exam->time_limit_min }} دقيقة</span>
                        @endif
                    </div>
                </div>
                <div class="exam-action">
                    <a href="{{ route('user.graded_exams.intro', $exam->id) }}" class="btn-start-exam">
                        بدء الاختبار <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="exams-empty">
                <div class="icon-wrap"><i class="bi bi-journal-x"></i></div>
                <h5>لا توجد شهادات متوفرة حالياً</h5>
            </div>
        @endforelse
    </div>
</div>
</div>
@endsection
````

## File: resources/views/user/graded_exams/show.blade.php
````php
@extends('layouts.user')

@section('title', 'أداء الاختبار - ' . $session->gradedExam->title_ar)

@push('styles')
<style>
/* ---------------------------------------------------------------------
 * Palette & Base 
 * --------------------------------------------------------------------- */
:root {
  --bg: #f5f7fb;
  --card: #FFFFFF;
  --border: #E4E9F2;
  --text: #111827;
  --textMuted: #6B7280;
  --blue: #1e5bfb;
  --blueDark: #1648ca;
  --blueTint: #eff6ff;
  --blueTint2: #f2f7ff;
  --blueBorder: #d6e7ff;
  --green: #16a34a;
  --greenDark: #15803d;
  --greenTint: #f0fbf6;
  --greenIconBg: #dcfce7;
  --greenBorder: #d3f5e5;
  --red: #dc2626;
  --redDark: #e11d48;
  --redTint: #fff3f3;
  --redIconBg: #fee2e2;
  --redBorder: #fed7d7;
  --orange: #ea580c;
  --orangeDark: #d97706;
  --orangeTint: #fff9ef;
  --orangeIconBg: #ffedd5;
  --orangeBorder: #fedfb8;
  --font: 'Tajawal', sans-serif;
}

html, body {
  height: 100%;
  overflow: hidden; /* الصفحة نفسها متتسكرولش؛ السكرول جوه الشاشات بس */
}

body {
  background-color: var(--bg) !important;
  font-family: var(--font);
}

/* بيطفي هيدر وفوتر الموقع (layouts.user) بحيث الاختبار ياخد الشاشة كلها */
body > .top-navbar,
body > footer,
body > #alert-container {
  display: none !important;
}
main {
  padding: 0 !important;
  margin: 0 !important;
}

.app-shell {
  font-family: var(--font);
  max-width: 480px;
  width: 100%;
  margin: 0 auto;
  position: fixed;
  inset: 0;
  z-index: 1030; /* أعلى من top-navbar بتاع الليّاوت (z-index: 1020) لو ظهر لأي سبب */
  height: 100vh;
  height: 100dvh;
  display: flex;
  flex-direction: column;
  background-color: var(--bg);
  color: var(--text);
  overflow: hidden;
}

/* ---------------------------------------------------------------------
 * Utility
 * --------------------------------------------------------------------- */
.ltr-group {
  direction: ltr;
  display: inline-flex;
  align-items: center;
  gap: 7px;
}

/* ---------------------------------------------------------------------
 * Screen 1: Question Screen
 * --------------------------------------------------------------------- */
.page-fixed {
  display: flex;
  flex-direction: column;
  height: 100dvh;
  max-height: 100dvh;
  background-color: var(--bg);
  overflow: hidden;
}

.top-fixed {
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 14px 16px 10px;
}

.scroll-area {
  flex: 1;
  overflow-y: auto;
  padding: 0 16px 12px;
  -webkit-overflow-scrolling: touch;
}

.bottom-fixed {
  flex-shrink: 0;
  padding: 10px 16px 16px;
  background-color: var(--bg);
  box-shadow: 0 -4px 12px rgba(15, 23, 42, 0.04);
}

.ux-card {
  background-color: var(--card);
  border-radius: 20px;
  padding: 18px 18px 16px;
  box-shadow: 0 2px 10px rgba(30, 41, 59, 0.06);
}

/* Header */
.header-top-row {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  margin-bottom: 10px;
}

.exam-badge {
  font-size: 13px;
  font-weight: 700;
  color: #374151;
  background-color: #F1F3F8;
  padding: 5px 14px;
  border-radius: 999px;
}

.timer-text {
  font-size: 17px;
  font-weight: 800;
  font-variant-numeric: tabular-nums;
  color: var(--text);
}
.timer-text.low {
  color: var(--red);
}

.progress-line {
  font-size: 15px;
  font-weight: 700;
  color: var(--text);
  text-align: right;
  margin-bottom: 8px;
}

.progress-track {
  height: 6px;
  border-radius: 3px;
  background-color: #E7EBF3;
  overflow: hidden;
  margin-bottom: 14px;
}

.progress-fill {
  height: 100%;
  background-color: var(--blue);
  border-radius: 3px;
  transition: width 200ms ease;
}

.header-actions-row {
  display: flex;
  gap: 10px;
}

.header-action-btn {
  flex: 1;
  padding: 12px 10px;
  border-radius: 14px;
  border: 1.5px solid var(--border);
  background-color: #FFFFFF;
  font-size: 13.5px;
  font-weight: 700;
  color: var(--text);
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  justify-content: center;
}

/* Review Banner */
.review-banner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: var(--orangeTint);
  color: #8A5A14;
  font-size: 13px;
  font-weight: 600;
  padding: 10px 16px;
  border-radius: 14px;
}

.review-banner-close {
  background: none;
  border: none;
  color: #8A5A14;
  font-size: 13px;
  font-weight: 700;
  text-decoration: underline;
  cursor: pointer;
  font-family: var(--font);
}

/* Question Area */
.mark-link {
  background: none;
  border: none;
  padding: 0;
  font-size: 14px;
  font-weight: 700;
  cursor: pointer;
  font-family: var(--font);
  margin-bottom: 14px;
  color: var(--blue);
}
.mark-link.flagged {
  color: var(--orange);
}

.question-text {
  font-size: 17px;
  line-height: 1.65;
  font-weight: 700;
  color: var(--text);
  text-align: center;
  margin: 0 0 16px;
}

.options-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 4px;
}

.option-button {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
  padding: 13px 16px;
  border-radius: 14px;
  border: 1.5px solid var(--border);
  background-color: #FFFFFF;
  font-size: 14.5px;
  font-family: var(--font);
  cursor: pointer;
  transition: border-color 120ms ease, background-color 120ms ease;
  text-align: right;
}
.option-button.selected {
  border-color: var(--blue);
  background-color: var(--blueTint);
}

.option-text {
  flex: 1;
  line-height: 1.5;
  text-align: right;
  color: var(--text);
}

/* Footer Nav */
.footer-row {
  display: flex;
  gap: 10px;
}

.nav-button-outline {
  flex: 0.85;
  padding: 14px;
  border-radius: 14px;
  border: 1.5px solid var(--border);
  background-color: #FFFFFF;
  color: var(--text);
  font-size: 15px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  justify-content: center;
}
.nav-button-outline:disabled {
  opacity: 0.4;
  cursor: not-allowed;
}

.nav-button-primary {
  flex: 1.4;
  padding: 14px;
  border-radius: 14px;
  border: none;
  background-color: var(--blue);
  color: #FFFFFF;
  font-size: 15px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  justify-content: center;
}

/* ---------------------------------------------------------------------
 * Screen 2: Review Screen
 * --------------------------------------------------------------------- */
.page-centered {
  height: 100dvh;
  background-color: var(--bg);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 10px;
  overflow-y: auto;
}

.review-main {
  width: 100%;
  max-width: 480px;
  max-height: 100%;
  overflow-y: auto;
  background-color: #FFFFFF;
  border-radius: 26px;
  border: 1px solid #F1F5F9;
  box-shadow: 0 10px 30px -5px rgba(0,0,0,0.06), 0 4px 12px -2px rgba(0,0,0,0.02);
  padding: 16px 16px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.review-header-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding-bottom: 2px;
}

.review-title {
  font-size: 19px;
  font-weight: 900;
  color: #0f1d40;
  letter-spacing: -0.02em;
  margin: 0 0 4px;
}

.review-subtitle {
  font-size: 12.5px;
  color: #94A3B8;
  font-weight: 500;
  margin: 0;
}

.summary-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
}

.summary-card {
  border-radius: 14px;
  border: 1px solid;
  padding: 10px 6px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 5px;
}

.summary-icon-wrap {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.summary-label {
  font-size: 11.5px;
  color: #334155;
  font-weight: 600;
  text-align: center;
}

.summary-value {
  font-size: 13.5px;
  font-weight: 900;
}

.ready-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  gap: 6px;
  padding: 20px 16px;
  background-color: var(--greenTint);
  border: 1px solid var(--greenBorder);
  border-radius: 16px;
}

.ready-title {
  font-size: 16px;
  font-weight: 800;
  color: var(--greenDark);
}

.ready-sub {
  font-size: 13px;
  color: #2F5D45;
}

/* Notice Banner */
.notice-banner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  background-color: var(--blueTint2);
  border: 1px solid var(--blueBorder);
  border-radius: 14px;
  padding: 11px 12px;
}

.notice-lines {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.notice-line {
  display: flex;
  align-items: center;
  gap: 8px;
}

.notice-info-circle {
  width: 18px;
  height: 18px;
  border-radius: 50%;
  border: 2px solid var(--blue);
  color: var(--blue);
  font-size: 11px;
  font-weight: 800;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-style: italic;
}

.notice-line-text {
  font-size: 12.5px;
  font-weight: 700;
  color: #374151;
  margin: 0;
}

.review-actions {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.review-row {
  display: flex;
  align-items: center;
  gap: 10px;
  width: 100%;
  padding: 9px 10px;
  border-radius: 14px;
  background-color: #FFFFFF;
  border-style: solid;
  border-width: 1.5px;
  cursor: pointer;
  font-family: var(--font);
}

.review-row-chevron {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background-color: var(--blueTint);
  color: var(--blue);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.review-row-icon-box {
  width: 42px;
  height: 42px;
  border-radius: 13px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.review-row-text {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 3px;
  text-align: right;
}

.review-row-title {
  font-size: 14px;
  font-weight: 800;
  color: #0c2356;
}

.review-row-subtitle {
  font-size: 11.5px;
  color: #94A3B8;
  font-weight: 500;
}

.submit-footer {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  padding-top: 4px;
}

.submit-button {
  width: 100%;
  height: 50px;
  border-radius: 16px;
  border: none;
  background-color: var(--blue);
  color: #FFFFFF;
  font-size: 18px;
  font-weight: 800;
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 8px 16px -4px rgba(30, 91, 251, 0.3);
}

/* ---------------------------------------------------------------------
 * Bottom Sheet / Modal
 * --------------------------------------------------------------------- */
.sheet-overlay {
  position: fixed;
  inset: 0;
  background-color: rgba(17, 24, 39, 0.45);
  display: none; /* Flex when active */
  align-items: flex-end;
  z-index: 50;
}

.sheet-content {
  width: 100%;
  max-width: 480px;
  margin: 0 auto;
  background-color: #FFFFFF;
  border-radius: 24px 24px 0 0;
  padding: 16px 16px 20px;
  display: flex;
  flex-direction: column;
  max-height: 85vh;
}

.sheet-handle {
  width: 40px;
  height: 5px;
  border-radius: 3px;
  background-color: #E2E8F0;
  margin: 0 auto 16px;
}

.sheet-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
}

.sheet-title {
  font-size: 18px;
  font-weight: 800;
  color: var(--text);
}

.sheet-close {
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  background: none;
  border: none;
  color: var(--text);
}

.legend {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  margin-bottom: 16px;
  padding-bottom: 14px;
  border-bottom: 1px solid #EEF0F5;
}

.legend-item {
  display: flex;
  align-items: center;
  gap: 6px;
}

.legend-swatch {
  width: 12px;
  height: 12px;
  border-radius: 4px;
  border: 1.5px solid;
  display: inline-block;
}

.legend-label {
  font-size: 12px;
  color: var(--textMuted);
  font-weight: 600;
}

.q-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 9px;
  overflow-y: auto;
  padding-bottom: 4px;
}

.grid-cell {
  position: relative;
  aspect-ratio: 1 / 1;
  border-radius: 10px;
  border: 1px solid;
  font-size: 13px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #FFFFFF;
}

.grid-flag {
  position: absolute;
  top: -6px;
  left: -6px;
  font-size: 11px;
}

/* Modal */
.modal-overlay {
  position: fixed;
  inset: 0;
  background-color: rgba(17, 24, 39, 0.5);
  display: none;
  align-items: center;
  justify-content: center;
  padding: 20px;
  z-index: 60;
}

.modal-card {
  width: 100%;
  max-width: 340px;
  background-color: #FFFFFF;
  border-radius: 20px;
  padding: 24px 20px;
  text-align: center;
  font-family: var(--font);
}

.modal-icon-wrap {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background-color: var(--blueTint);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 14px;
}

.modal-title {
  font-size: 17px;
  font-weight: 800;
  margin-bottom: 8px;
  color: var(--text);
}

.modal-body {
  font-size: 14px;
  color: var(--textMuted);
  line-height: 1.5;
  margin-bottom: 20px;
}

.modal-actions {
  display: flex;
  gap: 10px;
}

.modal-cancel-btn {
  flex: 1;
  padding: 13px;
  border-radius: 12px;
  border: 1.5px solid var(--border);
  background-color: #FFFFFF;
  color: var(--text);
  font-size: 14px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
}

.modal-confirm-btn {
  flex: 1;
  padding: 13px;
  border-radius: 12px;
  border: none;
  background-color: var(--blue);
  color: #FFFFFF;
  font-size: 14px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
}

/* Generic Helpers */
.hidden { display: none !important; }
.v-hidden { visibility: hidden !important; }

/* ---------------------------------------------------------------------
 * Custom thin scrollbars
 * (dir="rtl" على app-shell بيخلي أي سكرول بار يظهر على شمال الشاشة
 *  بالشكل الافتراضي السميك/الغامق. هنا بنستبدله بشريط رفيع فاتح
 *  يناسب تصميم الشاشة بدل الخط البني اللي كان بيظهر) 
 * --------------------------------------------------------------------- */
.scroll-area,
.page-centered,
.review-main,
.q-grid,
.sheet-content {
  scrollbar-width: thin;
  scrollbar-color: #D7DEEA transparent;
}
.scroll-area::-webkit-scrollbar,
.page-centered::-webkit-scrollbar,
.review-main::-webkit-scrollbar,
.q-grid::-webkit-scrollbar,
.sheet-content::-webkit-scrollbar {
  width: 4px;
}
.scroll-area::-webkit-scrollbar-track,
.page-centered::-webkit-scrollbar-track,
.review-main::-webkit-scrollbar-track,
.q-grid::-webkit-scrollbar-track,
.sheet-content::-webkit-scrollbar-track {
  background: transparent;
}
.scroll-area::-webkit-scrollbar-thumb,
.page-centered::-webkit-scrollbar-thumb,
.review-main::-webkit-scrollbar-thumb,
.q-grid::-webkit-scrollbar-thumb,
.sheet-content::-webkit-scrollbar-thumb {
  background-color: #D7DEEA;
  border-radius: 10px;
}

/* Status cell styles */
.status-unanswered { background: #FFFFFF; border-color: var(--border); color: var(--textMuted); }
.status-answered { background: var(--greenTint); border-color: var(--green); color: #146C48; }
.status-flagged { background: var(--orangeTint); border-color: var(--orange); color: #8A5A14; }
.status-answered-flagged { background: var(--greenTint); border-color: var(--orange); color: #146C48; }
</style>
@endpush

@section('content')
@php
    $timeLimitMinutes = $session->gradedExam->time_limit_min ?? 60;
    $timeLeftSeconds = 0;
    $hasTimer = false;

    if ($timeLimitMinutes) {
        $hasTimer = true;
        $startedAt = $session->started_at ?? $session->created_at;
        $endTime = $startedAt->timestamp + ($timeLimitMinutes * 60);
        $timeLeftSeconds = max(0, $endTime - now()->timestamp);
    }
    $questions = $session->sessionQuestions;
@endphp
<div dir="rtl" class="app-shell" id="app-shell">

  <!-- ==========================================
       VIEW: QUESTION (Default)
  =========================================== -->
  <div id="view-question" class="page-fixed">
    
    <!-- Top Fixed -->
    <div class="top-fixed">
      <div class="ux-card">
        <div class="header-top-row" style="justify-content: space-between;">
          <div class="progress-line" dir="rtl" style="margin-bottom: 0;">
            السؤال <bdi id="lbl-q-index">1</bdi> من <bdi>{{ $session->total_questions }}</bdi>
          </div>
          <div class="ltr-group">
            <svg id="timer-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="13" r="8" />
              <path d="M12 9v4l3 2" />
              <path d="M9 2h6" />
              <path d="M12 2v3" />
            </svg>
            @if($hasTimer)
            <span class="timer-text" id="exam-timer">00:00:00</span>
            @else
            <span class="timer-text">--:--</span>
            @endif
          </div>
        </div>

        <div class="progress-track">
          <div class="progress-fill" id="progress-fill" style="width: 0%;"></div>
        </div>

        <div class="header-actions-row">
          <button type="button" class="header-action-btn" id="btn-open-nav">
            <div class="ltr-group">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 5.5c2.2-1 4.6-1 7 0v14c-2.4-1-4.8-1-7 0Z" />
                <path d="M20 5.5c-2.2-1-4.6-1-7 0v14c2.4-1 4.8-1 7 0Z" />
              </svg>
              <span>خريطة الأسئلة</span>
            </div>
          </button>
          <button type="button" class="header-action-btn" id="btn-finish-exam">
            <div class="ltr-group">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M7 3h7l4 4v14a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z" />
                <path d="M14 3v4h4" />
                <path d="M9 13.5l2 2 4-4.5" />
              </svg>
              <span>إنهاء الاختبار</span>
            </div>
          </button>
        </div>
      </div>

      <div class="review-banner hidden" id="review-queue-banner">
        <span>وضع المراجعة — سؤال <span id="rq-remaining">0</span> متبقي في هذه الجولة</span>
        <button type="button" class="review-banner-close" id="btn-exit-queue">رجوع</button>
      </div>
    </div>

    <!-- Scroll Area (Questions Form) -->
    <div class="scroll-area">
      <form id="exam-form" action="{{ route('user.graded_exams.answer', $session->id) }}" method="POST">
        @csrf
        
        @foreach($questions as $index => $sq)
          @php
            $isMulti = (bool) $sq->question->is_multi_correct;
            $correctCount = $isMulti
              ? $sq->question->options->filter(fn($opt) => $opt->is_correct)->count()
              : 1;
          @endphp
          
          <div class="ux-card question-card {{ $index === 0 ? 'active' : 'hidden' }}" data-index="{{ $index }}" data-is-multi="{{ $isMulti ? 'true' : 'false' }}" data-required-count="{{ $correctCount }}">
            
            <button type="button" class="mark-link btn-mark-star" data-index="{{ $index }}">
              <div class="ltr-group">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M7 3.5h10a1 1 0 0 1 1 1V21l-6-3.5L6 21V4.5a1 1 0 0 1 1-1Z" />
                </svg>
                <span class="mark-label">علّم السؤال للمراجعة</span>
              </div>
            </button>
            
            <!-- Hidden flag input to preserve state if needed, though we track via JS -->
            <input type="checkbox" class="flag-toggle hidden" tabindex="-1">

            <p class="question-text"><bdi>{{ $index + 1 }}</bdi>) {{ $sq->question->text_ar }}</p>

            @if($isMulti && $correctCount > 1)
              <div style="text-align: center; margin-bottom: 16px;">
                <span style="color: var(--blue); font-size: 13px; font-weight: 700; background: var(--blueTint); padding: 5px 14px; border-radius: 8px;">
                   @if($correctCount == 2)
                     (حدد إجابتين صحيحتين)
                   @else
                     (حدد {{ $correctCount }} إجابات صحيحة)
                   @endif
                </span>
              </div>
            @endif

            <div class="options-list">
              @foreach($sq->question->options as $optIdx => $opt)
                <label class="option-button" for="opt_{{ $sq->id }}_{{ $opt->id }}">
                  @if($isMulti)
                    <input type="checkbox" class="hidden option-input" name="answers[{{ $sq->id }}][]" value="{{ $opt->id }}" id="opt_{{ $sq->id }}_{{ $opt->id }}">
                  @else
                    <input type="radio" class="hidden option-input" name="answers[{{ $sq->id }}]" value="{{ $opt->id }}" id="opt_{{ $sq->id }}_{{ $opt->id }}">
                  @endif
                  
                  <div class="option-text">{{ $opt->option_text_ar }}</div>
                </label>
              @endforeach
            </div>

          </div>
        @endforeach
        
      </form>
    </div>

    <!-- Bottom Fixed (Navigation) -->
    <div class="bottom-fixed">
      <div class="footer-row">
        <button type="button" class="nav-button-outline" id="btn-prev" disabled>
          السابق
        </button>
        <button type="button" class="nav-button-primary" id="btn-next">
          التالي
        </button>
      </div>
    </div>

  </div>


  <!-- ==========================================
       VIEW: REVIEW (Dashboard)
  =========================================== -->
  <div id="view-review" class="page-centered hidden">
    <main class="review-main">
      
      <div class="ltr-group review-header-row" style="width:100%; justify-content:space-between;">
        <!-- SVGs for HeaderIllustration -->
        <div aria-hidden="true" style="width: 160px; height: 130px; flex-shrink: 0; position: relative;">
          <svg viewBox="0 0 160 130" width="100%" height="100%" style="filter: drop-shadow(0 6px 12px rgba(30, 91, 251, 0.15))">
            <circle cx="95" cy="70" fill="#f0f6ff" r="50" />
            <path d="M28 86C26 78 30 68 34 64C35 70 33 78 31 86Z" fill="#10B981" opacity="0.8" />
            <path d="M22 84C18 78 19 69 24 66C24 73 24 80 23 84Z" fill="#059669" />
            <path d="M35 84C40 79 43 72 40 68C37 73 35 79 34 84Z" fill="#34D399" />
            <rect fill="#E2E8F0" height="15" rx="5" width="18" x="20" y="85" />
            <g transform="rotate(-6 85 70)">
              <rect fill="#2563EB" height="92" rx="14" width="68" x="44" y="16" />
              <rect fill="#3B82F6" height="88" rx="12" width="64" x="46" y="18" />
              <rect fill="#FFFFFF" height="78" rx="8" width="56" x="50" y="24" />
              <rect fill="#94A3B8" height="12" rx="4" width="32" x="62" y="12" />
              <rect fill="#CBD5E1" height="8" rx="4" width="20" x="68" y="8" />
              <circle cx="78" cy="12" fill="#64748B" r="2.5" />
              <path d="M57 39L60 42L66 36" stroke="#2563EB" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" fill="none" />
              <rect fill="#CBD5E1" height="3" rx="1.5" width="26" x="70" y="38" />
              <path d="M57 52L60 55L66 49" stroke="#2563EB" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" fill="none" />
              <rect fill="#CBD5E1" height="3" rx="1.5" width="26" x="70" y="51" />
              <path d="M57 65L60 68L66 62" stroke="#2563EB" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" fill="none" />
              <rect fill="#E2E8F0" height="3" rx="1.5" width="18" x="70" y="64" />
            </g>
          </svg>
        </div>
        <div dir="rtl" style="text-align: right; display: flex; flex-direction: column; align-items: flex-end;">
          <button type="button" id="btn-return-from-review" style="background: var(--blueTint); border: none; color: var(--blue); cursor: pointer; display: flex; align-items: center; gap: 6px; font-family: var(--font); font-weight: 800; font-size: 12.5px; padding: 6px 12px; border-radius: 8px; margin-bottom: 12px;">
            الرجوع للأسئلة
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
               <path d="M9 5l7 7-7 7" />
            </svg>
          </button>
          <h1 class="review-title">مراجعة الاختبار</h1>
          <p class="review-subtitle">نظرة عامة قبل تسليم الاختبار</p>
        </div>
      </div>

      <div class="ltr-group summary-grid" style="width:100%; direction:ltr;">
        
        <div class="summary-card" style="background-color: var(--orangeTint); border-color: var(--orangeBorder);">
          <div class="summary-icon-wrap" style="background-color: var(--orangeIconBg);">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
            </svg>
          </div>
          <div class="summary-label">معلّمة للمراجعة</div>
          <div class="summary-value" style="color: var(--orangeDark);" id="summary-flagged">0 سؤال</div>
        </div>

        <div class="summary-card" style="background-color: var(--redTint); border-color: var(--redBorder);">
          <div class="summary-icon-wrap" style="background-color: var(--redIconBg);">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <div class="summary-label">أسئلة متروكة</div>
          <div class="summary-value" style="color: var(--redDark);" id="summary-unanswered">0 سؤال</div>
        </div>

        <div class="summary-card" style="background-color: var(--greenTint); border-color: var(--greenBorder);">
          <div class="summary-icon-wrap" style="background-color: var(--greenIconBg);">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="9" />
              <path d="M8.3 12.3l2.5 2.5 5-5.3" />
            </svg>
          </div>
          <div class="summary-label">مجابة</div>
          <div class="summary-value" style="color: var(--greenDark);" id="summary-answered">0 من {{ $session->total_questions }}</div>
        </div>

      </div>

      <div id="ready-card" class="ready-card hidden">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="9" />
          <path d="M8.3 12.3l2.5 2.5 5-5.3" />
        </svg>
        <div class="ready-title">أنت جاهز للتسليم!</div>
        <div class="ready-sub">أجبت على جميع الأسئلة ولا يوجد أي أسئلة معلّمة.</div>
      </div>

      <div id="notice-banner" class="ltr-group notice-banner" style="width:100%; direction:ltr;">
        <div aria-hidden="true" style="width: 58px; height: 58px; flex-shrink: 0; position: relative;">
          <svg viewBox="0 0 100 100" width="100%" height="100%">
            <rect fill="#FFFFFF" height="64" rx="8" stroke="#3B82F6" stroke-width="3" width="52" x="18" y="16" />
            <rect fill="#3B82F6" height="10" rx="4" width="22" x="33" y="10" />
            <path d="M28 33L31 36L38 29" stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="none" />
            <line stroke="#94A3B8" stroke-linecap="round" stroke-width="2.5" x1="41" x2="60" y1="33" y2="33" />
            <line stroke="#CBD5E1" stroke-linecap="round" stroke-width="2.5" x1="41" x2="56" y1="48" y2="48" />
            <circle cx="68" cy="68" fill="#FFFFFF" r="18" stroke="#3B82F6" stroke-width="3" />
            <path d="M68 58V68L74 72" stroke="#1D4ED8" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" fill="none" />
            <circle cx="68" cy="68" fill="#1D4ED8" r="2.5" />
          </svg>
        </div>
        <div dir="rtl" class="notice-lines">
          <div class="notice-line" id="notice-unanswered">
            <span class="notice-info-circle">i</span>
            <p class="notice-line-text">
              لديك <strong style="color: var(--blue)" id="notice-unanswered-cnt">0 سؤال</strong> غير مجاب. يفضل إجابتها قبل التسليم.
            </p>
          </div>
          <div class="notice-line" id="notice-flagged">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <p class="notice-line-text">
              لديك <strong style="color: var(--orange)" id="notice-flagged-cnt">0 سؤال</strong> معلّم للمراجعة.
            </p>
          </div>
        </div>
      </div>

      <div class="review-actions">
        
        <div class="review-row" id="row-review-unanswered" style="border-color: var(--redBorder);">
          <div class="review-row-icon-box" style="background-color: var(--redTint);">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
              <polyline points="14 2 14 8 20 8" />
              <line x1="9" x2="15" y1="13" y2="13" />
              <line x1="9" x2="11" y1="17" y2="17" />
              <circle cx="16" cy="17" r="2.5" />
              <line x1="18" x2="20" y1="19" y2="21" />
            </svg>
          </div>
          <div class="review-row-text">
            <div class="review-row-title">الأسئلة المتروكة (<span id="rev-row-unanswered-cnt">0</span>)</div>
            <div class="review-row-subtitle">مراجعة الأسئلة غير المجابة فقط</div>
          </div>
          <div class="review-row-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M15 19l-7-7 7-7" /></svg></div>
        </div>

        <div class="review-row" id="row-review-flagged" style="border-color: var(--orangeBorder);">
          <div class="review-row-icon-box" style="background-color: var(--orangeTint);">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
              <rect height="4" rx="1" ry="1" width="8" x="8" y="2" />
              <path d="M9.5 10.5C9.5 9 10.5 8 12 8s2.5 1 2.5 2.5c0 1.5-1.5 2-1.5 3" />
              <circle cx="12" cy="17" fill="currentColor" r=".5" stroke="none" />
            </svg>
          </div>
          <div class="review-row-text">
            <div class="review-row-title">الأسئلة المعلّمة (<span id="rev-row-flagged-cnt">0</span>)</div>
            <div class="review-row-subtitle">مراجعة الأسئلة التي ميزتها بنجمة</div>
          </div>
          <div class="review-row-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M15 19l-7-7 7-7" /></svg></div>
        </div>

        <div class="review-row" id="row-review-all" style="border-color: var(--blueBorder);">
          <div class="review-row-icon-box" style="background-color: var(--blueTint);">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <rect x="5" y="4" width="12" height="17" rx="1.5" />
              <path d="M9 3.5h4a1 1 0 0 1 1 1V6H8V4.5a1 1 0 0 1 1-1Z" />
              <circle cx="17.5" cy="16.5" r="4.2" fill="#FFFFFF" />
              <path d="M17.5 14.5v2l1.3.9" />
            </svg>
          </div>
          <div class="review-row-text">
            <div class="review-row-title">كل الأسئلة</div>
            <div class="review-row-subtitle">تصفح جميع أسئلة الاختبار مجدداً</div>
          </div>
          <div class="review-row-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M15 19l-7-7 7-7" /></svg></div>
        </div>

      </div>

      <div class="submit-footer">
        <button type="button" class="submit-button" id="btn-trigger-submit">
          تسليم الاختبار
        </button>
        <div class="submit-footnote">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
          لا يمكن التراجع بعد التسليم
        </div>
      </div>

    </main>
  </div>


  <!-- ==========================================
       MODALS & SHEETS
  =========================================== -->
  
  <!-- Question Map Bottom Sheet -->
  <div class="sheet-overlay" id="nav-sheet">
    <div class="sheet-content">
      <div class="sheet-handle"></div>
      <div class="sheet-header">
        <div class="sheet-title">خريطة الأسئلة</div>
        <button type="button" class="sheet-close" id="btn-close-sheet">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 6l12 12M18 6 6 18" />
          </svg>
        </button>
      </div>

      <div class="legend">
        <div class="legend-item"><span class="legend-swatch" style="background:#FFFFFF; border-color:var(--border);"></span> <span class="legend-label">متروك</span></div>
        <div class="legend-item"><span class="legend-swatch" style="background:var(--greenTint); border-color:var(--green);"></span> <span class="legend-label">مجاب</span></div>
        <div class="legend-item"><span class="legend-swatch" style="background:var(--orangeTint); border-color:var(--orange);"></span> <span class="legend-label">للمراجعة</span></div>
      </div>

      <div class="q-grid">
        @for($i=0; $i<$session->total_questions; $i++)
          <button type="button" class="grid-cell status-unanswered" data-map-index="{{$i}}">
            {{$i+1}}
            <span class="grid-flag hidden">⭐</span>
          </button>
        @endfor
      </div>
    </div>
  </div>

  <!-- Final Confirmation Modal -->
  <div class="modal-overlay" id="confirm-modal">
    <div class="modal-card">
      <div class="modal-icon-wrap">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" style="transform: scaleX(-1) rotate(12deg); transform-origin: center;" />
        </svg>
      </div>
      <div class="modal-title">تأكيد التسليم</div>
      <div class="modal-body" id="confirm-body-text">
        هل أنت متأكد من تسليم الاختبار؟
      </div>
      <div class="modal-actions">
        <button type="button" class="modal-cancel-btn" id="btn-cancel-submit">رجوع</button>
        <button type="button" class="modal-confirm-btn" id="btn-final-submit">تأكيد التسليم</button>
      </div>
    </div>
  </div>

  <!-- Flag Confirmation Modal (Review Flagged Queue) -->
  <div class="modal-overlay" id="confirm-flag-modal">
    <div class="modal-card">
      <div class="modal-icon-wrap" style="background-color: var(--orangeTint);">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
          <rect height="4" rx="1" ry="1" width="8" x="8" y="2" />
          <path d="M9.5 10.5C9.5 9 10.5 8 12 8s2.5 1 2.5 2.5c0 1.5-1.5 2-1.5 3" />
          <circle cx="12" cy="17" fill="currentColor" r=".5" stroke="none" />
        </svg>
      </div>
      <div class="modal-title">تأكيد الإجابة</div>
      <div class="modal-body">
        هل تود تأكيد هذه الإجابة؟ لو أكدت، هيتم إلغاء تعليم المراجعة عن السؤال.
      </div>
      <div class="modal-actions">
        <button type="button" class="modal-cancel-btn" id="btn-confirm-flag-no">لا</button>
        <button type="button" class="modal-confirm-btn" id="btn-confirm-flag-yes">نعم</button>
      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const totalQuestions = {{ $session->total_questions }};
    let currentIndex = 0;
    
    // State 
    let answers = {};
    let flags = {};
    let reviewQueueIds = null;
    let reviewQueuePos = 0;
    let reviewQueueType = null; // 'flagged' | 'unanswered' | null
    let flagReviewSnapshots = {}; // idx -> answer snapshot captured when a flagged question is opened in review mode
    let pendingFlagIdx = null; // question idx awaiting the "confirm answer" modal decision

    // View States
    // view: 'question' | 'review'

    function isQuestionAnswered(idx) {
        let card = $(`.question-card[data-index="${idx}"]`);
        let checkedCount = card.find('.option-input:checked').length;
        let isMulti = card.data('is-multi');
        if (isMulti) {
            let requiredCount = parseInt(card.data('required-count'), 10);
            return checkedCount === requiredCount;
        }
        return checkedCount > 0;
    }

    function getAnswerSnapshot(idx) {
        let card = $(`.question-card[data-index="${idx}"]`);
        let vals = card.find('.option-input:checked').map(function() { return $(this).val(); }).get();
        vals.sort();
        return vals.join(',');
    }

    function syncState() {
        answers = {};
        for(let i=0; i<totalQuestions; i++) {
            if (isQuestionAnswered(i)) {
                answers[i] = true;
            }
        }
    }

    // بيحدث حالة العلامة (flag) لسؤال معيّن، وبيزامن شكل زرار "علّم للمراجعة"
    // لو السؤال ده هو الظاهر دلوقتي على الشاشة
    function setFlag(idx, value) {
        flags[idx] = value;
        let starBtn = $(`.btn-mark-star[data-index="${idx}"]`);
        let starLabel = starBtn.find('.mark-label');
        if (value) {
            starBtn.addClass('flagged');
            starLabel.text('معلّم للمراجعة');
        } else {
            starBtn.removeClass('flagged');
            starLabel.text('علّم السؤال للمراجعة');
        }
        updateQuestionMap();
    }

    function updateQuestionMap() {
        syncState();
        let answeredCount = Object.keys(answers).length;
        let flaggedCount = Object.keys(flags).filter(k => flags[k]).length;
        let unansweredCount = totalQuestions - answeredCount;

        // Progress bar
        let pct = (currentIndex + 1) / totalQuestions * 100;
        $('#progress-fill').css('width', pct + '%');
        $('#lbl-q-index').text(currentIndex + 1);

        // Grid map cells
        $('.grid-cell').each(function() {
            let idx = $(this).data('map-index');
            let isAns = !!answers[idx];
            let isFlag = !!flags[idx];

            $(this).removeClass('status-unanswered status-answered status-flagged status-answered-flagged');
            
            if (isAns && isFlag) $(this).addClass('status-answered-flagged');
            else if (isFlag) $(this).addClass('status-flagged');
            else if (isAns) $(this).addClass('status-answered');
            else $(this).addClass('status-unanswered');

            if(isFlag) $(this).find('.grid-flag').removeClass('hidden');
            else $(this).find('.grid-flag').addClass('hidden');
            
            // highlight current
            if (idx === currentIndex) {
                $(this).css('border-color', 'var(--blue)');
                $(this).css('border-width', '2px');
            } else {
                $(this).css('border-width', '1px');
                if(!isAns && !isFlag) $(this).css('border-color', 'var(--border)');
            }
        });

        // Update review dashboard counts (يتنفذوا كل مرة يتغير فيها أي إجابة أو علامة مراجعة)
        $('#rev-answered').text(answeredCount);
        $('#rev-unanswered').text(unansweredCount);
        $('#rev-flagged').text(flaggedCount);
        $('#rev-row-unanswered-cnt').text(unansweredCount);
        $('#rev-row-flagged-cnt').text(flaggedCount);

        // Review Dashboard update
        $('#summary-answered').text(answeredCount + ' من ' + totalQuestions);
        $('#summary-unanswered').text(unansweredCount + ' سؤال');
        $('#summary-flagged').text(flaggedCount + ' سؤال');

        if(unansweredCount === 0 && flaggedCount === 0) {
            $('#ready-card').removeClass('hidden');
            $('#notice-banner').addClass('hidden');
        } else {
            $('#ready-card').addClass('hidden');
            $('#notice-banner').removeClass('hidden');
            
            if(unansweredCount > 0) {
                $('#notice-unanswered').removeClass('hidden');
                $('#notice-unanswered-cnt').text(unansweredCount + ' سؤال');
            } else {
                $('#notice-unanswered').addClass('hidden');
            }

            if(flaggedCount > 0) {
                $('#notice-flagged').removeClass('hidden');
                $('#notice-flagged-cnt').text(flaggedCount + ' سؤال');
            } else {
                $('#notice-flagged').addClass('hidden');
            }
        }
        
        // Hide/show row actions based on count
        if (unansweredCount === 0) $('#row-review-unanswered').addClass('hidden');
        else $('#row-review-unanswered').removeClass('hidden');
        
        if (flaggedCount === 0) $('#row-review-flagged').addClass('hidden');
        else $('#row-review-flagged').removeClass('hidden');
    }

    function showQuestion(idx) {
        currentIndex = idx;
        $('.question-card').addClass('hidden').removeClass('active');
        $(`.question-card[data-index="${idx}"]`).removeClass('hidden').addClass('active');

        // Review Queue Banner
        if (reviewQueueIds) {
            $('#review-queue-banner').removeClass('hidden');
            $('#rq-remaining').text(reviewQueueIds.length - reviewQueuePos);
            // In review mode, button is "Next" if not last in queue, else "Finish Review"
            if (reviewQueuePos < reviewQueueIds.length - 1) {
                $('#btn-next').text('التالي');
            } else {
                $('#btn-next').text('إنهاء المراجعة');
            }
        } else {
            $('#review-queue-banner').addClass('hidden');
            $('#btn-next').text(currentIndex === totalQuestions - 1 ? 'إنهاء' : 'التالي');
        }

        $('#btn-prev').prop('disabled', (reviewQueueIds && reviewQueuePos === 0) || (!reviewQueueIds && currentIndex === 0));

        // تحديث حالة زر "علّم للمراجعة" الظاهر فوق السؤال الحالي عشان يتزامن مع أي تعديل حصل
        let currentCard = $(`.question-card[data-index="${idx}"]`);
        let starBtn = currentCard.find('.btn-mark-star');
        let starLabel = starBtn.find('.mark-label');
        if (flags[idx]) {
            starBtn.addClass('flagged');
            starLabel.text('معلّم للمراجعة');
        } else {
            starBtn.removeClass('flagged');
            starLabel.text('علّم السؤال للمراجعة');
        }

        // لو داخلين في جولة مراجعة "الأسئلة المعلّمة"، نسجّل حالة الإجابة الحالية
        // عشان نقدر نعرف بعدين لما يدوس "التالي" هل غيّرها ولا لأ
        if (reviewQueueIds && reviewQueueType === 'flagged') {
            flagReviewSnapshots[idx] = getAnswerSnapshot(idx);
        }

        updateQuestionMap();
        window.scrollTo({top: 0});
    }

    // Toggle Flag (event delegation عشان تفضل شغالة مهما اتغيرت الشاشة الظاهرة،
    // وعشان الأرقام تتحدث فورًا لحظة بلحظة مع كل تعليم/إلغاء تعليم)
    $(document).on('click', '.btn-mark-star', function() {
        let idx = $(this).data('index');
        setFlag(idx, !flags[idx]);
    });

    // Options Selection Visuals (event delegation لنفس السبب: تحديث فوري
    // لعدد "الأسئلة المجابة/المتروكة" مع كل اختيار إجابة)
    $(document).on('change', '.option-input', function() {
        let type = $(this).attr('type');
        let card = $(this).closest('.question-card');
        
        if (type === 'radio') {
            card.find('.option-button').removeClass('selected');
            
            $(this).closest('.option-button').addClass('selected');
        } else {
            let btn = $(this).closest('.option-button');
            if ($(this).is(':checked')) {
                btn.addClass('selected');
            } else {
                btn.removeClass('selected');
            }
        }
        updateQuestionMap();
    });

    // Navigation
    // بيكمّل فعليًا لخطوة "التالي" (بعد ما أي تحقق خاص بوضع مراجعة الأسئلة المعلّمة يخلص)
    function proceedNext() {
        if (reviewQueueIds) {
            if (reviewQueuePos < reviewQueueIds.length - 1) {
                reviewQueuePos++;
                showQuestion(reviewQueueIds[reviewQueuePos]);
            } else {
                // Exit queue
                reviewQueueIds = null;
                reviewQueueType = null;
                showReviewScreen();
            }
        } else {
            if (currentIndex < totalQuestions - 1) {
                showQuestion(currentIndex + 1);
            } else {
                showReviewScreen();
            }
        }
    }

    $('#btn-next').on('click', function() {
        // السلوك الخاص بيشتغل بس جوه جولة مراجعة "الأسئلة المعلّمة"
        if (reviewQueueIds && reviewQueueType === 'flagged') {
            let idx = currentIndex;
            if (flags[idx]) {
                let currentSnapshot = getAnswerSnapshot(idx);
                let initialSnapshot = flagReviewSnapshots[idx];

                if (currentSnapshot !== initialSnapshot) {
                    // غيّر الإجابة -> تتشال العلامة تلقائي وينتقل عادي
                    setFlag(idx, false);
                    proceedNext();
                } else {
                    // مغيرش الإجابة -> اسأله تأكيد قبل ما يكمل
                    pendingFlagIdx = idx;
                    $('#confirm-flag-modal').css('display', 'flex');
                }
                return;
            }
        }
        proceedNext();
    });

    $('#btn-confirm-flag-yes').on('click', function() {
        $('#confirm-flag-modal').css('display', 'none');
        if (pendingFlagIdx !== null) {
            setFlag(pendingFlagIdx, false);
            pendingFlagIdx = null;
        }
        proceedNext();
    });

    $('#btn-confirm-flag-no').on('click', function() {
        $('#confirm-flag-modal').css('display', 'none');
        // العلامة تفضل زي ما هي، ويكمل للسؤال اللي بعده عادي
        pendingFlagIdx = null;
        proceedNext();
    });

    $('#btn-prev').on('click', function() {
        if (reviewQueueIds) {
            if (reviewQueuePos > 0) {
                reviewQueuePos--;
                showQuestion(reviewQueueIds[reviewQueuePos]);
            }
        } else {
            if (currentIndex > 0) {
                showQuestion(currentIndex - 1);
            }
        }
    });

    $('#btn-finish-exam').on('click', function() {
        reviewQueueIds = null;
        reviewQueueType = null;
        showReviewScreen();
    });

    $('#btn-exit-queue').on('click', function() {
        reviewQueueIds = null;
        reviewQueueType = null;
        showReviewScreen();
    });

    // Navigator Sheet
    $('#btn-open-nav').on('click', function() {
        updateQuestionMap();
        $('#nav-sheet').css('display', 'flex');
    });
    $('#btn-close-sheet').on('click', function() {
        $('#nav-sheet').css('display', 'none');
    });
    $(document).on('click', '.grid-cell', function() {
        let idx = $(this).data('map-index');
        $('#nav-sheet').css('display', 'none');
        reviewQueueIds = null; // drop out of queue if map used
        reviewQueueType = null;
        $('#view-review').addClass('hidden');
        $('#view-question').removeClass('hidden');
        showQuestion(idx);
    });

    // Views
    function showReviewScreen() {
        updateQuestionMap();
        $('#view-question').addClass('hidden');
        $('#view-review').removeClass('hidden');
        window.scrollTo({top: 0});
    }

    // Review Actions
    function buildQueue(filter) {
        syncState();
        let q = [];
        for(let i=0; i<totalQuestions; i++) {
            if (filter === 'unanswered' && !isQuestionAnswered(i)) q.push(i);
            if (filter === 'flagged' && flags[i]) q.push(i);
        }
        return q;
    }

    $('#row-review-unanswered').on('click', function() {
        let q = buildQueue('unanswered');
        if (q.length) {
            reviewQueueIds = q;
            reviewQueuePos = 0;
            reviewQueueType = 'unanswered';
            $('#view-review').addClass('hidden');
            $('#view-question').removeClass('hidden');
            showQuestion(reviewQueueIds[0]);
        }
    });

    $('#row-review-flagged').on('click', function() {
        let q = buildQueue('flagged');
        if (q.length) {
            reviewQueueIds = q;
            reviewQueuePos = 0;
            reviewQueueType = 'flagged';
            $('#view-review').addClass('hidden');
            $('#view-question').removeClass('hidden');
            showQuestion(reviewQueueIds[0]);
        }
    });

    $('#row-review-all').on('click', function() {
        reviewQueueIds = null;
        reviewQueueType = null;
        $('#view-review').addClass('hidden');
        $('#view-question').removeClass('hidden');
        showQuestion(0);
    });

    $('#btn-return-from-review').on('click', function() {
        reviewQueueIds = null;
        reviewQueueType = null;
        $('#view-review').addClass('hidden');
        $('#view-question').removeClass('hidden');
        showQuestion(currentIndex);
    });

    // Final Submit
    $('#btn-trigger-submit').on('click', function() {
        syncState();
        let unansweredCount = totalQuestions - Object.keys(answers).length;
        if (unansweredCount > 0) {
            $('#confirm-body-text').text("لديك " + unansweredCount + " أسئلة غير مجابة. هل أنت متأكد من تسليم الاختبار؟");
        } else {
            $('#confirm-body-text').text("أجبت على جميع الأسئلة. هل أنت متأكد من تسليم الاختبار؟");
        }
        $('#confirm-modal').css('display', 'flex');
    });

    $('#btn-cancel-submit').on('click', function() {
        $('#confirm-modal').css('display', 'none');
    });

    $('#btn-final-submit').on('click', function() {
        $('#exam-form').submit();
    });

    // Timer Logic
    const hasTimer = {{ $hasTimer ? 'true' : 'false' }};
    let timeLeft = {{ $timeLeftSeconds }};

    if (hasTimer) {
        function updateTimerDisplay() {
            let h = Math.floor(timeLeft / 3600);
            let m = Math.floor((timeLeft % 3600) / 60);
            let s = timeLeft % 60;

            let display = '';
            if (h > 0) display += String(h).padStart(2, '0') + ':';
            display += String(m).padStart(2, '0') + ':' + String(s).padStart(2, '0');

            $('#exam-timer').text(display);

            if (timeLeft <= 300) {
                $('#exam-timer').addClass('low');
                $('#timer-icon').attr('stroke', 'var(--red)');
            } else {
                $('#exam-timer').removeClass('low');
                $('#timer-icon').attr('stroke', 'currentColor');
            }
        }

        updateTimerDisplay();

        let timerInterval = setInterval(function() {
            timeLeft--;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                $('#exam-form').submit(); 
            } else {
                updateTimerDisplay();
            }
        }, 1000);
    }

    // Init
    updateQuestionMap();
    showQuestion(0);
});
</script>
@endpush
````
