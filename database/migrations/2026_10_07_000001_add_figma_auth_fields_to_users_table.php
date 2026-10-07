<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('name');
            $table->string('father_name')->nullable()->after('first_name');
            $table->string('grandfather_name')->nullable()->after('father_name');
            $table->string('last_name')->nullable()->after('grandfather_name');
            $table->string('identity_type')->nullable()->after('nationality');
        });

        if (!Schema::hasTable('password_reset_otps')) {
            Schema::create('password_reset_otps', function (Blueprint $table) {
                $table->id();
                $table->string('email')->index();
                $table->string('otp', 10);
                $table->string('token')->nullable();
                $table->timestamp('expires_at');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'father_name', 'grandfather_name', 'last_name', 'identity_type']);
        });

        Schema::dropIfExists('password_reset_otps');
    }
};
