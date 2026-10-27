<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable()->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('id_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('logo')->nullable();
            $table->string('edu_degree')->nullable();
            $table->string('address')->nullable();
            $table->text('about_me')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_show_in_teachers_home_page')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        // الأدمنز القدام كانوا صفوف في users (role = admin): ننقلهم لجدول admins بنفس الـ id وكلمة السر المشفرة
        foreach (DB::table('users')->where('role', 'admin')->get() as $u) {
            DB::table('admins')->insert([
                'id' => $u->id,
                'user_name' => strstr($u->email, '@', true) ?: $u->email,
                'name' => $u->name,
                'email' => $u->email,
                'password' => $u->password,
                'id_number' => $u->national_id ?? null,
                'phone_number' => $u->phone ?? null,
                'status' => true,
                'created_at' => $u->created_at,
                'updated_at' => now(),
            ]);
        }

        DB::table('users')->where('role', 'admin')->delete();
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
