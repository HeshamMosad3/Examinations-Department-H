<?php

namespace App\Services\Auth;

use Illuminate\Validation\Rule;

/**
 * حقول فورم "إنشاء حساب" وقواعد التحقق منها.
 *
 * كل إعداد هنا مكتوب بـ cms() / cms_flag() / cms_number() / cms_list() زي نصوص الصفحات، فبيظهر تلقائياً في
 * لوحة الإدارة (محتوى الصفحات ← تسجيل الدخول وإنشاء حساب) ويتعدل من غير ما نلمس الكود أو قاعدة البيانات:
 * إظهار/إخفاء الحقل، إجباري ولا لأ، الترتيب، العرض، أقل وأكبر طول، عربي فقط، الخيارات، والنصوص ورسائل الخطأ.
 *
 * نفس التعريف بيستخدمه: الصفحة (resources/views/auth/register.blade.php)، التحقق في المتصفح، والتحقق في السيرفر
 * (App\Http\Requests\RegisterRequest)، فالتلاتة دايماً متطابقين.
 */
class RegisterForm
{
    /** أعلام الجنسيات المعروفة؛ أي جنسية يضيفها الأدمن من غير علم بتاخد علم "أخرى" */
    public const FLAGS = [
        'سعودي' => '/images/auth/flags/flag-sa.svg',
        'إماراتي' => '/images/auth/flags/flag-ae.svg',
        'قطري' => '/images/auth/flags/flag-qa.svg',
        'بحريني' => '/images/auth/flags/flag-bh.svg',
        'كويتي' => '/images/auth/flags/flag-kw.svg',
        'عماني' => '/images/auth/flags/flag-om.svg',
        'مصري' => '/images/auth/flags/flag-eg.svg',
        'أردني' => '/images/auth/flags/flag-jo.svg',
        'سوري' => '/images/auth/flags/flag-sy.svg',
        'لبناني' => '/images/auth/flags/flag-lb.svg',
        'فلسطيني' => '/images/auth/flags/flag-ps.svg',
        'سوداني' => '/images/auth/flags/flag-sd.svg',
        'يمني' => '/images/auth/flags/flag-ye.svg',
        'عراقي' => '/images/auth/flags/flag-iq.svg',
        'مغربي' => '/images/auth/flags/flag-ma.svg',
        'تونسي' => '/images/auth/flags/flag-tn.svg',
        'جزائري' => '/images/auth/flags/flag-dz.svg',
    ];

    public const OTHER_FLAG = '/images/auth/flags/flag-other.svg';

    /** حقول أسماء المستخدم اللي بيتكوّن منها الاسم الكامل */
    public const NAME_PARTS = ['first_name', 'father_name', 'grandfather_name', 'last_name'];

    private ?array $fields = null;

