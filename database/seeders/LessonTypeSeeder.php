<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\LessonType;

class LessonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LessonType::insert([
            ['desc' => 'Upacara', 'duration' => 40],
            ['desc' => 'Istirahat', 'duration' => 20],
            ['desc' => 'Senam', 'duration' => 40],
            ['desc' => 'Pembelajaran', 'duration' => 40],
        ]);
    }
}
