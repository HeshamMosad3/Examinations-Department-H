<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Services\Assessments\AssessmentData;
use App\Services\Assessments\AttemptService;
use App\Services\Auth\ProfileForm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * اختبار مفاتيح الشخصية السبعة (7PK): مفتاح في كل خطوة (12 عبارة)، وكل المحتوى (المفاتيح والأوصاف والعبارات والاختيارات)
 * جاي من المقياس المحفوظ في قاعدة البيانات، فأي تعديل من لوحة الإدارة بيظهر هنا.
 */
class PersonalityKeysController extends Controller
{
    public function __construct(private readonly AttemptService $attempts) {}

    public function test(Request $request)
    {
        // زي مقاييس الموقع التانية: الزائر بيسجّل الأول وبعدها يرجع للاختبار
        if (! auth()->check()) {
            return redirect()->route('login', ['next' => 'personality-keys-test'])
                ->with('info', cms('auth.login.assessment_notice', 'يرجى تسجيل الدخول أو إنشاء حساب للبدء في إجراء الاختبار.'));
        }

        $data = $this->data();

        $keys = $data->roots()->values()->map(function ($root, $i) use ($data) {
            // "البصيرة: كيف ترى وتفهم؟" ← اسم المفتاح + سؤاله
            [$name, $tagline] = array_pad(array_map('trim', explode(':', $root->name_ar, 2)), 2, '');

            return [
                'id' => $root->id,
                'code' => strtoupper($root->code),
                'number' => $i + 1,
                'name' => $name,
                'tagline' => $tagline,
                // "البصيرة هي قدرة الشخص..." ← "قدرة الشخص..." (التصميم بيبدأ الوصف من غير اسم المفتاح)
                'description' => preg_replace('/^' . preg_quote($name, '/') . '\s+(?:هو|هي)\s+/u', '', $root->description_ar),
                'questions' => $data->questionsUnder($root->id)->values()->map(fn ($q, $n) => [
                    'id' => $q->id,
                    'number' => $n + 1,
                    'text' => $q->text_ar,
                    // الاختيارات من الأعلى درجة للأقل، بنفس ترتيب أزرار 4 ← 0
                    'options' => collect($q->options)->sortByDesc('score_value')->pluck('id')->values()->all(),
                ])->all(),
            ];
        })->all();

        return view('landing.personality-keys-test', [
            'keys' => $keys,
            'optionsCount' => $data->questions->first()->options ? count($data->questions->first()->options) : 5,
        ]);
    }

    /** بيحفظ الإجابات كاملة (question_id => option_id) ويرجّع صفحة النتيجة */
    public function store(Request $request): JsonResponse
    {
        $data = $this->data();
        $answers = $request->validate(['answers' => ['required', 'array']])['answers'];

        $clean = [];
        foreach ($data->questions as $question) {
            $optionId = (int) ($answers[$question->id] ?? 0);
            if (! collect($question->options)->contains('id', $optionId)) {
                throw ValidationException::withMessages(['answers' => 'يجب الإجابة على كل العبارات قبل عرض النتيجة.']);
            }
            $clean[$question->id] = $optionId;
        }

        $this->attempts->save($request->user()->id, $data, $clean);

        return response()->json(['ok' => true, 'redirect' => route('keys.result')]);
    }

    /** نتيجة التقييم: مخطط المفاتيح السبعة وأبرز مفاتيحك وتفسير عام للنتيجة */
    public function result(Request $request): View|\Illuminate\Http\RedirectResponse
    {
        $loaded = $this->loadResult($request);
        if ($loaded instanceof \Illuminate\Http\RedirectResponse) {
            return $loaded;
        }

        $keys = $loaded['keys'];
        $overall = (int) round($keys->avg('percent'));

        // التفسير الإجمالي (ماذا تعني هذه النتيجة؟): مستوى المقياس كله اللي مجموع درجات المستخدم واقع في نطاقه، ومخزن في قاعدة البيانات
        $overallLevel = \App\Models\ResultLevel::where('assessment_id', $loaded['assessmentId'])
            ->whereNull('dimension_id')
            ->where('min_score', '<=', $loaded['total'])
            ->where('max_score', '>=', $loaded['total'])
            ->first();

        return view('landing.personality-keys-result', $loaded + [
            'overallLevel' => $overallLevel,
            'top' => $keys->first(),
            'next' => $keys->get(1),
            'lowest' => $keys->last(),
            'overall' => $overall,
            // عدد الأبعاد الفرعية اللي اتحسبت منها المفاتيح
            'subCount' => $keys->sum(fn ($key) => $key->subs->count()),
        ]);
    }

