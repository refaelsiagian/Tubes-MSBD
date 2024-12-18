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
            CREATE VIEW teacher_all_lessons_view AS
            SELECT 
                combined_teachers.employee_job_id,
                combined_teachers.day, -- Disambiguate here
                combined_teachers.subject_level_id,
                combined_teachers.lesson_id,
                combined_teachers.room_id,
                COALESCE(combined_teachers.start_time, dt.start_time) AS start_time,
                combined_teachers.end_time
            FROM (
                -- Ambil teacher_id
                SELECT 
                    s.teacher_id AS employee_job_id,
                    st.day AS day,
                    s.subject_level_id,
                    s.room_id,
                    st.lesson_id,
                    st.start_time,
                    st.end_time
                FROM schedules s
                JOIN schedule_time_view st ON s.lesson_id = st.lesson_id
                WHERE s.teacher_id IS NOT NULL

                UNION ALL

                -- Ambil teacher2_id
                SELECT 
                    s.teacher2_id AS employee_job_id,
                    st.day AS day,
                    s.subject_level_id,
                    s.room_id,
                    st.lesson_id,
                    st.start_time,
                    st.end_time
                FROM schedules s
                JOIN schedule_time_view st ON s.lesson_id = st.lesson_id
                WHERE s.teacher2_id IS NOT NULL
            ) AS combined_teachers
            LEFT JOIN day_times dt ON combined_teachers.day = dt.day;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_all_lessons_view');
    }
};
