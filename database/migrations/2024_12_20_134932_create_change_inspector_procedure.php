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
            CREATE PROCEDURE change_inspector(
                IN new_inspector_id VARCHAR(10),  -- ID pegawai yang akan diberikan role 5 (inspector)
                IN old_inspector_id VARCHAR(10)  -- ID pengawas yang akan diberikan role 6 (karyawan biasa)
            )
            BEGIN
                -- Jika terjadi kesalahan, batalkan semua perubahan
                DECLARE CONTINUE HANDLER FOR SQLEXCEPTION 
                BEGIN
                    ROLLBACK;
                END;
                
                -- Mulai transaksi
                START TRANSACTION;

                -- Ubah role_id employee menjadi 5 (inspector)
                UPDATE users
                SET role_id = 5
                WHERE employee_id = CAST(new_inspector_id AS CHAR) COLLATE utf8mb4_unicode_ci;

                -- Ubah role_id inspector menjadi 6 (karyawan biasa)
                UPDATE users
                SET role_id = 6
                WHERE employee_id = CAST(old_inspector_id AS CHAR) COLLATE utf8mb4_unicode_ci;

                -- Commit transaksi jika semua berhasil
                COMMIT;
            END;
        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_inspector_procedure');
    }
};
