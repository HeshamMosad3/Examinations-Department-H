<?php

namespace App\Services\Website\Assessments;

use App\Models\ResultLevel;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

/**
 * حساب نتيجة أي مقياس من إجاباته.
 *
 * - درجة السؤال = درجة الاختيار (ولو السؤال معكوس: أعلى + أقل درجة − درجة الاختيار).
 * - درجة المحور = مجموع أسئلته وأسئلة محاوره الفرعية.
 * - الدرجة الكلية = مجموع المحاور الرئيسية (المحور اللي reverse_in_total درجته بتتعكس فيها).
 * - المستوى بيتحدد من نطاقات result_levels على الدرجة أو النسبة (حسب level_basis في المقياس).
 * - scoring_type = dominant_style: المستوى الكلي هو النمط الغالب (code المحور)، أو ثنائي (dual_a_b)، أو متوازن (balanced).
 */
class ScoringService
{
    // قواعد النمط الغالب: متوازن لو الفرق بين الأعلى والأقل ≤ 2، وثنائي لو الفرق بين الأول والثاني ≤ 2 والثاني أعلى من الثالث بـ 3 على الأقل
    private const BALANCED_MAX_GAP = 2;
    private const DUAL_MAX_GAP = 2;
    private const DUAL_MIN_LEAD = 3;

    /**
     * @param  array<int, int>  $answers  question_id => option_id (لازم كل الأسئلة)
     * @return array{total: int, max: int, percent: int, level: ?ResultLevel, dimensions: array<int, array>, ranking: list<int>}
     */
    public function score(AssessmentData $data, array $answers): array
    {
        $questionScores = [];
        foreach ($data->questions as $question) {
            $option = collect($question->options)->firstWhere('id', (int) ($answers[$question->id] ?? 0));
            if (! $option) {
                throw ValidationException::withMessages(['answers' => 'يجب الإجابة على كل الأسئلة باختيارات صحيحة.']);
            }
            $questionScores[$question->id] = $this->questionScore($question, $option->score_value);
        }

        $dimensions = [];
        foreach ($data->dimensions as $dimension) {
            [$score, $min, $max] = $this->sumQuestions($data->questionsUnder($dimension->id), $questionScores);
            $dimensions[$dimension->id] = [
                'id' => $dimension->id,
                'parent_id' => $dimension->parent_id,
                'code' => $dimension->code,
                'name' => $dimension->name_ar,
                'score' => $score,
                'min' => $min,
                'max' => $max,
                'percent' => self::percent($score, $max),
            ];
        }
        foreach ($dimensions as $id => $row) {
            $value = $data->assessment->level_basis === 'percent' ? $row['percent'] : $row['score'];
            $dimensions[$id]['level'] = $this->levelByRange($data->levelsFor($id), $value);
        }

        [$total, $max] = $this->total($data, $dimensions, $questionScores);
        $percent = self::percent($total, $max);
        $roots = collect($dimensions)->whereNull('parent_id');

        $level = $data->assessment->scoring_type === 'dominant_style'
            ? $data->levelsFor(null)->firstWhere('code', $this->dominantStyle($roots->values()))
            : $this->levelByRange($data->levelsFor(null), $data->assessment->level_basis === 'percent' ? $percent : $total);

        return [
            'total' => $total,
            'max' => $max,
            'percent' => $percent,
            'level' => $level,
            'dimensions' => $dimensions,
            // المحاور الرئيسية من الأعلى للأقل (بالنسبة، عشان المحاور ممكن تختلف في أقصى درجة)
            'ranking' => $roots->sortBy([['percent', 'desc'], ['score', 'desc']])->keys()->values()->all(),
        ];
    }

    /** نسبة مئوية مقربة لأقرب عدد صحيح (النص بيتقرب لفوق) بحساب صحيح من غير كسور عشرية */
    public static function percent(int $score, int $max): int
    {
        return $max > 0 ? intdiv($score * 200 + $max, 2 * $max) : 0;
    }

    private function questionScore(object $question, int $score): int
    {
        if (! $question->is_reversed) {
            return $score;
        }
        $values = array_map(fn ($o) => $o->score_value, $question->options);

        return max($values) + min($values) - $score;
    }

    /** @return array{0: int, 1: int, 2: int} [الدرجة، أقل درجة ممكنة، أعلى درجة ممكنة] */
    private function sumQuestions(Collection $questions, array $questionScores): array
    {
        $score = $min = $max = 0;
        foreach ($questions as $question) {
            $values = array_map(fn ($o) => $o->score_value, $question->options) ?: [0];
            $score += $questionScores[$question->id];
            $min += min($values);
            $max += max($values);
        }

        return [$score, $min, $max];
    }

    /** @return array{0: int, 1: int} */
    private function total(AssessmentData $data, array $dimensions, array $questionScores): array
    {
        $total = $max = 0;
        foreach ($dimensions as $row) {
            if ($row['parent_id'] !== null) {
                continue;
            }
            $reversed = $data->dimensions[$row['id']]->reverse_in_total;
            $total += $reversed ? $row['min'] + $row['max'] - $row['score'] : $row['score'];
            $max += $row['max'];
        }

        // أسئلة مش متربطة بأي محور بتدخل في الدرجة الكلية مباشرة
        [$score, , $loose] = $this->sumQuestions($data->questions->whereNull('dimension_id'), $questionScores);

        return [$total + $score, $max + $loose];
    }

    private function levelByRange(Collection $levels, int $value): ?ResultLevel
    {
        return $levels->first(fn (ResultLevel $l) => $l->min_score !== null && $l->max_score !== null
            && $value >= $l->min_score && $value <= $l->max_score);
    }

    /** كود النمط الغالب من المحاور الرئيسية (لازم 3 محاور على الأقل ليها code) */
    private function dominantStyle(Collection $roots): ?string
    {
        $styles = $roots->filter(fn ($d) => $d['code'])->values();
        if ($styles->count() < 3) {
            return null;
        }
        $order = $styles->pluck('code')->flip();
        $sorted = $styles->sortByDesc('score')->values();
        [$first, $second, $third] = [$sorted[0], $sorted[1], $sorted[$sorted->count() - 1]];

        if ($first['score'] - $third['score'] <= self::BALANCED_MAX_GAP) {
            return 'balanced';
        }
        if ($first['score'] - $second['score'] <= self::DUAL_MAX_GAP && $second['score'] - $sorted[2]['score'] >= self::DUAL_MIN_LEAD) {
            $pair = collect([$first['code'], $second['code']])->sortBy(fn ($code) => $order[$code])->implode('_');

            return 'dual_' . $pair;
        }

        return $first['code'];
    }
}
