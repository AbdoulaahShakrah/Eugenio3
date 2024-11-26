<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_name' => fake()->text(20),
            'created_at' => date("Y-m-d", rand(strtotime('2020-01-01'), strtotime('2024-11-26'))),
            'updated_at' => null,
        ];
    }
}
