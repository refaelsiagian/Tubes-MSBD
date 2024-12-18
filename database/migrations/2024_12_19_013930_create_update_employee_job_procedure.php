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
            CREATE PROCEDURE `update_employee_job`(
                IN p_employee_id VARCHAR(255),
                IN p_job_id INT,
                IN p_employee_job_id INT
            )
            BEGIN
                DECLARE existingJobId INT;

                -- Check if there is an existing job for the employee, force the collation to match
                SELECT job_id INTO existingJobId
                FROM employee_jobs
                WHERE id = p_employee_job_id AND employee_id = p_employee_id COLLATE utf8mb4_unicode_ci;

                -- If the job_id is NULL (meaning no job selected)
                IF p_job_id IS NULL THEN
                    -- If there is an existing job, delete it
                    IF existingJobId IS NOT NULL THEN
                        DELETE FROM employee_jobs WHERE id = p_employee_job_id;
                        SELECT 'Pekerjaan dihapus' AS status;
                    ELSE
                        -- No job to delete
                        SELECT 'Tidak ada perubahan' AS status;
                    END IF;
                ELSE
                    -- If the job_id is not NULL
                    IF existingJobId IS NULL THEN
                        -- If no existing job, insert new job
                        INSERT INTO employee_jobs (employee_id, job_id)
                        VALUES (p_employee_id, p_job_id);
                        SELECT 'Pekerjaan ditambahkan' AS status;
                    ELSEIF existingJobId = p_job_id THEN
                        -- If the job_id is the same, no changes
                        SELECT 'Tidak ada perubahan' AS status;
                    ELSE
                        -- If the job_id is different, update the job
                        UPDATE employee_jobs
                        SET job_id = p_job_id
                        WHERE id = p_employee_job_id;
                        SELECT 'Pekerjaan diupdate' AS status;
                    END IF;
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_employee_job_procedure');
    }
};
