<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vote;
use App\Models\Track;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a pool of users
        $users = User::factory()->count(100)->create();

        $tracks = Track::all();

        foreach ($tracks as $track) {
            $voteCount = rand(5, 20);

            // Assign votes to random users from the pool
            $userIds = $users->random($voteCount)->pluck('id');

            foreach ($userIds as $userId) {
                Vote::factory()->create([
                    'track_id' => $track->id,
                    'user_id' => $userId,
                ]);
            }
        }
    }
}
