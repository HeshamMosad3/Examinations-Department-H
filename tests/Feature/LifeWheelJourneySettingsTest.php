<?php

namespace Tests\Feature;

use App\Models\LifeWheelJourneySetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Support\ProfileData;
use Tests\TestCase;

/** إعدادات حركة عجلة الصفحة الرئيسية (محاكاة سنين من حياة شخص) من لوحة الإدارة. */
class LifeWheelJourneySettingsTest extends TestCase
{
    use RefreshDatabase;

    private function user(string $role): User
    {
        $digits = str_pad((string) (crc32($role) % 100000000), 8, '0', STR_PAD_LEFT);

        return User::create(ProfileData::complete([
            'name' => "{$role} user", 'email' => "{$role}@example.test", 'password' => bcrypt('password'),
            'phone' => "05{$digits}", 'national_id' => "10{$digits}",
        ]) + ['role' => $role]);
    }

    private function validPayload(array $override = []): array
    {
        return array_replace([
            'enabled' => '1',
            'duration_seconds' => 9,
            'years' => 6,
            'start_mode' => 'fixed',
            'start_min' => 20,
            'start_max' => 50,
            'start_values' => ['personal' => 31, 'spiritual' => 32, 'health' => 33, 'social' => 34, 'family' => 35, 'leisure' => 36, 'financial' => 37, 'career' => 38],
            'final_min' => 80,
            'final_max' => 92,
            'setback_level' => 3,
            'priority_axes' => ['family', 'leisure'],
        ], $override);
    }

    public function test_defaults_are_exposed_to_the_home_wheel(): void
    {
        $config = $this->get('/')->assertOk()->getContent();

        $this->assertStringContainsString('window.LIFE_WHEEL_JOURNEY', $config);
        preg_match('/window\.LIFE_WHEEL_JOURNEY = (\{.*?\});<\/script>/s', $config, $m);
        $journey = json_decode($m[1], true);

        $this->assertTrue($journey['enabled']);
        $this->assertSame(7000, $journey['durationMs']);
        $this->assertSame(5, $journey['years']);
        $this->assertSame([75, 95], [$journey['finalMin'], $journey['finalMax']]);
        $this->assertCount(8, $journey['startValues']);
        // الجوانب الأولى بتتحول لأرقام بترتيب محاور العجلة: الشخصي 0، الصحي 2، المالي 6، المهني 7
        $this->assertEqualsCanonicalizing([0, 2, 6, 7], $journey['priorityAxes']);
    }

    public function test_admin_page_shows_the_journey_settings(): void
    {
        $this->actingAs($this->user('admin'))
            ->get(route('admin.life-wheel-influence.index'))
            ->assertOk()
            ->assertSee('حركة العجلة في الصفحة الرئيسية')
            ->assertSee('name="duration_seconds"', false)
            ->assertSee('name="start_values[career]"', false);
    }

    public function test_admin_saves_the_settings_and_the_home_wheel_uses_them(): void
    {
        $this->actingAs($this->user('admin'))
            ->put(route('admin.life-wheel-influence.journey'), $this->validPayload())
            ->assertRedirect()
            ->assertSessionHas('success');

        $row = LifeWheelJourneySetting::first();
        $this->assertSame(9, $row->duration_seconds);
        $this->assertSame(6, $row->years);
        $this->assertSame('fixed', $row->start_mode);
        $this->assertSame([31, 32, 33, 34, 35, 36, 37, 38], $row->start_values);
        $this->assertSame([80, 92], [$row->final_min, $row->final_max]);
        $this->assertSame(['family', 'leisure'], $row->priority_axes);

        auth()->logout();
        preg_match('/window\.LIFE_WHEEL_JOURNEY = (\{.*?\});<\/script>/s', $this->get('/')->getContent(), $m);
        $journey = json_decode($m[1], true);
        $this->assertSame(9000, $journey['durationMs']);
        $this->assertSame(6, $journey['years']);
        $this->assertSame('fixed', $journey['startMode']);
        $this->assertSame([31, 32, 33, 34, 35, 36, 37, 38], $journey['startValues']);
        $this->assertSame(3, $journey['setbackLevel']);
        $this->assertEqualsCanonicalizing([4, 5], $journey['priorityAxes']);
    }

    public function test_admin_can_turn_the_simulation_off(): void
    {
        $this->actingAs($this->user('admin'))
            ->put(route('admin.life-wheel-influence.journey'), $this->validPayload(['enabled' => '0']))
            ->assertRedirect();

        $this->assertFalse(LifeWheelJourneySetting::first()->enabled);
    }

    public function test_invalid_settings_are_rejected(): void
    {
        $admin = $this->user('admin');

        foreach ([
            ['duration_seconds' => 1],
            ['duration_seconds' => 40],
            ['years' => 2],
            ['years' => 12],
            ['final_min' => 90, 'final_max' => 80],
            ['start_min' => 60, 'start_max' => 40],
            ['setback_level' => 7],
            ['start_mode' => 'sometimes'],
            ['priority_axes' => ['unknown']],
            ['start_values' => ['personal' => 3, 'spiritual' => 32, 'health' => 33, 'social' => 34, 'family' => 35, 'leisure' => 36, 'financial' => 37, 'career' => 38]],
        ] as $bad) {
            $this->actingAs($admin)
                ->from(route('admin.life-wheel-influence.index'))
                ->put(route('admin.life-wheel-influence.journey'), $this->validPayload($bad))
                ->assertSessionHasErrors();
        }

        $this->assertSame(7, LifeWheelJourneySetting::first()->duration_seconds);
    }

    public function test_only_admins_can_change_the_settings(): void
    {
        $this->put(route('admin.life-wheel-influence.journey'), $this->validPayload())->assertUnauthorized();
        $this->actingAs($this->user('user'))
            ->put(route('admin.life-wheel-influence.journey'), $this->validPayload());

        $this->assertSame(7, LifeWheelJourneySetting::first()->duration_seconds);
    }
}
