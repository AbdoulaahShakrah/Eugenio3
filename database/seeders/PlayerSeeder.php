<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Session::all() as $session){
            Player::factory(5)
                            ->create([
                                            'session_id' => $session->session_id, 
                                            'created_at' => $session->created_at
                                        ]
                                    );
        }
    }
}
