<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChallengeQuestionController extends Controller
{
    public function index()
    {
        $questions = \App\Models\ChallengeQuestion::all();
        return view('admin.challenge_questions.index', compact('questions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:text,pattern',
            'pattern_row' => 'nullable|string',
            'options' => 'required|string',
            'correct_index' => 'required|integer|min:0|max:3',
            'is_active' => 'nullable|boolean',
        ]);

        $data['options'] = array_map('trim', explode(',', $data['options']));
        if ($data['type'] == 'pattern' && !empty($data['pattern_row'])) {
            $data['pattern_row'] = array_map('trim', explode(',', $data['pattern_row']));
        } else {
            $data['pattern_row'] = null;
        }
        $data['is_active'] = $request->has('is_active');

        \App\Models\ChallengeQuestion::create($data);

        return redirect()->route('admin.challenge-questions.index')->with('success', 'تم إضافة السؤال بنجاح');
    }

    public function update(Request $request, \App\Models\ChallengeQuestion $challengeQuestion)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:text,pattern',
            'pattern_row' => 'nullable|string',
            'options' => 'required|string',
            'correct_index' => 'required|integer|min:0|max:3',
            'is_active' => 'nullable|boolean',
        ]);

        $data['options'] = array_map('trim', explode(',', $data['options']));
        if ($data['type'] == 'pattern' && !empty($data['pattern_row'])) {
            $data['pattern_row'] = array_map('trim', explode(',', $data['pattern_row']));
        } else {
            $data['pattern_row'] = null;
        }
        $data['is_active'] = $request->has('is_active');

        $challengeQuestion->update($data);

        return redirect()->route('admin.challenge-questions.index')->with('success', 'تم تعديل السؤال بنجاح');
    }

    public function destroy(\App\Models\ChallengeQuestion $challengeQuestion)
    {
        $challengeQuestion->delete();
        return redirect()->route('admin.challenge-questions.index')->with('success', 'تم حذف السؤال بنجاح');
    }
}
