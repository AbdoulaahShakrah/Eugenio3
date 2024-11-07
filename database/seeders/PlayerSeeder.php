<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 1
            ]
        );

        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 1
            ]
        );

        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 1
            ]
        );

        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 1
            ]
        );

        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 1
            ]
        );


        // session 2

        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 2
            ]
        );

        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 2
            ]
        );
        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 2
            ]
        );
        Player::insert(
            [
                'player_name' => fake()->name(),
                'session_id' => 2
            ]
        );
            
    }
}
