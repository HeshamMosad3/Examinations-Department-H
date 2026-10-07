<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $firstName = trim((string) $this->input('first_name'));
        $fatherName = trim((string) $this->input('father_name'));
        $grandfatherName = trim((string) $this->input('grandfather_name'));
        $lastName = trim((string) $this->input('last_name'));

        $fullName = trim("{$firstName} {$fatherName} {$grandfatherName} {$lastName}");

        $cleanPass = function (?string $val): ?string {
            if ($val === null) return null;
            return trim(preg_replace('/[\x{200B}-\x{200D}\x{FEFF}\x{00A0}\r\n\t]/u', '', (string) $val));
        };

        $updates = [];
        if ($fullName !== '') {
            $updates['name'] = $fullName;
        }

        if ($this->has('password')) {
            $updates['password'] = $cleanPass($this->input('password'));
        }

        if ($this->has('password_confirmation')) {
            $updates['password_confirmation'] = $cleanPass($this->input('password_confirmation'));
        }

        if ($this->has('national_id')) {
            $updates['national_id'] = trim((string) $this->input('national_id'));
        }

        if ($this->has('national_id_confirmation')) {
            $updates['national_id_confirmation'] = trim((string) $this->input('national_id_confirmation'));
        }

        if ($this->has('email')) {
            $updates['email'] = trim((string) $this->input('email'));
        }

        if ($this->has('phone')) {
            $updates['phone'] = trim((string) $this->input('phone'));
        }

        if (!empty($updates)) {
            $this->merge($updates);
        }
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'first_name'        => 'required|string|max:100',
            'father_name'       => 'required|string|max:100',
            'grandfather_name'  => 'required|string|max:100',
            'last_name'         => 'required|string|max:100',
            'name'              => 'sometimes|string|max:255',
            'email'             => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'phone'             => ['required', 'string', 'max:25', Rule::unique('users', 'phone')],
            'identity_type'     => 'required|string|max:50',
            'nationality'       => 'required|string|max:100',
            'national_id'       => ['required', 'string', 'max:20', 'confirmed', Rule::unique('users', 'national_id')],
            'password'          => 'required|string|min:8|confirmed',
            'gender'            => 'nullable|string|in:male,female',
            'qualification'     => 'nullable|string|max:255',
        ];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return [
            'first_name.required'       => 'الاسم الأول مطلوب.',
            'father_name.required'      => 'اسم الأب مطلوب.',
            'grandfather_name.required' => 'اسم الجد مطلوب.',
            'last_name.required'        => 'الاسم الأخير مطلوب.',
            'email.required'            => 'البريد الإلكتروني مطلوب.',
            'email.email'               => 'يرجى إدخال بريد إلكتروني صحيح.',
            'email.unique'              => 'البريد الإلكتروني مسجل مسبقاً.',
            'phone.required'            => 'رقم الجوال مطلوب.',
            'phone.unique'              => 'رقم الجوال مسجل مسبقاً.',
            'identity_type.required'    => 'نوع الهوية مطلوب.',
            'nationality.required'      => 'الجنسية مطلوبة.',
            'national_id.required'      => 'رقم الهوية مطلوب.',
            'national_id.unique'        => 'رقم الهوية مسجل مسبقاً.',
            'national_id.confirmed'     => 'تأكيد رقم الهوية غير متطابق.',
            'password.required'         => 'كلمة المرور مطلوبة.',
            'password.min'              => 'يجب أن تكون كلمة المرور مكونة من 8 خانات على الأقل.',
            'password.confirmed'        => 'تأكيد كلمة المرور غير متطابق.',
        ];
    }
}
