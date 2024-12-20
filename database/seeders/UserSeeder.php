<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $encryptedPassword = bcrypt('password');

        DB::table('users')->insert([
            ['employee_id' => 'EU001', 'password' => $encryptedPassword, 'role_id' => '1'],
            ['employee_id' => 'EU002', 'password' => $encryptedPassword, 'role_id' => '1'],
            ['employee_id' => 'EU003', 'password' => $encryptedPassword, 'role_id' => '1'],
            ['employee_id' => 'EU004', 'password' => $encryptedPassword, 'role_id' => '1'],
            ['employee_id' => 'EU005', 'password' => $encryptedPassword, 'role_id' => '2'],
            ['employee_id' => 'EU006', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU007', 'password' => $encryptedPassword, 'role_id' => '2'],
            ['employee_id' => 'EU008', 'password' => $encryptedPassword, 'role_id' => '2'],
            ['employee_id' => 'EU009', 'password' => $encryptedPassword, 'role_id' => '2'],
            ['employee_id' => 'EU010', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU011', 'password' => $encryptedPassword, 'role_id' => '2'],
            ['employee_id' => 'EU012', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU013', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU014', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU015', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU016', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU017', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU018', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU019', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU020', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU021', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU022', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU023', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU024', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU025', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU026', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU027', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU028', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU029', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU030', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU031', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU032', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU033', 'password' => $encryptedPassword, 'role_id' => '3'],
            ['employee_id' => 'EU034', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU035', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU036', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU037', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU038', 'password' => $encryptedPassword, 'role_id' => '4'],
            ['employee_id' => 'EU039', 'password' => $encryptedPassword, 'role_id' => '2'],
            ['employee_id' => 'EU040', 'password' => $encryptedPassword, 'role_id' => '6'],
            ['employee_id' => 'EU041', 'password' => $encryptedPassword, 'role_id' => '6'],
            ['employee_id' => 'EU042', 'password' => $encryptedPassword, 'role_id' => '6'],
            ['employee_id' => 'EU043', 'password' => $encryptedPassword, 'role_id' => '5'],
            ['employee_id' => 'EU044', 'password' => $encryptedPassword, 'role_id' => '6'],
        ]);
    }
}
