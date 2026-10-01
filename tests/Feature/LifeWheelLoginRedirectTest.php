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

    public function test_login_from_the_report_button_modal_continues_to_the_details_page(): void
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
            ->assertSee('aria-haspopup="dialog"', false)
            ->assertDontSee('data-details-url', false)
            ->assertSee(route('login', ['next' => 'life-wheel']), false)
            ->assertSee(route('register', ['next' => 'life-wheel']), false)
            ->assertSee('name="next" value="life-wheel"', false);

        $this->actingAs($this->makeUser())
            ->get(route('life-wheel.result'))
            ->assertOk()
            ->assertSee('data-details-url="' . route('life-wheel.details') . '"', false)
            ->assertSee('data-save-url="' . route('life-wheel.results.store') . '"', false);
    }
}
