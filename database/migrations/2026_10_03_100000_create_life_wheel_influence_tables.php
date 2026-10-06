<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * عجلة الحياة في الصفحة الرئيسية: مستويات التأثير (ضعيف/متوسط/قوي/قوي جداً) ونطاق كل مستوى،
 * وجدول "لو زاد محور الصف ← تأثيره على محور العمود". القيم الافتراضية هي جدول الإدارة الأصلي.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('life_wheel_influence_levels', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();          // weak | medium | strong | very_strong
            $table->string('name_ar');
            $table->unsignedTinyInteger('min_percent');
            $table->unsignedTinyInteger('max_percent');
            $table->unsignedTinyInteger('order_index')->default(0);
            $table->timestamps();
        });

        Schema::create('life_wheel_influences', function (Blueprint $table) {
            $table->id();
            $table->string('source_axis');            // المحور اللي زاد
            $table->string('target_axis');            // المحور اللي بيتأثر
            $table->string('level_key')->nullable();  // null = مفيش تأثير
            $table->timestamps();
            $table->unique(['source_axis', 'target_axis']);
        });

        $now = now();
        DB::table('life_wheel_influence_levels')->insert([
            ['key' => 'weak', 'name_ar' => 'ضعيف', 'min_percent' => 5, 'max_percent' => 25, 'order_index' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'medium', 'name_ar' => 'متوسط', 'min_percent' => 26, 'max_percent' => 50, 'order_index' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'strong', 'name_ar' => 'قوي', 'min_percent' => 51, 'max_percent' => 75, 'order_index' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'very_strong', 'name_ar' => 'قوي جداً', 'min_percent' => 76, 'max_percent' => 92, 'order_index' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // ترتيب المحاور: الشخصي، الروحاني، الصحي، الاجتماعي، العائلي، الترفيهي، المالي، المهني
        $axes = ['personal', 'spiritual', 'health', 'social', 'family', 'leisure', 'financial', 'career'];
        $W = 'weak'; $M = 'medium'; $S = 'strong'; $V = 'very_strong';
        $matrix = [
            'personal'  => [null, $S, $S, $S, $S, $M, $M, $S],
            'spiritual' => [$S, null, $V, $M, $S, $W, $M, $M],
            'health'    => [$V, $M, null, $M, $S, $S, $S, $V],
            'social'    => [$S, $M, $S, null, $M, $S, $M, $S],
            'family'    => [$V, $M, $S, $M, null, $M, $V, $S],
            'leisure'   => [$S, $W, $M, $S, $S, null, $M, $M],
            'financial' => [$S, $M, $M, $M, $V, $S, null, $S],
            'career'    => [$V, $M, $W, $M, $V, $S, $V, null],
        ];
        $rows = [];
        foreach ($matrix as $source => $levels) {
            foreach ($axes as $i => $target) {
                if ($source === $target) continue;
                $rows[] = ['source_axis' => $source, 'target_axis' => $target, 'level_key' => $levels[$i], 'created_at' => $now, 'updated_at' => $now];
            }
        }
        DB::table('life_wheel_influences')->insert($rows);
    }

    public function down(): void
    {
        Schema::dropIfExists('life_wheel_influences');
        Schema::dropIfExists('life_wheel_influence_levels');
    }
};
