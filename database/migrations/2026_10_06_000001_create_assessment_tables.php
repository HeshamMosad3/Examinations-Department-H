<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * المقاييس وكل محتواها. مفيش foreign keys: الربط بالأعمدة *_id (عليها index) والكويريز بتستخدم join.
 *
 * assessment → dimensions (محاور، وممكن محاور فرعية عن طريق parent_id) → questions → answer_options
 * result_levels: مستويات النتيجة وتفسيرها وتوصياتها، للمقياس كله (dimension_id = null) أو لمحور معين.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('code', 60)->unique();             // ثابت بيستخدمه الكود: wheel_of_life, perceptual_styles ...
            $table->string('title_ar');
            $table->string('subtitle_ar')->nullable();
            $table->string('category')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('instructions_ar')->nullable();
            $table->string('scoring_type', 30)->default('sum');   // sum | dominant_style
            $table->string('level_basis', 10)->default('score');  // المستويات بتتحسب على: score | percent
            $table->unsignedSmallInteger('time_limit_min')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->string('image_url')->nullable();
            $table->string('report_code', 60)->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('order_index')->default(0);
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessment_id')->index();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->string('code', 60)->nullable();
            $table->string('name_ar');
            $table->text('description_ar')->nullable();
            $table->boolean('reverse_in_total')->default(false);  // درجته بتتعكس في الدرجة الكلية (زي العصابية)
            $table->unsignedInteger('order_index')->default(0);
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessment_id')->index();
            $table->unsignedBigInteger('dimension_id')->nullable()->index();
            $table->text('text_ar');
            $table->boolean('is_reversed')->default(false);
            $table->unsignedInteger('order_index')->default(0);
            $table->timestamps();
        });

        Schema::create('answer_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id')->index();
            $table->string('label_ar');
            $table->integer('score_value')->default(0);
            $table->unsignedInteger('order_index')->default(0);
            $table->timestamps();
        });

        Schema::create('result_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessment_id')->index();
            $table->unsignedBigInteger('dimension_id')->nullable()->index();  // null = نتيجة المقياس كله
            $table->string('code', 60)->nullable();           // low/medium/high أو visual/balanced ... لنوع dominant_style
            $table->string('title_ar');
            $table->integer('min_score')->nullable();
            $table->integer('max_score')->nullable();
            $table->text('summary_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->json('strengths')->nullable();
            $table->json('development_areas')->nullable();
            $table->json('how_to_learn')->nullable();
            $table->json('practical_tips')->nullable();
            $table->text('programs_intro_ar')->nullable();
            $table->json('programs')->nullable();             // [{title, subtitle?, icon?}]
            $table->text('programs_outro_ar')->nullable();
            $table->unsignedInteger('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('result_levels');
        Schema::dropIfExists('answer_options');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('dimensions');
        Schema::dropIfExists('assessments');
    }
};
