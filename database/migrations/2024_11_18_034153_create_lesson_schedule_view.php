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
            CREATE VIEW lesson_schedule_view AS
            WITH lesson_schedule AS (
                SELECT 
                    l.id AS lesson_id,
                    l.level_id,
                    l.day,
                    l.order AS lesson_order,  -- Ubah nama kolom 'order' menjadi 'lesson_order'
                    lt.duration,
                    dt.start_time AS base_start_time,
                    ADDTIME(dt.start_time, SEC_TO_TIME(
                        SUM(lt.duration * 60) OVER (
                            PARTITION BY l.day, l.id ORDER BY l.order ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW
                        ) - lt.duration * 60
                    )) AS start_time,
                    ADDTIME(dt.start_time, SEC_TO_TIME(
                        SUM(lt.duration * 60) OVER (
                            PARTITION BY l.day, l.id ORDER BY l.order ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW
                        )
                    )) AS end_time
                FROM 
                    lessons l
                JOIN 
                    lesson_types lt ON l.type_id = lt.id
                JOIN 
                    day_times dt ON l.day = dt.day
            )
            SELECT 
                lesson_id,
                level_id,
                day,
                lesson_order,  -- Ubah penggunaan 'order' menjadi 'lesson_order' di SELECT
                start_time,
                end_time
            FROM 
                lesson_schedule
            ORDER BY 
                lesson_id, day, lesson_order;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_schedule_view');
    }
};
