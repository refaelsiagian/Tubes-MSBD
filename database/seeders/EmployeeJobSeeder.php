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
            ['employee_job_id' => 1, 'employee_id' => 'EU001', 'job_id' => 1, 'code_name' => null],
            ['employee_job_id' => 2, 'employee_id' => 'EU002', 'job_id' => 1, 'code_name' => null],
            ['employee_job_id' => 3, 'employee_id' => 'EU003', 'job_id' => 1, 'code_name' => null],
            ['employee_job_id' => 4, 'employee_id' => 'EU004', 'job_id' => 1, 'code_name' => null],
            ['employee_job_id' => 5, 'employee_id' => 'EU005', 'job_id' => 4, 'code_name' => 'RU'],
            ['employee_job_id' => 6, 'employee_id' => 'EU006', 'job_id' => 9, 'code_name' => 'SU'],
            ['employee_job_id' => 7, 'employee_id' => 'EU007', 'job_id' => 9, 'code_name' => 'ES'],
            ['employee_job_id' => 8, 'employee_id' => 'EU007', 'job_id' => 2, 'code_name' => 'ES'],
            ['employee_job_id' => 9, 'employee_id' => 'EU008', 'job_id' => 9, 'code_name' => 'RK'],
            ['employee_job_id' => 10, 'employee_id' => 'EU008', 'job_id' => 7, 'code_name' => 'RK'],
            ['employee_job_id' => 11, 'employee_id' => 'EU009', 'job_id' => 9, 'code_name' => 'TR'],
            ['employee_job_id' => 12, 'employee_id' => 'EU009', 'job_id' => 8, 'code_name' => 'TR'],
            ['employee_job_id' => 13, 'employee_id' => 'EU009', 'job_id' => 5, 'code_name' => 'TR'],
            ['employee_job_id' => 14, 'employee_id' => 'EU010', 'job_id' => 9, 'code_name' => 'IS'],
            ['employee_job_id' => 15, 'employee_id' => 'EU010', 'job_id' => 8, 'code_name' => 'IS'],
            ['employee_job_id' => 16, 'employee_id' => 'EU011', 'job_id' => 9, 'code_name' => 'KS'],
            ['employee_job_id' => 17, 'employee_id' => 'EU011', 'job_id' => 8, 'code_name' => 'KS'],
            ['employee_job_id' => 18, 'employee_id' => 'EU011', 'job_id' => 3, 'code_name' => 'KS'],
            ['employee_job_id' => 19, 'employee_id' => 'EU012', 'job_id' => 9, 'code_name' => 'JG'],
            ['employee_job_id' => 20, 'employee_id' => 'EU013', 'job_id' => 9, 'code_name' => 'EG'],
        ]);

        DB::table('employee_jobs')->insert([
            ['employee_job_id' => 21, 'employee_id' => 'EU013', 'job_id' => 8, 'code_name' => 'EG'],
            ['employee_job_id' => 22, 'employee_id' => 'EU014', 'job_id' => 9, 'code_name' => 'TA'],
            ['employee_job_id' => 23, 'employee_id' => 'EU015', 'job_id' => 9, 'code_name' => 'LG'],
            ['employee_job_id' => 24, 'employee_id' => 'EU015', 'job_id' => 8, 'code_name' => 'LG'],
            ['employee_job_id' => 25, 'employee_id' => 'EU016', 'job_id' => 9, 'code_name' => 'SS'],
            ['employee_job_id' => 26, 'employee_id' => 'EU016', 'job_id' => 8, 'code_name' => 'SS'],
            ['employee_job_id' => 27, 'employee_id' => 'EU017', 'job_id' => 9, 'code_name' => 'SDS'],
            ['employee_job_id' => 28, 'employee_id' => 'EU017', 'job_id' => 8, 'code_name' => 'SDS'],
            ['employee_job_id' => 29, 'employee_id' => 'EU018', 'job_id' => 9, 'code_name' => 'SB'],
            ['employee_job_id' => 30, 'employee_id' => 'EU019', 'job_id' => 9, 'code_name' => 'KMS'],
            ['employee_job_id' => 31, 'employee_id' => 'EU019', 'job_id' => 8, 'code_name' => 'KMS'],
            ['employee_job_id' => 32, 'employee_id' => 'EU020', 'job_id' => 9, 'code_name' => 'HER'],
            ['employee_job_id' => 33, 'employee_id' => 'EU021', 'job_id' => 9, 'code_name' => 'MG'],
            ['employee_job_id' => 34, 'employee_id' => 'EU021', 'job_id' => 8, 'code_name' => 'MG'],
            ['employee_job_id' => 35, 'employee_id' => 'EU022', 'job_id' => 9, 'code_name' => 'EU'],
            ['employee_job_id' => 36, 'employee_id' => 'EU023', 'job_id' => 9, 'code_name' => 'TP'],
            ['employee_job_id' => 37, 'employee_id' => 'EU023', 'job_id' => 8, 'code_name' => 'TP'],
            ['employee_job_id' => 38, 'employee_id' => 'EU024', 'job_id' => 9, 'code_name' => 'AP'],
            ['employee_job_id' => 39, 'employee_id' => 'EU025', 'job_id' => 9, 'code_name' => 'DP'],
            ['employee_job_id' => 40, 'employee_id' => 'EU025', 'job_id' => 8, 'code_name' => 'DP'],
        ]);

        DB::table('employee_jobs')->insert([
            ['employee_job_id' => 41, 'employee_id' => 'EU026', 'job_id' => 9, 'code_name' => 'NT'],
            ['employee_job_id' => 42, 'employee_id' => 'EU026', 'job_id' => 8, 'code_name' => 'NT'],
            ['employee_job_id' => 43, 'employee_id' => 'EU027', 'job_id' => 9, 'code_name' => 'PU'],
            ['employee_job_id' => 44, 'employee_id' => 'EU027', 'job_id' => 8, 'code_name' => 'PU'],
            ['employee_job_id' => 45, 'employee_id' => 'EU028', 'job_id' => 9, 'code_name' => 'HS'],
            ['employee_job_id' => 46, 'employee_id' => 'EU028', 'job_id' => 8, 'code_name' => 'HS'],
            ['employee_job_id' => 47, 'employee_id' => 'EU029', 'job_id' => 9, 'code_name' => 'EM'],
            ['employee_job_id' => 48, 'employee_id' => 'EU029', 'job_id' => 8, 'code_name' => 'EM'],
            ['employee_job_id' => 49, 'employee_id' => 'EU030', 'job_id' => 9, 'code_name' => 'EVE'],
            ['employee_job_id' => 50, 'employee_id' => 'EU031', 'job_id' => 9, 'code_name' => 'EMA'],
            ['employee_job_id' => 51, 'employee_id' => 'EU032', 'job_id' => 9, 'code_name' => 'NH'],
            ['employee_job_id' => 52, 'employee_id' => 'EU032', 'job_id' => 8, 'code_name' => 'NH'],
            ['employee_job_id' => 53, 'employee_id' => 'EU033', 'job_id' => 9, 'code_name' => 'ARS'],
            ['employee_job_id' => 54, 'employee_id' => 'EU034', 'job_id' => 9, 'code_name' => 'SR'],
            ['employee_job_id' => 55, 'employee_id' => 'EU035', 'job_id' => 9, 'code_name' => 'JN'],
            ['employee_job_id' => 56, 'employee_id' => 'EU036', 'job_id' => 9, 'code_name' => 'EK'],
            ['employee_job_id' => 57, 'employee_id' => 'EU037', 'job_id' => 9, 'code_name' => 'SS'],
            ['employee_job_id' => 58, 'employee_id' => 'EU038', 'job_id' => 9, 'code_name' => 'EL'],
            ['employee_job_id' => 59, 'employee_id' => 'EU039', 'job_id' => 9, 'code_name' => 'YB'],
            ['employee_job_id' => 60, 'employee_id' => 'EU039', 'job_id' => 6, 'code_name' => 'YB'],
            ['employee_job_id' => 61, 'employee_id' => 'EU040', 'job_id' => 10, 'code_name' => NULL],
            ['employee_job_id' => 62, 'employee_id' => 'EU041', 'job_id' => 10, 'code_name' => NULL],
            ['employee_job_id' => 63, 'employee_id' => 'EU042', 'job_id' => 11, 'code_name' => NULL],
            ['employee_job_id' => 64, 'employee_id' => 'EU043', 'job_id' => 11, 'code_name' => NULL],
            ['employee_job_id' => 65, 'employee_id' => 'EU044', 'job_id' => 12, 'code_name' => NULL],
        ]);
        
    }
}
