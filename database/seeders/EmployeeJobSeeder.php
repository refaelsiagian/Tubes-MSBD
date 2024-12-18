<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class EmployeeJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_jobs')->insert([
            ['id' => 1, 'employee_id' => 'EU001', 'job_id' => 1, 'code_name' => null, 'level_id' => null, 'room_id' => null],
            ['id' => 2, 'employee_id' => 'EU002', 'job_id' => 1, 'code_name' => null, 'level_id' => null, 'room_id' => null],
            ['id' => 3, 'employee_id' => 'EU003', 'job_id' => 1, 'code_name' => null, 'level_id' => null, 'room_id' => null],
            ['id' => 4, 'employee_id' => 'EU004', 'job_id' => 1, 'code_name' => null, 'level_id' => null, 'room_id' => null],
            ['id' => 5, 'employee_id' => 'EU005', 'job_id' => 2, 'code_name' => null, 'level_id' => 2, 'room_id' => null],
            ['id' => 6, 'employee_id' => 'EU006', 'job_id' => 5, 'code_name' => 'SU', 'level_id' => null, 'room_id' => null],
            ['id' => 7, 'employee_id' => 'EU007', 'job_id' => 5, 'code_name' => 'ES', 'level_id' => null, 'room_id' => null],
            ['id' => 8, 'employee_id' => 'EU007', 'job_id' => 2, 'code_name' => null, 'level_id' => 1, 'room_id' => null],
            ['id' => 9, 'employee_id' => 'EU008', 'job_id' => 5, 'code_name' => 'RK', 'level_id' => null, 'room_id' => null],
            ['id' => 10, 'employee_id' => 'EU008', 'job_id' => 3, 'code_name' => null, 'level_id' => 3, 'room_id' => null],
            ['id' => 11, 'employee_id' => 'EU009', 'job_id' => 5, 'code_name' => 'TR', 'level_id' => null, 'room_id' => null],
            ['id' => 12, 'employee_id' => 'EU009', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 8],
            ['id' => 13, 'employee_id' => 'EU009', 'job_id' => 3, 'code_name' => null, 'level_id' => 2, 'room_id' => null],
            ['id' => 14, 'employee_id' => 'EU010', 'job_id' => 5, 'code_name' => 'IS', 'level_id' => null, 'room_id' => null],
            ['id' => 15, 'employee_id' => 'EU010', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 19],
            ['id' => 16, 'employee_id' => 'EU011', 'job_id' => 5, 'code_name' => 'KS', 'level_id' => null, 'room_id' => null],
            ['id' => 17, 'employee_id' => 'EU011', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 5],
            ['id' => 18, 'employee_id' => 'EU011', 'job_id' => 3, 'code_name' => null, 'level_id' => 1, 'room_id' => null],
            ['id' => 19, 'employee_id' => 'EU012', 'job_id' => 5, 'code_name' => 'JG', 'level_id' => null, 'room_id' => null],
            ['id' => 20, 'employee_id' => 'EU013', 'job_id' => 5, 'code_name' => 'EG', 'level_id' => null, 'room_id' => null],
        ]);

        DB::table('employee_jobs')->insert([
            ['id' => 21, 'employee_id' => 'EU013', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 6],
            ['id' => 22, 'employee_id' => 'EU014', 'job_id' => 5, 'code_name' => 'TA', 'level_id' => null, 'room_id' => null],
            ['id' => 23, 'employee_id' => 'EU015', 'job_id' => 5, 'code_name' => 'LG', 'level_id' => null, 'room_id' => null],
            ['id' => 24, 'employee_id' => 'EU015', 'job_id' => 4, 'code_name' => 13, 'level_id' => null, 'room_id' => 13],
            ['id' => 25, 'employee_id' => 'EU016', 'job_id' => 5, 'code_name' => 'SS', 'level_id' => null, 'room_id' => null],
            ['id' => 26, 'employee_id' => 'EU016', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 7],
            ['id' => 27, 'employee_id' => 'EU017', 'job_id' => 5, 'code_name' => 'SDS', 'level_id' => null, 'room_id' => null],
            ['id' => 28, 'employee_id' => 'EU017', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 9],
            ['id' => 29, 'employee_id' => 'EU018', 'job_id' => 5, 'code_name' => 'SB', 'level_id' => null, 'room_id' => null],
            ['id' => 30, 'employee_id' => 'EU019', 'job_id' => 5, 'code_name' => 'KMS', 'level_id' => null, 'room_id' => null],
            ['id' => 31, 'employee_id' => 'EU019', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 12],
            ['id' => 32, 'employee_id' => 'EU020', 'job_id' => 5, 'code_name' => 'HER', 'level_id' => null, 'room_id' => null],
            ['id' => 33, 'employee_id' => 'EU021', 'job_id' => 5, 'code_name' => 'MG', 'level_id' => null, 'room_id' => null],
            ['id' => 34, 'employee_id' => 'EU021', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 11],
            ['id' => 35, 'employee_id' => 'EU022', 'job_id' => 5, 'code_name' => 'EU', 'level_id' => null, 'room_id' => null],
            ['id' => 36, 'employee_id' => 'EU023', 'job_id' => 5, 'code_name' => 'TP', 'level_id' => null, 'room_id' => null],
            ['id' => 37, 'employee_id' => 'EU023', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 4],
            ['id' => 38, 'employee_id' => 'EU024', 'job_id' => 5, 'code_name' => 'AP', 'level_id' => null, 'room_id' => null],
            ['id' => 39, 'employee_id' => 'EU025', 'job_id' => 5, 'code_name' => 'DP', 'level_id' => null, 'room_id' => null],
            ['id' => 40, 'employee_id' => 'EU025', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 3],
        ]);

        DB::table('employee_jobs')->insert([
            ['id' => 41, 'employee_id' => 'EU026', 'job_id' => 5, 'code_name' => 'NT', 'level_id' => null, 'room_id' => null],
            ['id' => 42, 'employee_id' => 'EU026', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 15],
            ['id' => 43, 'employee_id' => 'EU027', 'job_id' => 5, 'code_name' => 'PU', 'level_id' => null, 'room_id' => null],
            ['id' => 44, 'employee_id' => 'EU027', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 18],
            ['id' => 45, 'employee_id' => 'EU028', 'job_id' => 5, 'code_name' => 'HS', 'level_id' => null, 'room_id' => null],
            ['id' => 46, 'employee_id' => 'EU028', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 1],
            ['id' => 47, 'employee_id' => 'EU029', 'job_id' => 5, 'code_name' => 'EM', 'level_id' => null, 'room_id' => null],
            ['id' => 48, 'employee_id' => 'EU029', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 2],
            ['id' => 49, 'employee_id' => 'EU030', 'job_id' => 5, 'code_name' => 'EVE', 'level_id' => null, 'room_id' => null],
            ['id' => 50, 'employee_id' => 'EU031', 'job_id' => 5, 'code_name' => 'EMA', 'level_id' => null, 'room_id' => null],
            ['id' => 51, 'employee_id' => 'EU032', 'job_id' => 5, 'code_name' => 'NH', 'level_id' => null, 'room_id' => null],
            ['id' => 52, 'employee_id' => 'EU032', 'job_id' => 4, 'code_name' => null, 'level_id' => null, 'room_id' => 10],
            ['id' => 53, 'employee_id' => 'EU033', 'job_id' => 5, 'code_name' => 'ARS', 'level_id' => null, 'room_id' => null],
            ['id' => 54, 'employee_id' => 'EU034', 'job_id' => 5, 'code_name' => 'SR', 'level_id' => null, 'room_id' => null],
            ['id' => 55, 'employee_id' => 'EU035', 'job_id' => 5, 'code_name' => 'JN', 'level_id' => null, 'room_id' => null],
            ['id' => 56, 'employee_id' => 'EU036', 'job_id' => 5, 'code_name' => 'EK', 'level_id' => null, 'room_id' => null],
            ['id' => 57, 'employee_id' => 'EU037', 'job_id' => 5, 'code_name' => 'SS', 'level_id' => null, 'room_id' => null],
            ['id' => 58, 'employee_id' => 'EU038', 'job_id' => 5, 'code_name' => 'EL', 'level_id' => null, 'room_id' => null],
            ['id' => 59, 'employee_id' => 'EU039', 'job_id' => 5, 'code_name' => 'YB', 'level_id' => null, 'room_id' => null],
            ['id' => 60, 'employee_id' => 'EU039', 'job_id' => 2, 'code_name' => null, 'level_id' => 1, 'room_id' => null],
            ['id' => 61, 'employee_id' => 'EU040', 'job_id' => 6, 'code_name' => NULL, 'level_id' => null, 'room_id' => null],
            ['id' => 62, 'employee_id' => 'EU041', 'job_id' => 6, 'code_name' => NULL, 'level_id' => null, 'room_id' => null],
            ['id' => 63, 'employee_id' => 'EU042', 'job_id' => 7, 'code_name' => NULL, 'level_id' => null, 'room_id' => null],
            ['id' => 64, 'employee_id' => 'EU043', 'job_id' => 7, 'code_name' => NULL, 'level_id' => null, 'room_id' => null],
            ['id' => 65, 'employee_id' => 'EU044', 'job_id' => 8, 'code_name' => NULL, 'level_id' => null, 'room_id' => null],
        ]);

        DB::table('employee_jobs')->insert([
            ['id' => 66, 'employee_id' => 'EU010', 'job_id' => 4, 'code_name' => NULL, 'level_id' => null, 'room_id' => 20],
            ['id' => 67, 'employee_id' => 'EU015', 'job_id' => 4, 'code_name' => NULL, 'level_id' => null, 'room_id' => 14],
            ['id' => 68, 'employee_id' => 'EU026', 'job_id' => 4, 'code_name' => NULL, 'level_id' => null, 'room_id' => 16],
            ['id' => 69, 'employee_id' => 'EU026', 'job_id' => 4, 'code_name' => NULL, 'level_id' => null, 'room_id' => 17],
            ['id' => 70, 'employee_id' => 'EU005', 'job_id' => 5, 'code_name' => 'RS', 'level_id' => null, 'room_id' => null],
        ]);
        
    }
}
