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
        $this->call([
            RoleSeeder::class,
            DayTimeSeeder::class,
            LevelSeeder::class,
            SubjectSeeder::class,
            LessonTypeSeeder::class,
            JobSeeder::class,
            EmployeeSeeder::class,
            MajorSeeder::class,
            LessonSeeder::class,
            RoomSeeder::class,
            UserSeeder::class,
            EmployeeJobSeeder::class,
            SubjectLevelSeeder::class,
            ScheduleSeeder::class,
            // PresenceSeeder::class,
            FineSeeder::class,
            PenaltySeeder::class
        ]);
    }
}
