<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** حقول الملف الشخصي اللي بيكمّلها المستخدم بعد التسجيل السريع (كلها اختيارية في الجدول؛ الإجباري بيتحدد في ProfileForm) */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('last_name');
            $table->string('whatsapp', 50)->nullable()->after('phone');
            $table->date('birth_date')->nullable()->after('gender');
            $table->string('residence')->nullable()->after('nationality');
            $table->string('heard_from')->nullable()->after('qualification');
            $table->string('job_status')->nullable()->after('heard_from');
            $table->string('employer')->nullable()->after('job_status');
            $table->string('job_title')->nullable()->after('employer');
            $table->string('photo')->nullable()->after('job_title');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'whatsapp', 'birth_date', 'residence', 'heard_from', 'job_status', 'employer', 'job_title', 'photo']);
        });
    }
};
