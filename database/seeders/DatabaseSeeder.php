<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SessionSeeder::class);
        $this->call(ConfigurationSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(SessionConfigurationSeeder::class);
    }
}
