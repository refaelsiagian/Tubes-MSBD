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
            CREATE VIEW class_advisors_view AS
            SELECT 
                r.id AS room_id,
                ej.id AS employee_job_id
            FROM 
                rooms r
            LEFT JOIN 
                employee_jobs ej
            ON 
                r.id = ej.room_id;
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
