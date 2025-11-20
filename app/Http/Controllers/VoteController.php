<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'track_id' => 'required|exists:tracks,id',
        ]);

        $user = Auth::user();

        $user->vote()->updateOrCreate(
            ['user_id' => $user->id],
            ['track_id' => $request->input('track_id')]
        );

        return redirect()->back()->with('success', 'Your vote has been recorded.');
    }
}
