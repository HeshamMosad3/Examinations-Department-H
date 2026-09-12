<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GradedExam;
use App\Models\GradedExamSession;
use App\Models\GradedExamUserAnswer;
use App\Models\GradedExamUserAnswerOption;
use App\Models\GradedExamResult;
use App\Services\GradedExamGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserGradedExamController extends Controller
{
    public function index()
    {
        $exams = GradedExam::where('is_active', true)->get();
        $assessments = \App\Models\Assessment::where('is_active', true)->get();
        return view('user.graded_exams.index', compact('exams', 'assessments'));
    }

    /**
     * صفحة تأكيد بدء الاختبار (بيانات الاختبار + التعليمات + الموافقة).
     */
    public function intro(GradedExam $exam)
    {
        $exam->loadMissing('constraintSettings');

        $minutes = $exam->time_limit_min;
        if (!$minutes) {
            $timeText = 'غير محدد';
        } else {
            $hours = floor($minutes / 60);
            $mins = $minutes % 60;
            $parts = [];
            if ($hours > 0) $parts[] = $hours . ' ساعة';
            if ($mins > 0) $parts[] = $mins . ' دقيقة';
            $timeText = implode(' و', $parts);
        }

        $questionCount = $exam->constraintSettings ? $exam->constraintSettings->total_questions : $exam->total_questions;

        return view('user.graded_exams.intro', compact('exam', 'timeText', 'questionCount'));
    }

    public function progress()
    {
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login');
        }

        $sessions = GradedExamSession::where('user_id', $userId)
            ->where('status', 'completed')
            ->with(['result', 'gradedExam'])
            ->orderBy('completed_at', 'asc')
            ->get();

        $progressByExam = [];
        foreach ($sessions as $session) {
            $examId = $session->graded_exam_id;
            if (!isset($progressByExam[$examId])) {
                $progressByExam[$examId] = [
                    'exam_title' => $session->gradedExam->title_ar ?? 'اختبار غير معروف',
                    'labels' => [],
                    'data' => [],
                    'sessions' => []
                ];
            }
            
            $attemptNum = count($progressByExam[$examId]['labels']) + 1;
            $progressByExam[$examId]['labels'][] = "محاولة $attemptNum";
            $progressByExam[$examId]['data'][] = $session->result ? $session->result->percentage : 0;
            
            // Add session to history (prepend so newest is first in the table)
            array_unshift($progressByExam[$examId]['sessions'], $session);
        }

        return view('user.graded_exams.progress', compact('progressByExam'));
    }

    public function start(Request $request, GradedExam $exam, GradedExamGeneratorService $generator)
    {
        $userId = Auth::id();

        if ($userId) {
            // إغلاق أي جلسة سابقة غير مكتملة لتعتبر مهجورة، والبدء بمحاولة جديدة تماماً
            // بحيث يبدأ توقيت الاختبار بالكامل من البداية عند الدخول مجدداً
            GradedExamSession::where('user_id', $userId)
                ->where('graded_exam_id', $exam->id)
                ->where('status', 'in_progress')
                ->update([
                    'status' => 'abandoned',
                    'completed_at' => now(),
                ]);
        }

        try {
            $session = $generator->generate($exam, Auth::id());
            return redirect()->route('user.graded_exams.show', $session->id);
        } catch (\Exception $e) {
            // الرسالة الكاملة (بتفاصيل داخلية) اتسجلت بالفعل جوه GradedExamGeneratorService
            // نفسه بعد آخر محاولة فاشلة. هنا بنوري المستخدم رسالة نظيفة بس، من غير أي
            // تفاصيل تقنية داخلية زي UUID الوحدة.
            \Log::error('فشل بدء اختبار للمستخدم', [
                'graded_exam_id' => $exam->id,
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'تعذّر إعداد الاختبار حاليًا، برجاء المحاولة مرة أخرى بعد قليل.');
        }
    }

    public function show(GradedExamSession $session)
    {
        if ($session->user_id !== Auth::id()) {
            abort(403);
        }

        if ($session->status !== 'in_progress') {
            return redirect()->route('user.graded_exams.result', $session->id);
        }

        $exam = $session->gradedExam;
        if ($exam && $exam->time_limit_min > 0) {
            $elapsed = now()->diffInSeconds($session->started_at);
            if ($elapsed > ($exam->time_limit_min * 60) + 60) {
                // Expired!
                $session->update(['status' => 'completed', 'score' => 0]);
                return redirect()->route('user.graded_exams.result', $session->id)
                    ->with('error', 'لقد تجاوزت الوقت المحدد للامتحان وتم إلغاء الإجابات.');
            }
        }

        $session->load(['sessionQuestions.question.options' => function ($q) {
            $q->orderBy('order_index');
        }]);

        return view('user.graded_exams.show', compact('session'));
    }

    /**
     * تصحيح الإجابات فعليًا وحفظها + حساب النتيجة النهائية.
     *
     * صيغة الإدخال من الفورم:
     *   answers[{session_question_id}]   = option_id            (سؤال إجابة واحدة)
     *   answers[{session_question_id}][] = [option_id, option_id, ...]  (سؤال متعدد الإجابات)
     */
    public function answer(Request $request, GradedExamSession $session)
    {
        if ($session->user_id !== Auth::id()) abort(403);
        if ($session->status !== 'in_progress') return redirect()->route('user.graded_exams.result', $session->id);

        $exam = $session->gradedExam;
        if ($exam && $exam->time_limit_min) {
            $timeLimitSeconds = $exam->time_limit_min * 60;
            $elapsedSeconds = $session->started_at->diffInSeconds(now());
            // Add a grace period of 60 seconds for network latency/processing
            if ($elapsedSeconds > ($timeLimitSeconds + 60)) {
                $session->update([
                    'status' => 'completed',
                    'completed_at' => now(),
                    'total_points_earned' => 0,
                    'total_points_available' => $session->sessionQuestions->sum('points_available'),
                    'score_percentage' => 0,
                    'is_passed' => false,
                ]);
                
                \Illuminate\Support\Facades\DB::table('graded_exam_session_questions')
                    ->where('session_id', $session->id)
                    ->update([
                        'is_correct' => false,
                        'points_earned' => 0,
                        'selected_option_ids' => json_encode([])
                    ]);

                return redirect()->route('user.graded_exams.result', $session->id)
                    ->with('error', 'لقد تجاوزت الوقت المحدد للامتحان وتم إلغاء الإجابات بسبب انتهاء الوقت.');
            }
        }

        $submittedAnswers = $request->input('answers', []);

        $session->load(['sessionQuestions.question.options']);

        DB::transaction(function () use ($session, $submittedAnswers) {
            $totalPointsEarned = 0;
            $incorrectCount = 0; // Keeping this for legacy compatibility, though it might not be strictly counting 'incorrect questions' but rather 'lost points' or similar. We'll count a question as incorrect if points < 1.

            foreach ($session->sessionQuestions as $sq) {
                $question = $sq->question;

                // الخيارات اللي المستخدم اختارها لهذا السؤال (تدعم واحد أو أكتر)
                $raw = $submittedAnswers[$sq->id] ?? null;
                $selectedOptionIds = is_array($raw) ? array_values(array_filter($raw)) : array_filter([$raw]);

                // الخيارات الصحيحة فعليًا لهذا السؤال (من الداتابيز، مش من المستخدم)
                $correctOptionIds = $question->options
                    ->where('is_correct', true)
                    ->pluck('id')
                    ->map(fn ($id) => (string) $id)
                    ->toArray();
                
                $totalCorrectOptions = count($correctOptionIds);
                $pointsEarned = 0;
                $isCorrect = false;

                if ($totalCorrectOptions > 0) {
                    $correctSelected = 0;
                    $incorrectSelected = 0;

                    foreach ($selectedOptionIds as $selId) {
                        if (in_array((string)$selId, $correctOptionIds)) {
                            $correctSelected++;
                        } else {
                            $incorrectSelected++;
                        }
                    }

                    // Partial credit logic:
                    // Only count correctly selected options towards the score.
                    // We can subtract incorrect selected options if we want to penalize guessing, but standard request says:
                    // "كل إجابة صحيحة يختارها الطالب تدّيه نصيبها من الدرجة"
                    // If they select all options (including wrong ones), should they get full marks?
                    // To prevent guessing all, we typically subtract incorrect selections or just score = correct - incorrect.
                    // Let's implement: Max(0, (Correctly Selected - Incorrectly Selected)) / Total Correct
                    $netCorrect = max(0, $correctSelected - $incorrectSelected);
                    $pointsEarned = $netCorrect / $totalCorrectOptions;
                    
                    // Cap at 1 just in case
                    if ($pointsEarned > 1) {
                        $pointsEarned = 1;
                    }

                    $isCorrect = $pointsEarned == 1;
                }

                $userAnswer = GradedExamUserAnswer::create([
                    'session_id' => $session->id,
                    'question_id' => $question->id,
                    'is_correct' => $isCorrect,
                    'points_earned' => $pointsEarned,
                    'answered_at' => now(),
                ]);

                foreach ($selectedOptionIds as $optionId) {
                    GradedExamUserAnswerOption::create([
                        'user_answer_id' => $userAnswer->id,
                        'option_id' => $optionId,
                    ]);
                }

                $totalPointsEarned += $pointsEarned;
                if ($pointsEarned < 1) {
                    $incorrectCount++;
                }
            }

            $total = $session->sessionQuestions->count();
            $percentage = $total > 0 ? round(($totalPointsEarned / $total) * 100, 2) : 0;

            // حد النجاح الافتراضي 60%
            $passThreshold = 60;

            GradedExamResult::create([
                'session_id' => $session->id,
                'correct_count' => $totalPointsEarned, // This now stores points instead of raw count
                'incorrect_count' => $total - $totalPointsEarned, // Math consistency
                'total_questions' => $total,
                'percentage' => $percentage,
                'pass_status' => $percentage >= $passThreshold ? 'ناجح' : 'راسب',
                'calculated_at' => now(),
            ]);

            $session->update([
                'status' => 'completed',
                'completed_at' => now(),
            ]);
        });

        return redirect()->route('user.graded_exams.result', $session->id);
    }

    private function getPerformanceLevel($percentage)
    {
        if ($percentage >= 85) return ['name' => 'متميز', 'class' => 'text-success', 'bar_color' => 'bg-success'];
        if ($percentage >= 75) return ['name' => 'جيد جداً', 'class' => 'text-success', 'bar_color' => 'bg-success'];
        if ($percentage >= 70) return ['name' => 'جيد', 'class' => 'text-warning', 'bar_color' => 'bg-warning'];
        if ($percentage >= 60) return ['name' => 'يحتاج إلى مراجعة', 'class' => 'text-warning', 'bar_color' => 'bg-warning'];
        return ['name' => 'يحتاج إلى تطوير', 'class' => 'text-danger', 'bar_color' => 'bg-danger'];
    }

    private function getReadinessLevel($percentage)
    {
        if ($percentage >= 85) return 'متميز';
        if ($percentage >= 75) return 'جيد جداً';
        if ($percentage >= 70) return 'جيد';
        if ($percentage >= 60) return 'قريب من الجاهزية';
        return 'يحتاج إلى تطوير';
    }

    public function result(GradedExamSession $session)
    {
        if ($session->user_id !== Auth::id()) abort(403);

        $session->load([
            'result', 
            'gradedExam',
            'sessionQuestions.question.unit',
            'sessionQuestions.question.options',
            'userAnswers.selectedOptions' // To see what the user actually chose
        ]);

        $result = $session->result;
        
        $readinessLevel = null;
        $overallPerformance = null;
        $unitsStats = [];
        $highestUnit = null;
        $lowestUnit = null;
        
        if ($result) {
            $readinessLevel = $this->getReadinessLevel($result->percentage);
            $overallPerformance = $this->getPerformanceLevel($result->percentage);

            // Calculate unit breakdown
            $unitData = [];
            
            // Map user answers for quick access
            $userAnswersMap = $session->userAnswers->keyBy('question_id');

            foreach ($session->sessionQuestions as $sq) {
                $q = $sq->question;
                if (!$q || !$q->unit) continue;
                
                $unitId = $q->unit->id;
                if (!isset($unitData[$unitId])) {
                    $unitData[$unitId] = [
                        'name' => $q->unit->title_ar,
                        'total_questions' => 0,
                        'points_earned' => 0,
                    ];
                }

                $unitData[$unitId]['total_questions']++;
                
                $answer = $userAnswersMap->get($q->id);
                if ($answer) {
                    $unitData[$unitId]['points_earned'] += $answer->points_earned;
                }
            }

            foreach ($unitData as $id => $data) {
                $percentage = $data['total_questions'] > 0 
                    ? round(($data['points_earned'] / $data['total_questions']) * 100, 2) 
                    : 0;
                
                $performance = $this->getPerformanceLevel($percentage);

                $unitsStats[] = [
                    'name' => $data['name'],
                    'score' => $data['points_earned'],
                    'total' => $data['total_questions'],
                    'percentage' => $percentage,
                    'level_name' => $performance['name'],
                    'level_class' => $performance['class'],
                    'bar_color' => $performance['bar_color'],
                ];
            }

            // Sort descending by percentage
            usort($unitsStats, function($a, $b) {
                return $b['percentage'] <=> $a['percentage'];
            });

            if (count($unitsStats) > 0) {
                $maxPercentage = $unitsStats[0]['percentage'];
                $minPercentage = $unitsStats[count($unitsStats) - 1]['percentage'];

                $highestUnits = array_filter($unitsStats, fn($u) => $u['percentage'] == $maxPercentage);
                $lowestUnits = array_filter($unitsStats, fn($u) => $u['percentage'] == $minPercentage);

                $highestNames = array_column($highestUnits, 'name');
                $lowestNames = array_column($lowestUnits, 'name');

                $highestUnit = $unitsStats[0];
                $lowestUnit = $unitsStats[count($unitsStats) - 1];

                if (count($highestNames) > 1) {
                    $highestUnit['name'] = count($highestNames) <= 2 ? implode(' و ', $highestNames) : 'عدة وحدات (' . count($highestNames) . ')';
                }
                if (count($lowestNames) > 1) {
                    $lowestUnit['name'] = count($lowestNames) <= 2 ? implode(' و ', $lowestNames) : 'عدة وحدات (' . count($lowestNames) . ')';
                }
            }
        }

        // Prepare review data
        $reviewData = [];
        if ($result) {
            $userAnswersMap = $session->userAnswers->keyBy('question_id');
            
            foreach ($session->sessionQuestions as $index => $sq) {
                $q = $sq->question;
                $answer = $userAnswersMap->get($q->id);
                
                $selectedOptionIds = $answer ? $answer->selectedOptions->pluck('option_id')->toArray() : [];
                $correctOptions = $q->options->where('is_correct', true)->pluck('option_text_ar')->toArray();
                
                $reviewData[] = [
                    'index' => $index + 1,
                    'text' => $q->text_ar,
                    'unit_name' => $q->unit ? $q->unit->title_ar : '',
                    'is_correct' => $answer && $answer->points_earned == 1,
                    'points' => $answer ? $answer->points_earned : 0,
                    'selected_ids' => $selectedOptionIds,
                    'correct_options_text' => implode('، ', $correctOptions),
                    'explanation' => $q->explanation_ar ?: 'لا يوجد تفسير متاح لهذا السؤال',
                    'options' => $q->options
                ];
            }
        }

        return view('user.graded_exams.result', compact(
            'session', 'result', 'readinessLevel', 'overallPerformance', 'unitsStats', 'highestUnit', 'lowestUnit', 'reviewData'
        ));
    }
}