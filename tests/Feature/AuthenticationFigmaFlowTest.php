<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationFigmaFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_renders_successfully(): void
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertSee('تسجيل الدخول');
        $response->assertSee('تعلّم اليوم، لتصنع غدك!');
        $response->assertSee('هل نسيت كلمة المرور؟');
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::create([
            'name'     => 'Test user',
            'email'    => 'user@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'user',
        ]);

        $response = $this->post(route('login.post'), [
            'email'    => 'user@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_register_page_renders_successfully(): void
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertSee('إنشاء حساب جديد');
        $response->assertSee('الاسم الأول (بالعربي)');
        $response->assertSee('اسم الأب (بالعربي)');
        $response->assertSee('اسم الجد (بالعربي)');
        $response->assertSee('الاسم الأخير (بالعربي)');
        $response->assertSee('رقم الهوية (الإقامة)');
        $response->assertSee('تأكيد رقم الهوية (الإقامة)');
    }

    public function test_user_can_register_with_all_figma_fields(): void
    {
        $payload = [
            'first_name'                 => 'محمد',
            'father_name'                => 'عبدالله',
            'grandfather_name'           => 'سليمان',
            'last_name'                  => 'العتيبي',
            'email'                      => 'mohammed@example.com',
            'phone'                      => '0555123456',
            'identity_type'              => 'سعودية',
            'nationality'                => 'سعودي',
            'national_id'                => '1098765432',
            'national_id_confirmation'   => '1098765432',
            'password'                   => 'secret1234',
            'password_confirmation'      => 'secret1234',
        ];

        $response = $this->post(route('register.post'), $payload);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'first_name'       => 'محمد',
            'father_name'      => 'عبدالله',
            'grand_father_name' => 'سليمان',
            'last_name'        => 'العتيبي',
            'name'             => 'محمد عبدالله سليمان العتيبي',
            'email'            => 'mohammed@example.com',
            'phone_number'     => '0555123456',
            'identity_type'    => 'سعودية',
            'nationality'      => 'سعودي',
            'id_number'        => '1098765432',
        ]);
    }

    public function test_password_reset_otp_complete_flow(): void
    {
        $user = User::create([
            'name'     => 'Test user',
            'email'    => 'testuser@example.com',
            'password' => Hash::make('oldpassword'),
            'role'     => 'user',
        ]);

        // 1. Request OTP
        $response = $this->get(route('password.request'));
        $response->assertStatus(200);
        $response->assertSee('إعادة تعيين كلمة المرور');

        $response = $this->post(route('password.email'), [
            'email' => 'testuser@example.com',
        ]);
        $response->assertRedirect(route('password.verify-otp'));

        // Check OTP was stored
        $otpRecord = DB::table('password_reset_otps')->where('email', 'testuser@example.com')->first();
        $this->assertNotNull($otpRecord);
        $this->assertEquals(4, strlen($otpRecord->otp));

        // 2. Open Verify OTP page
        $response = $this->withSession([
            'password_reset_email'        => 'testuser@example.com',
            'password_reset_masked_email' => 'tes**@example.com',
        ])->get(route('password.verify-otp'));
        $response->assertStatus(200);
        $response->assertSee('إدخال رمز التحقق');

        // 3. Submit valid OTP (as array from 4 input boxes)
        $digits = str_split($otpRecord->otp);
        $response = $this->withSession([
            'password_reset_email' => 'testuser@example.com',
        ])->post(route('password.verify-otp.post'), [
            'otp' => $digits,
        ]);
        $response->assertRedirect(route('password.reset'));

        $updatedRecord = DB::table('password_reset_otps')->where('email', 'testuser@example.com')->first();
        $this->assertNotNull($updatedRecord->token);

        // 4. Open Reset Password page
        $response = $this->withSession([
            'password_reset_email' => 'testuser@example.com',
            'password_reset_token' => $updatedRecord->token,
        ])->get(route('password.reset'));
        $response->assertStatus(200);
        $response->assertSee('إدخال كلمة المرور الجديدة');

        // 5. Submit new password
        $response = $this->withSession([
            'password_reset_email' => 'testuser@example.com',
            'password_reset_token' => $updatedRecord->token,
        ])->post(route('password.update'), [
            'password'              => 'newSecret123',
            'password_confirmation' => 'newSecret123',
        ]);
        $response->assertRedirect(route('password.reset-success'));

        // Check password was updated
        $user->refresh();
        $this->assertTrue(Hash::check('newSecret123', $user->password));

        // 6. Check reset success page (only reachable right after a reset)
        $this->followRedirects($response)->assertOk()->assertSee('تم تغيير كلمة المرور!');
        $this->get(route('password.reset-success'))->assertRedirect(route('login'));
    }

    public function test_the_otp_is_burned_after_too_many_wrong_guesses(): void
    {
        User::create(['name' => 'Test user', 'email' => 'otp@example.com', 'password' => Hash::make('oldpassword'), 'role' => 'user']);
        $this->post(route('password.email'), ['email' => 'otp@example.com']);
        $otp = DB::table('password_reset_otps')->where('email', 'otp@example.com')->value('otp');
        $wrong = $otp === '0000' ? '1111' : '0000';

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('password.verify-otp.post'), ['otp' => str_split($wrong)])->assertSessionHasErrors('otp');
        }

        $this->assertDatabaseMissing('password_reset_otps', ['email' => 'otp@example.com']);
        $this->post(route('password.verify-otp.post'), ['otp' => str_split($otp)])->assertSessionHasErrors('otp');
    }

    public function test_the_otp_is_not_shown_on_the_page_outside_local(): void
    {
        $this->app['env'] = 'production';
        User::create(['name' => 'Test user', 'email' => 'prod@example.com', 'password' => Hash::make('oldpassword'), 'role' => 'user']);

        $this->post(route('password.email'), ['email' => 'prod@example.com'])->assertSessionMissing('dev_otp');
    }

    public function test_register_normalises_phone_and_rejects_unknown_nationality(): void
    {
        $payload = [
            'first_name' => 'محمد', 'father_name' => 'عبدالله', 'grandfather_name' => 'سليمان', 'last_name' => 'العتيبي',
            'email' => 'a@example.com', 'phone' => '055 512-3456', 'identity_type' => 'سعودية', 'nationality' => 'مريخي',
            'national_id' => '1098765432', 'national_id_confirmation' => '1098765432',
            'password' => 'secret1234', 'password_confirmation' => 'secret1234',
        ];

        $this->post(route('register.post'), $payload)->assertSessionHasErrors('nationality');

        $this->post(route('register.post'), ['nationality' => 'سعودي'] + $payload)->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', ['email' => 'a@example.com', 'phone_number' => '0555123456']);
    }
}
