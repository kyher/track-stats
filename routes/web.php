<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

Route::get('/', TrackController::class)->name('home');

Route::get('dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/vote', [VoteController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('vote.store');

require __DIR__ . '/settings.php';
