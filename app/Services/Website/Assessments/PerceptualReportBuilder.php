<?php

namespace App\Services\Website\Assessments;

use App\Models\ResultLevel;

/**
 * Builds the perceptual-styles report view data.
 * All text comes from the result level row in the database; resources/data/perceptual-report.php
 * only supplies the Figma visuals (icons, colors), matched to the database text.
 */
class PerceptualReportBuilder
{

    public function build(ResultLevel $level): array
    {
        $design = (require resource_path('data/perceptual-report.php'))[$level->code] ?? [];

        $strengths = array_values($level->strengths ?? []);
        $prefix = match ($level->code) {
            'visual' => cms('perceptual_result.sections.strengths_visual', 'نقاط القوة البصرية'),
            'auditory' => cms('perceptual_result.sections.strengths_auditory', 'نقاط القوة السمعية'),
            'kinesthetic' => cms('perceptual_result.sections.strengths_kinesthetic', 'نقاط القوة الحسية'),
            default => cms('perceptual_result.sections.strengths_other', 'نقاط القوة لديك'),
        };

        $howToLearn = array_values($level->how_to_learn ?? []);
        $development = array_values($level->development_areas ?? []);
        $paragraph = fn (array $items) => trim(implode(' ', array_map('trim', $items)));
        $summary = $this->summaryParts((string) $level->summary_ar);

        return [
            'title' => $level->title_ar,
            'summary' => $level->description_ar,
            'summary_text' => trim((string) $level->summary_ar),
            'icon' => $design['icon'] ?? null,
            // التصميم الجديد (Figma #3509:8526): ملخص نتيجتك + أربع كروت قابلة للتوسيع، كلها من نفس بيانات المستوى
            // ملخص نتيجتك: أول جملة هي العنوان الكبير وباقي الجمل نقاط (لو الملخص فاضي بنكوّنه من نقاط القوة والتوصيات)
            'summary_headline' => $summary['headline'] ?? str_replace(':title', $level->title_ar, cms('perceptual_result.sections.summary_headline', 'تشير إجاباتك إلى أن :title هو الأبرز لديك.')),
            'summary_points' => $summary ? $summary['points'] : array_values(array_filter([$strengths[0] ?? null, $howToLearn[0] ?? null])),
            'strategies_title' => $level->strategies_title_ar ?: cms('perceptual_result.sections.strategies_title', 'كيف تستفيد من نمطك'),
            'strengths_text' => $paragraph($strengths),
            'development_text' => $paragraph($development),
            'strategies_text' => $paragraph($howToLearn),
            'remember_text' => $level->remember_ar ?: cms('perceptual_result.sections.remember_text', 'هذه النتيجة تعكس تفضيلك الحالي ولا تعني أنها الطريقة الوحيدة المناسبة لك؛ استفد أيضًا من الاستماع والتجربة والرؤية، واختر ما يساعدك على الفهم والتطبيق.'),
            'active_styles' => $this->activeStyles($level->code),
            'theme' => $this->theme($level->code),
            'strengths_title' => $prefix . ' (' . count($strengths) . ' ' . cms('perceptual_result.sections.strengths_unit', 'نقاط') . ')',
            'strengths' => $strengths,
            'development' => array_values($level->development_areas ?? []),
            'how_to_learn' => $this->withIcons($level->how_to_learn ?? [], $design['how_to_learn'] ?? [], 'text'),
            'tips' => $this->withIcons($level->practical_tips ?? [], $design['tips'] ?? [], 'text'),
            'programs' => $this->programs($level->programs ?? [], $design['programs'] ?? []),
            'programs_outro' => $level->programs_outro_ar,
        ];
    }

    /**
     * ثيم صفحة التقرير (ألوان الكروت وصورة المخ وهندسة الرسمة) من resources/data/perceptual-report-theme.php.
     * أي كود مالوش تصميم بيتاخد ثيم البصري، والنمط المتميز فيه بيتميز بحد أسمك في الشارة.
     */
    private function theme(string $code): array
    {
        $themes = require resource_path('data/perceptual-report-theme.php');
        $designed = ['visual', 'auditory', 'kinesthetic', 'dual_visual_auditory', 'dual_visual_kinesthetic', 'dual_auditory_kinesthetic', 'balanced'];
        $theme = $themes[$code] ?? $themes['visual'];
        if (in_array($code, $designed, true)) {
            return $theme;
        }

        $active = $this->activeStyles($code);
        $keys = ['visual' => 'vis', 'auditory' => 'aud', 'kinesthetic' => 'kin'];
        foreach (['d' => [2.911, 1.455], 'm' => [2, 1]] as $device => [$thick, $thin]) {
            foreach ($keys as $style => $key) {
                $on = in_array($style, $active, true);
                $theme['orbit'][$device][$key]['bw'] = $on ? $thick : $thin;
                $theme['orbit'][$device][$key]['ba'] = $on ? 0.5 : 0.3;
            }
        }

        return $theme;
    }

