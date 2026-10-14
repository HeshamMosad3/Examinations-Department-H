<?php

namespace Tests\Feature;

use Database\Seeders\WheelOfLifeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** صفحة نتيجة عجلة الحياة: نص «ماذا تعني هذه النتيجة؟» بيجي من مستويات المقياس المحفوظة */
class LifeWheelResultTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_overall_level_texts_come_from_the_saved_levels(): void
    {
        $this->seed(WheelOfLifeSeeder::class);

        $html = $this->get('/result.html')->assertOk()->getContent();
        preg_match('/id="analysis-text" data-levels="([^"]*)"/', $html, $m);
        $levels = json_decode(html_entity_decode($m[1], ENT_QUOTES), true);

        $this->assertSame([[0, 20], [21, 40], [41, 60], [61, 80], [81, 100]], array_map(fn ($l) => [$l['min'], $l['max']], $levels));
        $this->assertStringContainsString('اختلال حاد وشامل', $levels[0]['text']);
        $this->assertStringContainsString('مستوى متميزًا', $levels[4]['text']);
    }
}
