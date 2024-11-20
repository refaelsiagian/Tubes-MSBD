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
                r.id,
                e.employee_name AS teacher,
                s.subject_abb AS subject
            FROM 
                schedules sch
            JOIN 
                rooms r ON sch.room_id = r.id
            JOIN 
                employee_jobs ej ON sch.teacher_id = ej.id
            JOIN 
                employees e ON ej.employee_id = e.id
            JOIN 
                subject_levels sl ON sch.subject_level_id = sl.id
            JOIN 
                subjects s ON sl.subject_id = s.id
            GROUP BY 
                r.id, teacher, subject
            ORDER BY 
                r.id;
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
