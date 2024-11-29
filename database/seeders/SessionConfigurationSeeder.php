<?php

namespace Database\Seeders;

use App\Models\Configuration;
use App\Models\Session;
use App\Models\SessionConfiguration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions = Session::all();
        $configurations = Configuration::all();


        foreach($sessions as $session){

            foreach($configurations as $configuration){
                if(rand(0, 1) == 1) SessionConfiguration::insert(['session_id' => $session->session_id, 'configuration_id' => $configuration->configuration_id]);
            }
        }
    }
}
