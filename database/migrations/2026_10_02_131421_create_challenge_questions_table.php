<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('challenge_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('type')->default('pattern'); // 'pattern' or 'text'
            $table->json('pattern_row')->nullable(); // e.g. ['2-vert', '4-grid', '2-vert', 'question']
            $table->json('options'); // e.g. ['3-tr', '3-tl', '2-diag', '2-horiz']
            $table->integer('correct_index')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_questions');
    }
};
