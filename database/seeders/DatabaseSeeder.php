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
            LevelSeeder::class,
            SubjectSeeder::class,
            LessonTypeSeeder::class,
            SemesterSeeder::class,
            JobSeeder::class,
            EmployeeSeeder::class,
            MajorSeeder::class,
            LessonSeeder::class,
            RoomSeeder::class,
            EmployeeJobSeeder::class,
            ClassTeacherSeeder::class,
            SubjectLevelSeeder::class,
            ScheduleSeeder::class
        ]);
    }
}
