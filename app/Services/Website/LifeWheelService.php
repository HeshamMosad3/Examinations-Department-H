<?php

namespace App\Services\Website;

use App\Models\Assessment;
use App\Models\Attempt;
use App\Models\User;
use App\Services\Website\Assessments\AssessmentData;
use App\Services\Website\Assessments\AttemptService;
use Illuminate\Validation\ValidationException;

/**
 * مقياس "عجلة الحياة" في الموقع: بيانات صفحة الاختبار، وحفظ إجابات المستخدم المسجّل، ونتيجته في صفحة "تفاصيل الجوانب".
 * الجوانب الثمانية هي المحاور الرئيسية للمقياس، وكل جانب ليه 4 أجزاء فرعية (محاور فرعية) بنفس ترتيب ملف التصميم.
 */
class LifeWheelService
{
    private const LINE_ICONS = [
        'spiritual' => 'mosque.svg', 'health' => 'heart-pulse.svg', 'personal' => 'user.svg', 'family' => 'family.svg',
        'social' => 'users.svg', 'career' => 'work.svg', 'financial' => 'coins.svg', 'leisure' => 'gamepad.svg',
    ];

    private ?AssessmentData $data = null;

    public function __construct(private readonly AttemptService $attempts) {}

    public function data(): ?AssessmentData
    {
        if (! $this->data && $assessment = Assessment::byCode(Assessment::WHEEL_OF_LIFE)) {
            $this->data = AssessmentData::load($assessment);
        }

        return $this->data;
    }

    /** الجوانب بأسئلتها لصفحة الاختبار وصفحة النتيجة (window.WHEEL_OF_LIFE_DB) */
    public function categories(): array
    {
        $data = $this->data();
        if (! $data) {
            return [];
        }

        return $data->roots()->map(fn ($aspect) => [
            'key' => $aspect->code,
            'label' => $aspect->name_ar,
            'iconUrl' => '/landing/icons/wheel_of_life_line/' . (self::LINE_ICONS[$aspect->code] ?? ''),
            'solidIconUrl' => '/landing/icons/wheel_of_life/' . $aspect->code . '.png',
            'description' => $aspect->description_ar ?? '',
            'questions' => $data->questionsUnder($aspect->id)->pluck('text_ar')->all(),
        ])->all();
    }

    /**
     * يحفظ إجابات اختبار كامل.
     *
     * @param  array<int, array<int, int>>  $answers  [ترتيب الجانب][ترتيب السؤال] => درجة الاختيار (0..4)
     */
    public function saveAnswers(User $user, array $answers): Attempt
    {
        $data = $this->data();
        if (! $data) {
            throw ValidationException::withMessages(['answers' => 'مقياس عجلة الحياة غير متاح حالياً.']);
        }

        $byQuestion = [];
        foreach ($data->roots()->values() as $i => $aspect) {
            $questions = $data->questionsUnder($aspect->id);
            $row = array_values($answers[$i] ?? []);
            if (count($row) !== $questions->count()) {
                throw ValidationException::withMessages(['answers' => 'عدد الإجابات غير مطابق للمقياس.']);
            }
            foreach ($questions->values() as $j => $question) {
                $option = collect($question->options)->firstWhere('score_value', (int) $row[$j]);
                if (! $option) {
                    throw ValidationException::withMessages(['answers' => 'إجابة غير صالحة.']);
                }
                $byQuestion[$question->id] = $option->id;
            }
        }

        return $this->attempts->save($user->id, $data, $byQuestion);
    }

    /**
     * آخر نتيجة للمستخدم: نسبة كل جانب ونسب أجزائه الفرعية بالترتيب (null لو مفيش).
     *
     * @return array{attempt_id: int, overall: int, aspects: array<string, array{percent: int, subs: list<int>}>}|null
     */
    public function resultFor(User $user): ?array
    {
        $data = $this->data();
        $attempt = $data ? $this->attempts->latest($user->id, $data->assessment->id) : null;
        if (! $attempt) {
            return null;
        }

        $scores = $this->attempts->scoresOf($attempt->id)->keyBy('dimension_id');
        $aspects = [];
        foreach ($data->roots() as $aspect) {
            $aspects[$aspect->code] = [
                'percent' => (int) ($scores[$aspect->id]->percent ?? 0),
                'subs' => $data->children($aspect->id)->map(fn ($sub) => (int) ($scores[$sub->id]->percent ?? 0))->all(),
            ];
        }

        return ['attempt_id' => $attempt->id, 'overall' => $attempt->percent, 'aspects' => $aspects];
    }
}
