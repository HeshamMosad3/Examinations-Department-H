<?php

namespace Tests\Feature;

use App\Models\ExamSession;
use App\Models\User;
use App\Models\UserAnswer;
use App\Services\LifeWheelService;
use Database\Seeders\WheelOfLifeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LifeWheelDetailsTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->makeUser('user@example.test');
        $this->seed(WheelOfLifeSeeder::class);
    }

    private function makeUser(string $email): User
    {
        return User::create(['name' => 'Test user', 'email' => $email, 'password' => bcrypt('password'), 'role' => 'user']);
    }

    /** 8 aspects x 10 answers, every answer = $value. */
    private function uniformAnswers(int $value): array
    {
        return array_fill(0, 8, array_fill(0, 10, $value));
    }

    public function test_guests_cannot_open_the_details_page_or_save_results(): void
    {
        $this->get(route('life-wheel.details'))->assertRedirect(route('login'));
        $this->postJson(route('life-wheel.results.store'), ['answers' => $this->uniformAnswers(2)])->assertUnauthorized();
    }

    public function test_details_page_without_a_saved_result_shows_the_empty_state(): void
    {
        $this->actingAs($this->user)
            ->get(route('life-wheel.details'))
            ->assertOk()
            ->assertSee('لا توجد نتيجة محفوظة بعد')
            ->assertDontSee('عرض التفاصيل');
    }

    public function test_store_rejects_malformed_answers(): void
    {
        $this->actingAs($this->user);

        $this->postJson(route('life-wheel.results.store'), ['answers' => array_slice($this->uniformAnswers(2), 0, 7)])->assertUnprocessable();
        $this->postJson(route('life-wheel.results.store'), ['answers' => array_map(fn () => array_fill(0, 9, 2), range(0, 7))])->assertUnprocessable();

        $answers = $this->uniformAnswers(2);
        $answers[3][4] = 5; // out of the 0..4 scale
        $this->postJson(route('life-wheel.results.store'), ['answers' => $answers])->assertUnprocessable();

        $this->assertSame(0, ExamSession::count());
    }

    public function test_store_saves_a_completed_result_and_the_details_page_shows_its_percentages(): void
    {
        $answers = $this->uniformAnswers(2);                       // 50% everywhere ...
        $answers[0] = [4, 4, 4, 2, 2, 2, 0, 0, 1, 3];              // ... except the first aspect: subs 100 / 50 / 0 / 50, total 55%

        $response = $this->actingAs($this->user)->postJson(route('life-wheel.results.store'), ['answers' => $answers]);

        $response->assertOk()->assertJson(['ok' => true, 'redirect' => route('life-wheel.details')]);
        $this->assertSame(1, ExamSession::where('user_id', $this->user->id)->where('status', 'completed')->count());
        $this->assertSame(80, UserAnswer::count());

        $result = app(LifeWheelService::class)->resultFor($this->user);
        $this->assertSame(55, $result['aspects']['spiritual']['percent']);
        $this->assertSame([100, 50, 0, 50], $result['aspects']['spiritual']['subs']);
        $this->assertSame(50, $result['aspects']['health']['percent']);
        $this->assertSame([50, 50, 50, 50], $result['aspects']['leisure']['subs']);
        $this->assertSame(51, $result['overall']);                 // (22 + 7 * 20) / 320

        $page = $this->get(route('life-wheel.details'))->assertOk();
        $page->assertSee('الجانب الروحاني')->assertSee('الالتزام بالعبادات')->assertSee('55%', false);
        $page->assertSee('width: 100%', false)->assertSee('width: 0%', false);
    }

    public function test_exact_half_percentages_round_up(): void
    {
        $answers = $this->uniformAnswers(0);
        $answers[0] = [4, 4, 4, 2, 1, 0, 3, 0, 3, 2];   // 23 / 40 = exactly 57.5%; subs 12/12, 3/12, 3/8 = 37.5%, 5/8 = 62.5%

        $this->actingAs($this->user)->postJson(route('life-wheel.results.store'), ['answers' => $answers])->assertOk();

        $result = app(LifeWheelService::class)->resultFor($this->user);
        $this->assertSame(58, $result['aspects']['spiritual']['percent']);          // float math gave 57
        $this->assertSame([100, 25, 38, 63], $result['aspects']['spiritual']['subs']);
        $this->assertSame(7, $result['overall']);                                    // 23 / 320 = 7.1875%
    }

    public function test_saving_the_same_answers_twice_does_not_create_a_second_result(): void
    {
        $this->actingAs($this->user);

        $this->postJson(route('life-wheel.results.store'), ['answers' => $this->uniformAnswers(3)])->assertOk();
        $this->postJson(route('life-wheel.results.store'), ['answers' => $this->uniformAnswers(3)])->assertOk();

        $this->assertSame(1, ExamSession::count());
        $this->assertSame(80, UserAnswer::count());
    }

    public function test_the_details_page_uses_the_latest_result_of_the_signed_in_user_only(): void
    {
        $other = $this->makeUser('other@example.test');

        $this->actingAs($other)->postJson(route('life-wheel.results.store'), ['answers' => $this->uniformAnswers(4)])->assertOk();
        $this->actingAs($this->user)->postJson(route('life-wheel.results.store'), ['answers' => $this->uniformAnswers(1)])->assertOk();

        $this->travel(5)->minutes();
        $this->postJson(route('life-wheel.results.store'), ['answers' => $this->uniformAnswers(3)])->assertOk();

        $result = app(LifeWheelService::class)->resultFor($this->user);
        $this->assertSame(75, $result['aspects']['career']['percent']);   // latest = all 3s, not the 1s and not the other user's 4s
        $this->assertSame(2, ExamSession::where('user_id', $this->user->id)->count());
    }
}
