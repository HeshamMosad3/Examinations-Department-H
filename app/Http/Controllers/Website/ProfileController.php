<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use App\Services\Website\Auth\ProfileForm;
use App\Services\Website\Auth\RegisterForm;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * الملف الشخصي: عرض البيانات وتعديلها وإكمالها (نسبة الاكتمال) وحذفها.
 * التقارير المفصّلة بتفتح لما الملف يكتمل (EnsureProfileComplete)، وبعد الحفظ المستخدم بيرجع للتقرير اللي كان رايحله.
 */
class ProfileController extends Controller
{
    private const PHOTO_FOLDER = 'images/profile';

    public function __construct(
        private readonly ProfileForm $profile,
        private readonly FileUploadService $uploads,
    ) {}

    public function edit(Request $request): View
    {
        $user = $request->user();
        $completion = $this->profile->completion($user);

        // ?next=/مسار-محلي: الصفحة اللي يرجعلها بعد ما يكمّل ملفه (مسار داخل الموقع بس، ومش صفحة الملف نفسها)
        $next = $request->query('next');
        if (is_string($next) && str_starts_with($next, '/') && ! str_starts_with($next, '//') && ! str_starts_with($next, '/\\') && ! str_starts_with($next, '/profile')) {
            $request->session()->put('url.intended', url($next));
        }

        // مستخدم التسجيل السريع: اسمه محفوظ كامل في حقل واحد، فنقترحه موزّع على الأسماء الأربعة (المستخدم يراجعه)
        $parts = array_intersect_key($this->profile->fields(), array_flip(RegisterForm::NAME_PARTS));
        $hasParts = collect($parts)->contains(fn ($f, $name) => $this->profile->valueOf($user, $name) !== '');

        return view('website.profile', [
            'user' => $user,
            'form' => $this->profile,
            'groups' => $this->profile->groups(),
            'completion' => $completion,
            'suggested' => $hasParts ? [] : $this->profile->suggestNameParts($user),
            'intended' => $request->session()->get('url.intended'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();
        $fields = $this->profile->fields();

        // تنضيف المدخلات قبل التحقق: مسافات الأرقام وأرقام عربية-هندية، والفاضي يتحفظ NULL
        $clean = [];
        foreach ($fields as $name => $field) {
            if ($field['readonly'] || ! $request->has($name)) {
                continue;
            }
            $value = trim(preg_replace('/\s+/u', ' ', (string) $request->input($name)));
            if ($field['type'] === 'digits') {
                $value = preg_replace('/[\s\-]+/u', '', strtr($value, ['٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9']));
            }
            $clean[$name] = $value === '' ? null : $value;
        }
        $request->merge($clean);

        $rules = $this->profile->rules($user) + ['photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048']];
        $messages = $this->profile->messages() + [
            'photo.image' => cms('profile.validation.photo', 'يرجى اختيار صورة بصيغة JPG أو PNG أو WEBP لا يزيد حجمها عن 2 ميجابايت.'),
            'photo.mimes' => cms('profile.validation.photo', 'يرجى اختيار صورة بصيغة JPG أو PNG أو WEBP لا يزيد حجمها عن 2 ميجابايت.'),
            'photo.max' => cms('profile.validation.photo', 'يرجى اختيار صورة بصيغة JPG أو PNG أو WEBP لا يزيد حجمها عن 2 ميجابايت.'),
        ];
        $data = $request->validate($rules, $messages, $this->profile->attributes());

        $values = array_intersect_key($data, $clean);

        // الاسم الكامل بيتكوّن من الأسماء الأربعة
        $name = collect(RegisterForm::NAME_PARTS)->map(fn ($part) => $values[$part] ?? '')->filter()->implode(' ');
        if ($name !== '') {
            $values['name'] = $name;
        }

        $oldPhoto = $user->photo;
        if ($request->hasFile('photo')) {
            $values['photo'] = $this->storePhoto($request, $user->id);
        } elseif ($request->boolean('remove_photo')) {
            $values['photo'] = null;
        }

        $user->forceFill($values)->save();

        if ($oldPhoto && array_key_exists('photo', $values) && $values['photo'] !== $oldPhoto) {
            $this->uploads->deletePublicImage($oldPhoto, self::PHOTO_FOLDER);
        }

        // اكتمل الملف: نرجّعه للتقرير اللي كان رايحله (لو فيه)، وإلا نفضل في الصفحة
        if ($this->profile->completion($user->refresh())['complete'] && $request->session()->has('url.intended')) {
            return redirect()->intended(route('profile.edit'))->with('status', cms('profile.messages.saved_complete', 'تم حفظ ملفك الشخصي، ويمكنك الآن عرض التقرير التفصيلي.'));
        }

        return redirect()->route('profile.edit')->with('status', cms('profile.messages.saved', 'تم حفظ التغييرات في ملفك الشخصي.'));
    }

    /** حذف بيانات الملف الشخصي (الحساب نفسه وبيانات الدخول والجوال والهوية بتفضل) */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        $keep = ['email', 'phone', 'national_id'];
        $clear = collect($this->profile->fields())->keys()->diff($keep)->all();

        $photo = $user->photo;
        $user->forceFill(array_fill_keys([...$clear, 'photo'], null))->save();
        if ($photo) {
            $this->uploads->deletePublicImage($photo, self::PHOTO_FOLDER);
        }

        return redirect()->route('profile.edit')->with('status', cms('profile.messages.deleted', 'تم حذف بيانات ملفك الشخصي. أكملها من جديد لعرض التقارير التفصيلية.'));
    }

    private function storePhoto(Request $request, int $userId): string
    {
        $file = $request->file('photo');
        // الامتداد من نوع الملف الحقيقي (مش من اسمه) عشان ما يتحفظش ملف تنفيذي في public
        $extension = match ($file->getMimeType()) {
            'image/png' => 'png',
            'image/webp' => 'webp',
            default => 'jpg',
        };
        $folder = public_path(self::PHOTO_FOLDER);
        if (! is_dir($folder)) {
            mkdir($folder, 0755, true);
        }
        $filename = "u{$userId}_" . Str::lower(Str::random(14)) . ".{$extension}";
        $file->move($folder, $filename);

        return '/' . self::PHOTO_FOLDER . '/' . $filename;
    }
}
