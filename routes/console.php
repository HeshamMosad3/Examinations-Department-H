<?php

// أوامر الـ CLI المخصصة (لا يوجد حاليًا أوامر مجدولة)

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// update git