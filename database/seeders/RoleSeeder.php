<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['role' => 'foundation'], // 1
            ['role' => 'principal'], //2 3
            ['role' => 'admin'],
            ['role' => 'teacher'], //4 5
            ['role' => 'inspector'],
            ['role' => 'employee'] // 6 7 8
        ]);
    }
}
