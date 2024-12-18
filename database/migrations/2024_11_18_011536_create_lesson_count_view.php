<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW lesson_count_view AS
            SELECT 
                teacher_lesson.teacher_id AS employee_job_id,
                teacher_lesson.subject_level_id,
                COUNT(teacher_lesson.lesson_id) AS lesson_count
            FROM (
                SELECT 
                    teacher_id, subject_level_id, lesson_id
                FROM schedules
                WHERE teacher_id IS NOT NULL
                
                UNION ALL
                
                SELECT 
                    teacher2_id AS teacher_id, subject_level_id, lesson_id
                FROM schedules
                WHERE teacher2_id IS NOT NULL
            ) AS teacher_lesson
            GROUP BY teacher_lesson.teacher_id, teacher_lesson.subject_level_id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_count_view');
    }
};
