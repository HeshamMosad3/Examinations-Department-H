<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\User;
use App\Services\Website\Assessments\AttemptService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $users,
        private readonly AttemptService $attempts,
    ) {}

    public function index(Request $request): View
    {
        return view('admin.users.index', [
            'users' => $this->users->paginate($request->query('search')),
        ]);
    }

    public function show(User $user): View
    {
        return view('admin.users.show', ['user' => $user, 'attempts' => $this->attempts->forUser($user->id)]);
    }

    /** تفاصيل محاولة: درجة كل محور ومستواه */
    public function attempt(Attempt $attempt): View
    {
        $info = DB::table('attempts as a')
            ->join('users as u', 'u.id', '=', 'a.user_id')
            ->join('assessments as s', 's.id', '=', 'a.assessment_id')
            ->leftJoin('result_levels as l', 'l.id', '=', 'a.level_id')
            ->where('a.id', $attempt->id)
            ->first(['a.*', 'u.name as user_name', 's.title_ar as assessment_title', 's.id as assessment_id', 'l.title_ar as level_title', 'l.summary_ar as level_summary', 'l.description_ar as level_description']);

        return view('admin.users.attempt', ['attempt' => $info, 'scores' => $this->attempts->scoresOf($attempt->id)]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->users->delete($user);

        return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم ومحاولاته.');
    }
}
