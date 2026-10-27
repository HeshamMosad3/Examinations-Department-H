# Authentication Guards
using (web , admin)

auth('web')->user() 
and
auth('admin')->user()
---------------------------------
using role by package 
(spatie/laravel-permission )

enum UserRoleEnum: string
{
    case SUPER_ADMIN = 'Super_Admin';
    case ADMIN = 'Admin';
    case ADMISSION = 'Admission';
    case TEACHER = 'Teacher';
    case SUPPORT = 'Support';
    case TRAINEES = 'Trainees';
}

Role::updateOrCreate(['guard_name' => 'admin', 'name' => UserRoleEnum::SUPER_ADMIN->value]);
Role::updateOrCreate(['guard_name' => 'admin', 'name' => UserRoleEnum::ADMIN->value]);
Role::updateOrCreate(['guard_name' => 'admin', 'name' => UserRoleEnum::ADMISSION->value]);
Role::updateOrCreate(['guard_name' => 'admin', 'name' => UserRoleEnum::TEACHER->value]);
Role::updateOrCreate(['guard_name' => 'admin', 'name' => UserRoleEnum::SUPPORT->value]);
Role::updateOrCreate(['guard_name' => 'web', 'name' => UserRoleEnum::TRAINEES->value]);

--------------------------users table for trainees--------------------------------------
    protected $fillable = [
        'name_en',
        'first_name',
        'father_name',
        'grand_father_name',
        'last_name',
        'email',
        'password',
        'nationality_id',
        'place_housing_id',
        'id_number',
        'phone_number',
        'whatsapp',
        'logo',
        'gender',
        'edu_qualification',
        'functional_status',
        'how_you_reached_us',
        'status',
        'date_birth',
        'place_of_work',
        'job_title',
        'is_profile_complete',
    ];

--------------------------admins table for admins--------------------------------------

    protected $fillable = [
        'user_name',
        'name',
        'email',
        'password',
        'id_number',
        'phone_number',
        'logo',
        'edu_degree',
        'address',
        'about_me',
        'status',
        'is_show_in_teachers_home_page',
    ];

--------------------------general_settings table for the project--------------------------------------
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('string');
            $table->string('group')->default('general');
            $table->softDeletes();
            $table->timestamps();
        });

enum SettingsGroupsEnum: string
{
    case GENERAL_GROUP = 'general';
    case COUNTERS_GROUP = 'counters';
    case COMMON_GROUP = 'commons';
}

-----------------------------------------------------------------------------------------

// structure folder for the project
app/
    Enums
    Traits
    Http/
        Controllers/
             Dashboard/
                 Admin
                 Trainees
             Website/
        Repositories/
            Dashboard/
              Admin
              Trainees
            Website/
        Services/
            Dashboard/
              Admin
              Trainees
            Website/
-------------------------------------
 public/
    assets/
        dashboard/
            css
            js
        website/
            css
            js
            images

----------------------------------------
resources/
    views/
        dashboard/
            admin/
            trainees/
        website/

-----------------------------------------------------------------



