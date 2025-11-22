<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tracks = \App\Models\Track::all();

        foreach ($tracks as $track) {
            // Each track gets a random number of votes between 5 and 20
            $voteCount = rand(5, 20);
            for ($i = 0; $i < $voteCount; $i++) {
                Vote::factory()->create([
                    'track_id' => $track->id,
                    'user_id' => User::factory()->create()->id,
                ]);
            }
        }
    }
}
