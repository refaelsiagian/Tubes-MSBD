<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Level::insert([
            ['level_name' => 'smp', 'rates_per_lesson' => 30000],
            ['level_name' => 'sma', 'rates_per_lesson' => 40000],
            ['level_name' => 'smk', 'rates_per_lesson' => 40000],
        ]);
    }
}
