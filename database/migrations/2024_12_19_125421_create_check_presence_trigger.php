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
            CREATE TRIGGER `check_presences` AFTER INSERT ON `presences`
            FOR EACH ROW BEGIN
                DECLARE job_id INT;
                DECLARE job_employee_id INT;
                DECLARE first_lesson_time TIME;
                DECLARE total_lessons INT;
                DECLARE lesson_count INT;
                DECLARE fine_amount INT;
                
                -- Assign NEW.employee_id to new_employee_id
                SET job_employee_id = GetJobEmployeeId(NEW.employee_id);

                -- Jika status 'hadir', cek apakah terlambat
                IF NEW.status = 'hadir' THEN
                    -- Cari lesson pertama di hari yang sama
                    SELECT MIN(start_time) INTO first_lesson_time
                    FROM teacher_all_lessons_view
                    WHERE employee_job_id = job_employee_id
                    AND day = CASE 
                        WHEN DAYNAME(NEW.created_at) = 'Monday' THEN 'Senin'
                        WHEN DAYNAME(NEW.created_at) = 'Tuesday' THEN 'Selasa'
                        WHEN DAYNAME(NEW.created_at) = 'Wednesday' THEN 'Rabu'
                        WHEN DAYNAME(NEW.created_at) = 'Thursday' THEN 'Kamis'
                        WHEN DAYNAME(NEW.created_at) = 'Friday' THEN 'Jumat'
                        WHEN DAYNAME(NEW.created_at) = 'Saturday' THEN 'Sabtu'
                        WHEN DAYNAME(NEW.created_at) = 'Sunday' THEN 'Minggu'
                        END;

                    -- Bandingkan jam presensi dengan lesson pertama
                    IF NEW.created_at > first_lesson_time THEN
                        -- Ambil denda untuk keterlambatan
                        SELECT fine_price INTO fine_amount 
                        FROM fines 
                        WHERE fine_name = 'Terlambat';

                        -- Masukkan ke tabel penalties
                        INSERT INTO penalties (employee_id, fine_id, amount, created_at, updated_at)
                        VALUES (NEW.employee_id, 1, fine_amount, NOW(), NOW());
                    END IF;
                END IF;

                -- Jika status 'absen', hitung total lessons di hari itu
                IF NEW.status = 'absen' THEN
                    SELECT COUNT(*) INTO lesson_count
                    FROM teacher_all_lessons_view
                    WHERE employee_job_id = job_employee_id
                    AND day = CASE 
                        WHEN DAYNAME(NEW.created_at) = 'Monday' THEN 'Senin'
                        WHEN DAYNAME(NEW.created_at) = 'Tuesday' THEN 'Selasa'
                        WHEN DAYNAME(NEW.created_at) = 'Wednesday' THEN 'Rabu'
                        WHEN DAYNAME(NEW.created_at) = 'Thursday' THEN 'Kamis'
                        WHEN DAYNAME(NEW.created_at) = 'Friday' THEN 'Jumat'
                        WHEN DAYNAME(NEW.created_at) = 'Saturday' THEN 'Sabtu'
                        WHEN DAYNAME(NEW.created_at) = 'Sunday' THEN 'Minggu'
                        END;

                    -- Ambil denda untuk ketidakhadiran
                    SELECT fine_price INTO fine_amount 
                    FROM fines 
                    WHERE fine_name = 'Tidak Masuk';

                    -- Masukkan ke tabel penalties
                    INSERT INTO penalties (employee_id, fine_id, amount, created_at, updated_at)
                    VALUES (NEW.employee_id, 2, lesson_count * fine_amount, NEW.created_at, NEW.created_at);
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_presence_trigger');
    }
};