    /**
     * الحقول الظاهرة بترتيبها.
     *
     * type: text | email | digits | select | nationality | password
     *
     * @return array<string, array<string, mixed>>
     */
    public function fields(): array
    {
        if ($this->fields !== null) {
            return $this->fields;
        }

        $all = [
            'first_name' => [
                'type' => 'text',
                'label' => cms('auth.field_first_name.label', 'الاسم الأول (بالعربي)'),
                'placeholder' => cms('auth.field_first_name.placeholder', 'أدخل الاسم الأول'),
                'enabled' => cms_flag('auth.field_first_name.enabled', '1'),
                'required' => cms_flag('auth.field_first_name.required', '1'),
                'min' => cms_number('auth.field_first_name.min', '2'),
                'max' => cms_number('auth.field_first_name.max', '100'),
                'arabic' => cms_flag('auth.field_first_name.arabic_only', '0'),
                'order' => cms_number('auth.field_first_name.order', '1'),
                'full' => cms_flag('auth.field_first_name.full_width', '0'),
            ],
            'father_name' => [
                'type' => 'text',
                'label' => cms('auth.field_father_name.label', 'اسم الأب (بالعربي)'),
                'placeholder' => cms('auth.field_father_name.placeholder', 'أدخل اسم الأب'),
                'enabled' => cms_flag('auth.field_father_name.enabled', '1'),
                'required' => cms_flag('auth.field_father_name.required', '1'),
                'min' => cms_number('auth.field_father_name.min', '2'),
                'max' => cms_number('auth.field_father_name.max', '100'),
                'arabic' => cms_flag('auth.field_father_name.arabic_only', '0'),
                'order' => cms_number('auth.field_father_name.order', '2'),
                'full' => cms_flag('auth.field_father_name.full_width', '0'),
            ],
            'grandfather_name' => [
                'type' => 'text',
                'label' => cms('auth.field_grandfather_name.label', 'اسم الجد (بالعربي)'),
                'placeholder' => cms('auth.field_grandfather_name.placeholder', 'أدخل اسم الجد'),
                'enabled' => cms_flag('auth.field_grandfather_name.enabled', '1'),
                'required' => cms_flag('auth.field_grandfather_name.required', '1'),
                'min' => cms_number('auth.field_grandfather_name.min', '2'),
                'max' => cms_number('auth.field_grandfather_name.max', '100'),
                'arabic' => cms_flag('auth.field_grandfather_name.arabic_only', '0'),
                'order' => cms_number('auth.field_grandfather_name.order', '3'),
                'full' => cms_flag('auth.field_grandfather_name.full_width', '0'),
            ],
            'last_name' => [
                'type' => 'text',
                'label' => cms('auth.field_last_name.label', 'الاسم الأخير (بالعربي)'),
                'placeholder' => cms('auth.field_last_name.placeholder', 'أدخل الاسم الأخير'),
                'enabled' => cms_flag('auth.field_last_name.enabled', '1'),
                'required' => cms_flag('auth.field_last_name.required', '1'),
                'min' => cms_number('auth.field_last_name.min', '2'),
                'max' => cms_number('auth.field_last_name.max', '100'),
                'arabic' => cms_flag('auth.field_last_name.arabic_only', '0'),
                'order' => cms_number('auth.field_last_name.order', '4'),
                'full' => cms_flag('auth.field_last_name.full_width', '0'),
            ],
            // البريد وكلمة المرور أساس تسجيل الدخول: دايماً ظاهرين وإجباريين
            'email' => [
                'type' => 'email',
                'label' => cms('auth.field_email.label', 'البريد الإلكتروني'),
                'placeholder' => cms('auth.field_email.placeholder', 'user@gmail.com'),
                'enabled' => true,
                'required' => true,
                'min' => 0,
                'max' => 255,
                'order' => cms_number('auth.field_email.order', '5'),
                'full' => cms_flag('auth.field_email.full_width', '1'),
            ],
            'phone' => [
                'type' => 'digits',
                'label' => cms('auth.field_phone.label', 'رقم الجوال'),
                'placeholder' => cms('auth.field_phone.placeholder', '0500000000'),
                'enabled' => cms_flag('auth.field_phone.enabled', '1'),
                'required' => cms_flag('auth.field_phone.required', '1'),
                'min' => cms_number('auth.field_phone.min', '9'),
                'max' => cms_number('auth.field_phone.max', '15'),
                'prefix' => cms_flag('auth.field_phone.show_prefix', '1') ? cms('auth.field_phone.prefix', '966+') : null,
                'prefix_flag' => cms_image('auth.field_phone.prefix_flag', '/images/auth/flags/flag-sa.svg'),
                'unique' => true,
                'order' => cms_number('auth.field_phone.order', '6'),
                'full' => cms_flag('auth.field_phone.full_width', '1'),
            ],
            'identity_type' => [
                'type' => 'select',
                'label' => cms('auth.field_identity_type.label', 'نوع الهوية'),
                'placeholder' => cms('auth.field_identity_type.placeholder', 'اختر نوع الهوية'),
                'enabled' => cms_flag('auth.field_identity_type.enabled', '1'),
                'required' => cms_flag('auth.field_identity_type.required', '1'),
                'options' => $this->pairs(cms_list('auth.field_identity_type.options', 'سعودية، غير سعودية')),
                'order' => cms_number('auth.field_identity_type.order', '7'),
                'full' => cms_flag('auth.field_identity_type.full_width', '0'),
            ],
            'nationality' => [
                'type' => 'nationality',
                'label' => cms('auth.field_nationality.label', 'الجنسية'),
                'placeholder' => cms('auth.field_nationality.placeholder', 'اختر الجنسية'),
                'search_placeholder' => cms('auth.field_nationality.search_placeholder', 'بحث عن جنسية...'),
                'enabled' => cms_flag('auth.field_nationality.enabled', '1'),
                'required' => cms_flag('auth.field_nationality.required', '1'),
                'options' => $this->pairs(cms_list('auth.field_nationality.options', 'سعودي، إماراتي، قطري، بحريني، كويتي، عماني، مصري، أردني، سوري، لبناني، فلسطيني، سوداني، يمني، عراقي، مغربي، تونسي، جزائري، أخرى')),
                'order' => cms_number('auth.field_nationality.order', '8'),
                'full' => cms_flag('auth.field_nationality.full_width', '0'),
            ],
            'national_id' => [
                'type' => 'digits',
                'label' => cms('auth.field_national_id.label', 'رقم الهوية (الإقامة)'),
                'placeholder' => cms('auth.field_national_id.placeholder', 'أدخل رقم الهوية'),
                'enabled' => cms_flag('auth.field_national_id.enabled', '1'),
                'required' => cms_flag('auth.field_national_id.required', '1'),
                'min' => cms_number('auth.field_national_id.min', '8'),
                'max' => cms_number('auth.field_national_id.max', '15'),
                'unique' => true,
                'confirm' => cms_flag('auth.field_national_id.confirm', '1') ? [
                    'label' => cms('auth.field_national_id.confirm_label', 'تأكيد رقم الهوية (الإقامة)'),
                    'placeholder' => cms('auth.field_national_id.confirm_placeholder', 'تأكيد رقم الهوية'),
                ] : null,
                'order' => cms_number('auth.field_national_id.order', '9'),
                'full' => cms_flag('auth.field_national_id.full_width', '0'),
            ],
            'password' => [
                'type' => 'password',
                'label' => cms('auth.field_password.label', 'كلمة المرور'),
                'placeholder' => cms('auth.field_password.placeholder', '••••••••'),
                'enabled' => true,
                'required' => true,
                'min' => cms_number('auth.field_password.min', '8'),
                'max' => 255,
                'confirm' => cms_flag('auth.field_password.confirm', '1') ? [
                    'label' => cms('auth.field_password.confirm_label', 'تأكيد كلمة المرور'),
                    'placeholder' => cms('auth.field_password.confirm_placeholder', '••••••••'),
                ] : null,
                'order' => cms_number('auth.field_password.order', '10'),
                'full' => cms_flag('auth.field_password.full_width', '0'),
            ],
            // حقول موجودة في جدول المستخدمين ومقفولة افتراضياً؛ الأدمن يقدر يظهرها
            'gender' => [
                'type' => 'select',
                'label' => cms('auth.field_gender.label', 'الجنس'),
                'placeholder' => cms('auth.field_gender.placeholder', 'اختر الجنس'),
                'enabled' => cms_flag('auth.field_gender.enabled', '0'),
                'required' => cms_flag('auth.field_gender.required', '0'),
                'options' => [
                    'male' => cms('auth.field_gender.male', 'ذكر'),
                    'female' => cms('auth.field_gender.female', 'أنثى'),
                ],
                'order' => cms_number('auth.field_gender.order', '11'),
                'full' => cms_flag('auth.field_gender.full_width', '0'),
            ],
            'qualification' => [
                'type' => 'text',
                'label' => cms('auth.field_qualification.label', 'المؤهل العلمي'),
                'placeholder' => cms('auth.field_qualification.placeholder', 'مثال: بكالوريوس'),
                'enabled' => cms_flag('auth.field_qualification.enabled', '0'),
                'required' => cms_flag('auth.field_qualification.required', '0'),
                'min' => cms_number('auth.field_qualification.min', '0'),
                'max' => cms_number('auth.field_qualification.max', '255'),
                'arabic' => cms_flag('auth.field_qualification.arabic_only', '0'),
                'order' => cms_number('auth.field_qualification.order', '12'),
                'full' => cms_flag('auth.field_qualification.full_width', '0'),
            ],
        ];

        $fields = [];
        foreach ($all as $name => $field) {
            if (! $field['enabled']) {
                continue;
            }
            // حماية من إعدادات متناقضة (أقل طول أكبر من أكبر طول)
            if (isset($field['min'], $field['max']) && $field['min'] > $field['max']) {
                $field['max'] = $field['min'];
            }
            $fields[$name] = $field + ['name' => $name, 'arabic' => false, 'unique' => false, 'confirm' => null, 'options' => []];
        }
        uasort($fields, fn ($a, $b) => $a['order'] <=> $b['order']);

        return $this->fields = $fields;
    }

