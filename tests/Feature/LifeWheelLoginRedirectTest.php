<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LifeWheelLoginRedirectTest extends TestCase
{
    use RefreshDatabase;

    private function makeUser(string $role = 'user'): User
    {
        return User::create(['name' => 'Test user', 'email' => $role . '@example.test', 'password' => bcrypt('password'), 'role' => $role]);
    }

    private function credentials(string $role = 'user'): array
    {
        return ['email' => $role . '@example.test', 'password' => 'password'];
    }

    public function test_a_normal_login_still_goes_to_the_dashboard(): void
    {
        $this->makeUser();

        $this->post(route('login.post'), $this->credentials())->assertRedirect(route('home'));
    }

    public function test_login_with_next_life_wheel_continues_to_the_details_page(): void
    {
        $this->makeUser();

        $this->post(route('login.post'), $this->credentials() + ['next' => 'life-wheel'])->assertRedirect(route('life-wheel.details'));
    }

    public function test_login_page_opened_from_the_report_button_remembers_the_details_page(): void
    {
        $this->makeUser();

        $this->get(route('login', ['next' => 'life-wheel']))->assertOk();
        $this->post(route('login.post'), $this->credentials())->assertRedirect(route('life-wheel.details'));
    }

    public function test_opening_the_details_page_as_a_guest_returns_to_it_after_login(): void
    {
        $this->makeUser();

        $this->get(route('life-wheel.details'))->assertRedirect(route('login'));
        $this->post(route('login.post'), $this->credentials())->assertRedirect(route('life-wheel.details'));
    }

    public function test_a_failed_login_keeps_the_typed_email(): void
    {
        $this->makeUser();

        $this->from(route('login'))
            ->post(route('login.post'), ['email' => 'user@example.test', 'password' => 'wrong'])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email')
            ->assertSessionHasInput('email', 'user@example.test');
    }

    public function test_unknown_next_values_are_ignored(): void
    {
        $this->makeUser();

        $this->post(route('login.post'), $this->credentials() + ['next' => 'https://evil.example/steal'])->assertRedirect(route('home'));
    }

    public function test_admins_still_land_on_the_admin_dashboard(): void
    {
        $this->makeUser('admin');

        $this->post(route('login.post'), $this->credentials('admin') + ['next' => 'life-wheel'])->assertRedirect(route('admin.dashboard'));
    }

    public function test_the_register_page_remembers_the_details_page_too(): void
    {
        $this->get(route('register', ['next' => 'life-wheel']))->assertOk();

        $this->assertSame(route('life-wheel.details'), session('url.intended'));
    }

    public function test_the_result_page_wires_the_report_button_for_guests_and_signed_in_users(): void
    {
        $this->seed(\Database\Seeders\WheelOfLifeSeeder::class);

        $this->get(route('life-wheel.result'))
            ->assertOk()
            ->assertSee('data-auth-gate="life-wheel"', false)
            ->assertSee('id="authDialog"', false)
            ->assertDontSee('data-details-url', false)
            ->assertDontSee('id="login-modal"', false);

        $this->actingAs($this->makeUser())
            ->get(route('life-wheel.result'))
            ->assertOk()
            ->assertSee('data-details-url="' . route('life-wheel.details') . '"', false)
            ->assertSee('data-save-url="' . route('life-wheel.results.store') . '"', false);
    }

    public function test_guests_cannot_access_assessment_pages_directly_and_are_redirected_to_login(): void
    {
        $this->get(route('life-wheel.assessment'))
            ->assertRedirect(route('login', ['next' => 'life-wheel-assessment']))
            ->assertSessionHas('info');

        $this->get(route('perceptual.test'))
            ->assertRedirect(route('login', ['next' => 'perceptual-test']))
            ->assertSessionHas('info');
    }

    public function test_authenticated_users_can_access_assessment_pages(): void
    {
        $this->seed(\Database\Seeders\WheelOfLifeSeeder::class);
        $this->seed(\Database\Seeders\PerceptualStylesSeeder::class);

        $user = $this->makeUser();

        $this->actingAs($user)
            ->get(route('life-wheel.assessment'))
            ->assertOk();

        $this->actingAs($user)
            ->get(route('perceptual.test'))
            ->assertOk();
    }

    public function test_landing_page_has_no_login_modal_and_links_to_the_login_route(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertDontSee('id="login-modal"', false)
            ->assertDontSee('openLoginModal')
            ->assertSee('href="' . e(route('login', ['next' => '/'])) . '"', false)
            ->assertSee('href="' . e(route('login', ['next' => '/personality-keys-test.html'])) . '"', false)
            ->assertSee('href="' . route('life-wheel.assessment') . '"', false);
    }

    public function test_sign_in_returns_the_user_to_the_page_they_were_on(): void
    {
        $this->makeUser();

        $this->get(route('login', ['next' => '/life-wheel.html']))->assertOk();
        $this->post(route('login.post'), $this->credentials())->assertRedirect(url('/life-wheel.html'));
    }

    public function test_start_button_on_home_returns_to_the_challenge_section_after_login(): void
    {
        $this->makeUser();

        $this->post(route('login.post'), $this->credentials() + ['next' => '/#challenge'])->assertRedirect(url('/#challenge'));
    }

    public function test_guest_start_assessment_goes_to_login_and_back_to_the_assessment(): void
    {
        $this->makeUser();

        $this->get(route('life-wheel.assessment'))->assertRedirect(route('login', ['next' => 'life-wheel-assessment']));
        $this->get(route('login', ['next' => 'life-wheel-assessment']))->assertOk()->assertSee('يرجى تسجيل الدخول');
        $this->post(route('login.post'), $this->credentials())->assertRedirect(route('life-wheel.assessment'));
    }

    public function test_registering_also_returns_to_the_intended_page(): void
    {
        $this->get(route('register', ['next' => '/perceptual-explore.html']))->assertOk();

        $this->post(route('register.post'), [
            'first_name' => 'محمد', 'father_name' => 'عبدالله', 'grandfather_name' => 'سليمان', 'last_name' => 'العتيبي',
            'email' => 'new@example.test', 'phone' => '0555123456', 'identity_type' => 'سعودية', 'nationality' => 'سعودي',
            'national_id' => '1098765432', 'national_id_confirmation' => '1098765432',
            'password' => 'secret1234', 'password_confirmation' => 'secret1234',
        ])->assertRedirect(url('/perceptual-explore.html'));
    }

    public function test_next_cannot_point_off_site_at_auth_pages_or_at_route_names(): void
    {
        $this->makeUser();

        foreach (['//evil.example/x', '/\\evil.example/x', '/login', '/register?next=/', 'admin.users.show', 'logout'] as $next) {
            $this->post(route('login.post'), $this->credentials() + ['next' => $next])->assertRedirect(route('home'));
            $this->post(route('logout'));
        }
    }

    public function test_admins_follow_an_intended_admin_page(): void
    {
        $this->makeUser('admin');

        $this->get(route('admin.users.index'))->assertRedirect(route('login'));
        $this->post(route('login.post'), $this->credentials('admin'))->assertRedirect(route('admin.users.index'));
    }

    public function test_signed_in_users_are_sent_away_from_the_auth_pages(): void
    {
        $this->actingAs($this->makeUser());

        $this->get(route('login'))->assertRedirect('/');
        $this->get(route('register'))->assertRedirect('/');
        $this->get(route('password.request'))->assertRedirect('/');
    }

    public function test_login_is_rate_limited(): void
    {
        $this->makeUser();

        for ($i = 0; $i < 10; $i++) {
            $this->post(route('login.post'), ['email' => 'user@example.test', 'password' => 'wrong']);
        }

        $this->post(route('login.post'), $this->credentials())->assertStatus(429);
    }

    public function test_authenticated_user_sees_icon_and_name_in_dropdown_and_logout_redirects_to_home(): void
    {
        $user = $this->makeUser();

        $this->actingAs($user)
            ->get(route('home'))
            ->assertOk()
            ->assertSee('id="user-menu-button"', false)
            ->assertSee('fa-solid fa-user', false)
            ->assertSee($user->name)
            ->assertSee('الملف الشخصي')
            ->assertSee('تسجيل الخروج')
            ->assertDontSee('مسؤول النظام')
            ->assertDontSee('fa-shield-halved', false)
            ->assertDontSee('fa-id-badge', false);

        $this->actingAs($user)
            ->post(route('logout'))
            ->assertRedirect(route('home'));
    }
}
