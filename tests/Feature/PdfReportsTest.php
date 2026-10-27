<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\User;
use App\Services\Website\Assessments\AssessmentData;
use Database\Seeders\PerceptualStylesSeeder;
use Database\Seeders\WheelOfLifeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Support\ProfileData;
use Tests\TestCase;

/** تقارير الـPDF لعجلة الحياة والأنماط الإدراكية: صفحة واحدة طويلة (عرض 1440px) بستايل صفحة الأنماط */
class PdfReportsTest extends TestCase
{
    use RefreshDatabase;

    private function user(): User
    {
        return User::create(ProfileData::complete(['name' => 'أحمد محمد علي الشامسي', 'email' => 'pdf@example.test', 'password' => bcrypt('password')]) + ['role' => 'user']);
    }

    private function finishWheel(User $user): void
    {
        $this->seed(WheelOfLifeSeeder::class);
        $answers = array_fill(0, 8, array_fill(0, 10, 3));
        $this->actingAs($user)->postJson(route('life-wheel.results.store'), ['answers' => $answers])->assertOk();
    }

    private function perceptualAnswers(): string
    {
        $data = AssessmentData::load(Assessment::byCode(Assessment::PERCEPTUAL_STYLES));

        return implode(',', array_fill(0, $data->questions->count(), 0));
    }

    public function test_the_life_wheel_report_needs_a_signed_in_user_with_a_complete_profile_and_a_result(): void
    {
        $this->seed(WheelOfLifeSeeder::class);

        $this->get(route('life-wheel.report'))->assertUnauthorized();

        $quick = User::create(['name' => 'Quick', 'email' => 'quick@example.test', 'password' => bcrypt('password'), 'role' => 'user']);
        $this->actingAs($quick)->get(route('life-wheel.report'))->assertRedirect(route('profile.edit'));

        $this->actingAs($this->user())->get(route('life-wheel.report'))->assertRedirect(route('life-wheel.assessment'));
    }

    public function test_the_life_wheel_report_is_one_long_page_with_the_wheel_and_every_aspect_in_full(): void
    {
        $user = $this->user();
        $this->finishWheel($user);

        $html = $this->actingAs($user)->get(route('life-wheel.report'))
            ->assertOk()
            ->assertSee('pdf-mode', false)
            ->assertSee('id="pdf-root"', false)
            ->assertSee('width=1440', false)
            ->assertSee('تقرير نتائج مقياس عجلة الحياة')
            ->assertSee('أحمد محمد علي الشامسي')
            ->assertSee('رقم التقرير المعتمد')
            ->assertSee('أعلى جانب')
            ->assertSee('أقل جانب')
            ->assertSee('ماذا تعني هذه النتيجة؟')
            ->assertSee('حفظ التقرير كملف PDF')
            ->getContent();

        // العجلة: 8 خلفيات + 8 أجزاء ملوّنة، والجوانب الثمانية بأجزائها الفرعية (4 لكل جانب) من غير اختصار
        $this->assertSame(16, substr_count($html, 'stroke-width="0.6"'));
        $this->assertSame(8, substr_count($html, 'aria-label="تفاصيل '));
        $this->assertSame(32, substr_count($html, 'role="progressbar"') - 8);
        // 8 جوانب × (نسبة + 4 أجزاء) = 40 نسبة 75% (كل الإجابات 3 من 4)
        $this->assertGreaterThanOrEqual(40, substr_count($html, '75%'));
    }

    public function test_the_life_wheel_details_page_download_button_opens_the_report(): void
    {
        $user = $this->user();
        $this->finishWheel($user);

        $this->actingAs($user)->get(route('life-wheel.details'))
            ->assertOk()
            ->assertSee('href="' . route('life-wheel.report', ['print' => 1]) . '"', false);
    }

    public function test_the_perceptual_result_has_a_pdf_mode_and_the_download_button_opens_it(): void
    {
        $this->seed(PerceptualStylesSeeder::class);
        $user = $this->user();
        $answers = $this->perceptualAnswers();

        // الوضع العادي: من غير شريط الـPDF، والزرار بيفتح وضع الـPDF
        $this->actingAs($user)->get(route('perceptual.result', ['answers' => $answers]))
            ->assertOk()
            ->assertDontSee('pdf-mode', false)
            ->assertDontSee('حفظ التقرير كملف PDF')
            ->assertSee('pdf=1', false)
            ->assertSee('print=1', false);

        // وضع الـPDF: صفحة واحدة طويلة بعرض 1440px
        $this->actingAs($user)->get(route('perceptual.result', ['answers' => $answers, 'pdf' => 1]))
            ->assertOk()
            ->assertSee('pdf-mode', false)
            ->assertSee('id="pdf-root"', false)
            ->assertSee('حفظ التقرير كملف PDF')
            ->assertSee('أحمد محمد علي الشامسي');
    }
}
