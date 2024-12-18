<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fine;

class FineSeeder extends Seeder
{

    public function run()
    {
        Fine::create([
            'fine_name' => 'Terlambat',
            'fine_price' => 10000,
        ]);

        Fine::create([
            'fine_name' => 'Tidak Masuk',
            'fine_price' => 20000,
        ]);
    }
}
