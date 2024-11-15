<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::insert([
            ['job_name' => 'yayasan', 'salary' => null, 'detail' => null],
            ['job_name' => 'kepala sekolah smp', 'salary' => 1500000, 'detail' => 'per bulan'],
            ['job_name' => 'wakil kepala sekolah smp', 'salary' => 300000, 'detail' => 'per bulan'],
            ['job_name' => 'kepala sekolah sma', 'salary' => 1500000, 'detail' => 'per bulan'],
            ['job_name' => 'wakil kepala sekolah sma', 'salary' => 300000, 'detail' => 'per bulan'],
            ['job_name' => 'kepala sekolah smk', 'salary' => 1500000, 'detail' => 'per bulan'],
            ['job_name' => 'wakil kepala sekolah smk', 'salary' => 300000, 'detail' => 'per bulan'],
            ['job_name' => 'guru wali kelas', 'salary' => 100000, 'detail' => 'per bulan'],
            ['job_name' => 'guru', 'salary' => null, 'detail' => 'per les'],
            ['job_name' => 'staff tata usaha', 'salary' => 1500000, 'detail' => 'per bulan'],
            ['job_name' => 'karyawan', 'salary' => 1500000, 'detail' => 'per bulan'],
            ['job_name' => 'satpam', 'salary' => 900000, 'detail' => 'per bulan'],
        ]);
    }
}
