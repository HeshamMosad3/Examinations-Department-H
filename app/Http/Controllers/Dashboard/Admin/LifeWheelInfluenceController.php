<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\LifeWheelInfluence;
use App\Models\LifeWheelInfluenceLevel;
use App\Services\Dashboard\Admin\LifeWheelInfluenceSettings;
use App\Services\Dashboard\Admin\LifeWheelJourneySettings;
use App\Models\LifeWheelJourneySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class LifeWheelInfluenceController extends Controller
{
    public function __construct(private LifeWheelInfluenceSettings $settings, private LifeWheelJourneySettings $journey)
    {
    }

    public function index()
    {
        return view('admin.life_wheel_influence.index', [
            'axes' => LifeWheelInfluenceSettings::AXES,
            'levels' => $this->settings->levels(),
            'matrix' => $this->settings->matrix(),
            'journey' => $this->journey->get(),
            'setbackLevels' => LifeWheelJourneySettings::SETBACK_LEVELS,
        ]);
    }

    public function update(Request $request)
    {
        $levelKeys = LifeWheelInfluenceLevel::pluck('key')->all();
        $axisKeys = array_keys(LifeWheelInfluenceSettings::AXES);

        $data = $request->validate([
            'levels' => 'required|array',
            'levels.*.min' => 'required|integer|min:0|max:100',
            'levels.*.max' => 'required|integer|min:0|max:100',
            'matrix' => 'required|array',
            'matrix.*.*' => ['nullable', Rule::in($levelKeys)],
        ], [
            'levels.*.*.required' => 'كل نسب المستويات مطلوبة.',
            'levels.*.*.integer' => 'نسب المستويات لازم تكون أرقام صحيحة.',
            'levels.*.*.min' => 'نسب المستويات لازم تكون من 0 لـ 100.',
            'levels.*.*.max' => 'نسب المستويات لازم تكون من 0 لـ 100.',
            'matrix.*.*.in' => 'في خلية في جدول التأثير مستواها مش معروف.',
            'required' => 'البيانات ناقصة، حدّث الصفحة وحاول تاني.',
        ]);

        $names = LifeWheelInfluenceLevel::pluck('name_ar', 'key');
        $errors = [];
        foreach ($levelKeys as $key) {
            $range = $data['levels'][$key] ?? null;
            if (! $range) {
                $errors["levels.$key.min"] = "نطاق مستوى «{$names[$key]}» مطلوب.";
            } elseif ((int) $range['min'] > (int) $range['max']) {
                $errors["levels.$key.min"] = "في مستوى «{$names[$key]}» أقل نسبة لازم تكون أصغر من أو تساوي أعلى نسبة.";
            }
        }
        if ($errors) {
            throw ValidationException::withMessages($errors);
        }

        DB::transaction(function () use ($data, $levelKeys, $axisKeys) {
            foreach ($levelKeys as $key) {
                LifeWheelInfluenceLevel::where('key', $key)->update([
                    'min_percent' => (int) $data['levels'][$key]['min'],
                    'max_percent' => (int) $data['levels'][$key]['max'],
                ]);
            }
            foreach ($axisKeys as $source) {
                foreach ($axisKeys as $target) {
                    if ($source === $target) continue;
                    LifeWheelInfluence::updateOrCreate(
                        ['source_axis' => $source, 'target_axis' => $target],
                        ['level_key' => ($data['matrix'][$source][$target] ?? null) ?: null]
                    );
                }
            }
        });

        $this->settings->flush();

        return redirect()->route('admin.life-wheel-influence.index')->with('success', 'تم حفظ إعدادات تأثير عجلة الحياة. العجلة في الصفحة الرئيسية بقت بتستخدمها.');
    }

    /** إعدادات حركة العجلة في الصفحة الرئيسية (محاكاة سنين من حياة شخص). */
    public function updateJourney(Request $request)
    {
        $axisKeys = array_keys(LifeWheelInfluenceSettings::AXES);

        $rules = [
            'enabled' => 'nullable|boolean',
            'duration_seconds' => 'required|integer|min:3|max:20',
            'years' => 'required|integer|min:3|max:8',
            'start_mode' => ['required', Rule::in(['random', 'fixed'])],
            'start_min' => 'required|integer|min:5|max:100',
            'start_max' => 'required|integer|min:5|max:100|gte:start_min',
            'start_values' => 'required|array',
            'final_min' => 'required|integer|min:20|max:100',
            'final_max' => 'required|integer|min:20|max:100|gte:final_min',
            'setback_level' => ['required', 'integer', Rule::in(array_keys(LifeWheelJourneySettings::SETBACK_LEVELS))],
            'priority_axes' => 'nullable|array',
            'priority_axes.*' => [Rule::in($axisKeys)],
        ];
        foreach ($axisKeys as $key) {
            $rules["start_values.$key"] = 'required|integer|min:5|max:100';
        }

        $data = $request->validate($rules, [
            'duration_seconds.*' => 'مدة الحركة لازم تكون رقم من 3 لـ 20 ثانية.',
            'years.*' => 'عدد السنين لازم يكون رقم من 3 لـ 8.',
            'start_mode.*' => 'اختار طريقة المستوى الحالي (عشوائي أو ثابت).',
            'start_min.*' => 'بداية نطاق المستوى الحالي لازم تكون رقم من 5 لـ 100.',
            'start_max.*' => 'نهاية نطاق المستوى الحالي لازم تكون رقم من 5 لـ 100 ومش أقل من بدايته.',
            'start_values.*' => 'قيم المستوى الحالي لكل جانب لازم تكون أرقام من 5 لـ 100.',
            'final_min.*' => 'بداية نطاق النهاية لازم تكون رقم من 20 لـ 100.',
            'final_max.*' => 'نهاية نطاق النهاية لازم تكون رقم من 20 لـ 100 ومش أقل من بدايته.',
            'setback_level.*' => 'شدة التراجع غير معروفة.',
            'priority_axes.*' => 'في جانب مش معروف في قائمة الجوانب الأولى.',
        ]);

        LifeWheelJourneySetting::updateOrCreate(['id' => 1], [
            'enabled' => $request->boolean('enabled'),
            'duration_seconds' => (int) $data['duration_seconds'],
            'years' => (int) $data['years'],
            'start_mode' => $data['start_mode'],
            'start_min' => (int) $data['start_min'],
            'start_max' => (int) $data['start_max'],
            'start_values' => array_map(fn ($key) => (int) $data['start_values'][$key], $axisKeys),
            'final_min' => (int) $data['final_min'],
            'final_max' => (int) $data['final_max'],
            'setback_level' => (int) $data['setback_level'],
            'priority_axes' => array_values($data['priority_axes'] ?? []),
        ]);

        $this->journey->flush();

        return redirect()->to(route('admin.life-wheel-influence.index') . '#journey')->with('success', 'تم حفظ إعدادات حركة العجلة. الصفحة الرئيسية بقت بتستخدمها.');
    }
}
