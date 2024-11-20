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
                s.teacher_id AS employee_job_id,
                sl.id AS subject_level_id,
                COUNT(s.lesson_id) AS lesson_count
            FROM 
                schedules s
            JOIN 
                subject_levels sl ON s.subject_level_id = sl.id
            WHERE 
                s.teacher_id IS NOT NULL -- Hanya menghitung lesson yang memiliki teacher
            GROUP BY 
                s.teacher_id, sl.id;
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
