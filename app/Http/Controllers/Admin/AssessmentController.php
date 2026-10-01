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

        if (view()->exists('user.result')) {
            return view('user.result', array_merge(['session' => $session], $formattedData));
        }

        return response()->json(array_merge(['session' => $session], $formattedData));
    }
}
