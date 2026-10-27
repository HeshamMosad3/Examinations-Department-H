<?php

namespace App\Support;

/**
 * ستايل صفحات الـPDF الطويلة (عرض 1440px).
 *
 * كلاسات الديسكتوب في Tailwind (lg: / xl: / min-[1280px]:...) شغالة بـ @media (min-width) على عرض نافذة المتصفح،
 * وعرض النافذة وقت الطباعة بيختلف من متصفح لمتصفح (ومن "حفظ كـ PDF" لـ "طباعة")، فكان الـPDF ساعات يطلع بتصميم الموبايل.
 * هنا بناخد CSS الموقع الجاهز (الـbuild أو سيرفر Vite وقت التطوير) ونفك الـ@media بتاعة min-width اللي عرضها <= 1440px
 * فتتطبق دايماً (وبنشيل اللي بتتطبق على الشاشات الأصغر)، فالـPDF يطلع بتصميم الديسكتوب ثابت مهما كان عرض النافذة.
 */
final class PdfStyles
{
    /** عرض صفحة الـPDF بالبكسل */
    public const WIDTH = 1440;

    public static function css(): string
    {
        $source = self::source();

        return $source === null ? '' : self::flatten($source);
    }

    /** CSS الموقع الخام: من سيرفر Vite لو شغال (npm run dev)، وإلا من آخر build */
    private static function source(): ?string
    {
        $hot = public_path('landing.hot');
        if (is_file($hot)) {
            $url = rtrim(trim((string) file_get_contents($hot)), '/') . '/resources/landing/style.css?direct';
            $css = @file_get_contents($url, false, stream_context_create(['http' => ['timeout' => 2]]));
            if (is_string($css) && $css !== '') {
                return $css;
            }
        }

        $manifest = public_path('assets/website/build/manifest.json');
        if (! is_file($manifest)) {
            return null;
        }
        $entry = json_decode((string) file_get_contents($manifest), true)['resources/landing/style.css']['file'] ?? null;
        $file = $entry ? public_path('assets/website/build/' . $entry) : null;

        return $file && is_file($file) ? (string) file_get_contents($file) : null;
    }

    /** يفك @media (min-width: N) لو N <= عرض الصفحة، ويشيل اللي بتشترط max-width أو عرض أكبر، ويسيب الباقي (print, prefers-*) زي ما هو */
    public static function flatten(string $css): string
    {
        $out = '';
        $length = strlen($css);
        $i = 0;

        while ($i < $length) {
            $at = strpos($css, '@media', $i);
            if ($at === false) {
                $out .= substr($css, $i);
                break;
            }

            $out .= substr($css, $i, $at - $i);
            $open = strpos($css, '{', $at);
            if ($open === false) {
                $out .= substr($css, $at);
                break;
            }

            // نهاية البلوك المطابقة للقوس
            $depth = 1;
            $j = $open + 1;
            while ($j < $length && $depth > 0) {
                $depth += match ($css[$j]) { '{' => 1, '}' => -1, default => 0 };
                $j++;
            }

            $condition = trim(substr($css, $at + 6, $open - $at - 6));
            $body = substr($css, $open + 1, $j - $open - 2);

            $out .= match (self::decide($condition)) {
                'unwrap' => self::flatten($body),
                'drop' => '',
                default => substr($css, $at, $j - $at),
            };
            $i = $j;
        }

        return $out;
    }

    private static function decide(string $condition): string
    {
        if (preg_match_all('/\((min|max)-width:\s*([\d.]+)px\)/', $condition, $m, PREG_SET_ORDER) === 0) {
            return 'keep';
        }

        // max-sm: وأخواتها بتطلع "not all and (min-width: N)" (عكس الشرط): على 1440px هي دايماً false
        if (preg_match('/^not all and \(min-width:\s*([\d.]+)px\)$/', $condition, $neg)) {
            return (float) $neg[1] <= self::WIDTH ? 'drop' : 'unwrap';
        }

        // أي شرط على عرض النافذة هو الشرط الوحيد في الاستعلام (Tailwind بيطلع كده)؛ لو فيه شروط تانية نسيبه زي ما هو
        $rest = preg_replace('/\((min|max)-width:\s*[\d.]+px\)|\band\b|\bscreen\b/', '', $condition);
        if (trim((string) $rest) !== '') {
            return 'keep';
        }

        foreach ($m as [, $kind, $px]) {
            if (($kind === 'max' && (float) $px < self::WIDTH) || ($kind === 'min' && (float) $px > self::WIDTH)) {
                return 'drop';
            }
        }

        return 'unwrap';
    }
}
