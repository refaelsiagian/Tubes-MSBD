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
        DB::statement('
            CREATE VIEW schedules_view AS
            SELECT 
                CASE 
                    WHEN r.subclass IS NOT NULL AND r.subclass != "" THEN CONCAT(r.grade, "-", r.subclass)
                    ELSE r.grade
                END AS class,
                l.day,
                l.order,
                CASE 
                    WHEN lt.type_id = 4 THEN s.subject_abb
                    ELSE lt.desc
                END AS lesson,
                GROUP_CONCAT(ej.code_name SEPARATOR " / ") AS teacher
            FROM schedules sch
            JOIN subject_levels sl ON sch.subject_level_id = sl.subject_level_id
            JOIN subjects s ON sl.subject_id = s.subject_id
            JOIN lessons l ON sch.lesson_id = l.lesson_id
            JOIN lesson_types lt ON l.type_id = lt.type_id
            JOIN rooms r ON sch.room_id = r.room_id
            JOIN employee_jobs ej ON sch.teacher_id = ej.employee_job_id
            JOIN employees e ON ej.employee_id = e.employee_id
            GROUP BY 
                class, l.day, l.order, lesson
            ORDER BY 
                FIELD(l.day, "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"),
                l.order;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS schedules_view');
    }
};
