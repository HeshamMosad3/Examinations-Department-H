<?php

namespace App\Http\Requests\Admin;

use App\Models\ResultLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

/**
 * مستوى نتيجة. القوائم بتتكتب في textarea (سطر لكل عنصر)، والبرامج: "اسم البرنامج | وصف قصير".
 */
class ResultLevelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $lines = fn (?string $text) => collect(preg_split('/\R/u', (string) $text))->map(fn ($l) => trim($l))->filter()->values()->all() ?: null;

        $merge = [];
        foreach (array_keys(ResultLevel::LISTS) as $list) {
            $merge[$list] = $lines($this->input("{$list}_raw"));
        }
        $existing = collect($this->route('level')?->programs ?? [])->keyBy('title');
        $merge['programs'] = collect($lines($this->input('programs_raw')))->map(function ($line) use ($existing) {
            [$title, $subtitle] = array_pad(array_map('trim', explode('|', $line, 2)), 2, null);

            // الأيقونة المختارة قبل كده للبرنامج بتفضل زي ما هي
            return array_filter(['title' => $title, 'subtitle' => $subtitle ?: null, 'icon' => $existing[$title]['icon'] ?? null]);
        })->all() ?: null;

        $this->merge($merge);
    }

    public function rules(): array
    {
        $level = $this->route('level');
        $assessmentId = $this->route('assessment')?->id ?? $level?->assessment_id;

        return [
            'dimension_id' => ['nullable', 'integer', Rule::exists('dimensions', 'id')->where('assessment_id', $assessmentId)],
            'code' => 'nullable|string|max:60',
            'title_ar' => 'required|string|max:255',
            'min_score' => 'nullable|integer|required_with:max_score',
            'max_score' => 'nullable|integer|required_with:min_score|gte:min_score',
            'summary_ar' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'strengths' => 'nullable|array',
            'development_areas' => 'nullable|array',
            'how_to_learn' => 'nullable|array',
            'practical_tips' => 'nullable|array',
            'programs_intro_ar' => 'nullable|string',
            'programs' => 'nullable|array',
            'programs_outro_ar' => 'nullable|string',
        ];
    }

    /** النطاق مايتداخلش مع مستوى تاني لنفس المقياس/المحور */
    public function after(): array
    {
        return [function (Validator $validator) {
            if ($validator->errors()->isNotEmpty() || $this->input('min_score') === null) {
                return;
            }
            $level = $this->route('level');
            $overlap = ResultLevel::where('assessment_id', $this->route('assessment')?->id ?? $level->assessment_id)
                ->where('dimension_id', $this->input('dimension_id'))
                ->when($level, fn ($q) => $q->where('id', '!=', $level->id))
                ->whereNotNull('min_score')
                ->where('min_score', '<=', (int) $this->input('max_score'))
                ->where('max_score', '>=', (int) $this->input('min_score'))
                ->value('title_ar');
            if ($overlap) {
                $validator->errors()->add('min_score', "النطاق متداخل مع مستوى «{$overlap}».");
            }
        }];
    }

    public function attributes(): array
    {
        return ['title_ar' => 'اسم المستوى', 'min_score' => 'من', 'max_score' => 'إلى', 'dimension_id' => 'المحور'];
    }

}
