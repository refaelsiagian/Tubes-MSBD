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
                s.room_id,
                l.day,
                l.order,
                CASE
                    WHEN l.type_id = 4 THEN sa.subject_abb
                    ELSE lt.desc
                END AS lesson,
                CASE
                    WHEN l.type_id = 4 THEN GROUP_CONCAT(DISTINCT ej.code_name SEPARATOR "/")
                    ELSE NULL
                END AS teacher
            FROM
                schedules s
            LEFT JOIN lessons l ON s.lesson_id = l.lesson_id
            LEFT JOIN lesson_types lt ON l.type_id = lt.type_id
            LEFT JOIN subject_levels sl ON s.subject_level_id = sl.subject_level_id
            LEFT JOIN subjects sa ON sl.subject_id = sa.subject_id
            LEFT JOIN employee_jobs ej ON s.teacher_id = ej.employee_job_id
            LEFT JOIN employees e ON ej.employee_id = e.employee_id
            GROUP BY
                s.room_id, l.day, l.order, l.type_id, sa.subject_abb, lt.desc;
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
