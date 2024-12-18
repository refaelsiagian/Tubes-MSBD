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
            CREATE PROCEDURE change_principal(IN principal_id VARCHAR(255), IN new_employee_id VARCHAR(255), IN position_id INT)
            BEGIN
                -- Step 1: Update the principal's role to 4 (guru)
                UPDATE users
                SET role_id = 4
                WHERE employee_id COLLATE utf8mb4_unicode_ci = principal_id COLLATE utf8mb4_unicode_ci;

                -- Step 2: Update the employee's role to 2 (principal)
                UPDATE users
                SET role_id = 2
                WHERE employee_id COLLATE utf8mb4_unicode_ci = new_employee_id COLLATE utf8mb4_unicode_ci;

                -- Step 3: Update the employee_jobs table to change the principal's position
                UPDATE employee_jobs
                SET employee_id = new_employee_id
                WHERE id = position_id;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_principal_procedure');
    }
};
