<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Session::insert(
            [
                'session_name' => 'Sessão 1',
                'created_at' => date("Y/m/d")
                ]
        );

        Session::insert(
            [
                'session_name' => 'Sessão 2',
                'created_at' => date("Y/m/d")
                ]
        );

        Session::insert(
            [
                'session_name' => 'Sessão 3',
                'created_at' => date("Y/m/d")
                ]
        );

        Session::insert(
            [
                'session_name' => 'Sessão 4',
                'created_at' => date("Y/m/d")
                ]
        );

        Session::insert(
            [
                'session_name' => 'Sessão 5',
                'created_at' => date("Y/m/d")
                ]
        );

        Session::insert(
            [
                'session_name' => 'Sessão 6',
                'created_at' => date("Y/m/d")
                ]
        );
    }
}
