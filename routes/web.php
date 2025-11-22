<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Models\Track;
use App\Http\Controllers\VoteController;

Route::get('/', function () {
    $tracks = Track::all();
    $highestVotedTrack = $tracks->sortByDesc(fn($track) => $track->votes->count())->first();
    $restOfTracks = $tracks->where('id', '!=', $highestVotedTrack?->id)
        ->sortByDesc(fn($track) => $track->votes->count())->values();

    $otherTracksWithTheSameVoteCount = $restOfTracks->filter(fn($track) => $track->votes->count() === $highestVotedTrack->votes->count());

    if ($otherTracksWithTheSameVoteCount->isNotEmpty()) {
        $highestVotedTracks = collect([$highestVotedTrack])->merge($otherTracksWithTheSameVoteCount);
        // Remove these from the rest of the tracks
        $restOfTracks = $restOfTracks->whereNotIn('id', $highestVotedTracks->pluck('id'))->values();
    } else {
        $highestVotedTracks = collect([$highestVotedTrack]);
    }

    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
        'highestVotedTracks' => $highestVotedTracks,
        'tracks' => $restOfTracks,
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard', [
        'tracks' => Track::all(),
        'userVote' => auth()->user()->vote ?? null,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/vote', [VoteController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('vote.store');

require __DIR__ . '/settings.php';
