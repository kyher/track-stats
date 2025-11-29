<?php

namespace App\Http\Controllers;

use App\Services\TrackService;
use Inertia\Inertia;
use Laravel\Fortify\Features;

class TrackController extends Controller
{
    public function __invoke(TrackService $trackService)
    {
        $stats = $trackService->getTracksWithVoteStats();

        return Inertia::render('Welcome', [
            'canRegister' => Features::enabled(Features::registration()),
            'highestVotedTracks' => $stats['highestVotedTracks'],
            'tracks' => $stats['tracks'],
        ]);
    }
}
