<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResultLevelRequest;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\ResultLevel;
use App\Services\Assessments\AssessmentManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResultLevelController extends Controller
{
    public function __construct(private readonly AssessmentManager $manager) {}

    public function store(ResultLevelRequest $request, Assessment $assessment): RedirectResponse
    {
        $this->manager->saveLevel($assessment, $request->validated());

        return $this->back($assessment, 'تمت إضافة المستوى.');
    }

    public function update(ResultLevelRequest $request, ResultLevel $level): RedirectResponse
    {
        $assessment = Assessment::findOrFail($level->assessment_id);
        $this->manager->saveLevel($assessment, $request->validated(), $level);

        return $this->back($assessment, 'تم حفظ المستوى.');
    }

    /** مستويات تلقائية بنطاقات متساوية: للمقياس كله، أو لمحور، أو لكل المحاور الرئيسية مرة واحدة */
    public function generate(Request $request, Assessment $assessment): RedirectResponse
    {
        $data = $request->validate([
            'scope' => ['required', 'string', 'regex:/^(all|roots|\d+)$/'],
            'titles' => 'required|array|min:2|max:7',
            'titles.*' => 'required|string|max:255',
        ], [], ['titles.*' => 'اسم المستوى', 'scope' => 'خاص بـ']);

        $titles = array_values(array_map('trim', $data['titles']));
        $scopes = match ($data['scope']) {
            'all' => [null],
            'roots' => Dimension::where('assessment_id', $assessment->id)->whereNull('parent_id')->pluck('id')->all(),
            default => [Dimension::where('assessment_id', $assessment->id)->findOrFail((int) $data['scope'])->id],
        };
        foreach ($scopes as $dimensionId) {
            $this->manager->generateLevels($assessment, $dimensionId, $titles);
        }

        return $this->back($assessment, 'تم عمل ' . count($titles) . ' مستويات بنطاقات متساوية' . (count($scopes) > 1 ? ' لكل محور (' . count($scopes) . ' محاور)' : '') . '. عدّل الأوصاف والتوصيات براحتك.');
    }

    public function destroy(ResultLevel $level): RedirectResponse
    {
        $assessment = Assessment::findOrFail($level->assessment_id);
        $level->delete();

        return $this->back($assessment, 'تم حذف المستوى.');
    }

    private function back(Assessment $assessment, string $message): RedirectResponse
    {
        return redirect()->route('admin.assessments.show', [$assessment, 'tab' => 'levels'])->with('success', $message);
    }
}
