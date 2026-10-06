<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * سؤال واحد، أو أسئلة كتير (texts: سطر لكل سؤال)، أو اختيارات لكل الأسئلة — كلها بنفس قواعد الاختيارات.
 */
class QuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $options = collect($this->input('options', []))
            ->filter(fn ($o) => trim((string) ($o['label_ar'] ?? '')) !== '')
            ->map(fn ($o) => ['label_ar' => trim($o['label_ar']), 'score_value' => $o['score_value'] ?? null])
            ->values()->all();

        $this->merge([
            'options' => $options,
            'is_reversed' => $this->boolean('is_reversed'),
            'texts' => $this->has('texts_raw')
                ? collect(preg_split('/\R/u', (string) $this->input('texts_raw')))->map(fn ($t) => trim($t))->filter()->values()->all()
                : null,
        ]);
    }

    public function rules(): array
    {
        $assessmentId = $this->route('assessment')?->id ?? $this->route('question')?->assessment_id;
        $bulk = $this->has('texts_raw');
        $optionsOnly = $this->routeIs('admin.questions.applyOptions');

        return [
            'text_ar' => [$bulk || $optionsOnly ? 'nullable' : 'required', 'string'],
            'texts' => [$bulk ? 'required' : 'nullable', 'array', 'max:300'],
            'texts.*' => 'string|max:2000',
            'dimension_id' => ['nullable', 'integer', Rule::exists('dimensions', 'id')->where('assessment_id', $assessmentId)],
            'is_reversed' => 'boolean',
            'order_index' => 'nullable|integer|min:0',
            'options' => 'required|array|min:2|max:10',
            'options.*.label_ar' => 'required|string|max:255',
            'options.*.score_value' => 'required|integer|min:-100|max:100',
        ];
    }

    public function attributes(): array
    {
        return [
            'text_ar' => 'نص السؤال',
            'texts' => 'الأسئلة',
            'dimension_id' => 'المحور',
            'options' => 'الاختيارات',
            'options.*.label_ar' => 'نص الاختيار',
            'options.*.score_value' => 'درجة الاختيار',
        ];
    }

    public function messages(): array
    {
        return ['options.min' => 'لازم اختيارين على الأقل.'];
    }

    public function questionData(): array
    {
        return $this->safe()->only(['text_ar', 'dimension_id', 'is_reversed', 'order_index']);
    }
}
