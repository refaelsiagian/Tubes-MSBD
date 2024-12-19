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
            CREATE TRIGGER prevent_job_deletion
            BEFORE DELETE ON jobs
            FOR EACH ROW
            BEGIN
                -- Cek apakah job_id dari jobs yang akan dihapus masih digunakan di employee_jobs
                IF EXISTS (
                    SELECT 1 
                    FROM employee_jobs 
                    WHERE job_id = OLD.id
                ) THEN
                    -- Lemparkan error jika job_id masih digunakan
                    SIGNAL SQLSTATE '45000' 
                    SET MESSAGE_TEXT = 'Cannot delete job: Job is still assigned to employees';
                END IF;
            END;
        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
