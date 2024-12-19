<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;


class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $employeeId = 'EU008'; // Employee ID yang sama
        $data = [];

        // Buat 15 record sebagai contoh
        for ($i = 0; $i < 15; $i++) {
            // Acak status antara hadir, terlambat, dan absen
            $statusOptions = ['hadir', 'absen'];
            $status = $statusOptions[array_rand($statusOptions)];

            // Buat tanggal acak antara 17 November 2024 dan 17 Desember 2024
            $createdAt = Carbon::createFromTimestamp(rand(
                Carbon::create(2024, 11, 17)->timestamp,
                Carbon::create(2024, 12, 17)->timestamp
            ))->toDateTimeString();

            // Tambahkan data ke array
            $data[] = [
                'employee_id' => $employeeId,
                'status' => $status,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }

        // Insert ke database
        DB::table('presences')->insert($data);
    }

}
