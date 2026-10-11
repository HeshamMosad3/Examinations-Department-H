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

    /** آخر نتيجة للمستخدم: درجة ومستوى كل مفتاح من المستويات المحفوظة للمقياس */
    public function result(Request $request): View|\Illuminate\Http\RedirectResponse
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
            ->whereNull('d.parent_id')
            ->orderBy('d.order_index')
            ->get(['d.code', 'd.name_ar', 's.score', 's.max_score', 's.percent', 'l.title_ar as level_title', 'l.summary_ar as level_summary']);

        $keys = $scores->map(function ($row) {
            [$name, $tagline] = array_pad(array_map('trim', explode(':', $row->name_ar, 2)), 2, '');

            return (object) [
                'code' => strtoupper($row->code),
                'name' => $name,
                'tagline' => $tagline,
                'score' => (int) $row->score,
                'max' => (int) $row->max_score,
                'percent' => (int) $row->percent,
                'level' => $row->level_title,
                'summary' => $row->level_summary,
            ];
        });

        return view('landing.personality-keys-result', [
            'keys' => $keys,
            'title' => $data->assessment->title_ar,
            // مستوى كل مفتاح ونصه التفصيلي بيظهروا بعد اكتمال الملف الشخصي (الدرجات بتظهر للكل)
            'profileComplete' => app(ProfileForm::class)->isComplete($request->user()),
        ]);
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
