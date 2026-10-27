<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\User;
use App\Services\Website\Assessments\AssessmentData;
use App\Services\Website\Auth\ProfileForm;
use Database\Seeders\SevenPersonalityKeysSeeder;
use Database\Seeders\WheelOfLifeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\Support\ProfileData;
use Tests\TestCase;

/** الملف الشخصي: العرض، الإكمال، نسبة الاكتمال، الحذف، وبوابة التقارير المفصّلة */
class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** مستخدم التسجيل السريع: الاسم والبريد والجوال والهوية بس */
    private function quickUser(): User
    {
        return User::create([
            'name' => 'أحمد محمد علي الشامسي', 'email' => 'quick@example.test', 'password' => bcrypt('password'),
            'phone' => '0551234503', 'national_id' => '2012345671', 'role' => 'user',
        ]);
    }

    private function completeUser(): User
    {
        return User::create(ProfileData::complete(['name' => 'Complete user', 'email' => 'full@example.test', 'password' => bcrypt('password')]) + ['role' => 'user']);
    }

    private function payload(array $override = []): array
    {
        return $override + ProfileData::complete() + ['confirm' => '1'];
    }

    // ----- page -----

    public function test_guests_are_sent_to_sign_in_and_admins_to_their_dashboard(): void
    {
        $this->get(route('profile.edit'))->assertUnauthorized();
        $this->put(route('profile.update'), $this->payload())->assertUnauthorized();

        $admin = User::create(['name' => 'Admin', 'email' => 'admin@example.test', 'password' => bcrypt('password'), 'role' => 'admin']);
        $this->actingAs($admin)->get(route('profile.edit'))->assertRedirect(route('admin.dashboard'));
    }

    public function test_a_quick_signup_user_sees_a_partial_completion_and_the_missing_fields(): void
    {
        $user = $this->quickUser();
        $completion = app(ProfileForm::class)->completion($user);

        $this->assertFalse($completion['complete']);
        $this->assertSame(18, $completion['percent']);          // رقم الهوية والجوال والبريد = 3 من 16 حقل إجباري
        $this->assertContains('الاسم بالإنجليزي (الاسم الكامل)', $completion['missing']);

        $page = $this->actingAs($user)->get(route('profile.edit'))->assertOk();
        $page->assertSee('الملف الشخصي')->assertSee('18%', false)->assertSee('متبقي 13 حقول إجبارية', false);
        // الاسم الكامل المحفوظ بيتوزّع كاقتراح على الأسماء الأربعة
        $page->assertSee('value="أحمد"', false)->assertSee('value="الشامسي"', false);
    }

    public function test_the_navbar_menu_links_to_the_profile_page_with_its_percentage(): void
    {
        $this->actingAs($this->quickUser())->get(route('home'))
            ->assertSee('href="' . route('profile.edit') . '"', false)
            ->assertSee('18%', false);
    }

    // ----- saving -----

    public function test_saving_a_complete_profile_updates_the_user_and_the_full_name(): void
    {
        $user = $this->quickUser();

        $this->actingAs($user)->put(route('profile.update'), $this->payload(['phone' => '0551234503', 'national_id' => '2012345671']))
            ->assertRedirect(route('profile.edit'))->assertSessionHas('status');

        $user->refresh();
        $this->assertSame('أحمد محمد علي الشامسي', $user->name);
        $this->assertSame('Ahmed Mohammed Ali', $user->name_en);
        $this->assertSame('1990-05-10', $user->birth_date->format('Y-m-d'));
        $this->assertTrue(app(ProfileForm::class)->completion($user)['complete']);
    }

    public function test_saving_requires_the_confirmation_and_valid_values(): void
    {
        $user = $this->quickUser();

        $this->actingAs($user)->put(route('profile.update'), $this->payload(['confirm' => null]))->assertSessionHasErrors('confirm');
        $this->put(route('profile.update'), $this->payload(['first_name' => 'Ahmed']))->assertSessionHasErrors('first_name');
        $this->put(route('profile.update'), $this->payload(['name_en' => 'مروان']))->assertSessionHasErrors('name_en');
        $this->put(route('profile.update'), $this->payload(['name_en' => 'Ahmed']))->assertSessionHasErrors('name_en');   // الاسم الكامل مطلوب
        $this->put(route('profile.update'), $this->payload(['gender' => 'other']))->assertSessionHasErrors('gender');
        $this->put(route('profile.update'), $this->payload(['birth_date' => now()->addDay()->format('Y-m-d')]))->assertSessionHasErrors('birth_date');
        $this->put(route('profile.update'), $this->payload(['employer' => '']))->assertSessionHasErrors('employer');
        $this->put(route('profile.update'), $this->payload(['phone' => '12ab']))->assertSessionHasErrors('phone');

        $this->assertNull($user->refresh()->name_en);
    }

    public function test_phone_and_national_id_must_stay_unique_across_users(): void
    {
        $other = $this->completeUser();
        $user = $this->quickUser();

        $this->actingAs($user)->put(route('profile.update'), $this->payload(['phone' => $other->phone]))->assertSessionHasErrors('phone');
        $this->put(route('profile.update'), $this->payload(['national_id' => $other->national_id]))->assertSessionHasErrors('national_id');
        // رقمه هو بدون تغيير مقبول
        $this->put(route('profile.update'), $this->payload(['phone' => '0551234503', 'national_id' => '2012345671']))->assertSessionHasNoErrors();
    }

    public function test_email_cannot_be_changed_from_the_profile(): void
    {
        $user = $this->quickUser();

        $this->actingAs($user)->put(route('profile.update'), $this->payload(['email' => 'hacker@example.test', 'phone' => '0551234503', 'national_id' => '2012345671']));

        $this->assertSame('quick@example.test', $user->refresh()->email);
    }

    public function test_arabic_indic_digits_and_spaces_are_normalised_in_numbers(): void
    {
        $user = $this->quickUser();

        $this->actingAs($user)->put(route('profile.update'), $this->payload(['phone' => '٠٥٥ ١٢٣٤٥٠٣', 'national_id' => '2012345671']))->assertSessionHasNoErrors();

        $this->assertSame('0551234503', $user->refresh()->phone);
    }

    public function test_photo_can_be_uploaded_and_removed(): void
    {
        $user = $this->quickUser();
        $created = [];

        try {
            $this->actingAs($user)->put(route('profile.update'), $this->payload(['phone' => '0551234503', 'national_id' => '2012345671', 'photo' => UploadedFile::fake()->image('me.png', 200, 200)]))
                ->assertSessionHasNoErrors();
            $user->refresh();
            $this->assertMatchesRegularExpression('#^/images/profile/u' . $user->id . '_[a-z0-9]+\.png$#', $user->photo);
            $created[] = public_path(ltrim($user->photo, '/'));
            $this->assertFileExists($created[0]);

            $this->put(route('profile.update'), $this->payload(['phone' => '0551234503', 'national_id' => '2012345671', 'remove_photo' => '1']))->assertSessionHasNoErrors();
            $this->assertNull($user->refresh()->photo);
            $this->assertFileDoesNotExist($created[0]);

            $this->put(route('profile.update'), $this->payload(['phone' => '0551234503', 'national_id' => '2012345671', 'photo' => UploadedFile::fake()->create('virus.php', 5, 'application/x-php')]))
                ->assertSessionHasErrors('photo');
        } finally {
            foreach ($created as $file) {
                File::delete($file);
            }
        }
    }

    public function test_deleting_the_profile_data_keeps_the_account_but_reopens_the_gate(): void
    {
        $user = $this->completeUser();

        $this->actingAs($user)->delete(route('profile.destroy'))->assertRedirect(route('profile.edit'))->assertSessionHas('status');

        $user->refresh();
        $this->assertNull($user->first_name);
        $this->assertNull($user->name_en);
        $this->assertNull($user->birth_date);
        $this->assertSame('full@example.test', $user->email);
        $this->assertSame('0501234567', $user->phone);
        $this->assertSame('1012345678', $user->national_id);
        $this->assertFalse(app(ProfileForm::class)->completion($user)['complete']);
        $this->get(route('life-wheel.details'))->assertRedirect(route('profile.edit'));
    }

    // ----- the gate -----

    public function test_detailed_reports_send_an_incomplete_profile_to_complete_it_and_back(): void
    {
        $this->seed(WheelOfLifeSeeder::class);
        $user = $this->quickUser();

        $this->actingAs($user)->get(route('life-wheel.details'))
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('warning')
            ->assertSessionHas('url.intended', route('life-wheel.details'));

        $this->get(route('profile.edit'))->assertOk()->assertSee('أكمل ملفك الشخصي لعرض التقرير التفصيلي');

        // بعد الحفظ المكتمل يرجع للتقرير
        $this->put(route('profile.update'), $this->payload(['phone' => '0551234503', 'national_id' => '2012345671']))
            ->assertRedirect(route('life-wheel.details'));
        $this->get(route('life-wheel.details'))->assertOk();
    }

    public function test_a_partial_save_stays_on_the_profile_and_keeps_the_destination(): void
    {
        $user = $this->quickUser();

        $this->actingAs($user)->get(route('life-wheel.details'))->assertRedirect(route('profile.edit'));
        $this->put(route('profile.update'), $this->payload(['employer' => '']))->assertSessionHasErrors('employer');

        $this->assertSame(route('life-wheel.details'), session('url.intended'));
    }

    public function test_the_perceptual_report_needs_a_signed_in_user_with_a_complete_profile(): void
    {
        $this->get(route('perceptual.result'))->assertUnauthorized();
        $this->actingAs($this->quickUser())->get(route('perceptual.result', ['answers' => '0,1']))->assertRedirect(route('profile.edit'));
    }

    public function test_json_requests_to_gated_reports_get_a_403_with_the_profile_url(): void
    {
        $this->actingAs($this->quickUser())->getJson(route('life-wheel.details'))
            ->assertForbidden()->assertJson(['redirect' => route('profile.edit')]);
    }

    public function test_a_profile_link_can_set_the_page_to_return_to_but_only_inside_the_site(): void
    {
        $user = $this->quickUser();

        $this->actingAs($user)->get(route('profile.edit', ['next' => '/personality-keys-result.html']))->assertOk();
        $this->assertSame(url('/personality-keys-result.html'), session('url.intended'));

        $this->flushSession();
        $this->actingAs($user)->get(route('profile.edit', ['next' => '//evil.example']))->assertOk();
        $this->assertNull(session('url.intended'));
    }

    public function test_the_personality_keys_details_need_a_complete_profile(): void
    {
        $this->seed(SevenPersonalityKeysSeeder::class);
        $data = AssessmentData::load(Assessment::byCode(Assessment::SEVEN_PERSONALITY_KEYS));
        $answers = $data->questions->mapWithKeys(fn ($q) => [$q->id => $q->options[0]->id])->all();

        // الحساب السريع (ملف ناقص): صفحة التفاصيل بتحوّله لإكمال الملف
        $quick = $this->quickUser();
        $this->actingAs($quick)->postJson(route('keys.results.store'), ['answers' => $answers])->assertOk();
        $this->get(route('keys.details'))->assertRedirect(route('profile.edit'));
        $this->assertSame(url('/personality-keys-details.html'), session('url.intended'));

        // الملف المكتمل: التفاصيل كاملة من غير حاجز
        $complete = $this->completeUser();
        $this->actingAs($complete)->postJson(route('keys.results.store'), ['answers' => $answers])->assertOk();
        $this->get(route('keys.details'))->assertOk()->assertSee('البصيرة (K1)', false)->assertDontSee('data-profile-gate', false);
    }

    public function test_admins_are_not_held_back_by_the_gate(): void
    {
        $admin = User::create(['name' => 'Admin', 'email' => 'admin@example.test', 'password' => bcrypt('password'), 'role' => 'admin']);

        $this->assertTrue(app(ProfileForm::class)->isComplete($admin));
    }
}
