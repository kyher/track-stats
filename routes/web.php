<?php

use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Track;
use App\Http\Controllers\VoteController;

Route::get('/', [TrackController::class, 'index'])->name('home');

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
