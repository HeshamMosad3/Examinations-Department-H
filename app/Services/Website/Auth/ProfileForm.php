<?php

namespace App\Services\Website\Auth;

use App\Models\User;
use Illuminate\Validation\Rule;

/**
 * حقول صفحة "الملف الشخصي" وقواعد التحقق منها ونسبة الاكتمال.
 *
 * زي RegisterForm: كل نص وإعداد مكتوب بـ cms() / cms_flag() / cms_list() فبيظهر في لوحة الإدارة (محتوى الصفحات ← profile)
 * ويتعدل من غير ما نلمس الكود: اسم الحقل، إجباري ولا اختياري، والخيارات.
 *
 * "اكتمال الملف" = كل الحقول الإجبارية متعبية. نسبة الاكتمال بتتحسب على الحقول الإجبارية بس (الاختياري مش بيأثر فيها)،
 * وبوابة التقارير المفصّلة (EnsureProfileComplete) بتفتح لما النسبة توصل 100%.
 */
class ProfileForm
{
    public const GROUPS = ['personal', 'contact', 'professional'];

    private ?array $fields = null;

    /**
     * الحقول بترتيب ظهورها.
     *
     * type: text | digits | select | date | email
     *
     * @return array<string, array<string, mixed>>
     */
    public function fields(): array
    {
        if ($this->fields !== null) {
            return $this->fields;
        }

        $all = [
            'first_name' => ['group' => 'personal', 'type' => 'text', 'arabic' => true, 'min' => 2, 'max' => 100, 'half' => true,
                'label' => cms('profile.field_first_name.label', 'الاسم الأول (بالعربي)'),
                'required' => cms_flag('profile.field_first_name.required', '1')],
            'father_name' => ['group' => 'personal', 'type' => 'text', 'arabic' => true, 'min' => 2, 'max' => 100, 'half' => true,
                'label' => cms('profile.field_father_name.label', 'اسم الأب (بالعربي)'),
                'required' => cms_flag('profile.field_father_name.required', '1')],
            'grandfather_name' => ['group' => 'personal', 'type' => 'text', 'arabic' => true, 'min' => 2, 'max' => 100, 'half' => true,
                'label' => cms('profile.field_grandfather_name.label', 'اسم الجد (بالعربي)'),
                'required' => cms_flag('profile.field_grandfather_name.required', '1')],
            'last_name' => ['group' => 'personal', 'type' => 'text', 'arabic' => true, 'min' => 2, 'max' => 100, 'half' => true,
                'label' => cms('profile.field_last_name.label', 'الاسم الأخير (بالعربي)'),
                'required' => cms_flag('profile.field_last_name.required', '1')],
            'name_en' => ['group' => 'personal', 'type' => 'text', 'english' => true, 'min' => 3, 'max' => 150, 'dir' => 'ltr',
                'label' => cms('profile.field_name_en.label', 'الاسم بالإنجليزي (الاسم الكامل)'),
                'hint' => cms('profile.field_name_en.hint', 'يُكتب كما سيظهر على الشهادة، مثال: Ahmed Mohammed Ali'),
                'required' => cms_flag('profile.field_name_en.required', '1')],
            'identity_type' => ['group' => 'personal', 'type' => 'select', 'half' => true,
                'label' => cms('profile.field_identity_type.label', 'نوع الهوية'),
                'options' => $this->pairs(cms_list('profile.field_identity_type.options', 'سعودية، غير سعودية')),
                'required' => cms_flag('profile.field_identity_type.required', '1')],
            'national_id' => ['group' => 'personal', 'type' => 'digits', 'min' => 8, 'max' => 15, 'unique' => true, 'half' => true,
                'label' => cms('profile.field_national_id.label', 'رقم الهوية / الإقامة'),
                'required' => cms_flag('profile.field_national_id.required', '1')],
            'nationality' => ['group' => 'personal', 'type' => 'select', 'half' => true, 'flags' => true,
                'label' => cms('profile.field_nationality.label', 'الجنسية'),
                'options' => $this->pairs(cms_list('profile.field_nationality.options', 'سعودي، إماراتي، قطري، بحريني، كويتي، عماني، مصري، أردني، سوري، لبناني، فلسطيني، سوداني، يمني، عراقي، مغربي، تونسي، جزائري، أخرى')),
                'required' => cms_flag('profile.field_nationality.required', '1')],
            'gender' => ['group' => 'personal', 'type' => 'select', 'half' => true,
                'label' => cms('profile.field_gender.label', 'الجنس'),
                'options' => ['male' => cms('profile.field_gender.male', 'ذكر'), 'female' => cms('profile.field_gender.female', 'أنثى')],
                'required' => cms_flag('profile.field_gender.required', '1')],
            'birth_date' => ['group' => 'personal', 'type' => 'date', 'half' => true,
                'label' => cms('profile.field_birth_date.label', 'تاريخ الميلاد'),
                'required' => cms_flag('profile.field_birth_date.required', '1')],
            'residence' => ['group' => 'personal', 'type' => 'select', 'half' => true,
                'label' => cms('profile.field_residence.label', 'مكان السكن'),
                'options' => $this->pairs(cms_list('profile.field_residence.options', 'الرياض، جدة، مكة المكرمة، المدينة المنورة، الدمام، الخبر، الطائف، أبها، تبوك، بريدة، حائل، جازان، نجران، الباحة، الجوف، عرعر، خارج المملكة')),
                'required' => cms_flag('profile.field_residence.required', '1')],

            // البريد بيستخدم للدخول: بيتعرض بس ومش بيتعدل من هنا
            'email' => ['group' => 'contact', 'type' => 'email', 'readonly' => true, 'dir' => 'ltr', 'half' => true,
                'label' => cms('profile.field_email.label', 'البريد الإلكتروني'),
                'required' => true],
            'phone' => ['group' => 'contact', 'type' => 'digits', 'min' => 9, 'max' => 15, 'unique' => true, 'half' => true,
                'label' => cms('profile.field_phone.label', 'رقم الجوال'),
                'required' => cms_flag('profile.field_phone.required', '1')],
            'whatsapp' => ['group' => 'contact', 'type' => 'digits', 'min' => 9, 'max' => 15, 'half' => true,
                'label' => cms('profile.field_whatsapp.label', 'رقم الواتساب للتواصل والإشعارات'),
                'required' => cms_flag('profile.field_whatsapp.required', '0')],

            'qualification' => ['group' => 'professional', 'type' => 'select', 'half' => true,
                'label' => cms('profile.field_qualification.label', 'المؤهل التعليمي'),
                'options' => $this->pairs(cms_list('profile.field_qualification.options', 'ثانوية فأقل، دبلوم، بكالوريوس، ماجستير، دكتوراه، أخرى')),
                'required' => cms_flag('profile.field_qualification.required', '1')],
            'job_status' => ['group' => 'professional', 'type' => 'select', 'half' => true,
                'label' => cms('profile.field_job_status.label', 'الحالة الوظيفية'),
                'options' => $this->pairs(cms_list('profile.field_job_status.options', 'طالب، موظف، أعمال حرة، باحث عن عمل، متقاعد، أخرى')),
                'required' => cms_flag('profile.field_job_status.required', '1')],
            'employer' => ['group' => 'professional', 'type' => 'text', 'min' => 2, 'max' => 150, 'half' => true,
                'label' => cms('profile.field_employer.label', 'جهة العمل'),
                'required' => cms_flag('profile.field_employer.required', '1')],
            'job_title' => ['group' => 'professional', 'type' => 'text', 'min' => 2, 'max' => 150, 'half' => true,
                'label' => cms('profile.field_job_title.label', 'المسمى الوظيفي'),
                'required' => cms_flag('profile.field_job_title.required', '0')],
            'heard_from' => ['group' => 'professional', 'type' => 'select', 'half' => true,
                'label' => cms('profile.field_heard_from.label', 'كيف سمعت عن دوراتنا؟'),
                'options' => $this->pairs(cms_list('profile.field_heard_from.options', 'تويتر (X)، إنستغرام، سناب شات، تيك توك، لينكدإن، يوتيوب، صديق أو زميل، جهة العمل، بحث جوجل، أخرى')),
                'required' => cms_flag('profile.field_heard_from.required', '0')],
        ];

        $fields = [];
        foreach ($all as $name => $field) {
            $fields[$name] = $field + [
                'name' => $name, 'readonly' => false, 'arabic' => false, 'english' => false, 'unique' => false,
                'options' => [], 'min' => 0, 'max' => 255, 'half' => false, 'dir' => null, 'hint' => null, 'flags' => false,
            ];
        }

        return $this->fields = $fields;
    }

