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
            CREATE TRIGGER prevent_employee_inactive
            BEFORE UPDATE ON employees
            FOR EACH ROW
            BEGIN
                -- Cek apakah employee_id yang akan diupdate statusnya masih memiliki pekerjaan di employee_jobs
                IF OLD.status = 'active' AND NEW.status = 'inactive' AND EXISTS (
                    SELECT 1
                    FROM employee_jobs 
                    WHERE employee_id = OLD.id
                ) THEN
                    -- Lemparkan error jika employee_id masih memiliki pekerjaan yang terkait
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Cannot deactivate employee: Employee still has assigned jobs';
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
