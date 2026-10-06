<?php

namespace App\Http\Requests\Admin;

use App\Models\Assessment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

/**
 * "مقياس جديد" في خطوة واحدة: البيانات، والاختيارات، والمحاور بأسئلتها (سطر لكل سؤال)، ومستويات النتيجة.
 */
class AssessmentWizardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $lines = fn ($text) => collect(preg_split('/\R/u', (string) $text))->map(fn ($l) => trim($l))->filter()->values()->all();

        $this->merge([
            'code' => $this->filled('code') ? strtolower(trim($this->input('code'))) : null,
            'is_active' => $this->boolean('is_active'),
            'dimension_levels' => $this->boolean('dimension_levels'),
            'options' => collect($this->input('options', []))
                ->filter(fn ($o) => trim((string) ($o['label_ar'] ?? '')) !== '')
                ->map(fn ($o) => ['label_ar' => trim($o['label_ar']), 'score_value' => $o['score_value'] ?? null])
                ->values()->all(),
            'dimensions' => collect($this->input('dimensions', []))
                ->filter(fn ($d) => trim((string) ($d['name_ar'] ?? '')) !== '' || trim((string) ($d['questions_raw'] ?? '')) !== '')
                ->map(fn ($d) => [
                    'name_ar' => trim((string) ($d['name_ar'] ?? '')),
                    'description_ar' => trim((string) ($d['description_ar'] ?? '')) ?: null,
                    'questions' => $lines($d['questions_raw'] ?? ''),
                ])->values()->all(),
            'levels' => collect($this->input('levels', []))
                ->filter(fn ($l) => trim((string) ($l['title_ar'] ?? '')) !== '')
                ->values()->all(),
        ]);
    }

    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'code' => ['nullable', 'string', 'max:60', 'regex:/^[a-z0-9_]+$/', Rule::unique('assessments', 'code')],
            'category' => 'nullable|string|max:255',
            'subtitle_ar' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string',
            'instructions_ar' => 'nullable|string',
            'time_limit_min' => 'nullable|integer|min:1|max:600',
            'price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
            'level_basis' => ['required', Rule::in(array_keys(Assessment::LEVEL_BASES))],

            'options' => 'required|array|min:2|max:10',
            'options.*.label_ar' => 'required|string|max:255',
            'options.*.score_value' => 'required|integer|min:-100|max:100',

            'dimensions' => 'required|array|min:1|max:30',
            'dimensions.*.name_ar' => 'required|string|max:255',
            'dimensions.*.description_ar' => 'nullable|string',
            'dimensions.*.questions' => 'required|array|min:1|max:200',
            'dimensions.*.questions.*' => 'string|max:2000',

            'levels' => 'required|array|min:1|max:10',
            'levels.*.title_ar' => 'required|string|max:255',
            'levels.*.min' => 'required|integer',
            'levels.*.max' => 'required|integer',
            'levels.*.description' => 'nullable|string',
            'dimension_levels' => 'boolean',
        ];
    }

    /** نطاقات المستويات: من ≤ إلى، ومفيش نطاقين متداخلين */
    public function after(): array
    {
        return [function (Validator $validator) {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }
            $levels = collect($this->input('levels'))->sortBy('min')->values();
            foreach ($levels as $i => $level) {
                if ((int) $level['min'] > (int) $level['max']) {
                    $validator->errors()->add('levels', "في مستوى «{$level['title_ar']}» بداية النطاق أكبر من نهايته.");
                }
                if ($i > 0 && (int) $level['min'] <= (int) $levels[$i - 1]['max']) {
                    $validator->errors()->add('levels', "نطاق «{$level['title_ar']}» متداخل مع «{$levels[$i - 1]['title_ar']}».");
                }
            }
        }];
    }

    public function attributes(): array
    {
        return [
            'title_ar' => 'اسم المقياس',
            'code' => 'كود المقياس',
            'options' => 'اختيارات الإجابة',
            'options.*.label_ar' => 'نص الاختيار',
            'options.*.score_value' => 'درجة الاختيار',
            'dimensions' => 'المحاور',
            'dimensions.*.name_ar' => 'اسم المحور',
            'dimensions.*.questions' => 'أسئلة المحور',
            'levels' => 'مستويات النتيجة',
            'levels.*.title_ar' => 'اسم المستوى',
            'levels.*.min' => 'بداية النطاق',
            'levels.*.max' => 'نهاية النطاق',
        ];
    }

    public function messages(): array
    {
        return [
            'code.regex' => 'الكود يتكون من حروف إنجليزية صغيرة وأرقام و _ فقط.',
            'options.min' => 'لازم اختيارين على الأقل للإجابة.',
            'dimensions.required' => 'أضف محور واحد على الأقل بأسئلته.',
            'dimensions.*.questions.required' => 'كل محور لازم يكون فيه سؤال واحد على الأقل.',
            'dimensions.*.name_ar.required' => 'فيه محور فيه أسئلة ومالوش اسم.',
        ];
    }
}
