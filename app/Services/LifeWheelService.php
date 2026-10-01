<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\ExamSession;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Persists and reads a user's "عجلة الحياة" (wheel of life) result.
 *
 * The public landing test keeps answers in the browser; for a signed-in user they are saved here as a normal
 * completed ExamSession (UserAnswer + Result + DimensionScore rows, through ExamResultService), so the details page
 * ("تفاصيل الجوانب") can be built from the database.
 */
class LifeWheelService
{
    public const CATEGORY = 'عجلة الحياة';

    /** DB dimension name => key used by resources/data/life-wheel-aspects.php */
    public const DIMENSION_KEYS = [
        'الروحي' => 'spiritual',
        'الصحي' => 'health',
        'الشخصي' => 'personal',
        'العائلي' => 'family',
        'الاجتماعي' => 'social',
        'المهني' => 'career',
        'المالي' => 'financial',
        'الترفيهي' => 'leisure',
    ];

    /** Every aspect has 4 sub-aspects covering its questions in order: 3 + 3 + 2 + 2 (as in the scale document). */
    public const SUB_GROUPS = [3, 3, 2, 2];

    public function __construct(
        private readonly ExamResultService $results,
    ) {}

    public function assessment(): ?Assessment
    {
        return Assessment::with(['dimensions.questions.answerOptions'])
            ->where('category', self::CATEGORY)
            ->first();
    }

    /**
     * Save the answers of one finished test as a completed exam session.
     *
     * @param  array<int, array<int, int>>  $answers  [dimension index][question index] => 0..4, in scale order
     */
    public function saveAnswers(User $user, array $answers): ExamSession
    {
        $assessment = $this->assessment();
        if (! $assessment) {
            throw ValidationException::withMessages(['answers' => 'مقياس عجلة الحياة غير متاح حالياً.']);
        }

        $pairs = $this->pairQuestionsWithScores($assessment, $answers);

        $latest = $this->latestSession($user, $assessment);
        if ($latest && $this->sameAnswers($latest, $pairs)) {
            return $latest; // same test saved twice (refresh / double click)
        }

        return DB::transaction(function () use ($user, $assessment, $pairs) {
            $session = ExamSession::create([
                'user_id' => $user->id,
                'assessment_id' => $assessment->id,
                'status' => 'in_progress',
                'started_at' => now(),
            ]);

            foreach ($pairs as [$question, $score]) {
                $option = $question->answerOptions->firstWhere('score_value', $score);
                if (! $option) {
                    throw ValidationException::withMessages(['answers' => 'إجابة غير صالحة.']);
                }

                UserAnswer::create([
                    'session_id' => $session->id,
                    'question_id' => $question->id,
                    'selected_option_id' => $option->id,
                    'score_earned' => $score,
                ]);
            }

            $this->results->calculate($session); // creates Result + DimensionScores and completes the session

            return $session->fresh();
        });
    }

    /**
     * The user's latest completed result, as percentages per aspect and per sub-aspect (null when there is none).
     *
     * @return array{session_id: string, completed_at: mixed, overall: int, aspects: array<string, array{percent: int, subs: list<int>}>}|null
     */
    public function resultFor(User $user): ?array
    {
        $assessment = $this->assessment();
        $session = $assessment ? $this->latestSession($user, $assessment) : null;
        if (! $session) {
            return null;
        }

        $scores = $session->userAnswers()->pluck('score_earned', 'question_id');

        $aspects = [];
        $total = 0;
        $totalMax = 0;

        foreach ($assessment->dimensions as $dimension) {
            $key = self::DIMENSION_KEYS[$dimension->name_ar] ?? null;
            if (! $key) {
                continue;
            }

            $questions = $dimension->questions->sortBy('order_index')->values();
            $rows = $questions->map(fn ($q) => [
                (int) ($scores[$q->id] ?? 0),
                (int) ($q->answerOptions->max('score_value') ?? 0),
            ])->all();

            $subs = [];
            $offset = 0;
            foreach (self::SUB_GROUPS as $size) {
                $subs[] = $this->percent(array_slice($rows, $offset, $size));
                $offset += $size;
            }

            $aspects[$key] = ['percent' => $this->percent($rows), 'subs' => $subs];
            $total += array_sum(array_column($rows, 0));
            $totalMax += array_sum(array_column($rows, 1));
        }

        return [
            'session_id' => $session->id,
            'completed_at' => $session->completed_at,
            'overall' => $this->percent([[$total, $totalMax]]),
            'aspects' => $aspects,
        ];
    }

    private function latestSession(User $user, Assessment $assessment): ?ExamSession
    {
        return ExamSession::where('user_id', $user->id)
            ->where('assessment_id', $assessment->id)
            ->where('status', 'completed')
            ->latest('completed_at')
            ->first();
    }

    /**
     * @param  array<int, array<int, int>>  $answers
     * @return list<array{0: \App\Models\Question, 1: int}>
     */
    private function pairQuestionsWithScores(Assessment $assessment, array $answers): array
    {
        $pairs = [];

        foreach ($assessment->dimensions->values() as $i => $dimension) {
            $questions = $dimension->questions->sortBy('order_index')->values();
            $row = array_values($answers[$i] ?? []);

            if (count($row) !== $questions->count()) {
                throw ValidationException::withMessages(['answers' => 'عدد الإجابات غير مطابق للمقياس.']);
            }

            foreach ($questions as $j => $question) {
                $pairs[] = [$question, (int) $row[$j]];
            }
        }

        return $pairs;
    }

    /** @param  list<array{0: \App\Models\Question, 1: int}>  $pairs */
    private function sameAnswers(ExamSession $session, array $pairs): bool
    {
        $saved = $session->userAnswers()->pluck('score_earned', 'question_id');

        foreach ($pairs as [$question, $score]) {
            if (! isset($saved[$question->id]) || (int) $saved[$question->id] !== $score) {
                return false;
            }
        }

        return $saved->count() === count($pairs);
    }

    /**
     * Percentage rounded half up with integer math. Float math is not safe here: 23 / 40 * 100 is 57.49999999999999,
     * so round() gave 57 for an exact 57.5% while other exact halves (47.5, 52.5 ...) went up.
     *
     * @param  array<int, array{0: int, 1: int}>  $rows  [score, max]
     */
    private function percent(array $rows): int
    {
        $max = array_sum(array_column($rows, 1));

        return $max > 0 ? intdiv(array_sum(array_column($rows, 0)) * 200 + $max, 2 * $max) : 0;
    }
}
