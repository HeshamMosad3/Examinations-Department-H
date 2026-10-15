<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Attempt;
use App\Models\ResultLevel;
use App\Services\LifeWheelService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LifeWheelController extends Controller
{
    public function __construct(
        private readonly LifeWheelService $lifeWheel,
    ) {}

    /**
     * Save the signed-in user's finished wheel-of-life test (answers come from the landing test, 8 x 10, values 0..4).
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'answers' => ['required', 'array', 'size:8'],
            'answers.*' => ['required', 'array', 'size:10'],
            'answers.*.*' => ['required', 'integer', 'between:0,4'],
        ]);

        $attempt = $this->lifeWheel->saveAnswers($request->user(), $data['answers']);

        return response()->json([
            'ok' => true,
            'session_id' => $attempt->id,
            'user_id' => $request->user()->id,
            'redirect' => route('life-wheel.details'),
        ]);
    }

    /**
     * "تفاصيل الجوانب": the user's saved result, per aspect and per sub-aspect.
     */
    public function details(Request $request): View
    {
        $result = $this->lifeWheel->resultFor($request->user());

        $aspects = collect(require resource_path('data/life-wheel-aspects.php'))
            ->keyBy('key')
            ->map(function (array $aspect) use ($result) {
                $mine = $result['aspects'][$aspect['key']] ?? null;
                $aspect['percent'] = $mine['percent'] ?? 0;
                foreach ($aspect['subs'] as $i => $sub) {
                    $aspect['subs'][$i]['value'] = $mine['subs'][$i] ?? 0;
                }

                return $aspect;
            });

        return view('landing.life-wheel-details', [
            'aspects' => $aspects,
            'hasResult' => $result !== null,
        ]);
    }

    /**
     * تقرير الـPDF (صفحة واحدة طويلة): عجلة الحياة + أعلى/أقل جانب + التفسير الإجمالي + تفاصيل الجوانب الثمانية بأجزائها الفرعية.
     * بيتفتح من "تحميل التقرير" (?print=1) وبيفتح نافذة الطباعة لحفظه PDF.
     */
    public function report(Request $request): View|RedirectResponse
    {
        $result = $this->lifeWheel->resultFor($request->user());
        if (! $result) {
            return redirect()->route('life-wheel.assessment');
        }

        $aspectsData = collect(require resource_path('data/life-wheel-aspects.php'))->keyBy('key');

        // الجوانب بترتيب العجلة (من الشخصي مع عقارب الساعة) مع ألوانها ونسبها ونسب أجزائها الفرعية
        $aspects = collect(require resource_path('data/life-wheel-report-theme.php'))->map(function (array $theme) use ($aspectsData, $result) {
            $aspect = $aspectsData[$theme['key']];
            $mine = $result['aspects'][$theme['key']] ?? ['percent' => 0, 'subs' => []];

            return $theme + [
                'label' => $aspect['dimension'],
                'name' => $aspect['name'],
                'desc' => $aspect['desc'],
                'percent' => $mine['percent'],
                'subs' => collect($aspect['subs'])->map(fn (array $sub, int $i) => [
                    'title' => $sub['title'],
                    'desc' => $sub['desc'],
                    'value' => $mine['subs'][$i] ?? 0,
                    'icon' => $theme['key'] . '-' . ($i + 1) . '.svg',
                ])->all(),
            ];
        });

        $overall = (int) $result['overall'];

        // «ماذا تعني هذه النتيجة؟»: نص مستوى النتيجة الكلية (بالنسبة المئوية) من قاعدة البيانات، وإلا الجملة العامة
        $level = ResultLevel::query()
            ->whereIn('assessment_id', Assessment::where('code', Assessment::WHEEL_OF_LIFE)->select('id'))
            ->whereNull('dimension_id')
            ->where('min_score', '<=', $overall)
            ->where('max_score', '>=', $overall)
            ->first(['title_ar', 'description_ar']);

        $attempt = Attempt::find($result['attempt_id']);

        return view('landing.life-wheel-report', [
            'aspects' => $aspects,
            'highest' => $aspects->sortByDesc('percent')->first(),
            'lowest' => $aspects->sortBy('percent')->first(),
            'overall' => $overall,
            'levelTitle' => $level?->title_ar,
            'levelText' => filled($level?->description_ar) ? $level->description_ar : null,
            'completedAt' => $attempt?->completed_at ?? $attempt?->created_at ?? now(),
            'reportCode' => $this->lifeWheel->data()?->assessment->report_code ?: 'REP-WHEEL',
            'beneficiary' => $request->user()->name,
        ]);
    }
}
