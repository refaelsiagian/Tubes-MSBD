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
            CREATE PROCEDURE insert_subject_levels_procedure(
                IN levels_array JSON, 
                IN majors_array JSON, 
                IN new_subject_id INT
            )
            BEGIN
                DECLARE level_id INT;
                DECLARE major_id INT;
                DECLARE i INT DEFAULT 0;
                DECLARE j INT DEFAULT 0;
                DECLARE levels_count INT;
                DECLARE majors_count INT;

                -- Hitung jumlah levels dan majors
                SET levels_count = JSON_LENGTH(levels_array);
                SET majors_count = JSON_LENGTH(majors_array);

                -- Loop untuk memasukkan data ke tabel subject_levels
                WHILE i < levels_count DO
                    SET level_id = JSON_UNQUOTE(JSON_EXTRACT(levels_array, CONCAT("$[", i, "]")));

                    -- Jika level adalah SMK, proses majors
                    IF level_id = (SELECT id FROM levels WHERE level_name = "smk") THEN
                        SET j = 0; -- Reset loop untuk majors
                        WHILE j < majors_count DO
                            SET major_id = JSON_UNQUOTE(JSON_EXTRACT(majors_array, CONCAT("$[", j, "]")));

                            -- Insert data ke tabel subject_levels
                            INSERT INTO subject_levels (subject_id, level_id, major_id) 
                            VALUES (new_subject_id, level_id, major_id);

                            SET j = j + 1;
                        END WHILE;
                    ELSE
                        -- Insert data ke tabel subject_levels tanpa major
                        INSERT INTO subject_levels (subject_id, level_id, major_id) 
                        VALUES (new_subject_id, level_id, NULL);
                    END IF;

                    SET i = i + 1;
                END WHILE;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insert_subject_level_procedure');
    }
};
