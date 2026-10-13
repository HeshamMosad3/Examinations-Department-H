<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * حركة عجلة الحياة في الصفحة الرئيسية: محاكاة سنين من حياة شخص بحركة سلسة، من مستوى حالي لحد نهاية بين نطاقين.
 * صف واحد بس (id = 1) بيتعدل من لوحة الإدارة (إدارة عجلة الحياة).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('life_wheel_journey_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled')->default(true);                   // لو اتقفلت العجلة بترجع للحركة القديمة
            $table->unsignedTinyInteger('duration_seconds')->default(7); // مدة الحركة كلها
            $table->unsignedTinyInteger('years')->default(5);            // عدد السنين اللي بتتحاكى
            $table->string('start_mode', 10)->default('random');         // random = مستوى حالي عشوائي في نطاق، fixed = قيم ثابتة لكل جانب
            $table->unsignedTinyInteger('start_min')->default(30);
            $table->unsignedTinyInteger('start_max')->default(60);
            $table->json('start_values');                                // 8 قيم (ترتيب الجوانب في العجلة) لو start_mode = fixed
            $table->unsignedTinyInteger('final_min')->default(75);       // نطاق النهاية
            $table->unsignedTinyInteger('final_max')->default(95);
            $table->unsignedTinyInteger('setback_level')->default(2);    // 0 من غير تراجع، 1 خفيف، 2 متوسط، 3 قوي
            $table->json('priority_axes');                               // الجوانب اللي غالبًا بتنمو الأول
            $table->timestamps();
        });

        DB::table('life_wheel_journey_settings')->insert([
            'id' => 1,
            'start_values' => json_encode([38, 54, 44, 58, 48, 36, 52, 42]),
            'priority_axes' => json_encode(['career', 'health', 'personal', 'financial']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('life_wheel_journey_settings');
    }
};
