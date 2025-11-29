<?php

namespace App\Services;

use App\Models\Track;

class TrackService
{
    public function getTracksWithVoteStats()
    {
        $tracks = Track::withCount('votes')->get();

        $maxVotes = $tracks->max('votes_count');

        $highestVotedTracks = $tracks->where('votes_count', $maxVotes)->values();

        $restOfTracks = $tracks->where('votes_count', '<', $maxVotes)
            ->sortByDesc('votes_count')
            ->values();

        return [
            'highestVotedTracks' => $highestVotedTracks,
            'tracks' => $restOfTracks,
        ];
    }
}
