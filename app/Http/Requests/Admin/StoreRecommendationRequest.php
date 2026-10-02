<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecommendationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'id' => 'nullable|uuid',
            'assessment_id' => 'required|uuid|exists:assessments,id,deleted_at,NULL',
            'level' => 'required|string',
            'description_ar' => 'required|string',
            'certificates_ar' => 'nullable|array',
            'certificates_ar.*.title' => 'nullable|string',
            'certificates_ar.*.subtitle' => 'nullable|string',
            'certificates_ar.*.icon' => 'nullable|string',
            'certificates_intro_ar' => 'nullable|string',
            'programs_ar' => 'nullable|array',
            'programs_ar.*.title' => 'nullable|string',
            'programs_ar.*.subtitle' => 'nullable|string',
            'programs_ar.*.icon' => 'nullable|string',
            'programs_intro_ar' => 'nullable|string',
            'programs_outro_ar' => 'nullable|string',
            'plan_30_days_ar' => 'nullable|array',
            'plan_30_days_ar.*.period' => 'nullable|string',
            'plan_30_days_ar.*.title' => 'nullable|string',
            'plan_30_days_ar.*.icon' => 'nullable|string',
            'plan_30_days_intro_ar' => 'nullable|string',
            'high_threshold' => 'nullable|integer|min:0',
            'low_threshold' => 'nullable|integer|min:0',
        ];
    }
}
