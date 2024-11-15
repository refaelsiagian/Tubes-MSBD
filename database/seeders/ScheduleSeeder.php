<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            ['schedule_id' => 1, 'subject_level_id' => 1, 'lesson_id' => 2, 'teacher_id' => 47, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 2, 'subject_level_id' => 1, 'lesson_id' => 3, 'teacher_id' => 47, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 3, 'subject_level_id' => 2, 'lesson_id' => 5, 'teacher_id' => 16, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 4, 'subject_level_id' => 3, 'lesson_id' => 6, 'teacher_id' => 51, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 5, 'subject_level_id' => 4, 'lesson_id' => 8, 'teacher_id' => 40, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 6, 'subject_level_id' => 5, 'lesson_id' => 10, 'teacher_id' => 37, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 7, 'subject_level_id' => 5, 'lesson_id' => 11, 'teacher_id' => 37, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 8, 'subject_level_id' => 2, 'lesson_id' => 12, 'teacher_id' => 16, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 9, 'subject_level_id' => 7, 'lesson_id' => 14, 'teacher_id' => 20, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 10, 'subject_level_id' => 8, 'lesson_id' => 15, 'teacher_id' => 19, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 11, 'subject_level_id' => 8, 'lesson_id' => 17, 'teacher_id' => 19, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 12, 'subject_level_id' => 4, 'lesson_id' => 19, 'teacher_id' => 39, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 13, 'subject_level_id' => 4, 'lesson_id' => 20, 'teacher_id' => 39, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 14, 'subject_level_id' => 9, 'lesson_id' => 21, 'teacher_id' => 22, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 15, 'subject_level_id' => 9, 'lesson_id' => 23, 'teacher_id' => 22, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 16, 'subject_level_id' => 9, 'lesson_id' => 21, 'teacher_id' => 20, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 17, 'subject_level_id' => 9, 'lesson_id' => 23, 'teacher_id' => 20, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 18, 'subject_level_id' => 10, 'lesson_id' => 24, 'teacher_id' => 38, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 19, 'subject_level_id' => 10, 'lesson_id' => 26, 'teacher_id' => 38, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 20, 'subject_level_id' => 1, 'lesson_id' => 28, 'teacher_id' => 47, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 21, 'subject_level_id' => 1, 'lesson_id' => 29, 'teacher_id' => 47, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 22, 'subject_level_id' => 2, 'lesson_id' => 30, 'teacher_id' => 16, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 23, 'subject_level_id' => 8, 'lesson_id' => 32, 'teacher_id' => 19, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 24, 'subject_level_id' => 7, 'lesson_id' => 33, 'teacher_id' => 20, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 25, 'subject_level_id' => 6, 'lesson_id' => 38, 'teacher_id' => 7, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 26, 'subject_level_id' => 6, 'lesson_id' => 39, 'teacher_id' => 7, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 27, 'subject_level_id' => 11, 'lesson_id' => 41, 'teacher_id' => 16, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 28, 'subject_level_id' => 1, 'lesson_id' => 42, 'teacher_id' => 47, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 29, 'subject_level_id' => 2, 'lesson_id' => 44, 'teacher_id' => 16, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 30, 'subject_level_id' => 3, 'lesson_id' => 45, 'teacher_id' => 51, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 31, 'subject_level_id' => 3, 'lesson_id' => 47, 'teacher_id' => 51, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 32, 'subject_level_id' => 11, 'lesson_id' => 48, 'teacher_id' => 16, 'room_id' => 1, 'semester_id' => 1],
            ['schedule_id' => 33, 'subject_level_id' => 4, 'lesson_id' => 50, 'teacher_id' => 39, 'room_id' => 1, 'semester_id' => 1],
        ]);
    }
}
