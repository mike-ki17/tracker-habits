<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Habit;


class HabitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Habit::factory()->create([
            'user_id' => 1, 
            'name' => "Lectura", 
            'description' => "Leer a diario",
            'frequency' => 'daily'
        ]);
    }
}
