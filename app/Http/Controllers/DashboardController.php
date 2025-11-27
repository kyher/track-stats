<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Dashboard', [
            'tracks' => Track::all(),
            'userVote' => auth()->user()->vote ?? null,
        ]);
    }
}
