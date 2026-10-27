<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** صفحة اكتشف مفاتيح الشخصية السبعة (Figma #3551:10953 / #3551:12043). */
class PersonalityKeysExploreTest extends TestCase
{
    use RefreshDatabase;

    public function test_explore_page_shows_the_seven_keys_and_sends_guests_through_login(): void
    {
        $html = $this->get('/personality-keys.html')->assertOk()->getContent();

        foreach (['مفاتيح الشخصية السبعة', 'البصيرة', 'الدافع', 'الصمود', 'الارتباط', 'القرار', 'التأثير', 'الأفق', 'رحلة التقييم في 3 خطوات بسيطة'] as $text) {
            $this->assertStringContainsString($text, $html);
        }
        $this->assertStringContainsString('login?next=', $html);
    }

    public function test_home_explore_button_points_to_the_new_page(): void
    {
        $this->get('/')->assertOk()->assertSee('/personality-keys.html', false);
    }

    public function test_admin_can_edit_the_page_texts(): void
    {
        $admin = \App\Models\Admin::create(['name' => 'Admin', 'email' => 'admin@example.test', 'password' => 'password']);

        $this->actingAs($admin, 'admin')->get(route('admin.site-content.edit', 'keys_explore'))
            ->assertOk()->assertSee('keys_explore__hero__title', false)->assertSee('keys_explore__keys__k3', false)->assertSee('keys_explore__steps__step_1_button', false);

        $this->actingAs($admin, 'admin')->put(route('admin.site-content.update', 'keys_explore'), ['values' => [
            'keys_explore__hero__title' => 'عنوان جديد للمفاتيح',
        ]])->assertRedirect();

        auth()->logout();
        $this->get('/personality-keys.html')->assertOk()->assertSee('عنوان جديد للمفاتيح');
    }
}
