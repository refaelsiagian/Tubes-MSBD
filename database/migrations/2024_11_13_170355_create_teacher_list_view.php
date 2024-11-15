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
            CREATE VIEW teacher_list_view AS
            SELECT 
                DISTINCT CONCAT(r.grade, '-', COALESCE(r.subclass, '')) AS class,
                e.employee_name AS teacher,
                s.subject_abb AS subject
            FROM 
                schedules sch
            JOIN 
                rooms r ON sch.room_id = r.room_id
            JOIN 
                employee_jobs ej ON sch.teacher_id = ej.employee_job_id
            JOIN 
                employees e ON ej.employee_id = e.employee_id
            JOIN 
                subject_levels sl ON sch.subject_level_id = sl.subject_level_id
            JOIN 
                subjects s ON sl.subject_id = s.subject_id
            GROUP BY 
                class, teacher, subject
            ORDER BY 
                r.room_id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS teacher_list_view');
    }
};
