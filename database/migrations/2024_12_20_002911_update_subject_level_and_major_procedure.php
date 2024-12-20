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
            CREATE PROCEDURE update_subject_level_and_major(
                IN new_subject_id INT,
                IN levels_array JSON,
                IN majors_array JSON
            )
            BEGIN
                DECLARE level_id INT;
                DECLARE major_id INT;
                DECLARE i INT DEFAULT 0;
                DECLARE j INT DEFAULT 0;
                DECLARE levels_count INT;
                DECLARE majors_count INT;

                SET levels_count = JSON_LENGTH(levels_array);
                SET majors_count = JSON_LENGTH(majors_array);

                WHILE i < levels_count DO
                    SET level_id = JSON_UNQUOTE(JSON_EXTRACT(levels_array, CONCAT("$[", i, "]")));

                    IF level_id = (SELECT id FROM levels WHERE level_name = "smk") THEN
                        SET j = 0;
                        WHILE j < majors_count DO
                            SET major_id = JSON_UNQUOTE(JSON_EXTRACT(majors_array, CONCAT("$[", j, "]")));

                            INSERT INTO subject_levels (subject_id, level_id, major_id) 
                            VALUES (new_subject_id, level_id, major_id)
                            ON DUPLICATE KEY UPDATE
                                major_id = VALUES(major_id);

                            SET j = j + 1;
                        END WHILE;
                    ELSE
                        INSERT INTO subject_levels (subject_id, level_id, major_id) 
                        VALUES (new_subject_id, level_id, NULL)
                        ON DUPLICATE KEY UPDATE
                            major_id = NULL;
                    END IF;

                    SET i = i + 1;
                END WHILE;
            END ;

            ');
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

