<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configuration::insert(
                        [
                                    'configuration_title' => 'Configuração 1',
                                    'configuration_time' => date("00:i:s"),
                                    'configuration_text' => 'Texto de Configuração 1'

                                ]
                            );

        Configuration::insert(
                        [
                                    'configuration_title' => 'Configuração 2',
                                    'configuration_time' => date("00:i:s"),
                                    'configuration_text' => 'Texto de Configuração 2'

                                ]
                            );
        
        Configuration::insert(
                        [
                                    'configuration_title' => 'Configuração 3',
                                    'configuration_time' => date("00:i:s"),
                                    'configuration_text' => 'Texto de Configuração 3'

                                ]
                            );

        Configuration::insert(
                        [
                                    'configuration_title' => 'Configuração 4',
                                    'configuration_time' => date("00:i:s"),
                                    'configuration_text' => 'Texto de Configuração 4'

                                ]
                            );
    }
}
