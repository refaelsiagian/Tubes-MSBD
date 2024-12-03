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
            CREATE VIEW schedule_time_view AS
            SELECT 
                l.id as lesson_id,
                l.level_id,
                l.day,
                l.`order` AS lesson_order,
                TIME( 
                    ADDTIME(
                        dt.start_time,
                        SEC_TO_TIME(
                            SUM(lt.duration * 60) 
                            OVER (PARTITION BY l.day, l.level_id ORDER BY l.`order` ROWS BETWEEN UNBOUNDED PRECEDING AND 1 PRECEDING)
                        )
                    )
                ) AS start_time,
                TIME( 
                    ADDTIME(
                        dt.start_time,
                        SEC_TO_TIME(
                            SUM(lt.duration * 60) 
                            OVER (PARTITION BY l.day, l.level_id ORDER BY l.`order`)
                        )
                    )
                ) AS end_time
            FROM 
                lessons l
            JOIN 
                lesson_types lt ON l.type_id = lt.id
            JOIN 
                day_times dt ON l.day = dt.day
            ORDER BY lesson_id, level_id, day, lesson_order;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_schedule_time_view');
    }
};
