<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate encrypted account number for all employees
        $encryptedAccountNumber = encrypt('1234567890');      
        // Generate encrypted phone number for ALL employees, SO CHANGE CURRENT PHONE NUMBER TO THE ENCRYPTED ONE
        $encryptedPhoneNumber = encrypt('081234567890');      

        Employee::insert([
            [
                'id' => 'EU001',
                'employee_name' => 'Dante Santoso',
                'phone_number' => $encryptedPhoneNumber,
                'address' => null,
                'account_number' => null,
                'bank_name' => null,
                'status' => 'active',
            ],
            [
                'id' => 'EU002',
                'employee_name' => 'Hendry Santoso',
                'phone_number' => $encryptedPhoneNumber,
                'address' => null,
                'account_number' => null,
                'bank_name' => null,
                'status' => 'active',
            ],
            [
                'id' => 'EU003',
                'employee_name' => 'Vera Santoso',
                'phone_number' => $encryptedPhoneNumber,
                'address' => null,
                'account_number' => null,
                'bank_name' => null,
                'status' => 'active',
            ],
            [
                'id' => 'EU004',
                'employee_name' => 'Atahila Santoso',
                'phone_number' => $encryptedPhoneNumber,
                'address' => null,
                'account_number' => null,
                'bank_name' => null,
                'status' => 'active',
            ],
            [
                'id' => 'EU005',
                'employee_name' => 'Relauna Santoso',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Sisingamangaraja No. 4, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU006',
                'employee_name' => 'Susi Utami',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Karya No. 15, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU007',
                'employee_name' => 'Eka Suryani',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Pemuda No. 8, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU008',
                'employee_name' => 'Riko Gunawan',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Raya No. 12, Binjai',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU009',
                'employee_name' => 'Tia Rahmawati',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Jendral Sudirman No. 20, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU010',
                'employee_name' => 'Irma Sari',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Belimbing No. 4, Deli Serdang',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
        ]);

        Employee::insert([
            [
                'id' => 'EU011',
                'employee_name' => 'Kurniawan Satria',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Taman Siswa No. 6, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU012',
                'employee_name' => 'Joko Gunawan',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Sejahtera No. 9, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU013',
                'employee_name' => 'Eliza Ginting',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Pahlawan No. 22, Tebing Tinggi',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU014',
                'employee_name' => 'Tri Andayani',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Angkasa No. 11, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU015',
                'employee_name' => 'Liana Girsang',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Bunga No. 14, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU016',
                'employee_name' => 'Siti Syamsiah',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Raya No. 17, Sibolga',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU017',
                'employee_name' => 'Susilo Dwi Santoso',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Cinta No. 18, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU018',
                'employee_name' => 'Sari Budi',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Lautan No. 19, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU019',
                'employee_name' => 'Kamaruddin Syah',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Raya No. 21, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU020',
                'employee_name' => 'Hendra Herawati',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Melati No. 13, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
        ]);
        

        Employee::insert([
            [
                'id' => 'EU021',
                'employee_name' => 'Mita Gultom',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Gagak No. 16, Deli Serdang',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU022',
                'employee_name' => 'Erwin Utama',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Kenanga No. 23, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU023',
                'employee_name' => 'Tanti Pratiwi',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Sejahtera No. 25, Binjai',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU024',
                'employee_name' => 'Adi Putra',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Titi No. 26, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU025',
                'employee_name' => 'Dian Puspita',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Angkasa No. 27, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU026',
                'employee_name' => 'Nabila Taufik',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Perjuangan No. 30, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU027',
                'employee_name' => 'Purna Utama',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Rawa No. 28, Belawan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU028',
                'employee_name' => 'Hasan Suryanto',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Merpati No. 29, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU029',
                'employee_name' => 'Erna Mulyani',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Raya No. 31, Langkat',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU030',
                'employee_name' => 'Evelyn Santoso',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Cendrawasih No. 32, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
        ]);
        

        Employee::insert([
            [
                'id' => 'EU031',
                'employee_name' => 'Emma Liza',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Merdeka No. 33, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU032',
                'employee_name' => 'Nia Hidayati',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Alumni No. 19, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU033',
                'employee_name' => 'Arief Setiawan',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Jamin Ginting No. 127, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU034',
                'employee_name' => 'Siti Rohmawati',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Amal, Pancur Batu',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU035',
                'employee_name' => 'Junaedi Nasution',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Kasuari, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU036',
                'employee_name' => 'Eka Kartini',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Setia Budi No. 165, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU037',
                'employee_name' => 'Siti Sulastri',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Katamso No. 29, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU038',
                'employee_name' => 'Elsa Lestari',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Pos Bloc, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU039',
                'employee_name' => 'Yanuar Bima',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Taman Siswa No. 42, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU040',
                'employee_name' => 'Fitriyani',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Lautan No. 43, Deli Serdang',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
        ]);
        

        Employee::insert([
            [
                'id' => 'EU041',
                'employee_name' => 'Inamina',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Raya No. 44, Binjai',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU042',
                'employee_name' => 'Ngasiah',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Melati No. 45, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU043',
                'employee_name' => 'Ester',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Angkasa No. 46, Belawan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ],
            [
                'id' => 'EU044',
                'employee_name' => 'Dewan',
                'phone_number' => $encryptedPhoneNumber,
                'address' => 'Jl. Cendrawasih No. 47, Medan',
                'account_number' => $encryptedAccountNumber,
                'bank_name' => 'BNI',
                'status' => 'active',
            ]
        ]);
        
    }
}
