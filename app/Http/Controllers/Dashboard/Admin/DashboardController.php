<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\Admin\Assessments\AssessmentManager;
use App\Services\Website\Assessments\AttemptService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(AssessmentManager $manager, AttemptService $attempts): View
    {
        $assessments = $manager->listing();

        return view('dashboard.admin.dashboard', [
            'stats' => [
                'assessments' => $assessments->count(),
                'active' => $assessments->where('is_active', true)->count(),
                'users' => DB::table('users')->count(),
                'attempts' => DB::table('attempts')->count(),
            ],
            'assessments' => $assessments,
            'recent' => $attempts->recent(),
        ]);
    }
}
