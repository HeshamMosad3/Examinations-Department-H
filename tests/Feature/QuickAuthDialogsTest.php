<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** نوافذ التسجيل/الدخول السريع (pop-up) اللي بتتفتح من أزرار "ابدأ التقييم" و"عرض التقرير" للزوار */
class QuickAuthDialogsTest extends TestCase
{
    use RefreshDatabase;

    private function signup(array $override = []): array
    {
        return $override + [
            'name' => 'محمد عبدالله العتيبي',
            'email' => 'quick@example.test',
            'phone' => '0555123456',
            'national_id' => '1098765432', 'national_id_confirmation' => '1098765432',
            'password' => 'secret1234', 'password_confirmation' => 'secret1234',
        ];
    }

    private function makeUser(string $role = 'user'): User
    {
        return User::create(['name' => 'Test user', 'email' => $role . '@example.test', 'password' => bcrypt('password'), 'role' => $role]);
    }

    public function test_guests_get_the_dialogs_and_gate_buttons_on_every_page_with_a_start_button(): void
    {
        $this->seed(\Database\Seeders\WheelOfLifeSeeder::class);

        foreach ([route('home'), route('life-wheel.explore'), route('perceptual.explore'), route('life-wheel.result')] as $url) {
            $this->get($url)->assertOk()
                ->assertSee('id="authDialog"', false)
                ->assertSee('action="' . route('quick-signup.post') . '"', false)
                ->assertSee('action="' . route('quick-login.post') . '"', false)
                ->assertSee('data-auth-gate=', false);
        }
    }

    public function test_each_start_button_asks_for_the_right_destination(): void
    {
        $home = $this->get(route('home'))->getContent();
        $this->assertStringContainsString('data-auth-gate="life-wheel-assessment"', $home);
        $this->assertStringContainsString('data-auth-gate="perceptual-test"', $home);
        $this->assertStringContainsString('data-auth-gate="/personality-keys-test.html"', $home);

        // The plain link is still there as a fallback (no JS / middle-click): the existing sign-in gate
        $this->assertStringContainsString('href="' . route('life-wheel.assessment') . '"', $home);

        $this->seed(\Database\Seeders\WheelOfLifeSeeder::class);
        $this->assertStringContainsString('data-auth-gate="life-wheel"', $this->get(route('life-wheel.result'))->getContent());
    }

    public function test_signed_in_users_do_not_get_the_dialogs(): void
    {
        $this->actingAs($this->makeUser())->get(route('home'))
            ->assertOk()
            ->assertDontSee('id="authDialog"', false)
            ->assertDontSee('data-auth-gate', false);
    }

    public function test_direct_visits_to_assessment_pages_still_use_the_normal_sign_in_page(): void
    {
        $this->get(route('life-wheel.assessment'))->assertRedirect(route('login', ['next' => 'life-wheel-assessment']));
        $this->get(route('perceptual.test'))->assertRedirect(route('login', ['next' => 'perceptual-test']));
    }

    public function test_the_regular_sign_in_and_sign_up_pages_are_unchanged(): void
    {
        $this->get(route('login', ['next' => 'life-wheel']))->assertOk()
            ->assertSee('href="' . e(route('register', ['next' => 'life-wheel'])) . '"', false)
            ->assertDontSee('id="authDialog"', false);
        $this->get(route('register'))->assertOk()->assertDontSee('id="authDialog"', false);
    }

    public function test_signing_up_continues_to_the_assessment_the_guest_tried_to_start(): void
    {
        $this->postJson(route('quick-signup.post'), $this->signup(['next' => 'life-wheel-assessment']))
            ->assertOk()->assertJson(['success' => true, 'redirect' => route('life-wheel.assessment')]);

        $user = User::where('email', 'quick@example.test')->firstOrFail();
        $this->assertAuthenticatedAs($user);
        $this->assertSame('user', $user->role);
        $this->assertSame('محمد عبدالله العتيبي', $user->name);
    }

    public function test_signing_up_from_the_report_button_goes_to_the_report(): void
    {
        $this->postJson(route('quick-signup.post'), $this->signup(['next' => 'life-wheel']))
            ->assertOk()->assertJson(['redirect' => route('life-wheel.details')]);
    }

