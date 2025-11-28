<?php

namespace Tests\Feature;

use App\Models\Track;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_guests_are_redirected_to_the_login_page()
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_visit_the_dashboard()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('dashboard'));
        $response->assertStatus(200);
    }

    public function test_dashboard_displays_tracks()
    {
        $this->actingAs($this->user);
        $track = Track::factory()->create();

        $response = $this->get(route('dashboard'));
        $response->assertSee($track->name);
    }

    public function test_user_can_vote_for_track()
    {
        $this->actingAs($this->user);
        $track = Track::factory()->create();

        $response = $this->followingRedirects()->post(route('vote.store'), [
            'track_id' => $track->id
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('votes', [
            'track_id' => $track->id,
            'user_id' => $this->user->id
        ]);
    }
}
