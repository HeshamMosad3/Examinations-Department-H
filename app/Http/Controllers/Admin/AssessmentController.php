<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AssessmentRequest;
use App\Http\Requests\Admin\AssessmentWizardRequest;
use App\Models\Assessment;
use App\Services\Assessments\AssessmentData;
use App\Services\Assessments\AssessmentExporter;
use App\Services\Assessments\AssessmentHealth;
use App\Services\Assessments\AssessmentImporter;
use App\Services\Assessments\AssessmentManager;
use App\Services\Assessments\ScoringService;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssessmentController extends Controller
{
    private const IMAGES_FOLDER = 'images/assessments';

    public function __construct(
        private readonly AssessmentManager $manager,
        private readonly FileUploadService $uploads,
    ) {}

    public function index(): View
    {
        return view('admin.assessments.index', ['assessments' => $this->manager->listing()]);
    }

    /** مقياس جديد في صفحة واحدة: البيانات ← الإجابات ← المحاور والأسئلة ← النتائج */
    public function create(): View
    {
        return view('admin.assessments.create');
    }

    public function store(AssessmentWizardRequest $request, AssessmentImporter $importer): RedirectResponse
    {
        $input = $request->validated();
        $data = array_intersect_key($input, array_flip(['title_ar', 'subtitle_ar', 'category', 'description_ar', 'instructions_ar', 'time_limit_min', 'is_active', 'level_basis']));
        $data += [
            'code' => $input['code'] ?: $this->manager->uniqueCodeFor($input['title_ar']),
            'scoring_type' => 'sum',
            'price' => $input['price'] ?? 0,
            'order_index' => (int) Assessment::max('order_index') + 1,
            'created_by' => $request->user()->id,
            'options' => array_map(fn ($o) => [$o['label_ar'], (int) $o['score_value']], $input['options']),
            'dimensions' => $input['dimensions'],
            'levels' => array_map(fn ($l, $i) => [
                'code' => AssessmentManager::levelCode($i, count($input['levels'])),
                'title_ar' => $l['title_ar'],
                'min' => (int) $l['min'],
                'max' => (int) $l['max'],
                'summary_ar' => $l['description'] ?? null,
            ], collect($input['levels'])->sortBy('min')->values()->all(), array_keys($input['levels'])),
        ];

        $assessment = $importer->import($data);

        // نفس المستويات لكل محور (بنطاقات متساوية على درجة المحور)، لو المقياس فيه أكتر من محور
        if ($input['dimension_levels'] && count($input['dimensions']) > 1) {
            $titles = array_column($data['levels'], 'title_ar');
            foreach (AssessmentData::load($assessment)->roots() as $dimension) {
                $this->manager->generateLevels($assessment, $dimension->id, $titles);
            }
        }

        return redirect()->route('admin.assessments.show', $assessment)
            ->with('success', 'تم إنشاء المقياس بمحاوره وأسئلته ومستوياته. جرّبه من «تجربة المقياس»، وأضف الأوصاف والتوصيات لكل مستوى من تبويب «مستويات النتائج».');
    }

    /** صفحة إدارة المقياس: المحاور، الأسئلة، المستويات، وفحص السلامة */
    public function show(Assessment $assessment, AssessmentHealth $health): View
    {
        $data = AssessmentData::load($assessment);

        return view('admin.assessments.show', [
            'assessment' => $assessment,
            'data' => $data,
            'issues' => $health->issuesByArea($data),
            'tab' => request('tab', 'dimensions'),
        ]);
    }

    public function edit(Assessment $assessment): View
    {
        return view('admin.assessments.form', ['assessment' => $assessment]);
    }

    public function update(AssessmentRequest $request, Assessment $assessment): RedirectResponse
    {
        $data = $request->assessmentData();
        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploads->uploadPublicImage($request->file('image'), self::IMAGES_FOLDER, $assessment->image_url);
        }
        $this->manager->updateAssessment($assessment, $data);

        return redirect()->route('admin.assessments.show', $assessment)->with('success', 'تم حفظ بيانات المقياس.');
    }

    public function toggle(Assessment $assessment): RedirectResponse
    {
        $assessment->update(['is_active' => ! $assessment->is_active]);

        return back()->with('success', $assessment->is_active ? 'تم تفعيل المقياس.' : 'تم إيقاف المقياس.');
    }

    public function duplicate(Assessment $assessment, AssessmentExporter $exporter, AssessmentImporter $importer): RedirectResponse
    {
        $copy = $this->manager->duplicate($assessment, $exporter, $importer);

        return redirect()->route('admin.assessments.show', $copy)->with('success', 'تم إنشاء نسخة من المقياس (غير مفعلة). عدّل فيها براحتك.');
    }

    public function destroy(Assessment $assessment): RedirectResponse
    {
        if (in_array($assessment->code, [Assessment::WHEEL_OF_LIFE, Assessment::PERCEPTUAL_STYLES], true)) {
            return back()->withErrors(['assessment' => 'المقياس ده ليه صفحات في الموقع ومينفعش يتمسح. ممكن توقفه بدل الحذف.']);
        }
        $this->manager->deleteAssessment($assessment);

        return redirect()->route('admin.assessments.index')->with('success', 'تم حذف المقياس وكل محتواه ومحاولاته.');
    }

    /** تجربة المقياس: الأدمن بيجاوب وبيشوف النتيجة المحسوبة من غير ما تتحفظ */
    public function preview(Request $request, Assessment $assessment, ScoringService $scoring): View
    {
        $data = AssessmentData::load($assessment);
        $result = null;
        if ($request->isMethod('post')) {
            $result = $scoring->score($data, array_map('intval', (array) $request->input('answers', [])));
        }

        return view('admin.assessments.preview', compact('assessment', 'data', 'result'));
    }
}
