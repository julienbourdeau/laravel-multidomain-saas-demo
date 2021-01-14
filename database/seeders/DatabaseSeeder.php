<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $mainTeam = Team::factory([
            'name' => 'Paris',
            'user_id' => User::factory([
                'name' => 'Julien Bourdeau',
                'email' => 'julienbourdeau@hey.com'
            ])->withPersonalTeam()
        ])->create();

        Post::factory([
            'user_id' => $mainTeam->user_id,
            'team_id' => $mainTeam->owner->personalTeam()->id,
        ])->create();

        Post::factory(3, [
            'user_id' => $mainTeam->user_id,
            'team_id' => $mainTeam->id,
            'thumbnail' => '/paris.jpg'
        ])->create();

        Post::factory(32)->create();

        $mainTeam->owner->switchTeam($mainTeam);
    }
}
