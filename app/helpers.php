<?php

use App\Services\SiteContentService;

if (! function_exists('cms')) {
    /** نص من محتوى الموقع: تعديل الأدمن لو موجود، وإلا النص الأصلي */
    function cms(string $key, string $default = ''): string
    {
        return app(SiteContentService::class)->get($key, $default);
    }
}

if (! function_exists('cms_image')) {
    /** مسار صورة من محتوى الموقع */
    function cms_image(string $key, string $default = ''): string
    {
        return app(SiteContentService::class)->get($key, $default);
    }
}

if (! function_exists('cms_url')) {
    /** رابط من محتوى الموقع */
    function cms_url(string $key, string $default = ''): string
    {
        return app(SiteContentService::class)->get($key, $default);
    }
}

if (! function_exists('cms_flag')) {
    /** إعداد تشغيل/إيقاف من محتوى الموقع (القيمة الأصلية '1' أو '0') — بيظهر للأدمن كمفتاح */
    function cms_flag(string $key, string $default = '0'): bool
    {
        return app(SiteContentService::class)->get($key, $default) === '1';
    }
}

if (! function_exists('cms_number')) {
    /** رقم صحيح من محتوى الموقع (مثلاً أقل طول لحقل) */
    function cms_number(string $key, string $default = '0'): int
    {
        $value = app(SiteContentService::class)->get($key, $default);

        return ctype_digit($value) ? (int) $value : (int) $default;
    }
}

if (! function_exists('cms_list')) {
    /** قايمة من محتوى الموقع: عنصر في كل سطر أو مفصولة بفاصلة (، أو ,) */
    function cms_list(string $key, string $default = ''): array
    {
        $value = app(SiteContentService::class)->get($key, $default);

        return array_values(array_unique(array_filter(array_map('trim', preg_split('/[\n,،]+/u', $value)), 'strlen')));
    }
}
