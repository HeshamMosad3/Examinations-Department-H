<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Attempt;
use App\Models\User;
use App\Services\Website\Assessments\AssessmentData;
use Database\Seeders\SevenPersonalityKeysSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Support\ProfileData;
use Tests\TestCase;

/** اختبار مفاتيح الشخصية السبعة: الصفحة، الحفظ، والنتيجة (المحتوى كله من المقياس المحفوظ) */
class PersonalityKeysTestPageTest extends TestCase
{
    use RefreshDatabase;

    private function user(): User
    {
        return User::create(ProfileData::complete(['name' => 'Test user', 'email' => 'keys@example.test', 'password' => bcrypt('password')]) + ['role' => 'user']);
    }

    /** question_id => option_id (أول اختيار لكل عبارة) */
    private function allAnswers(): array
    {
        $data = AssessmentData::load(Assessment::byCode(Assessment::SEVEN_PERSONALITY_KEYS));

        return $data->questions->mapWithKeys(fn ($q) => [$q->id => $q->options[0]->id])->all();
    }

    public function test_guests_are_sent_to_sign_in_and_come_back_to_the_test(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);

        $this->get(route('keys.test'))
            ->assertRedirect(route('login', ['next' => 'personality-keys-test']))
            ->assertSessionHas('info');

        $this->get(route('login', ['next' => 'personality-keys-test']))->assertOk();
        $this->post(route('login.post'), ['email' => $this->user()->email, 'password' => 'password'])
            ->assertRedirect(route('keys.test'));
    }

    public function test_the_page_shows_all_seven_keys_with_twelve_statements_each_from_the_saved_exam(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);
        $data = AssessmentData::load(Assessment::byCode(Assessment::SEVEN_PERSONALITY_KEYS));

        $html = $this->actingAs($this->user())->get(route('keys.test'))->assertOk()->getContent();

        $this->assertSame(7, substr_count($html, 'data-pk-key="'));
        $this->assertSame(84, substr_count($html, 'data-pk-question'));
        $this->assertSame(84 * 5, substr_count($html, 'data-pk-choice'));
        foreach (['K1', 'K7'] as $code) {
            $this->assertStringContainsString($code, $html);
        }

        // Titles, descriptions and statements come from the database
        $first = $data->roots()->first();
        $this->assertStringContainsString('مفتاح البصيرة (كيف ترى وتفهم؟)', $html);
        $this->assertStringContainsString('قدرة الشخص على فهم نفسه وما يحدث حوله', $html);
        $this->assertStringNotContainsString('البصيرة هي قدرة الشخص', $html);
        $this->assertStringContainsString(e($data->questionsUnder($first->id)->first()->text_ar), $html);
        $this->assertStringContainsString('المفتاح K1 من K7', $html);
        $this->assertStringContainsString('اختر الإجابة الأقرب إليك', $html);
    }

    public function test_the_highest_scoring_option_is_the_first_value_four_button(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);
        $data = AssessmentData::load(Assessment::byCode(Assessment::SEVEN_PERSONALITY_KEYS));
        $question = $data->questions->first();
        $best = collect($question->options)->sortByDesc('score_value')->first();

        $this->actingAs($this->user())->get(route('keys.test'))
            ->assertSee('name="q' . $question->id . '" value="' . $best->id . '"', false);
    }

    public function test_finishing_saves_the_attempt_and_redirects_to_the_result(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);
        $user = $this->user();

        $this->actingAs($user)->postJson(route('keys.results.store'), ['answers' => $this->allAnswers()])
            ->assertOk()->assertJson(['ok' => true, 'redirect' => route('keys.result')]);

        $this->assertSame(1, Attempt::where('user_id', $user->id)->count());

        $this->actingAs($user)->get(route('keys.result'))
            ->assertOk()
            ->assertSee('نتيجة التقييم')
            ->assertSee('أبرز مفاتيح شخصيتك')
            ->assertSee('المفتاح الأقل حضوراً')
            ->assertSee('ماذا تعني هذه النتيجة؟')
            ->assertSee(route('keys.details'), false);

        $this->actingAs($user)->get(route('keys.details'))
            ->assertOk()
            ->assertSee('تفاصيل المفاتيح')
            ->assertSee('(K1)', false)
            ->assertSee('data-key-card', false);
    }

    public function test_incomplete_or_invalid_answers_are_rejected(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);
        $user = $this->user();
        $answers = $this->allAnswers();

        $this->actingAs($user)->postJson(route('keys.results.store'), ['answers' => array_slice($answers, 0, 10, true)])->assertStatus(422);

        $answers[array_key_first($answers)] = 999999;
        $this->actingAs($user)->postJson(route('keys.results.store'), ['answers' => $answers])->assertStatus(422);

        $this->assertSame(0, Attempt::count());
    }

    public function test_saving_and_the_result_need_a_signed_in_user_and_an_attempt(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);

        $this->postJson(route('keys.results.store'), ['answers' => []])->assertUnauthorized();
        $this->get(route('keys.result'))->assertUnauthorized();
        $this->actingAs($this->user())->get(route('keys.result'))->assertRedirect(route('keys.test'));
    }

    public function test_the_page_is_a_404_when_the_assessment_is_missing(): void
    {
        $this->actingAs($this->user())->get(route('keys.test'))->assertNotFound();
    }

    public function test_the_home_start_button_goes_to_the_new_test(): void
    {
        $html = $this->get(route('home'))->getContent();

        $this->assertStringContainsString('data-auth-gate="/personality-keys-test.html"', $html);
        $this->assertStringContainsString('personality-keys-test.html', $html);
    }

    public function test_the_result_explanation_follows_the_total_score_band_and_is_editable_data(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);
        $data = AssessmentData::load(Assessment::byCode(Assessment::SEVEN_PERSONALITY_KEYS));
        $user = $this->user();

        // أعلى اختيار في كل العبارات (336 درجة): المستوى المرتفع جدًا
        $this->actingAs($user)->postJson(route('keys.results.store'), ['answers' => $this->allAnswers()])->assertOk();
        $this->actingAs($user)->get(route('keys.result'))->assertOk()->assertSee('حضورًا مرتفعًا جدًا')->assertSee('data-more-toggle', false)
            ->assertDontSee('ما الذي ننصحك بالتركيز عليه؟')->assertDontSee('القيادة التحويلية المتقدمة')->assertDontSee('رسالتنا لك');

        // أقل اختيار في كل العبارات (0 درجة): المستوى المنخفض جدًا
        $lowest = $data->questions->mapWithKeys(fn ($q) => [$q->id => collect($q->options)->sortBy('score_value')->first()->id])->all();
        $this->actingAs($user)->postJson(route('keys.results.store'), ['answers' => $lowest])->assertOk();
        $this->actingAs($user)->get(route('keys.result'))->assertOk()->assertSee('منخفض جدًا وفق معايير التصنيف')->assertDontSee('حضورًا مرتفعًا جدًا');

        // النص محفوظ في قاعدة البيانات: تعديله بيظهر فوراً
        \App\Models\ResultLevel::where('assessment_id', $data->assessment->id)->whereNull('dimension_id')->where('code', 'level_1')
            ->update(['description_ar' => "نص معدّل من الأدمن
فقرة تانية"]);
        $this->actingAs($user)->get(route('keys.result'))->assertSee('نص معدّل من الأدمن')->assertSee('فقرة تانية');
    }
}