    /** @return array<string, array<string, array<string, mixed>>> الحقول متجمعة بالقسم */
    public function groups(): array
    {
        $grouped = array_fill_keys(self::GROUPS, []);
        foreach ($this->fields() as $name => $field) {
            $grouped[$field['group']][$name] = $field;
        }

        return $grouped;
    }

    /** القيمة المعروضة للحقل (بنفس الشكل اللي بيتحط في input) */
    public function valueOf(User $user, string $name): string
    {
        $value = $user->{$name};

        return $value instanceof \DateTimeInterface ? $value->format('Y-m-d') : trim((string) $value);
    }

    /**
     * نسبة الاكتمال: الحقول الإجبارية المتعبية ÷ كل الإجبارية.
     *
     * @return array{percent: int, complete: bool, filled: int, total: int, missing: list<string>, missing_names: list<string>}
     */
    public function completion(User $user): array
    {
        $required = array_filter($this->fields(), fn ($f) => $f['required']);
        $missing = [];
        foreach ($required as $name => $field) {
            if ($this->valueOf($user, $name) === '') {
                $missing[$name] = $field['label'];
            }
        }

        $total = count($required);
        $filled = $total - count($missing);

        return [
            'percent' => $total === 0 ? 100 : (int) floor($filled / $total * 100),
            'complete' => $missing === [],
            'filled' => $filled,
            'total' => $total,
            'missing' => array_values($missing),
            'missing_names' => array_keys($missing),
        ];
    }

