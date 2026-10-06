<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // نسخة واحدة في الطلب: تعديلات المحتوى بتتحمل مرة واحدة
        $this->app->singleton(\App\Services\SiteContentService::class);
    }

    public function boot(): void
    {
        if ($this->app->environment('production') || env('FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();
    }
}
