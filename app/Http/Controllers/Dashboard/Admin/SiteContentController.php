<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Services\FileUploadService;
use App\Services\SiteContentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * محتوى صفحات الموقع: كل صفحة بتتعرض بأقسامها وحقولها (نص، نص طويل، رابط، صورة) زي ما هي مكتوبة في الصفحة.
 */
class SiteContentController extends Controller
{
    private const IMAGES_FOLDER = 'images/site';

    public function __construct(private readonly SiteContentService $content) {}

    public function index(): View
    {
        $overrides = $this->content->overrides();

        $pages = collect($this->pagesMeta())->map(function ($meta, $page) use ($overrides) {
            $fields = collect($this->content->registry()[$page] ?? [])->flatten(1);

            return [
                'key' => $page,
                'label' => $meta[0],
                'icon' => $meta[1],
                'url' => $meta[2],
                'sections' => count($this->content->registry()[$page] ?? []),
                'fields' => $fields->count(),
                'changed' => $fields->filter(fn ($f) => isset($overrides[$f['key']]))->count(),
            ];
        })->filter(fn ($p) => $p['fields'] > 0);

        return view('admin.site_content.index', compact('pages'));
    }

    public function edit(string $page): View
    {
        $sections = $this->content->registry()[$page] ?? abort(404);
        $meta = $this->pagesMeta()[$page] ?? [$page, 'bi-file-earmark', null, []];
        $overrides = $this->content->overrides();

        $sections = collect($meta[3])->keys()->merge(array_keys($sections))->unique()
            ->filter(fn ($s) => isset($sections[$s]))
            ->mapWithKeys(fn ($s) => [$s => [
                'label' => $meta[3][$s] ?? $s,
                'fields' => array_map(fn ($f) => $f + [
                    'label' => $this->fieldLabel($f['key']),
                    'value' => $overrides[$f['key']] ?? $f['default'],
                    'changed' => isset($overrides[$f['key']]),
                ], $sections[$s]),
            ]]);

        return view('admin.site_content.edit', ['page' => $page, 'meta' => $meta, 'sections' => $sections]);
    }

    public function update(Request $request, string $page, FileUploadService $uploads): RedirectResponse
    {
        $fields = collect($this->content->registry()[$page] ?? abort(404))->flatten(1)->keyBy('key');

        $request->validate([
            'values' => 'array',
            'values.*' => 'nullable|string|max:5000',
            'files' => 'array',
            'files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:3072',
            'reset' => 'array',
        ], ['files.*.max' => 'حجم الصورة لازم يكون 3 ميجا أو أقل.', 'files.*.image' => 'الملف لازم يكون صورة.'], ['files.*' => 'الصورة']);

        // أسماء الحقول في الفورم بـ __ بدل النقطة (عشان الـ validation مايفسرهاش كمستويات)
        $decode = fn (array $input) => collect($input)->mapWithKeys(fn ($v, $k) => [str_replace('__', '.', $k) => $v])->all();

        $values = [];
        foreach ($decode((array) $request->input('values', [])) as $key => $value) {
            if ($fields->has($key) && $fields[$key]['type'] !== 'image') {
                $values[$key] = $value;
            }
        }
        foreach ($decode((array) $request->file('files', [])) as $key => $file) {
            if ($fields->has($key) && $fields[$key]['type'] === 'image' && $file) {
                $old = $this->content->overrides()[$key] ?? null;
                $values[$key] = $uploads->uploadPublicImage($file, self::IMAGES_FOLDER, $old, str_replace('.', '_', $key));
            }
        }
        // "رجوع للأصل": القيمة بتتمسح فالصفحة ترجع للنص/الصورة الأصلية
        foreach (array_keys($decode((array) $request->input('reset', []))) as $key) {
            if ($fields->has($key)) {
                $old = $this->content->overrides()[$key] ?? null;
                if ($old && $fields[$key]['type'] === 'image') {
                    $uploads->deletePublicImage($old, self::IMAGES_FOLDER);
                }
                $values[$key] = null;
            }
        }

        $changed = $this->content->save($values);

        return redirect()->route('admin.site-content.edit', $page)
            ->with('success', $changed ? "تم حفظ التعديلات ({$changed} حقل). الصفحة بتعرضها دلوقتي." : 'مفيش تغييرات جديدة.');
    }

    private function pagesMeta(): array
    {
        return (require resource_path('data/site-content-pages.php'))['pages'];
    }

    /** عنوان الحقل من اسمه: card_1_title ← الكارت 1 العنوان */
    private function fieldLabel(string $key): string
    {
        static $words = null;
        $words ??= (require resource_path('data/site-content-pages.php'))['words'];
        $field = last(explode('.', $key));
        if (isset($words[$field])) {
            return $words[$field]; // اسم الحقل كله له ترجمة (arabic_only ← عربي فقط)
        }

        return trim(implode(' ', array_map(fn ($part) => $words[$part] ?? $part, explode('_', $field)))) ?: $field;
    }
}
