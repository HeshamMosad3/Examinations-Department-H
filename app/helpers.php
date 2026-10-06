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
