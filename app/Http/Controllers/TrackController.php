<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Inertia\Inertia;
use Laravel\Fortify\Features;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        $highestVotedTrack = $tracks->sortByDesc(fn($track) => $track->votes->count())->first();
        if ($highestVotedTrack instanceof Track) {
            $restOfTracks = $tracks->where('id', '!=', $highestVotedTrack?->id)
                ->sortByDesc(fn($track) => $track->votes->count())->values();

            $otherTracksWithTheSameVoteCount = $restOfTracks->filter(fn($track) => $track->votes->count() === $highestVotedTrack?->votes->count());

            if ($otherTracksWithTheSameVoteCount->isNotEmpty()) {
                $highestVotedTracks = collect([$highestVotedTrack])->merge($otherTracksWithTheSameVoteCount);
                // Remove these from the rest of the tracks
                $restOfTracks = $restOfTracks->whereNotIn('id', $highestVotedTracks->pluck('id'))->values();
            } else {
                $highestVotedTracks = collect([$highestVotedTrack]);
            }
        }

        return Inertia::render('Welcome', [
            'canRegister' => Features::enabled(Features::registration()),
            'highestVotedTracks' => $highestVotedTracks ?? [],
            'tracks' => $restOfTracks ?? [],
        ]);
    }
}
