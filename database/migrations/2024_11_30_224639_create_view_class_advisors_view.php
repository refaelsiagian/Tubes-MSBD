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
            CREATE VIEW `class_advisors_view` AS
            SELECT 
                `erautama`.`rooms`.`id` AS `room_id`,
                `erautama`.`employee_jobs`.`id` AS `employee_job_id`
            FROM 
                `erautama`.`rooms`
            LEFT JOIN 
                `erautama`.`employee_jobs`
            ON 
                `erautama`.`rooms`.`id` = `erautama`.`employee_jobs`.`room_id`;
        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_class_advisors_view');
    }
};
