<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Models\Track;
use App\Http\Controllers\VoteController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
        'tracks' => Track::all(),
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
