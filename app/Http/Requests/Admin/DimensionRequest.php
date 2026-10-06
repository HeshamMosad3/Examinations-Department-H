<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DimensionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['reverse_in_total' => $this->boolean('reverse_in_total')]);
    }

    public function rules(): array
    {
        $assessmentId = $this->route('assessment')?->id ?? $this->route('dimension')?->assessment_id;
        $selfId = $this->route('dimension')?->id;

        return [
            'name_ar' => 'required|string|max:255',
            'code' => 'nullable|string|max:60',
            'description_ar' => 'nullable|string',
            // المحور الأب لازم يكون محور رئيسي في نفس المقياس (مستويين بس) ومش هو نفسه
            'parent_id' => ['nullable', 'integer', Rule::notIn([$selfId]),
                Rule::exists('dimensions', 'id')->where('assessment_id', $assessmentId)->whereNull('parent_id')],
            'reverse_in_total' => 'boolean',
            'order_index' => 'nullable|integer|min:0',
        ];
    }

    public function attributes(): array
    {
        return ['name_ar' => 'اسم المحور', 'parent_id' => 'المحور الرئيسي'];
    }
}
