<?php

namespace App\Services\Assessments;

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

        return [
            'title' => $level->title_ar,
            'summary' => $level->description_ar,
            'icon' => $design['icon'] ?? null,
            'strengths_title' => $prefix . ' (' . count($strengths) . ' ' . cms('perceptual_result.sections.strengths_unit', 'نقاط') . ')',
            'strengths' => $strengths,
            'development' => array_values($level->development_areas ?? []),
            'how_to_learn' => $this->withIcons($level->how_to_learn ?? [], $design['how_to_learn'] ?? [], 'text'),
            'tips' => $this->withIcons($level->practical_tips ?? [], $design['tips'] ?? [], 'text'),
            'programs' => $this->programs($level->programs ?? [], $design['programs'] ?? []),
            'programs_outro' => $level->programs_outro_ar,
        ];
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
