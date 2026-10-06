<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * محتوى صفحات الموقع اللي الأدمن عدّله. النص الأصلي مكتوب في الصفحة نفسها (cms('key', 'النص'))،
 * والجدول ده فيه التعديلات بس: لو الحقل مش موجود هنا الصفحة بتعرض النص الأصلي.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();
            $table->string('key', 191)->unique();
            $table->longText('value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_contents');
    }
};
