<?php

namespace App\Services;

use App\Models\SiteContent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * محتوى صفحات الموقع اللي بيتحكم فيه الأدمن.
 *
 * كل نص أو صورة أو رابط في الصفحات مكتوب كده:  cms('home.hero.title', 'النص الأصلي')  (و cms_image / cms_url)
 * والإعدادات:  cms_flag (تشغيل/إيقاف '1'/'0')  و cms_number (رقم)  و cms_list (قايمة خيارات)
 * وفي الـ JS:  cms('key', 'النص الأصلي')  من resources/landing/js/cms.js
 * - الصفحة بتعرض تعديل الأدمن لو موجود، وإلا النص الأصلي (فالتصميم مايتغيرش).
 * - لوحة الإدارة بتقرا الحقول من الملفات نفسها (registry)، فمفيش قايمة حقول منفصلة لازم تتحدّث.
 */
class SiteContentService
{
    private const CACHE_KEY = 'site_content_overrides';

    // الملفات اللي فيها محتوى الصفحات
    private const SOURCES = [
        'resources/views/website' => 'blade.php',
        'resources/views/layouts' => 'blade.php',
        'resources/views/errors' => 'blade.php',
        'resources/data' => 'php',
        'resources/landing/js' => 'js',
        'app/Services/Website' => 'php',
        'app/Services/Dashboard' => 'php',
        'app/Http' => 'php',
    ];

    private const PATTERN = "/\\bcms(_image|_url|_flag|_number|_list)?\\(\\s*'([a-z0-9_.\\-]+)'\\s*,\\s*'((?:[^'\\\\]|\\\\.)*)'\\s*\\)/u";

    private ?array $overrides = null;

    /** @return array<string, string> التعديلات المحفوظة */
    public function overrides(): array
    {
        if ($this->overrides === null) {
            try {
                $this->overrides = Cache::rememberForever(self::CACHE_KEY, fn () => SiteContent::pluck('value', 'key')->all());
            } catch (\Throwable) {
                $this->overrides = []; // قاعدة البيانات مش جاهزة: الصفحات تشتغل بالنصوص الأصلية
            }
        }

        return $this->overrides;
    }

    public function get(string $key, string $default): string
    {
        $value = $this->overrides()[$key] ?? null;

        return $value === null || $value === '' ? $default : $value;
    }

    /** التعديلات اللي بتستخدمها ملفات الـ JS (window.CMS) */
    public function jsOverrides(): array
    {
        $jsKeys = collect($this->registry())->flatten(2)->where('source', 'js')->pluck('key')->all();

        return array_intersect_key($this->overrides(), array_flip($jsKeys));
    }

    /**
     * كل الحقول من ملفات الصفحات، متجمعة بالصفحة ثم القسم (أول جزئين من الـ key).
     *
     * @return array<string, array<string, list<array{key: string, type: string, default: string, source: string, file: string}>>>
     */
    public function registry(): array
    {
        $files = $this->sourceFiles();
        $signature = md5(implode('|', array_map(fn ($f) => $f . ':' . filemtime($f), $files)));

        return Cache::remember("site_content_registry_{$signature}", now()->addDay(), function () use ($files) {
            $fields = [];
            foreach ($files as $file) {
                preg_match_all(self::PATTERN, File::get($file), $matches, PREG_SET_ORDER);
                foreach ($matches as [, $kind, $key, $default]) {
                    if (isset($fields[$key])) {
                        continue; // نفس الحقل مستخدم في أكتر من مكان
                    }
                    $default = str_replace(["\\'", '\\\\'], ["'", '\\'], $default);
                    $fields[$key] = [
                        'key' => $key,
                        'type' => match ($kind) {
                            '_image' => 'image', '_url' => 'url', '_flag' => 'toggle', '_number' => 'number', '_list' => 'list',
                            default => mb_strlen($default) > 90 || str_contains($default, "\n") ? 'textarea' : 'text',
                        },
                        'default' => $default,
                        'source' => str_ends_with($file, '.js') ? 'js' : 'php',
                        'file' => str_replace('\\', '/', substr($file, strlen(base_path()) + 1)),
                    ];
                }
            }

            $grouped = [];
            foreach ($fields as $key => $field) {
                [$page, $section] = array_pad(explode('.', $key), 3, 'general');
                $grouped[$page][$section][] = $field;
            }

            return $grouped;
        });
    }

    /**
     * يحفظ قيم صفحة. القيمة اللي زي الأصلي (أو فاضية) بتتمسح من الجدول فالحقل يرجع يتبع الصفحة.
     *
     * @param  array<string, ?string>  $values  key => value
     */
    public function save(array $values): int
    {
        $fields = collect($this->registry())->flatten(2)->keyBy('key');
        $defaults = $fields->pluck('default', 'key');
        $changed = 0;

        DB::transaction(function () use ($values, $fields, $defaults, &$changed) {
            foreach ($values as $key => $value) {
                if (! $defaults->has($key)) {
                    continue;
                }
                $value = is_string($value) ? str_replace("\r\n", "\n", trim($value)) : null;
                // الإعدادات: المفتاح '1'/'0' بس، والرقم أرقام بس (غير كده يرجع للأصل)
                $type = $fields[$key]['type'];
                if ($type === 'toggle' && $value !== null) {
                    $value = $value === '1' ? '1' : '0';
                } elseif ($type === 'number' && $value !== null && ! ctype_digit($value)) {
                    $value = null;
                } elseif ($type === 'list' && $value !== null) {
                    // نفس الخيارات بترتيبها = الأصل، حتى لو اتكتبت بسطور بدل الفواصل
                    $list = fn (string $v) => implode("\n", array_filter(array_map('trim', preg_split('/[\n,،]+/u', $v)), 'strlen'));
                    $value = $list($value) === $list($defaults[$key]) ? null : $list($value);
                }
                if ($value === null || $value === '' || $value === $defaults[$key]) {
                    $changed += SiteContent::where('key', $key)->delete();
                } else {
                    $row = SiteContent::updateOrCreate(['key' => $key], ['value' => $value]);
                    $changed += $row->wasRecentlyCreated || $row->wasChanged() ? 1 : 0;
                }
            }
        });

        $this->flush();

        return $changed;
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
        $this->overrides = null;
    }

    /** @return list<string> */
    private function sourceFiles(): array
    {
        $files = [];
        foreach (self::SOURCES as $dir => $extension) {
            foreach (File::allFiles(base_path($dir)) as $file) {
                if (str_ends_with($file->getFilename(), '.' . $extension)) {
                    $files[] = $file->getPathname();
                }
            }
        }
        sort($files);

        return $files;
    }
}
