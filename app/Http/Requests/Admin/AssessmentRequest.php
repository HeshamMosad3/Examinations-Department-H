<?php

namespace App\Http\Requests\Admin;

use App\Models\Assessment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssessmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'code' => $this->filled('code') ? strtolower(trim($this->input('code'))) : null,
            'is_active' => $this->boolean('is_active'),
        ]);
    }

    public function rules(): array
    {
        $id = $this->route('assessment')?->id;

        return [
            'code' => ['nullable', 'string', 'max:60', 'regex:/^[a-z0-9_]+$/', Rule::unique('assessments', 'code')->ignore($id)],
            'title_ar' => 'required|string|max:255',
            'subtitle_ar' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string',
            'instructions_ar' => 'nullable|string',
            'scoring_type' => ['required', Rule::in(array_keys(Assessment::SCORING_TYPES))],
            'level_basis' => ['required', Rule::in(array_keys(Assessment::LEVEL_BASES))],
            'time_limit_min' => 'nullable|integer|min:1|max:600',
            'price' => 'nullable|numeric|min:0',
            'report_code' => 'nullable|string|max:60',
            'order_index' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => 'كود المقياس',
            'title_ar' => 'اسم المقياس',
            'scoring_type' => 'طريقة الحساب',
            'level_basis' => 'أساس المستويات',
            'time_limit_min' => 'المدة',
            'image' => 'الصورة',
        ];
    }

    public function messages(): array
    {
        return ['code.regex' => 'الكود يتكون من حروف إنجليزية صغيرة وأرقام و _ فقط.'];
    }

    /** البيانات اللي بتتحفظ في جدول المقاييس */
    public function assessmentData(): array
    {
        $data = $this->safe()->except('image');
        $data['price'] = $data['price'] ?? 0;

        return $data;
    }
}
