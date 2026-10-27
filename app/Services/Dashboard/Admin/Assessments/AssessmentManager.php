<?php

namespace App\Services\Dashboard\Admin\Assessments;

use App\Services\Website\Assessments\AssessmentData;
use App\Services\Website\Assessments\AttemptService;

use App\Models\AnswerOption;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\ResultLevel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * كل تعديلات الإدارة على المقاييس: المقياس، المحاور، الأسئلة واختياراتها، ومستويات النتائج.
 * الجداول مفيهاش foreign keys، فالحذف هنا بيمسح كل اللي تحت العنصر بنفسه.
 */
class AssessmentManager
{
    public function __construct(private readonly AttemptService $attempts) {}

    /** قائمة المقاييس مع عدد المحاور والأسئلة والمحاولات (join + group by) */
    public function listing(): Collection
    {
        $questions = DB::table('questions')->select('assessment_id', DB::raw('count(*) as questions_count'))->groupBy('assessment_id');
        $dimensions = DB::table('dimensions')->select('assessment_id', DB::raw('count(*) as dimensions_count'))->groupBy('assessment_id');
        $attempts = DB::table('attempts')->select('assessment_id', DB::raw('count(*) as attempts_count'))->groupBy('assessment_id');

        return DB::table('assessments as a')
            ->leftJoinSub($questions, 'q', 'q.assessment_id', '=', 'a.id')
            ->leftJoinSub($dimensions, 'd', 'd.assessment_id', '=', 'a.id')
            ->leftJoinSub($attempts, 't', 't.assessment_id', '=', 'a.id')
            ->orderBy('a.order_index')->orderBy('a.id')
            ->get([
                'a.*',
                DB::raw('coalesce(q.questions_count, 0) as questions_count'),
                DB::raw('coalesce(d.dimensions_count, 0) as dimensions_count'),
                DB::raw('coalesce(t.attempts_count, 0) as attempts_count'),
            ]);
    }

    // ---------------- المقياس ----------------

    public function createAssessment(array $data, ?int $userId): Assessment
    {
        $data['code'] = $data['code'] ?: $this->uniqueCode($data['title_ar']);
        $data['created_by'] = $userId;
        $data['order_index'] ??= (int) Assessment::max('order_index') + 1;

        return Assessment::create($data);
    }

    public function updateAssessment(Assessment $assessment, array $data): Assessment
    {
        $assessment->update($data);

        return $assessment;
    }

    public function deleteAssessment(Assessment $assessment): void
    {
        DB::transaction(function () use ($assessment) {
            $this->attempts->deleteForAssessment($assessment->id);
            $this->deleteQuestions(Question::where('assessment_id', $assessment->id)->pluck('id'));
            ResultLevel::where('assessment_id', $assessment->id)->delete();
            Dimension::where('assessment_id', $assessment->id)->delete();
            $assessment->delete();
        });
    }

    /** نسخة كاملة من المقياس (غير مفعلة) لبناء مقياس جديد عليها */
    public function duplicate(Assessment $assessment, AssessmentExporter $exporter, AssessmentImporter $importer): Assessment
    {
        $data = $exporter->export(AssessmentData::load($assessment));
        $data['code'] = $this->uniqueCode($assessment->code . '_copy');
        $data['title_ar'] = $assessment->title_ar . ' (نسخة)';
        $data['is_active'] = false;
        $data['order_index'] = (int) Assessment::max('order_index') + 1;

        return $importer->import($data);
    }

    // ---------------- المحاور ----------------

    public function saveDimension(Assessment $assessment, array $data, ?Dimension $dimension = null): Dimension
    {
        $data['assessment_id'] = $assessment->id;
        if (! $dimension) {
            $data['order_index'] ??= (int) Dimension::where('assessment_id', $assessment->id)->where('parent_id', $data['parent_id'] ?? null)->max('order_index') + 1;

            return Dimension::create($data);
        }
        $dimension->update($data);

        return $dimension;
    }

