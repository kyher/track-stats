<?php

namespace Tests\Feature;

use App\Models\Track;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_tracks_are_displayed()
    {
        $track = Track::factory()->create();
        $response = $this->get(route('home'));
        $response->assertSee($track->name);
    }
}
