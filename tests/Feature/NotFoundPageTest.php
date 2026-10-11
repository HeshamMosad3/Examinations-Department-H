<?php

namespace Tests\Feature;

use Tests\TestCase;

class NotFoundPageTest extends TestCase
{
    public function test_unknown_pages_show_the_branded_404_with_home_and_back_actions(): void
    {
        $this->get('/no-such-page')
            ->assertNotFound()
            ->assertSee('خطأ 404', false)
            ->assertSee('عذرًا، الصفحة غير موجودة')
            ->assertSee('href="' . route('home') . '"', false)
            ->assertSee('data-go-back', false)
            ->assertSee('noindex', false);
    }

    public function test_api_style_requests_still_get_json_404s(): void
    {
        $this->getJson('/no-such-page')->assertNotFound()->assertJsonStructure(['message']);
    }
}
