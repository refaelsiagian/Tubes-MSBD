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
            CREATE VIEW teacher_salary_view AS
            SELECT 
                lc.employee_job_id,
                SUM(l.rates_per_lesson * lc.lesson_count) AS salary
            FROM 
                lesson_count_view lc
            JOIN 
                subject_levels sl ON lc.subject_level_id = sl.id
            JOIN 
                levels l ON sl.level_id = l.id
            GROUP BY 
                lc.employee_job_id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_salary_view');
    }
};