    /** يمسح المحور ومحاوره الفرعية ومستوياتهم. أسئلتهم بتفضل في المقياس من غير محور (أو بتتمسح لو deleteQuestions) */
    public function deleteDimension(Dimension $dimension, bool $deleteQuestions = false): void
    {
        DB::transaction(function () use ($dimension, $deleteQuestions) {
            $ids = $this->dimensionTreeIds($dimension);
            $questions = Question::whereIn('dimension_id', $ids);
            $deleteQuestions ? $this->deleteQuestions($questions->pluck('id')) : $questions->update(['dimension_id' => null]);
            ResultLevel::whereIn('dimension_id', $ids)->delete();
            DB::table('attempt_scores')->whereIn('dimension_id', $ids)->delete();
            Dimension::whereIn('id', $ids)->delete();
        });
    }

    // ---------------- الأسئلة ----------------

    /** @param  list<array{label_ar: string, score_value: int}>  $options */
    public function saveQuestion(Assessment $assessment, array $data, array $options, ?Question $question = null): Question
    {
        return DB::transaction(function () use ($assessment, $data, $options, $question) {
            $data['assessment_id'] = $assessment->id;
            if ($question) {
                $question->update($data);
            } else {
                $data['order_index'] ??= (int) Question::where('assessment_id', $assessment->id)->max('order_index') + 1;
                $question = Question::create($data);
            }
            $this->syncOptions($question->id, $options);

            return $question;
        });
    }

    /**
     * إضافة أسئلة كتير مرة واحدة (سطر لكل سؤال) لمحور معين، بنفس الاختيارات.
     *
     * @param  list<string>  $texts
     */
    public function addQuestions(Assessment $assessment, ?int $dimensionId, array $texts, array $options): int
    {
        return DB::transaction(function () use ($assessment, $dimensionId, $texts, $options) {
            $order = (int) Question::where('assessment_id', $assessment->id)->max('order_index');
            foreach ($texts as $text) {
                $question = Question::create(['assessment_id' => $assessment->id, 'dimension_id' => $dimensionId, 'text_ar' => $text, 'order_index' => ++$order]);
                $this->syncOptions($question->id, $options);
            }

            return count($texts);
        });
    }

    /** نفس الاختيارات لكل أسئلة المقياس */
    public function applyOptionsToAll(Assessment $assessment, array $options): int
    {
        return DB::transaction(function () use ($assessment, $options) {
            $ids = Question::where('assessment_id', $assessment->id)->pluck('id');
            $ids->each(fn ($id) => $this->syncOptions($id, $options));

            return $ids->count();
        });
    }

    /**
     * ترتيب مجموعة أسئلة (أسئلة محور واحد مثلًا) بالترتيب الجديد، في نفس أماكنها في ترتيب المقياس،
     * فباقي الأسئلة مابتتحركش.
     *
     * @param  list<int>  $ids  الأسئلة بالترتيب الجديد
     */
    public function reorderQuestions(Assessment $assessment, array $ids): void
    {
        DB::transaction(function () use ($assessment, $ids) {
            $slots = Question::where('assessment_id', $assessment->id)->whereIn('id', $ids)
                ->orderBy('order_index')->orderBy('id')->pluck('order_index')->all();
            foreach (array_values($ids) as $i => $id) {
                if (isset($slots[$i])) {
                    Question::where('assessment_id', $assessment->id)->where('id', $id)->update(['order_index' => $slots[$i]]);
                }
            }
        });
    }

    public function deleteQuestion(Question $question): void
    {
        $this->deleteQuestions(collect([$question->id]));
    }

    // ---------------- المستويات ----------------

    public function saveLevel(Assessment $assessment, array $data, ?ResultLevel $level = null): ResultLevel
    {
        $data['assessment_id'] = $assessment->id;
        if ($level) {
            $level->update($data);

            return $level;
        }
        $data['order_index'] = (int) ResultLevel::where('assessment_id', $assessment->id)->where('dimension_id', $data['dimension_id'] ?? null)->max('order_index') + 1;

        return ResultLevel::create($data);
    }

