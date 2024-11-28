<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test::insert([
                'session_id' => 1,
                'player_id' => 1, 
                'configuration_id' => 1, 
                'wpm' => 40, 
                'test_error' => 0, 
                'test_correct' => 10,
                'test_time' => date('00:i:s'),
                'final_score' => 200, 
                'created_at' => date("Y/m/d")
            ]
        );
    }
}
