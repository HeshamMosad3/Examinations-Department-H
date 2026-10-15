<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\User;
use App\Services\Assessments\AssessmentData;
use Database\Seeders\SevenPersonalityKeysSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Support\ProfileData;
use Tests\TestCase;

/** تقرير الـ PDF (A4 أفقي): الملخص السريع ثم التقرير الكامل، من غير هيدر ولا فوتر الموقع */
class PersonalityKeysReportTest extends TestCase
{
    use RefreshDatabase;

    private function user(array $override = []): User
    {
        return User::create(ProfileData::complete($override + ['name' => 'أحمد محمد علي الشامسي', 'email' => 'report@example.test', 'password' => bcrypt('password')]) + ['role' => 'user']);
    }

    private function finish(User $user): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);
        $data = AssessmentData::load(Assessment::byCode(Assessment::SEVEN_PERSONALITY_KEYS));
        $answers = $data->questions->mapWithKeys(fn ($q) => [$q->id => $q->options[0]->id])->all();

        $this->actingAs($user)->postJson(route('keys.results.store'), ['answers' => $answers])->assertOk();
    }

    public function test_guests_cannot_open_the_report(): void
    {
        $this->get(route('keys.report'))->assertUnauthorized();
    }

    public function test_the_report_needs_a_complete_profile(): void
    {
        $user = User::create(['name' => 'Quick', 'email' => 'quick@example.test', 'password' => bcrypt('password'), 'role' => 'user']);
        $this->finish($user);

        $this->actingAs($user)->get(route('keys.report'))->assertRedirect(route('profile.edit'));
    }

    public function test_without_an_attempt_the_user_is_sent_to_the_test(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);

        $this->actingAs($this->user())->get(route('keys.report'))->assertRedirect(route('keys.test'));
    }

    public function test_the_report_has_the_quick_pages_then_the_full_report_with_nothing_shortened(): void
    {
        $user = $this->user();
        $this->finish($user);

        $html = $this->actingAs($user)->get(route('keys.report'))
            ->assertOk()
            ->assertSee('size: A4 landscape', false)
            ->assertSee('الملخص السريع')
            ->assertSee('التقرير الكامل')
            ->assertSee('ماذا تعني هذه النتيجة؟')
            ->assertSee('مخطط مفاتيح شخصيتك السبعة')
            ->getContent();

        // الملخص السريع الأول ثم التقرير الكامل
        $this->assertLessThan(strpos($html, 'aria-label="التقرير الكامل"'), strpos($html, 'aria-label="الملخص السريع"'));

        // 7 مفاتيح و21 محور فرعي، وكل واحد بوصفه كامل
        foreach (range(1, 7) as $n) {
            $this->assertStringContainsString("(K{$n})", $html);
        }
        $this->assertSame(7, substr_count($html, 'class="rp-wk"'));
        $this->assertSame(21, substr_count($html, 'class="rp-sub-row"'));
        $this->assertSame(21, substr_count($html, 'class="rp-sub-sum"'));
        $this->assertSame(7, substr_count($html, 'class="rp-wk-sum"'));

        // صفحتا الملخص + صفحتان للتقرير الكامل (4 مفاتيح ثم 3)
        $this->assertSame(4, substr_count($html, 'class="rp-page"'));
        $this->assertStringContainsString('4 / 4', $html);
    }

    public function test_the_overall_explanation_is_printed_in_full(): void
    {
        $user = $this->user();
        $this->finish($user);

        $html = $this->actingAs($user)->get(route('keys.report'))->assertOk()->getContent();
        preg_match_all('/<div class="rp-text">(.*?)<\/div>/su', $html, $m);
        $printed = html_entity_decode(strip_tags($m[1][0]));

        $level = \App\Models\ResultLevel::whereNull('dimension_id')
            ->where('assessment_id', Assessment::byCode(Assessment::SEVEN_PERSONALITY_KEYS)->id)
            ->get()
            ->first(fn ($l) => str_contains($printed, mb_substr(trim($l->description_ar), 0, 60)));

        $this->assertNotNull($level);
        foreach (preg_split('/\R+/u', trim($level->description_ar)) as $paragraph) {
            $this->assertStringContainsString(trim($paragraph), $printed);
        }
    }

    public function test_only_the_name_test_time_and_age_are_shown_as_personal_data(): void
    {
        $user = $this->user(['birth_date' => now()->subYears(30)->subDay()->toDateString()]);
        $this->finish($user);

        $this->actingAs($user)->get(route('keys.report'))
            ->assertOk()
            ->assertSee('أحمد محمد علي الشامسي')
            ->assertSee('وقت إجراء الاختبار')
            ->assertSee('30 سنة')
            ->assertDontSee('report@example.test')
            ->assertDontSee('0501234567')
            ->assertDontSee('البريد الإلكتروني')
            ->assertDontSee('رقم الجوال')
            ->assertDontSee('الجنسية');
    }

    public function test_the_report_carries_no_website_header_or_footer(): void
    {
        $user = $this->user();
        $this->finish($user);

        $this->actingAs($user)->get(route('keys.report'))
            ->assertOk()
            ->assertDontSee('id="main-header"', false)
            ->assertDontSee('id="mobile-menu-btn"', false)
            ->assertDontSee('<footer id=', false)
            ->assertSee('/landing/images/logo.png', false);
    }

    public function test_the_details_page_download_button_opens_the_report_and_prints_it(): void
    {
        $user = $this->user();
        $this->finish($user);

        $this->actingAs($user)->get(route('keys.details'))
            ->assertOk()
            ->assertSee('href="' . route('keys.report', ['print' => 1]) . '"', false)
            ->assertDontSee('onclick="window.print()"', false);
    }
}
