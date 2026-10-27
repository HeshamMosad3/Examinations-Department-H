<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DimensionRequest;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Services\Assessments\AssessmentManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    public function __construct(private readonly AssessmentManager $manager) {}

    public function store(DimensionRequest $request, Assessment $assessment): RedirectResponse
    {
        $this->manager->saveDimension($assessment, $request->validated());

        return $this->back($assessment, 'تمت إضافة المحور.');
    }

    public function update(DimensionRequest $request, Dimension $dimension): RedirectResponse
    {
        $assessment = Assessment::findOrFail($dimension->assessment_id);
        $this->manager->saveDimension($assessment, $request->validated(), $dimension);

        return $this->back($assessment, 'تم حفظ المحور.');
    }

    public function destroy(Request $request, Dimension $dimension): RedirectResponse
    {
        $assessment = Assessment::findOrFail($dimension->assessment_id);
        $this->manager->deleteDimension($dimension, $request->boolean('delete_questions'));

        return $this->back($assessment, 'تم حذف المحور.');
    }

    private function back(Assessment $assessment, string $message): RedirectResponse
    {
        return redirect()->route('admin.assessments.show', [$assessment, 'tab' => 'dimensions'])->with('success', $message);
    }
}