    /** تفاصيل المفاتيح: كارت لكل مفتاح بمستواه ومحاوره الفرعية */
    public function details(Request $request): View|\Illuminate\Http\RedirectResponse
    {
        $loaded = $this->loadResult($request);

        return $loaded instanceof \Illuminate\Http\RedirectResponse ? $loaded : view('landing.personality-keys-details', $loaded);
    }

    /** آخر نتيجة للمستخدم: درجة ومستوى كل مفتاح (ومحاوره الفرعية) من المستويات المحفوظة للمقياس */
    private function loadResult(Request $request): array|\Illuminate\Http\RedirectResponse
    {
        $data = $this->data();
        $attempt = $this->attempts->latest($request->user()->id, $data->assessment->id);

        if (! $attempt) {
            return redirect()->route('keys.test');
        }

        $scores = DB::table('attempt_scores as s')
            ->join('dimensions as d', 'd.id', '=', 's.dimension_id')
            ->leftJoin('result_levels as l', 'l.id', '=', 's.level_id')
            ->where('s.attempt_id', $attempt->id)
            ->orderBy('d.order_index')
            ->get(['d.id', 'd.parent_id', 'd.code', 'd.name_ar', 's.score', 's.max_score', 's.percent', 'l.title_ar as level_title', 'l.summary_ar as level_summary']);

        $subsByKey = $scores->whereNotNull('parent_id')->groupBy('parent_id');

        // المفاتيح الأعلى درجة الأول (زي التصميم)، والتفاصيل (المحاور الفرعية) جوه كل مفتاح
        $keys = $scores->whereNull('parent_id')->map(function ($row) use ($subsByKey) {
            [$name, $tagline] = array_pad(array_map('trim', explode(':', $row->name_ar, 2)), 2, '');

            return (object) [
                'code' => strtoupper($row->code),
                'name' => $name,
                'tagline' => $tagline,
                'score' => (int) $row->score,
                'max' => (int) $row->max_score,
                'percent' => (int) round($row->percent),
                'level' => $row->level_title,
                'summary' => $row->level_summary,
                'subs' => collect($subsByKey->get($row->id, []))->map(fn ($sub) => (object) [
                    'code' => strtoupper($sub->code),
                    'name' => trim($sub->name_ar),
                    'score' => (int) $sub->score,
                    'max' => (int) $sub->max_score,
                    'percent' => (int) round($sub->percent),
                    'level' => $sub->level_title,
                    'summary' => $sub->level_summary,
                ])->values(),
            ];
        })->sortBy([['percent', 'desc'], ['score', 'desc']])->values();

        return [
            'keys' => $keys,
            'title' => $data->assessment->title_ar,
            'assessmentId' => $data->assessment->id,
            'total' => (int) $attempt->total_score,
            // مستوى كل مفتاح ونصه التفصيلي بيظهروا بعد اكتمال الملف الشخصي (الدرجات بتظهر للكل)
            'profileComplete' => app(ProfileForm::class)->isComplete($request->user()),
        ];
    }

    private function data(): AssessmentData
    {
        $assessment = Assessment::byCode(Assessment::SEVEN_PERSONALITY_KEYS);
        abort_if(! $assessment, 404);
        $data = AssessmentData::load($assessment);
        abort_if($data->questions->isEmpty(), 404);

        return $data;
    }
}
