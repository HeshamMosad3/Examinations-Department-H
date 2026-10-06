<?php

namespace App\Services\Assessments;

use App\Models\Attempt;
use App\Models\AttemptAnswer;
use App\Models\AttemptScore;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * محاولات المستخدمين: حفظ الإجابات والنتيجة، وقراءتها (بـ join مع المحاور والمستخدمين والمقاييس).
 */
class AttemptService
{
    public function __construct(private readonly ScoringService $scoring) {}

    /**
     * يحسب النتيجة ويحفظها. لو آخر محاولة للمستخدم في نفس المقياس بنفس الإجابات (تحديث الصفحة / ضغطتين) بيرجعها.
     *
     * @param  array<int, int>  $answers  question_id => option_id
     */
    public function save(int $userId, AssessmentData $data, array $answers): Attempt
    {
        $result = $this->scoring->score($data, $answers);

        $latest = $this->latest($userId, $data->assessment->id);
        if ($latest && $this->answersOf($latest->id) == array_map('intval', $answers)) {
            return $latest;
        }

        return DB::transaction(function () use ($userId, $data, $answers, $result) {
            $attempt = Attempt::create([
                'user_id' => $userId,
                'assessment_id' => $data->assessment->id,
                'total_score' => $result['total'],
                'max_score' => $result['max'],
                'percent' => $result['percent'],
                'level_id' => $result['level']?->id,
                'completed_at' => now(),
            ]);

            $scores = $data->questions->mapWithKeys(fn ($q) => [
                $q->id => collect($q->options)->firstWhere('id', (int) $answers[$q->id])->score_value,
            ]);
            AttemptAnswer::insert($data->questions->map(fn ($q) => [
                'attempt_id' => $attempt->id,
                'question_id' => $q->id,
                'option_id' => (int) $answers[$q->id],
                'score' => $scores[$q->id],
            ])->all());

            AttemptScore::insert(collect($result['dimensions'])->map(fn ($d) => [
                'attempt_id' => $attempt->id,
                'dimension_id' => $d['id'],
                'score' => $d['score'],
                'max_score' => $d['max'],
                'percent' => $d['percent'],
                'level_id' => $d['level']?->id,
            ])->values()->all());

            return $attempt;
        });
    }

    public function latest(int $userId, int $assessmentId): ?Attempt
    {
        return Attempt::where('user_id', $userId)
            ->where('assessment_id', $assessmentId)
            ->whereNotNull('completed_at')
            ->latest('completed_at')->latest('id')
            ->first();
    }

    /** @return array<int, int> question_id => option_id */
    public function answersOf(int $attemptId): array
    {
        return AttemptAnswer::where('attempt_id', $attemptId)->pluck('option_id', 'question_id')
            ->map(fn ($id) => (int) $id)->all();
    }

    /** درجات المحاور في محاولة، مع اسم المحور ومستواه (join) */
    public function scoresOf(int $attemptId): Collection
    {
        return DB::table('attempt_scores as s')
            ->join('dimensions as d', 'd.id', '=', 's.dimension_id')
            ->leftJoin('result_levels as l', 'l.id', '=', 's.level_id')
            ->where('s.attempt_id', $attemptId)
            ->orderByRaw('d.parent_id is not null')->orderBy('d.parent_id')->orderBy('d.order_index')
            ->get(['s.dimension_id', 's.score', 's.max_score', 's.percent', 'd.parent_id', 'd.code', 'd.name_ar', 'l.title_ar as level_title']);
    }

    /** محاولات مستخدم معين مع اسم المقياس ومستوى النتيجة */
    public function forUser(int $userId): Collection
    {
        return DB::table('attempts as a')
            ->join('assessments as s', 's.id', '=', 'a.assessment_id')
            ->leftJoin('result_levels as l', 'l.id', '=', 'a.level_id')
            ->where('a.user_id', $userId)
            ->orderByDesc('a.completed_at')
            ->get(['a.id', 'a.total_score', 'a.max_score', 'a.percent', 'a.completed_at', 's.title_ar as assessment_title', 'l.title_ar as level_title']);
    }

    /** أحدث المحاولات على الموقع (للوحة الإدارة) */
    public function recent(int $limit = 8): Collection
    {
        return DB::table('attempts as a')
            ->join('users as u', 'u.id', '=', 'a.user_id')
            ->join('assessments as s', 's.id', '=', 'a.assessment_id')
            ->leftJoin('result_levels as l', 'l.id', '=', 'a.level_id')
            ->orderByDesc('a.completed_at')
            ->limit($limit)
            ->get(['a.id', 'a.percent', 'a.completed_at', 'u.id as user_id', 'u.name as user_name', 's.title_ar as assessment_title', 'l.title_ar as level_title']);
    }

    public function deleteForAssessment(int $assessmentId): void
    {
        $this->deleteWhere(fn ($q) => $q->where('assessment_id', $assessmentId));
    }

    public function deleteForUser(int $userId): void
    {
        $this->deleteWhere(fn ($q) => $q->where('user_id', $userId));
    }

    private function deleteWhere(callable $scope): void
    {
        $ids = $scope(DB::table('attempts'))->pluck('id');
        DB::table('attempt_answers')->whereIn('attempt_id', $ids)->delete();
        DB::table('attempt_scores')->whereIn('attempt_id', $ids)->delete();
        DB::table('attempts')->whereIn('id', $ids)->delete();
    }
}
