<?php

namespace App\Services\Assessments;

use App\Models\Assessment;
use App\Models\ResultLevel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * المقياس بكل محتواه في الذاكرة: المحاور (شجرة)، والأسئلة باختياراتها، والمستويات.
 * بيتحمل بأربع كويريز (الأسئلة والاختيارات في كويري واحدة بـ join) وبيستخدمه الحساب والأدمن وصفحات الموقع.
 */
class AssessmentData
{
    /** @var Collection<int, object> المحاور بالـ id، مرتبة بالترتيب */
    public Collection $dimensions;

    /** @var Collection<int, object> الأسئلة بالترتيب، كل سؤال فيه options[] */
    public Collection $questions;

    /** @var Collection<int, ResultLevel> */
    public Collection $levels;

    public function __construct(public readonly Assessment $assessment)
    {
        $this->dimensions = DB::table('dimensions')
            ->where('assessment_id', $assessment->id)
            ->orderBy('order_index')->orderBy('id')
            ->get()
            ->each(function ($d) {
                $d->id = (int) $d->id;
                $d->parent_id = $d->parent_id === null ? null : (int) $d->parent_id;
                $d->reverse_in_total = (bool) $d->reverse_in_total;
            })
            ->keyBy('id');

        $rows = DB::table('questions as q')
            ->leftJoin('answer_options as o', 'o.question_id', '=', 'q.id')
            ->where('q.assessment_id', $assessment->id)
            ->orderBy('q.order_index')->orderBy('q.id')->orderBy('o.order_index')->orderBy('o.id')
            ->get([
                'q.id', 'q.dimension_id', 'q.text_ar', 'q.is_reversed', 'q.order_index',
                'o.id as option_id', 'o.label_ar as option_label', 'o.score_value as option_score',
            ]);

        $this->questions = $rows->groupBy('id')->map(function (Collection $group) {
            $first = $group->first();

            return (object) [
                'id' => (int) $first->id,
                'dimension_id' => $first->dimension_id === null ? null : (int) $first->dimension_id,
                'text_ar' => $first->text_ar,
                'is_reversed' => (bool) $first->is_reversed,
                'order_index' => $first->order_index,
                'options' => $group->whereNotNull('option_id')->map(fn ($o) => (object) [
                    'id' => (int) $o->option_id,
                    'label_ar' => $o->option_label,
                    'score_value' => (int) $o->option_score,
                ])->values()->all(),
            ];
        })->values();

        $this->levels = ResultLevel::where('assessment_id', $assessment->id)
            ->orderBy('order_index')->orderBy('id')
            ->get();
    }

    public static function load(Assessment $assessment): self
    {
        return new self($assessment);
    }

    /** المحاور الرئيسية (اللي مالهاش أب) بالترتيب */
    public function roots(): Collection
    {
        return $this->dimensions->whereNull('parent_id')->values();
    }

    public function children(int $dimensionId): Collection
    {
        return $this->dimensions->where('parent_id', $dimensionId)->values();
    }

    /** أسئلة المحور ومحاوره الفرعية كلها، بترتيب الأسئلة */
    public function questionsUnder(int $dimensionId): Collection
    {
        $ids = $this->descendantIds($dimensionId);

        return $this->questions->filter(fn ($q) => in_array($q->dimension_id, $ids, true))->values();
    }

    /** المستويات الخاصة بمحور معين، أو مستويات المقياس كله لو null */
    public function levelsFor(?int $dimensionId): Collection
    {
        return $this->levels->filter(fn ($l) => $l->dimension_id === $dimensionId)->values();
    }

    /** @return list<int> */
    private function descendantIds(int $dimensionId): array
    {
        $ids = [$dimensionId];
        foreach ($this->children($dimensionId) as $child) {
            array_push($ids, ...$this->descendantIds($child->id));
        }

        return $ids;
    }
}
