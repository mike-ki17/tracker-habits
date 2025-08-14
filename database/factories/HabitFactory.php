<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // genera automáticamente un usuario si no existe
            'name' => fake()->sentence(3), // nombre de hábito aleatorio
            'description' => fake()->name(),
            'frequency' => fake()->randomElement(['daily', 'weekly', 'monthly']),
        ];
    }
}
