<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** اسم العمود القديم => اسم هيكل المشروع */
    private const RENAMES = [
        'grandfather_name' => 'grand_father_name',
        'national_id' => 'id_number',
        'phone' => 'phone_number',
        'qualification' => 'edu_qualification',
        'job_status' => 'functional_status',
        'heard_from' => 'how_you_reached_us',
        'birth_date' => 'date_birth',
        'employer' => 'place_of_work',
        'photo' => 'logo',
    ];

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            foreach (self::RENAMES as $old => $new) {
                $table->renameColumn($old, $new);
            }
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->boolean('status')->default(true);
            $table->boolean('is_profile_complete')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['status', 'is_profile_complete']);
            $table->string('role', 20)->default('user');
        });

        Schema::table('users', function (Blueprint $table) {
            foreach (self::RENAMES as $old => $new) {
                $table->renameColumn($new, $old);
            }
        });
    }
};
