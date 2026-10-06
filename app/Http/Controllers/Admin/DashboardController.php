<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Assessments\AssessmentManager;
use App\Services\Assessments\AttemptService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(AssessmentManager $manager, AttemptService $attempts): View
    {
        $assessments = $manager->listing();

        return view('admin.dashboard', [
            'stats' => [
                'assessments' => $assessments->count(),
                'active' => $assessments->where('is_active', true)->count(),
                'users' => DB::table('users')->where('role', 'user')->count(),
                'attempts' => DB::table('attempts')->count(),
            ],
            'assessments' => $assessments,
            'recent' => $attempts->recent(),
        ]);
    }
}
