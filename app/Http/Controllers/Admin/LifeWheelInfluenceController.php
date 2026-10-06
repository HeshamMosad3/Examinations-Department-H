<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LifeWheelInfluence;
use App\Models\LifeWheelInfluenceLevel;
use App\Services\LifeWheelInfluenceSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class LifeWheelInfluenceController extends Controller
{
    public function __construct(private LifeWheelInfluenceSettings $settings)
    {
    }

    public function index()
    {
        return view('admin.life_wheel_influence.index', [
            'axes' => LifeWheelInfluenceSettings::AXES,
            'levels' => $this->settings->levels(),
            'matrix' => $this->settings->matrix(),
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
}
