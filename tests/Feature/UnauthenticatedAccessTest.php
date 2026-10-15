<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UnauthenticatedAccessTest extends TestCase
{
    use RefreshDatabase;

    private function makeUser(): User
    {
        return User::create(['name' => 'Test user', 'email' => 'user@example.test', 'password' => bcrypt('password'), 'role' => 'user']);
    }

    public function test_guests_on_a_protected_page_get_the_friendly_401_with_home_and_back_actions(): void
    {
        $this->get(route('profile.edit'))
            ->assertUnauthorized()
            ->assertSee('هذه الصفحة تحتاج إلى تسجيل الدخول')
            ->assertSee('href="' . route('home') . '"', false)
            ->assertSee('data-go-back', false)
            ->assertSee('noindex', false);
    }

    public function test_an_expired_session_gets_the_same_401_page(): void
    {
        $this->actingAs($this->makeUser())->get(route('profile.edit'))->assertOk();

        $this->flushSession();
        $this->app['auth']->forgetGuards();

        $this->get(route('profile.edit'))->assertUnauthorized()->assertSee('data-go-back', false);
    }

    public function test_json_requests_keep_a_plain_401(): void
    {
        $this->postJson(route('life-wheel.results.store'), [])->assertUnauthorized()->assertJsonStructure(['message']);
    }

    public function test_logging_out_from_a_protected_page_goes_to_the_login_form(): void
    {
        $this->actingAs($this->makeUser())
            ->from(route('profile.edit'))
            ->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_logging_out_from_the_admin_panel_goes_to_the_login_form(): void
    {
        $admin = User::create(['name' => 'Admin', 'email' => 'admin@example.test', 'password' => bcrypt('password'), 'role' => 'admin']);

        $this->actingAs($admin)->from(route('admin.dashboard'))->post(route('logout'))->assertRedirect(route('login'));
    }

    public function test_logging_out_from_a_public_page_keeps_the_user_there(): void
    {
        $this->actingAs($this->makeUser())
            ->from(route('life-wheel.explore'))
            ->post(route('logout'))
            ->assertRedirect(route('life-wheel.explore'));

        $this->assertGuest();
    }

    public function test_logout_without_a_known_previous_page_goes_home(): void
    {
        $this->actingAs($this->makeUser())->post(route('logout'))->assertRedirect(route('home'));
    }

    public function test_logout_never_redirects_to_another_site(): void
    {
        $this->actingAs($this->makeUser())
            ->from('https://evil.example/phish')
            ->post(route('logout'))
            ->assertRedirect(route('home'));
    }
}
