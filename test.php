<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
try {
    echo view('landing.assessment-results-figma')->render();
} catch (\Throwable $e) {
    echo "ERROR: " . $e->getMessage();
}