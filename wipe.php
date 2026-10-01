<?php
use App\Models\Assessment;
$assessment = Assessment::where('category', 'عجلة الحياة')->first();
if ($assessment) {
    $assessment->questions()->delete();
    echo "Deleted old questions\n";
}