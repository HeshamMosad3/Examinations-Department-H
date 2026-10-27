<?php

namespace App\Http\Requests;

use App\Services\Website\Auth\RegisterForm;
use Illuminate\Foundation\Http\FormRequest;

/**
 * التحقق من فورم "إنشاء حساب". الحقول وقواعدها ورسائلها جاية من RegisterForm (بيتحكم فيها الأدمن).
 */
class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $form = app(RegisterForm::class);

        $cleanPass = function (?string $val): ?string {
            if ($val === null) return null;
            return trim(preg_replace('/[\x{200B}-\x{200D}\x{FEFF}\x{00A0}\r\n\t]/u', '', (string) $val));
        };
        // Spaces / dashes are dropped (as the form's JS does) so "050 000 0000" can't dodge the unique rules
        $digitsOnly = fn (string $field) => preg_replace('/[\s\-]+/u', '', (string) $this->input($field));

        $updates = [];
        foreach ($form->fields() as $name => $field) {
            if (! $this->has($name)) {
                continue;
            }
            $updates[$name] = match ($field['type']) {
                'password' => $cleanPass($this->input($name)),
                'digits' => $digitsOnly($name),
                default => trim((string) $this->input($name)),
            };
            if ($field['confirm'] && $this->has("{$name}_confirmation")) {
                $updates["{$name}_confirmation"] = $field['type'] === 'password'
                    ? $cleanPass($this->input("{$name}_confirmation"))
                    : $digitsOnly("{$name}_confirmation");
            }
        }

        // Optional fields left empty are stored as NULL (an empty string would clash with the unique phone / ID columns)
        $updates = array_map(fn ($v) => $v === '' ? null : $v, $updates);

        // الاسم الكامل من أجزاء الاسم الظاهرة في الفورم
        $parts = array_filter(array_map(fn ($part) => $updates[$part] ?? '', RegisterForm::NAME_PARTS), 'strlen');
        if ($parts) {
            $updates['name'] = implode(' ', $parts);
        }

        $this->merge($updates);
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return app(RegisterForm::class)->rules() + ['name' => 'sometimes|string|max:255'];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return app(RegisterForm::class)->messages();
    }

    /** @return array<string, string> */
    public function attributes(): array
    {
        return app(RegisterForm::class)->attributes();
    }
}