    public function has(string $name): bool
    {
        return isset($this->fields()[$name]);
    }

    public function flagFor(string $nationality): string
    {
        return self::FLAGS[$nationality] ?? self::OTHER_FLAG;
    }

    /** قواعد التحقق في السيرفر */
    public function rules(): array
    {
        $rules = [];
        foreach ($this->fields() as $name => $f) {
            $rule = [$f['required'] ? 'required' : 'nullable', 'string'];

            switch ($f['type']) {
                case 'email':
                    array_push($rule, 'email', 'max:255', Rule::unique('users', 'email'));
                    break;
                case 'digits':
                    $rule[] = 'regex:/^[0-9]{' . $f['min'] . ',' . $f['max'] . '}$/';
                    break;
                case 'select':
                case 'nationality':
                    $rule[] = Rule::in(array_keys($f['options']));
                    break;
                default:
                    if ($f['min'] > 0) {
                        $rule[] = 'min:' . $f['min'];
                    }
                    $rule[] = 'max:' . $f['max'];
                    if ($f['arabic']) {
                        $rule[] = 'regex:/^[\p{Arabic}\s]+$/u';
                    }
            }
            if ($f['unique'] && $f['type'] !== 'email') {
                $rule[] = Rule::unique('users', $name);
            }
            if ($f['confirm']) {
                $rule[] = 'confirmed';
            }
            $rules[$name] = $rule;
        }

        return $rules;
    }