    /**
     * يعمل مستويات بنطاقات متساوية تغطي كل الدرجات الممكنة للمقياس كله (null) أو لمحور، بدل المستويات الموجودة.
     *
     * @param  list<string>  $titles  أسماء المستويات من الأقل للأعلى
     */
    public function generateLevels(Assessment $assessment, ?int $dimensionId, array $titles): int
    {
        $data = AssessmentData::load($assessment);
        $questions = $dimensionId ? $data->questionsUnder($dimensionId) : $data->questions;
        [$min, $max] = $assessment->level_basis === 'percent'
            ? [0, 100]
            : [
                $questions->sum(fn ($q) => min(array_column($q->options, 'score_value') ?: [0])),
                $questions->sum(fn ($q) => max(array_column($q->options, 'score_value') ?: [0])),
            ];

        return DB::transaction(function () use ($assessment, $dimensionId, $titles, $min, $max) {
            ResultLevel::where('assessment_id', $assessment->id)->where('dimension_id', $dimensionId)->delete();
            foreach (self::equalRanges($min, $max, count($titles)) as $i => [$from, $to]) {
                ResultLevel::create([
                    'assessment_id' => $assessment->id,
                    'dimension_id' => $dimensionId,
                    'code' => self::levelCode($i, count($titles)),
                    'title_ar' => $titles[$i],
                    'min_score' => $from,
                    'max_score' => $to,
                    'order_index' => $i,
                ]);
            }

            return count($titles);
        });
    }

    /**
     * تقسيم الدرجات من min لـ max على n نطاقات متساوية تقريبًا ومن غير فجوات.
     *
     * @return list<array{0: int, 1: int}>
     */
    public static function equalRanges(int $min, int $max, int $n): array
    {
        $n = max(1, min($n, $max - $min + 1));
        $ranges = [];
        $span = ($max - $min + 1) / $n;
        for ($i = 0; $i < $n; $i++) {
            $from = $min + (int) round($i * $span);
            $to = $i === $n - 1 ? $max : $min + (int) round(($i + 1) * $span) - 1;
            $ranges[] = [$from, $to];
        }

        return $ranges;
    }

    /** كود المستوى: low / medium / high لما يكونوا 3، وإلا level_1 ... */
    public static function levelCode(int $index, int $count): string
    {
        return $count === 3 ? ['low', 'medium', 'high'][$index] : 'level_' . ($index + 1);
    }

    public function uniqueCodeFor(string $title): string
    {
        return $this->uniqueCode($title);
    }

    // ---------------- مساعدات ----------------

    private function syncOptions(int $questionId, array $options): void
    {
        AnswerOption::where('question_id', $questionId)->delete();
        foreach (array_values($options) as $i => $option) {
            AnswerOption::create([
                'question_id' => $questionId,
                'label_ar' => $option['label_ar'],
                'score_value' => (int) $option['score_value'],
                'order_index' => $i,
            ]);
        }
    }

    private function deleteQuestions(Collection $ids): void
    {
        AnswerOption::whereIn('question_id', $ids)->delete();
        DB::table('attempt_answers')->whereIn('question_id', $ids)->delete();
        Question::whereIn('id', $ids)->delete();
    }

    /** @return list<int> */
    private function dimensionTreeIds(Dimension $dimension): array
    {
        $ids = [$dimension->id];
        $frontier = [$dimension->id];
        while ($frontier) {
            $frontier = Dimension::whereIn('parent_id', $frontier)->pluck('id')->all();
            array_push($ids, ...$frontier);
        }

        return $ids;
    }

    private function uniqueCode(string $base): string
    {
        // الأسماء العربية بتتحول لحروف لاتينية غريبة، فالكود بيبقى رقم بسيط
        $base = preg_match('/[^\x00-\x7F]/', $base) ? 'scale_' . ((int) Assessment::max('id') + 1) : (Str::slug($base, '_') ?: 'scale');
        $code = $base;
        for ($i = 2; Assessment::where('code', $code)->exists(); $i++) {
            $code = "{$base}_{$i}";
        }

        return $code;
    }
}
