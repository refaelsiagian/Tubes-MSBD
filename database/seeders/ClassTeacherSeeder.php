<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ClassTeacher;

class ClassTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassTeacher::insert([
            ['class_teacher_id' => 1, 'teacher_id' => 12, 'room_id' => 8],
            ['class_teacher_id' => 2, 'teacher_id' => 15, 'room_id' => 19],
            ['class_teacher_id' => 3, 'teacher_id' => 15, 'room_id' => 20],
            ['class_teacher_id' => 4, 'teacher_id' => 17, 'room_id' => 5],
            ['class_teacher_id' => 5, 'teacher_id' => 21, 'room_id' => 6],
            ['class_teacher_id' => 6, 'teacher_id' => 24, 'room_id' => 13],
            ['class_teacher_id' => 7, 'teacher_id' => 24, 'room_id' => 14],
            ['class_teacher_id' => 8, 'teacher_id' => 26, 'room_id' => 7],
            ['class_teacher_id' => 9, 'teacher_id' => 28, 'room_id' => 9],
            ['class_teacher_id' => 10, 'teacher_id' => 31, 'room_id' => 12],
            ['class_teacher_id' => 11, 'teacher_id' => 34, 'room_id' => 11],
            ['class_teacher_id' => 12, 'teacher_id' => 37, 'room_id' => 4],
            ['class_teacher_id' => 13, 'teacher_id' => 40, 'room_id' => 3],
            ['class_teacher_id' => 14, 'teacher_id' => 42, 'room_id' => 15],
            ['class_teacher_id' => 15, 'teacher_id' => 42, 'room_id' => 16],
            ['class_teacher_id' => 16, 'teacher_id' => 42, 'room_id' => 17],
            ['class_teacher_id' => 17, 'teacher_id' => 44, 'room_id' => 18],
            ['class_teacher_id' => 18, 'teacher_id' => 46, 'room_id' => 1],
            ['class_teacher_id' => 19, 'teacher_id' => 48, 'room_id' => 2],
            ['class_teacher_id' => 20, 'teacher_id' => 52, 'room_id' => 10],
        ]);
    }
}
