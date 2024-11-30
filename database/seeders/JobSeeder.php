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
            ['job_name' => 'Yayasan', 'salary' => null],
            ['job_name' => 'Kepala Sekolah', 'salary' => 1500000],
            ['job_name' => 'Wakil Kepala Sekolah', 'salary' => 300000],
            ['job_name' => 'Guru Wali Kelas', 'salary' => 100000],
            ['job_name' => 'Guru', 'salary' => null],
            ['job_name' => 'Tata Usaha', 'salary' => 1500000],
            ['job_name' => 'Karyawan', 'salary' => 1500000],
            ['job_name' => 'Satpam', 'salary' => 900000],
        ]);
    }
}
