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
            CREATE TRIGGER before_update_employee_job
            BEFORE UPDATE ON employee_jobs
            FOR EACH ROW
            BEGIN
                -- Cek apakah job_id = 5
                IF OLD.job_id = 5 THEN
                    -- Cek apakah masih menjadi kepala/wakil kepala sekolah
                    IF EXISTS (
                        SELECT 1
                        FROM employee_jobs
                        WHERE employee_id = OLD.employee_id
                        AND job_id IN (2, 3)
                    ) THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Orang ini sedang menjadi kepala/wakil kepala sekolah';
                    END IF;

                    -- Cek apakah masih menjadi wali kelas
                    IF EXISTS (
                        SELECT 1
                        FROM employee_jobs
                        WHERE employee_id = OLD.employee_id
                        AND job_id = 4
                    ) THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Orang ini sedang menjadi wali kelas';
                    END IF;

                    -- Cek apakah memiliki peran admin
                    IF EXISTS (
                        SELECT 1
                        FROM employee_jobs
                        WHERE employee_id = OLD.employee_id
                        AND job_id = 6
                    ) THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Orang ini masih memiliki peran admin';
                    END IF;
                    
                    -- Cek apakah masih memiliki jadwal mengajar
                    IF EXISTS (
                        SELECT 1
                        FROM schedules
                        WHERE teacher_id = OLD.id
                        OR teacher2_id = OLD.id
                    ) THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Orang ini masih punya jadwal mengajar';
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
        Schema::dropIfExists('before_update_employee_job_trigger');
    }
};
