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
            CREATE FUNCTION GetJobEmployeeId(p_employee_id VARCHAR(255)) 
            RETURNS VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
            DETERMINISTIC
            BEGIN
                DECLARE job_employee_id VARCHAR(255);  -- Declare the variable

                -- Retrieve the id and store it in the variable using the parameter
                SELECT id INTO job_employee_id
                FROM employee_jobs
                WHERE employee_id COLLATE utf8mb4_unicode_ci = p_employee_id COLLATE utf8mb4_unicode_ci -- Using parameter instead of hardcoded value
                AND job_id = 5;

                -- Return the value of the variable
                RETURN job_employee_id;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_job_employee_id_function');
    }
};
