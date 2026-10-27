<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionRequest;
use App\Models\Assessment;
use App\Models\Question;
use App\Services\Dashboard\Admin\Assessments\AssessmentManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct(private readonly AssessmentManager $manager) {}

    public function store(QuestionRequest $request, Assessment $assessment): RedirectResponse
    {
        if ($request->filled('texts')) {
            $count = $this->manager->addQuestions($assessment, $request->validated('dimension_id'), $request->validated('texts'), $request->validated('options'));

            return $this->back($assessment, "تمت إضافة {$count} سؤال.");
        }
        $this->manager->saveQuestion($assessment, $request->questionData(), $request->validated('options'));

        return $this->back($assessment, 'تمت إضافة السؤال.');
    }

    public function update(QuestionRequest $request, Question $question): RedirectResponse
    {
        $assessment = Assessment::findOrFail($question->assessment_id);
        $this->manager->saveQuestion($assessment, $request->questionData(), $request->validated('options'), $question);

        return $this->back($assessment, 'تم حفظ السؤال.');
    }

    public function applyOptions(QuestionRequest $request, Assessment $assessment): RedirectResponse
    {
        $count = $this->manager->applyOptionsToAll($assessment, $request->validated('options'));

        return $this->back($assessment, "تم تطبيق الاختيارات على {$count} سؤال.");
    }

    public function reorder(Request $request, Assessment $assessment): JsonResponse
    {
        $ids = $request->validate(['ids' => 'required|array', 'ids.*' => 'integer'])['ids'];
        $this->manager->reorderQuestions($assessment, array_map('intval', $ids));

        return response()->json(['ok' => true]);
    }

    public function destroy(Question $question): RedirectResponse
    {
        $assessment = Assessment::findOrFail($question->assessment_id);
        $this->manager->deleteQuestion($question);

        return $this->back($assessment, 'تم حذف السؤال.');
    }

    private function back(Assessment $assessment, string $message): RedirectResponse
    {
        return redirect()->route('admin.assessments.show', [$assessment, 'tab' => 'questions'])->with('success', $message);
    }
}
