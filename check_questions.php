<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$questions = App\Models\GradedExamQuestion::with('options')->get();
echo "Total questions in DB: " . $questions->count() . "\n";

$count = 0;
foreach ($questions as $q) {
    $text = trim($q->text_ar);
    if (preg_match('/[،,\-:]$/u', $text) || preg_match('/\.\.\.$/', $text) || mb_strlen($text) < 20) {
        echo "Q#{$q->original_number}: {$text}\n";
        $count++;
    }
}
echo "Total flagged: $count\n";
