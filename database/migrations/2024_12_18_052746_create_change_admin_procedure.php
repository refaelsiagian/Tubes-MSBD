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
            CREATE PROCEDURE change_admin(
                IN old_admin_id VARCHAR(10), -- admin_id yang rolenya diubah ke 4
                IN new_admin_id VARCHAR(10)  -- employee_id yang rolenya diubah ke 3
            )
            BEGIN
                -- Ubah role_id admin lama menjadi 4 (guru)
                UPDATE users
                    SET role_id = 4
                    WHERE employee_id = CAST(old_admin_id AS CHAR CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci);

                    -- Ubah role_id user baru menjadi 3 (admin)
                    UPDATE users
                    SET role_id = 3
                    WHERE employee_id = CAST(new_admin_id AS CHAR CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci);

                END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_admin_procedure');
    }
};