    /** علم الجنسية (نفس أعلام فورم التسجيل؛ أي جنسية من غير علم بتاخد علم "أخرى") */
    public function flag(string $nationality): string
    {
        return (new RegisterForm())->flagFor($nationality);
    }

    public function isComplete(User $user): bool
    {
        // الأدمن مالوش ملف شخصي ومش بيتقيّد بالبوابة
        return $user->isAdmin() || $this->completion($user)['complete'];
    }

    /**
     * تقسيم الاسم الكامل المحفوظ (من التسجيل السريع) لاقتراح الأسماء الأربعة؛ المستخدم يراجعها قبل الحفظ.
     *
     * @return array<string, string>
     */
    public function suggestNameParts(User $user): array
    {
        $words = array_values(array_filter(preg_split('/\s+/u', trim((string) $user->name))));
        if ($words === []) {
            return [];
        }
        // أقل من 4 كلمات: نوزعها على الأول والأب والجد (والأخير لو فيه كلمة رابعة)، والباقي يكمله المستخدم
        $parts = ['first_name', 'father_name', 'grandfather_name', 'last_name'];
        if (count($words) >= 4) {
            $last = array_pop($words);
            $words = [$words[0], $words[1], implode(' ', array_slice($words, 2)), $last];
        } elseif (count($words) === 3) {
            $words = [$words[0], $words[1], '', $words[2]];
        }

        return array_combine($parts, array_pad(array_slice($words, 0, 4), 4, ''));
    }

    /** قواعد التحقق في السيرفر */
    public function rules(User $user): array
    {
        $rules = [];
        foreach ($this->fields() as $name => $f) {
            if ($f['readonly']) {
                continue;
            }
            $rule = [$f['required'] ? 'required' : 'nullable', 'string'];

            switch ($f['type']) {
                case 'digits':
                    $rule[] = 'regex:/^[0-9]{' . $f['min'] . ',' . $f['max'] . '}$/';
                    break;
                case 'select':
                    // القيمة المحفوظة قبل كده (مثلاً من تسجيل قديم) تفضل مقبولة حتى لو الأدمن شالها من الخيارات
                    $rule[] = Rule::in(array_filter([...array_keys($f['options']), $this->valueOf($user, $name)], 'strlen'));
                    break;
                case 'date':
                    array_push($rule, 'date_format:Y-m-d', 'before:today', 'after:1920-01-01');
                    break;
                default:
                    $rule[] = 'min:' . $f['min'];
                    $rule[] = 'max:' . $f['max'];
                    if ($f['arabic']) {
                        $rule[] = 'regex:/^[\p{Arabic}\s]+$/u';
                    }
                    if ($f['english']) {
                        $rule[] = "regex:/^[A-Za-z.'\\-]+(?:\\s+[A-Za-z.'\\-]+)+$/";
                    }
            }
            if ($f['unique']) {
                $rule[] = Rule::unique('users', $name)->ignore($user->id);
            }
            $rules[$name] = $rule;
        }

        return $rules + ['confirm' => ['accepted']];
    }

    public function messages(): array
    {
        $messages = [
            'required' => cms('profile.validation.required', ':attribute مطلوب.'),
            'min' => cms('profile.validation.min', 'يجب ألا يقل :attribute عن :min أحرف.'),
            'max' => cms('profile.validation.max', 'يجب ألا يزيد :attribute عن :max حرفاً.'),
            'unique' => cms('profile.validation.unique', ':attribute مسجل مسبقاً لحساب آخر.'),
            'in' => cms('profile.validation.in', 'يرجى اختيار :attribute من القائمة.'),
            'date_format' => cms('profile.validation.date', 'يرجى إدخال :attribute بشكل صحيح.'),
            'before' => cms('profile.validation.date', 'يرجى إدخال :attribute بشكل صحيح.'),
            'after' => cms('profile.validation.date', 'يرجى إدخال :attribute بشكل صحيح.'),
            'confirm.accepted' => cms('profile.validation.confirm', 'يرجى الإقرار بصحة البيانات المدخلة قبل الحفظ.'),
        ];
        foreach ($this->fields() as $name => $f) {
            if ($f['type'] === 'digits') {
                $messages["{$name}.regex"] = strtr(cms('profile.validation.digits', 'يجب أن يتكون :attribute من أرقام فقط (:min إلى :max خانة).'), [':min' => $f['min'], ':max' => $f['max']]);
            } elseif ($f['arabic']) {
                $messages["{$name}.regex"] = cms('profile.validation.arabic', 'يجب كتابة :attribute بالأحرف العربية فقط.');
            } elseif ($f['english']) {
                $messages["{$name}.regex"] = cms('profile.validation.english', 'يجب كتابة :attribute بالأحرف الإنجليزية، ويشمل الاسم الأول والأخير على الأقل.');
            }
        }

        return $messages;
    }

    public function attributes(): array
    {
        return collect($this->fields())->mapWithKeys(fn ($f, $name) => [$name => $f['label']])->all();
    }

    /** ['قيمة', ...] → ['قيمة' => 'قيمة'] (القيمة المحفوظة هي نفس النص الظاهر) */
    private function pairs(array $values): array
    {
        return array_combine($values, $values) ?: [];
    }
}
