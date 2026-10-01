<?php

namespace App\Http\Controllers;

use App\Services\LifeWheelService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LifeWheelController extends Controller
{
    public function __construct(
        private readonly LifeWheelService $lifeWheel,
    ) {}

    /**
     * Save the signed-in user's finished wheel-of-life test (answers come from the landing test, 8 x 10, values 0..4).
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'answers' => ['required', 'array', 'size:8'],
            'answers.*' => ['required', 'array', 'size:10'],
            'answers.*.*' => ['required', 'integer', 'between:0,4'],
        ]);

        $session = $this->lifeWheel->saveAnswers($request->user(), $data['answers']);

        return response()->json([
            'ok' => true,
            'session_id' => $session->id,
            'user_id' => $request->user()->id,
            'redirect' => route('life-wheel.details'),
        ]);
    }

    /**
     * "تفاصيل الجوانب": the user's saved result, per aspect and per sub-aspect.
     */
    public function details(Request $request): View
    {
        $result = $this->lifeWheel->resultFor($request->user());

        $aspects = collect(require resource_path('data/life-wheel-aspects.php'))
            ->keyBy('key')
            ->map(function (array $aspect) use ($result) {
                $mine = $result['aspects'][$aspect['key']] ?? null;
                $aspect['percent'] = $mine['percent'] ?? 0;
                foreach ($aspect['subs'] as $i => $sub) {
                    $aspect['subs'][$i]['value'] = $mine['subs'][$i] ?? 0;
                }

                return $aspect;
            });

        return view('landing.life-wheel-details', [
            'aspects' => $aspects,
            'hasResult' => $result !== null,
        ]);
    }
}
