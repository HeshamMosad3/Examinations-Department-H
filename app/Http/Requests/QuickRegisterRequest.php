<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * التسجيل السريع (نافذة "إنشاء حساب جديد للوصول إلى تقريرك" في صفحة النتيجة): اسم كامل واحد وبيانات الدخول الأساسية.
 * التسجيل الكامل بكل حقوله موجود في RegisterRequest.
 */
class QuickRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $cleanPass = fn (?string $val) => $val === null ? null : trim(preg_replace('/[\x{200B}-\x{200D}\x{FEFF}\x{00A0}\r\n\t]/u', '', $val));
        $digitsOnly = fn (?string $val) => preg_replace('/[\s\-]+/u', '', (string) $val);

        $this->merge([
            'name' => trim((string) $this->input('name')),
            'email' => trim((string) $this->input('email')),
            'phone' => $digitsOnly($this->input('phone')),
            'national_id' => $digitsOnly($this->input('national_id')),
            'national_id_confirmation' => $digitsOnly($this->input('national_id_confirmation')),
            'password' => $cleanPass($this->input('password')),
            'password_confirmation' => $cleanPass($this->input('password_confirmation')),
        ]);
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        $passwordMin = cms_number('auth.field_password.min', '8');

        return [
            'name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[\p{Arabic}\s]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')],
            'phone' => ['required', 'string', 'regex:/^[0-9]{9,15}$/', Rule::unique('users', 'phone')],
            'national_id' => ['required', 'string', 'regex:/^[0-9]{8,15}$/', Rule::unique('users', 'national_id'), 'confirmed'],
            'password' => ['required', 'string', "min:{$passwordMin}", 'max:255', 'confirmed'],
        ];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return [
            'required' => cms('auth.validation.required', ':attribute مطلوب.'),
            'min' => cms('auth.validation.min', 'يجب أن يحتوي :attribute على :min أحرف على الأقل.'),
            'max' => cms('auth.validation.max', 'يجب ألا يزيد :attribute عن :max حرفاً.'),
            'email' => cms('auth.validation.email', 'يرجى إدخال بريد إلكتروني صحيح.'),
            'unique' => cms('auth.validation.unique', ':attribute مسجل مسبقاً.'),
            'confirmed' => cms('auth.validation.confirmed', 'تأكيد :attribute غير متطابق.'),
            'name.regex' => cms('auth.validation.arabic', 'يجب كتابة :attribute بالأحرف العربية فقط.'),
            'phone.regex' => strtr(cms('auth.validation.digits', 'يجب أن يتكون :attribute من أرقام فقط (:min إلى :max خانة).'), [':min' => 9, ':max' => 15]),
            'national_id.regex' => strtr(cms('auth.validation.digits', 'يجب أن يتكون :attribute من أرقام فقط (:min إلى :max خانة).'), [':min' => 8, ':max' => 15]),
        ];
    }

    /** @return array<string, string> */
    public function attributes(): array
    {
        return [
            'name' => cms('auth.quick.field_name.label', 'الاسم بالكامل (بالعربي)'),
            'email' => cms('auth.field_email.label', 'البريد الإلكتروني'),
            'phone' => cms('auth.field_phone.label', 'رقم الجوال'),
            'national_id' => cms('auth.field_national_id.label', 'رقم الهوية (الإقامة)'),
            'password' => cms('auth.field_password.label', 'كلمة المرور'),
        ];
    }
}
