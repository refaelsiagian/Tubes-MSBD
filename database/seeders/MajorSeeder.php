<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
            ['major_id' => 1, 'major_name' => 'Teknik Otomotif', 'major_abb' => 'TO'],
            ['major_id' => 2, 'major_name' => 'Bisnis dan Manajemen', 'major_abb' => 'BM'],
            ['major_id' => 3, 'major_name' => 'Teknologi Informasi dan Komunikasi', 'major_abb' => 'TIK'],
        ]);
    }
}
