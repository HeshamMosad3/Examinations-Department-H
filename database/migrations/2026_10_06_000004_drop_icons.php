<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * إدارة الأيقونات اتشالت. قاعدة البيانات اللي اتعملت قبل كده فيها جدول icons وعمود assessments.icon_id، فبيتمسحوا هنا
 * (في قاعدة بيانات جديدة مش موجودين أصلًا).
 */
return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('assessments', 'icon_id')) {
            Schema::table('assessments', function (Blueprint $table) {
                $table->dropIndex(['icon_id']);
                $table->dropColumn('icon_id');
            });
        }
        Schema::dropIfExists('icons');
    }

    public function down(): void
    {
        // مفيش رجوع: الأيقونات اتشالت من النظام
    }
};
