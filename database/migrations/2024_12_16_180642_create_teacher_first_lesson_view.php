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
            CREATE VIEW teacher_first_lesson AS
            SELECT 
                employee_job_id,
                day,
                MIN(final_start_time) AS first_start_time
            FROM (
                -- Ambil teacher_id
                SELECT 
                    s.teacher_id AS employee_job_id,
                    st.day,
                    COALESCE(st.start_time, dt.start_time) AS final_start_time
                FROM schedules s
                JOIN schedule_time_view st ON s.lesson_id = st.lesson_id
                LEFT JOIN day_times dt ON st.day = dt.day
                WHERE s.teacher_id IS NOT NULL

                UNION

                -- Ambil teacher2_id
                SELECT 
                    s.teacher2_id AS employee_job_id,
                    st.day,
                    COALESCE(st.start_time, dt.start_time) AS final_start_time
                FROM schedules s
                JOIN schedule_time_view st ON s.lesson_id = st.lesson_id
                LEFT JOIN day_times dt ON st.day = dt.day
                WHERE s.teacher2_id IS NOT NULL
            ) AS combined_teachers
            GROUP BY employee_job_id, day;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_first_lesson_view');
    }
};
