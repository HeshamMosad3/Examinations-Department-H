<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * محاولات المستخدمين في المقاييس: الإجابات، والدرجة الكلية، ودرجة كل محور ومستواه. مفيش foreign keys.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('assessment_id')->index();
            $table->integer('total_score')->default(0);
            $table->integer('max_score')->default(0);
            $table->unsignedTinyInteger('percent')->default(0);
            $table->unsignedBigInteger('level_id')->nullable();
            $table->timestamp('completed_at')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('attempt_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attempt_id')->index();
            $table->unsignedBigInteger('question_id')->index();
            $table->unsignedBigInteger('option_id')->nullable();
            $table->integer('score')->default(0);
            $table->unique(['attempt_id', 'question_id']);
        });

        Schema::create('attempt_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attempt_id')->index();
            $table->unsignedBigInteger('dimension_id')->index();
            $table->integer('score')->default(0);
            $table->integer('max_score')->default(0);
            $table->unsignedTinyInteger('percent')->default(0);
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unique(['attempt_id', 'dimension_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attempt_scores');
        Schema::dropIfExists('attempt_answers');
        Schema::dropIfExists('attempts');
    }
};
