<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Track;
use App\Services\TrackService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrackServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_tracks_with_vote_stats_gets_highest_voted_track()
    {
        $highestVotedTrack = Track::factory()->withVotes(10)->create();
        $otherTracks = Track::factory(5)->withVotes()->create();

        $service = new TrackService();
        $stats = $service->getTracksWithVoteStats();

        $this->assertCount(1, $stats['highestVotedTracks']);
        $this->assertTrue($stats['highestVotedTracks']->contains('id', $highestVotedTrack->id));

        $this->assertEquals($otherTracks->first()->id, $stats['tracks']->first()->id);
        $this->assertNotContains($highestVotedTrack, $stats['tracks']);
    }

    public function test_get_tracks_with_vote_stats_gets_multiple_highest_voted_tracks()
    {
        $highestVotedTrack = Track::factory()->withVotes(10)->create();
        $otherHighestVotedTrack = Track::factory()->withVotes(10)->create();

        $service = new TrackService();
        $stats = $service->getTracksWithVoteStats();

        $this->assertCount(2, $stats['highestVotedTracks']);
        $this->assertTrue($stats['highestVotedTracks']->contains('id', $highestVotedTrack->id));
        $this->assertTrue($stats['highestVotedTracks']->contains('id', $otherHighestVotedTrack->id));
        $this->assertNotContains($highestVotedTrack, $stats['tracks']);
        $this->assertNotContains($otherHighestVotedTrack, $stats['tracks']);
    }
}