    /**
     * ملخص نتيجتك: أول جملة هي العنوان الكبير وكل جملة بعدها نقطة. لو فيه جملة واحدة بعد العنوان بتتقسم عند «، كما» أو «، و…»
     * (زي تصميم فيجما)، وحرف العطف في أول النقطة (ف/و) بيتشال.
     *
     * @return array{headline: string, points: list<string>}|null
     */
    private function summaryParts(string $summary): ?array
    {
        $sentences = PerceptualReportCopy::sentences($summary);
        if (! $sentences) {
            return null;
        }

        $headline = array_shift($sentences);
        if (count($sentences) === 1 && preg_match('/^(.+?)،\s+(?:كما\s+|و)(.+)$/u', $sentences[0], $m)) {
            $sentences = [rtrim($m[1], '.،') . '.', $m[2]];
        }
        $points = array_map(fn (string $point) => preg_replace(['/^ف(?=ال|لا)/u', '/^و(?=[يتنأ])/u'], '', $point), $sentences);

        return ['headline' => $headline, 'points' => array_values($points)];
    }

    /** الأنماط اللي بتتميز في رسمة الأنماط (بصري/سمعي/حسي) حسب كود المستوى. */
    private function activeStyles(string $code): array
    {
        $all = ['visual', 'auditory', 'kinesthetic'];
        $found = array_values(array_filter($all, fn ($style) => str_contains($code, $style)));

        return $found ?: $all;
    }

    /** Pair each database text with the icon of the closest Figma item (falls back to the same position). */
    private function withIcons(array $texts, array $designItems, string $key): array
    {
        return array_map(function ($text, $i) use ($designItems, $key) {
            $match = $this->closest($text, $designItems, $key) ?? ($designItems[$i] ?? null);
            return ['text' => $text, 'icon' => $match['icon'] ?? null];
        }, array_values($texts), array_keys(array_values($texts)));
    }

    private function programs(array $programs, array $designItems): array
    {
        return array_map(function ($program, $i) use ($designItems) {
            $title = is_array($program) ? ($program['title'] ?? '') : (string) $program;
            $match = $this->closest($title, $designItems, 'title');
            $style = $designItems[$i] ?? $designItems[0] ?? [];

            return [
                'title' => $title,
                'subtitle' => is_array($program) ? ($program['subtitle'] ?? $program['description'] ?? null) : null,
                'icon' => ($match ?? $style)['icon'] ?? null,
                // Card colors follow the card position in the Figma layout
                'border' => $style['border'] ?? '#1657c2',
                'bg' => $style['bg'] ?? '#f6faff',
                'icon_bg' => $style['icon_bg'] ?? '#e6f1ff',
            ];
        }, array_values($programs), array_keys(array_values($programs)));
    }

    private function closest(string $text, array $items, string $key): ?array
    {
        $needle = $this->normalize($text);
        $best = null;
        $bestScore = 0;
        foreach ($items as $item) {
            similar_text($needle, $this->normalize($item[$key] ?? ''), $percent);
            if ($percent > $bestScore) {
                $best = $item;
                $bestScore = $percent;
            }
        }

        return $bestScore >= 70 ? $best : null;
    }

    private function normalize(string $text): string
    {
        $text = preg_replace('/[\x{064B}-\x{065F}\x{0670}\x{0640}]/u', '', $text);
        $text = strtr($text, ['أ' => 'ا', 'إ' => 'ا', 'آ' => 'ا', 'ة' => 'ه', 'ى' => 'ي']);
        $text = preg_replace('/[^\p{L}\p{N} ]+/u', '', $text);

        return trim(preg_replace('/\s+/u', ' ', $text));
    }
}