    public function test_signing_up_without_a_destination_lands_on_home(): void
    {
        $this->postJson(route('quick-signup.post'), $this->signup())->assertOk()->assertJson(['redirect' => route('home')]);
    }

    public function test_a_page_path_as_next_is_followed_and_off_site_values_are_ignored(): void
    {
        $this->postJson(route('quick-signup.post'), $this->signup(['next' => '/#challenge']))->assertOk()->assertJson(['redirect' => url('/#challenge')]);
        $this->post(route('logout'));

        foreach (['//evil.example/x', '/\\evil.example/x', '/login', 'https://evil.example'] as $i => $next) {
            $this->postJson(route('quick-signup.post'), $this->signup([
                'next' => $next,
                'email' => "e{$i}@example.test",
                'phone' => "0555123{$i}00",
                'national_id' => "10987654{$i}0", 'national_id_confirmation' => "10987654{$i}0",
            ]))->assertOk()->assertJson(['redirect' => route('home')]);
            $this->post(route('logout'));
        }
    }

    public function test_sign_up_validation_errors_are_reported_per_field(): void
    {
        User::create(['name' => 'x', 'email' => 'quick@example.test', 'password' => bcrypt('p'), 'role' => 'user', 'phone' => '0555123456']);

        $this->postJson(route('quick-signup.post'), $this->signup(['name' => 'Mohamed', 'national_id_confirmation' => '1', 'password' => '123', 'password_confirmation' => '123']))
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'phone', 'national_id', 'password']);
        $this->assertGuest();
    }

    public function test_signing_in_from_the_dialog_continues_to_the_destination(): void
    {
        $user = $this->makeUser();

        $this->postJson(route('quick-login.post'), ['email' => 'user@example.test', 'password' => 'password', 'next' => 'perceptual-test'])
            ->assertOk()->assertJson(['success' => true, 'redirect' => route('perceptual.test')]);
        $this->assertAuthenticatedAs($user);
    }

    public function test_signing_in_from_the_report_button_goes_to_the_report_and_without_next_to_home(): void
    {
        $this->makeUser();

        $this->postJson(route('quick-login.post'), ['email' => 'user@example.test', 'password' => 'password', 'next' => 'life-wheel'])
            ->assertOk()->assertJson(['redirect' => route('life-wheel.details')]);
        $this->post(route('logout'));

        $this->postJson(route('quick-login.post'), ['email' => 'user@example.test', 'password' => 'password'])
            ->assertOk()->assertJson(['redirect' => route('home')]);
    }

    public function test_an_admin_signing_in_from_the_dialog_still_lands_on_the_admin_dashboard(): void
    {
        $this->makeUser('admin');

        $this->postJson(route('quick-login.post'), ['email' => 'admin@example.test', 'password' => 'password', 'next' => 'life-wheel'])
            ->assertOk()->assertJson(['redirect' => route('admin.dashboard')]);
    }

    public function test_wrong_credentials_report_an_error_under_the_email_field(): void
    {
        $this->makeUser();

        $this->postJson(route('quick-login.post'), ['email' => 'user@example.test', 'password' => 'wrong'])
            ->assertStatus(422)->assertJsonValidationErrors(['email']);
        $this->assertGuest();

        $this->postJson(route('quick-login.post'), ['email' => '', 'password' => ''])
            ->assertStatus(422)->assertJsonValidationErrors(['email', 'password']);
    }

    public function test_the_dialog_endpoints_are_rate_limited(): void
    {
        $this->makeUser();

        for ($i = 0; $i < 10; $i++) {
            $this->postJson(route('quick-login.post'), ['email' => 'user@example.test', 'password' => 'wrong']);
        }

        $this->postJson(route('quick-login.post'), ['email' => 'user@example.test', 'password' => 'password'])->assertStatus(429);
    }

    public function test_signed_in_users_cannot_use_the_dialog_endpoints(): void
    {
        $this->actingAs($this->makeUser());

        $this->postJson(route('quick-signup.post'), $this->signup())->assertRedirect('/');
        $this->postJson(route('quick-login.post'), ['email' => 'user@example.test', 'password' => 'password'])->assertRedirect('/');
    }
}