    /** رسائل الخطأ (قوالب بيعدلها الأدمن؛ :attribute = اسم الحقل) */
    public function messages(): array
    {
        $messages = [
            'required' => cms('auth.validation.required', ':attribute مطلوب.'),
            'min.string' => cms('auth.validation.min', 'يجب أن يحتوي :attribute على :min أحرف على الأقل.'),
            'max.string' => cms('auth.validation.max', 'يجب ألا يزيد :attribute عن :max حرفاً.'),
            'email' => cms('auth.validation.email', 'يرجى إدخال بريد إلكتروني صحيح.'),
            'unique' => cms('auth.validation.unique', ':attribute مسجل مسبقاً.'),
            'confirmed' => cms('auth.validation.confirmed', 'تأكيد :attribute غير متطابق.'),
            'in' => cms('auth.validation.in', 'يرجى اختيار :attribute من القائمة.'),
        ];
        foreach ($this->fields() as $name => $f) {
            if ($f['type'] === 'digits') {
                $messages["{$name}.regex"] = $this->digitsMessage($f);
            } elseif ($f['arabic']) {
                $messages["{$name}.regex"] = cms('auth.validation.arabic', 'يجب كتابة :attribute بالأحرف العربية فقط.');
            }
        }

        return $messages;
    }

    /** أسماء الحقول في رسائل الخطأ */
    public function attributes(): array
    {
        return collect($this->fields())->mapWithKeys(fn ($f, $name) => [$name => $f['label']])->all();
    }

    /** نفس القواعد والرسائل للتحقق في المتصفح */
    public function clientRules(): array
    {
        $tpl = $this->messages();
        $fill = fn (string $msg, array $f) => strtr($msg, [':attribute' => $f['label'], ':min' => $f['min'] ?? '', ':max' => $f['max'] ?? '']);

        return collect($this->fields())->map(fn ($f) => [
            'name' => $f['name'],
            'type' => $f['type'],
            'required' => $f['required'],
            'min' => $f['min'] ?? 0,
            'max' => $f['max'] ?? 0,
            'arabic' => $f['arabic'],
            'confirm' => (bool) $f['confirm'],
            'messages' => [
                'required' => $fill($tpl['required'], $f),
                'min' => $fill($tpl['min.string'], $f),
                'max' => $fill($tpl['max.string'], $f),
                'email' => $fill($tpl['email'], $f),
                'confirmed' => $fill($tpl['confirmed'], $f),
                'confirm_required' => $fill(cms('auth.validation.confirm_required', 'يرجى تأكيد :attribute.'), $f),
                'regex' => isset($tpl[$f['name'] . '.regex']) ? $fill($tpl[$f['name'] . '.regex'], $f) : '',
            ],
        ])->values()->all();
    }

    private function digitsMessage(array $f): string
    {
        return strtr(cms('auth.validation.digits', 'يجب أن يتكون :attribute من أرقام فقط (:min إلى :max خانة).'), [':min' => $f['min'], ':max' => $f['max']]);
    }

    /** ['قيمة', ...] → ['قيمة' => 'قيمة'] (القيمة المحفوظة هي نفس النص الظاهر) */
    private function pairs(array $values): array
    {
        return array_combine($values, $values) ?: [];
    }
}
