<?php

namespace Tests\Feature;

use App\Models\SiteContent;
use App\Models\User;
use App\Services\SiteContentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** صفحات الدخول وحقول إنشاء حساب بيتحكم فيها الأدمن من "محتوى الصفحات" */
class AuthCustomizationTest extends TestCase
{
    use RefreshDatabase;

    private function set(array $values): void
    {
        foreach ($values as $key => $value) {
            SiteContent::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        app(SiteContentService::class)->flush();
    }

    private function payload(array $overrides = []): array
    {
        return $overrides + [
            'first_name' => 'محمد', 'father_name' => 'عبدالله', 'grandfather_name' => 'سليمان', 'last_name' => 'العتيبي',
            'email' => 'new@example.test', 'phone' => '0555123456', 'identity_type' => 'سعودية', 'nationality' => 'سعودي',
            'national_id' => '1098765432', 'national_id_confirmation' => '1098765432',
            'password' => 'secret1234', 'password_confirmation' => 'secret1234',
        ];
    }

    public function test_auth_page_texts_come_from_site_content(): void
    {
        $this->set(['auth.login.title' => 'أهلاً من جديد', 'auth.common.panel_title' => 'شعار مخصص', 'auth.register.submit' => 'سجّلني']);

        $this->get(route('login'))->assertOk()->assertSee('أهلاً من جديد')->assertSee('شعار مخصص');
        $this->get(route('register'))->assertOk()->assertSee('سجّلني');
    }

    public function test_admin_can_hide_a_field_and_make_another_optional(): void
    {
        $this->set(['auth.field_phone.enabled' => '0', 'auth.field_national_id.required' => '0', 'auth.field_national_id.confirm' => '0']);

        $this->get(route('register'))->assertOk()->assertDontSee('name="phone"', false)->assertDontSee('name="national_id_confirmation"', false);

        $payload = $this->payload();
        unset($payload['phone'], $payload['national_id'], $payload['national_id_confirmation']);
        $this->post(route('register.post'), $payload)->assertRedirect(route('home'));

        $this->assertDatabaseHas('users', ['email' => 'new@example.test', 'phone' => null, 'national_id' => null]);
    }

    public function test_hidden_fields_are_not_saved_even_if_posted(): void
    {
        $this->set(['auth.field_phone.enabled' => '0']);

        $this->post(route('register.post'), $this->payload())->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', ['email' => 'new@example.test', 'phone' => null]);
    }

    public function test_admin_can_turn_on_extra_fields_and_require_them(): void
    {
        $this->set(['auth.field_gender.enabled' => '1', 'auth.field_gender.required' => '1', 'auth.field_qualification.enabled' => '1']);

        $this->get(route('register'))->assertOk()->assertSee('name="gender"', false)->assertSee('name="qualification"', false);

        $this->post(route('register.post'), $this->payload())->assertSessionHasErrors('gender');
        $this->post(route('register.post'), $this->payload(['gender' => 'female', 'qualification' => 'ماجستير']))->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', ['email' => 'new@example.test', 'gender' => 'female', 'qualification' => 'ماجستير']);
    }

    public function test_admin_controls_lengths_arabic_only_and_messages(): void
    {
        $this->set([
            'auth.field_first_name.arabic_only' => '1',
            'auth.field_first_name.min' => '3',
            'auth.field_phone.min' => '10',
            'auth.field_phone.max' => '10',
            'auth.validation.arabic' => 'اكتب :attribute بالعربي من فضلك',
        ]);

        $this->post(route('register.post'), $this->payload(['first_name' => 'Mohamed']))
            ->assertSessionHasErrors(['first_name' => 'اكتب الاسم الأول (بالعربي) بالعربي من فضلك']);
        $this->post(route('register.post'), $this->payload(['first_name' => 'مح']))->assertSessionHasErrors('first_name');
        $this->post(route('register.post'), $this->payload(['phone' => '055512345']))->assertSessionHasErrors('phone');
        $this->post(route('register.post'), $this->payload())->assertRedirect(route('home'));
    }

    public function test_admin_controls_dropdown_options(): void
    {
        $this->set(['auth.field_nationality.options' => "سعودي\nهندي"]);

        $this->get(route('register'))->assertOk()->assertSee('هندي')->assertDontSee('data-value="مصري"', false);
        $this->post(route('register.post'), $this->payload(['nationality' => 'مصري']))->assertSessionHasErrors('nationality');
        $this->post(route('register.post'), $this->payload(['nationality' => 'هندي']))->assertRedirect(route('home'));
    }

    public function test_password_min_length_applies_to_register_and_reset(): void
    {
        $this->set(['auth.field_password.min' => '12']);

        $this->post(route('register.post'), $this->payload())->assertSessionHasErrors('password');
        $this->post(route('register.post'), $this->payload(['password' => 'secret123456', 'password_confirmation' => 'secret123456']))->assertRedirect(route('home'));
    }

    public function test_all_name_fields_hidden_falls_back_to_the_email_name(): void
    {
        $this->set(collect(['first_name', 'father_name', 'grandfather_name', 'last_name'])->mapWithKeys(fn ($f) => ["auth.field_{$f}.enabled" => '0'])->all());

        $this->post(route('register.post'), $this->payload())->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', ['email' => 'new@example.test', 'name' => 'new', 'first_name' => null]);
    }

    public function test_the_admin_page_saves_switches_numbers_and_lists(): void
    {
        $admin = User::create(['name' => 'Admin', 'email' => 'admin@example.test', 'password' => 'password', 'role' => 'admin']);

        $this->actingAs($admin)->get(route('admin.site-content.edit', 'auth'))
            ->assertOk()->assertSee('حقل: رقم الجوال')->assertSee('role="switch"', false)->assertSee('type="number"', false);

        $this->actingAs($admin)->put(route('admin.site-content.update', 'auth'), ['values' => [
            'auth__field_phone__enabled' => '0',        // switch off
            'auth__field_first_name__required' => '1', // same as the original: not stored
            'auth__field_phone__min' => 'abc',         // not a number: ignored
            'auth__field_password__min' => '10',
            'auth__field_identity_type__options' => "سعودية\nغير سعودية", // same options as the original, written on lines
        ]])->assertRedirect();

        $this->assertDatabaseHas('site_contents', ['key' => 'auth.field_phone.enabled', 'value' => '0']);
        $this->assertDatabaseHas('site_contents', ['key' => 'auth.field_password.min', 'value' => '10']);
        $this->assertDatabaseMissing('site_contents', ['key' => 'auth.field_first_name.required']);
        $this->assertDatabaseMissing('site_contents', ['key' => 'auth.field_phone.min']);
        $this->assertDatabaseMissing('site_contents', ['key' => 'auth.field_identity_type.options']);
    }
}
