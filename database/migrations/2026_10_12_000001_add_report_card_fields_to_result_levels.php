<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** حقلان لتقرير الأنماط الإدراكية الجديد: عنوان كارت الاستراتيجيات (بيحتوي اسم النمط) ونص كارت «تذكّر» */
    public function up(): void
    {
        Schema::table('result_levels', function (Blueprint $table) {
            $table->string('strategies_title_ar')->nullable()->after('how_to_learn');
            $table->text('remember_ar')->nullable()->after('practical_tips');
        });
    }

    public function down(): void
    {
        Schema::table('result_levels', function (Blueprint $table) {
            $table->dropColumn(['strategies_title_ar', 'remember_ar']);
        });
    }
};
