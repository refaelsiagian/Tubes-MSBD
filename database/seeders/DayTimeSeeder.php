<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('day_times')->insert([
            ['day' => 'Senin', 'start_time' => '07:30:00'],
            ['day' => 'Selasa', 'start_time' => '07:30:00'],
            ['day' => 'Rabu', 'start_time' => '07:30:00'],
            ['day' => 'Kamis', 'start_time' => '07:30:00'],
            ['day' => 'Jumat', 'start_time' => '07:30:00'],
            ['day' => 'Sabtu', 'start_time' => '07:30:00'],
        ]);
    }
}
