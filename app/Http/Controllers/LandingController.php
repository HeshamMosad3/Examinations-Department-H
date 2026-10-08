<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ChallengeQuestion;
use App\Services\Assessments\AssessmentData;
use App\Services\Assessments\PerceptualReportBuilder;
use App\Services\Assessments\ScoringService;
use App\Services\LifeWheelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * صفحات الموقع العامة. كل البيانات من قاعدة البيانات، والصفحات (resources/views/landing) بتاخدها بنفس الشكل.
 */
class LandingController extends Controller
{
    public function home(): View
    {
        $challengeQuestions = ChallengeQuestion::where('is_active', true)->get()->values()->map(fn ($q, $index) => [
            'id' => $q->id,
            'question' => $q->question,
            'type' => $q->type,
            'patternRow' => $q->pattern_row,
            'options' => $q->options,
            'correctIndex' => $q->correct_index,
            'initialBtnText' => $index === 0 ? 'ابدأ التحدي' : null,
        ]);

        return view('landing.index', compact('challengeQuestions'));
    }

    public function lifeWheelAssessment(LifeWheelService $lifeWheel)
    {
        if (! auth()->check()) {
            return redirect()->route('login', ['next' => 'life-wheel-assessment'])
                ->with('info', 'يرجى تسجيل الدخول أو إنشاء حساب للبدء في إجراء الاختبار.');
        }

        return view('landing.life-wheel-assessment', ['categories' => $lifeWheel->categories()]);
    }

    public function lifeWheelResult(LifeWheelService $lifeWheel): View
    {
        return view('landing.result', ['categories' => $lifeWheel->categories()]);
    }

    public function wheelTest(LifeWheelService $lifeWheel): View
    {
        return view('landing.life-wheel-test', ['categories' => $lifeWheel->categories()]);
    }

    /** "اكتشف أنماط الإدراك": عدد أسئلة المقياس */
    public function perceptualExplore(): View
    {
        $questionsCount = DB::table('questions as q')
            ->join('assessments as a', 'a.id', '=', 'q.assessment_id')
            ->where('a.code', Assessment::PERCEPTUAL_STYLES)
            ->where('a.is_active', true)
            ->count();

        return view('landing.perceptual-explore', compact('questionsCount'));
    }

    public function perceptualTest()
    {
        if (! auth()->check()) {
            return redirect()->route('login', ['next' => 'perceptual-test'])
                ->with('info', 'يرجى تسجيل الدخول أو إنشاء حساب للبدء في إجراء الاختبار.');
        }

        $questions = $this->perceptual()->questions->map(fn ($q) => [
            'text' => $q->text_ar,
            'options' => array_map(fn ($o) => ['label' => $o->label_ar], $q->options),
        ])->all();

        return view('landing.perceptual-test', compact('questions'));
    }

    /** التقرير: الإجابات جاية في الرابط (ترتيب الاختيار لكل سؤال) والدرجات بتتحسب من قاعدة البيانات */
    public function perceptualResult(Request $request, ScoringService $scoring, PerceptualReportBuilder $builder): View
    {
        $data = $this->perceptual();
        $answers = explode(',', (string) $request->query('answers'));
        abort_if(count($answers) !== $data->questions->count(), 422, 'إجابات غير مكتملة');

        $byQuestion = [];
        foreach ($data->questions->values() as $i => $question) {
            $option = ctype_digit($answers[$i]) ? ($question->options[(int) $answers[$i]] ?? null) : null;
            abort_if(! $option, 422, 'إجابة غير صحيحة');
            $byQuestion[$question->id] = $option->id;
        }

        $result = $scoring->score($data, $byQuestion);
        abort_if(! $result['level'], 404, 'لا يوجد تقرير مسجل لهذه النتيجة');

        $styles = collect($result['dimensions'])->whereNull('parent_id')
            ->map(fn ($d) => ['key' => $d['code'], 'name' => $d['name'], 'score' => $d['score'], 'max' => $d['max']])
            ->sortByDesc('score')->values();

        return view('landing.perceptual-result', [
            'report' => $builder->build($result['level']),
            'styles' => $styles,
            'reportCode' => $data->assessment->report_code,
            'beneficiary' => auth()->user()?->name ?? 'زائر',
        ]);
    }

    private function perceptual(): AssessmentData
    {
        $assessment = Assessment::byCode(Assessment::PERCEPTUAL_STYLES);
        abort_if(! $assessment, 404);
        $data = AssessmentData::load($assessment);
        abort_if($data->questions->isEmpty(), 404);

        return $data;
    }
}
