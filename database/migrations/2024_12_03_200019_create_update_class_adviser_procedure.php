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
        DB::unprepared('
            CREATE PROCEDURE UpdateEmployeeJob(
                IN p_employeeJobId INT,
                IN p_employeeId INT,
                IN p_roomId INT
            )
            BEGIN
                DECLARE existingEmployeeId INT;
                DECLARE existingRoomId INT;

                -- Ambil data saat ini dari EmployeeJob
                SELECT employee_id, room_id
                INTO existingEmployeeId, existingRoomId
                FROM employee_job
                WHERE id = p_employeeJobId;

                -- Jika semua parameter NULL, hapus data
                IF p_employeeId IS NULL THEN
                    DELETE FROM employee_job WHERE id = p_employeeJobId;
                    SELECT "Class advisor removed successfully" AS status;
                -- Jika tidak ada perubahan pada employee_id dan room_id
                ELSEIF p_employeeId = existingEmployeeId AND p_roomId = existingRoomId THEN
                    SELECT "No changes made" AS status;
                ELSE
                    -- Hapus data lama
                    DELETE FROM employee_job WHERE id = p_employeeJobId;

                    -- Tambahkan data baru
                    INSERT INTO employee_job (employee_id, job_id, room_id)
                    VALUES (p_employeeId, 4, p_roomId);

                    SELECT "Class advisor updated successfully" AS status;
                END IF;

            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_class_adviser_procedure');
    }
};
