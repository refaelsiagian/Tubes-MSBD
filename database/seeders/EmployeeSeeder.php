<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            [
                'employee_id' => 'EU001',
                'employee_name' => 'Dante Santoso',
                'phone_number' => '81234567890',
                'address' => 'Jl. Merdeka No. 10, Medan',
                'account_number' => 'encrypted_account_number_1',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU002',
                'employee_name' => 'Hendry Santoso',
                'phone_number' => '82134567891',
                'address' => 'Jl. Cendrawasih No. 5, Medan',
                'account_number' => 'encrypted_account_number_2',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU003',
                'employee_name' => 'Vera Santoso',
                'phone_number' => '83234567892',
                'address' => 'Jl. Pahlawan No. 7, Medan',
                'account_number' => 'encrypted_account_number_3',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU004',
                'employee_name' => 'Atahila Santoso',
                'phone_number' => '84334567893',
                'address' => 'Jl. Sisingamangaraja No. 3, Medan',
                'account_number' => 'encrypted_account_number_4',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU005',
                'employee_name' => 'Relauna Santoso',
                'phone_number' => '84334067803',
                'address' => 'Jl. Sisingamangaraja No. 4, Medan',
                'account_number' => 'encrypted_account_number_5',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU006',
                'employee_name' => 'Susi Utami',
                'phone_number' => '85434567894',
                'address' => 'Jl. Karya No. 15, Medan',
                'account_number' => 'encrypted_account_number_6',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU007',
                'employee_name' => 'Eka Suryani',
                'phone_number' => '86534567895',
                'address' => 'Jl. Pemuda No. 8, Medan',
                'account_number' => 'encrypted_account_number_7',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU008',
                'employee_name' => 'Riko Gunawan',
                'phone_number' => '87634567896',
                'address' => 'Jl. Raya No. 12, Binjai',
                'account_number' => 'encrypted_account_number_8',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU009',
                'employee_name' => 'Tia Rahmawati',
                'phone_number' => '88734567897',
                'address' => 'Jl. Jendral Sudirman No. 20, Medan',
                'account_number' => 'encrypted_account_number_9',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU010',
                'employee_name' => 'Irma Sari',
                'phone_number' => '89834567898',
                'address' => 'Jl. Belimbing No. 4, Deli Serdang',
                'account_number' => 'encrypted_account_number_10',
                'status' => 'active',
            ],
        ]);

        Employee::insert([
            [
                'employee_id' => 'EU011',
                'employee_name' => 'Kurniawan Satria',
                'phone_number' => '81934567899',
                'address' => 'Jl. Taman Siswa No. 6, Medan',
                'account_number' => 'encrypted_account_number_11',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU012',
                'employee_name' => 'Joko Gunawan',
                'phone_number' => '82034567900',
                'address' => 'Jl. Sejahtera No. 9, Medan',
                'account_number' => 'encrypted_account_number_12',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU013',
                'employee_name' => 'Eliza Ginting',
                'phone_number' => '83134567901',
                'address' => 'Jl. Pahlawan No. 22, Tebing Tinggi',
                'account_number' => 'encrypted_account_number_13',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU014',
                'employee_name' => 'Tri Andayani',
                'phone_number' => '84234567902',
                'address' => 'Jl. Angkasa No. 11, Medan',
                'account_number' => 'encrypted_account_number_14',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU015',
                'employee_name' => 'Liana Girsang',
                'phone_number' => '85334567903',
                'address' => 'Jl. Bunga No. 14, Medan',
                'account_number' => 'encrypted_account_number_15',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU016',
                'employee_name' => 'Siti Syamsiah',
                'phone_number' => '86434567904',
                'address' => 'Jl. Raya No. 17, Sibolga',
                'account_number' => 'encrypted_account_number_16',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU017',
                'employee_name' => 'Susilo Dwi Santoso',
                'phone_number' => '87534567905',
                'address' => 'Jl. Cinta No. 18, Medan',
                'account_number' => 'encrypted_account_number_17',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU018',
                'employee_name' => 'Sari Budi',
                'phone_number' => '88634567906',
                'address' => 'Jl. Lautan No. 19, Medan',
                'account_number' => 'encrypted_account_number_18',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU019',
                'employee_name' => 'Kamaruddin Syah',
                'phone_number' => '89734567907',
                'address' => 'Jl. Raya No. 21, Medan',
                'account_number' => 'encrypted_account_number_19',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU020',
                'employee_name' => 'Hendra Herawati',
                'phone_number' => '81834567908',
                'address' => 'Jl. Melati No. 13, Medan',
                'account_number' => 'encrypted_account_number_20',
                'status' => 'active',
            ],
        ]);

        Employee::insert([
            [
                'employee_id' => 'EU021',
                'employee_name' => 'Mita Gultom',
                'phone_number' => '82934567909',
                'address' => 'Jl. Gagak No. 16, Deli Serdang',
                'account_number' => 'encrypted_account_number_21',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU022',
                'employee_name' => 'Erwin Utama',
                'phone_number' => '83034567910',
                'address' => 'Jl. Kenanga No. 23, Medan',
                'account_number' => 'encrypted_account_number_22',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU023',
                'employee_name' => 'Tanti Pratiwi',
                'phone_number' => '84134567911',
                'address' => 'Jl. Sejahtera No. 25, Binjai',
                'account_number' => 'encrypted_account_number_23',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU024',
                'employee_name' => 'Adi Putra',
                'phone_number' => '85234567912',
                'address' => 'Jl. Titi No. 26, Medan',
                'account_number' => 'encrypted_account_number_24',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU025',
                'employee_name' => 'Dian Puspita',
                'phone_number' => '86334567913',
                'address' => 'Jl. Angkasa No. 27, Medan',
                'account_number' => 'encrypted_account_number_25',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU026',
                'employee_name' => 'Nabila Taufik',
                'phone_number' => '87434567914',
                'address' => 'Jl. Perjuangan No. 30, Medan',
                'account_number' => 'encrypted_account_number_26',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU027',
                'employee_name' => 'Purna Utama',
                'phone_number' => '88534567915',
                'address' => 'Jl. Rawa No. 28, Belawan',
                'account_number' => 'encrypted_account_number_27',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU028',
                'employee_name' => 'Hasan Suryanto',
                'phone_number' => '89634567916',
                'address' => 'Jl. Merpati No. 29, Medan',
                'account_number' => 'encrypted_account_number_28',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU029',
                'employee_name' => 'Erna Mulyani',
                'phone_number' => '81934567917',
                'address' => 'Jl. Raya No. 31, Langkat',
                'account_number' => 'encrypted_account_number_29',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU030',
                'employee_name' => 'Evelyn Santoso',
                'phone_number' => '82034567918',
                'address' => 'Jl. Cendrawasih No. 32, Medan',
                'account_number' => 'encrypted_account_number_30',
                'status' => 'active',
            ],
        ]);

        Employee::insert([
            [
                'employee_id' => 'EU031',
                'employee_name' => 'Emma Liza',
                'phone_number' => '83134567919',
                'address' => 'Jl. Merdeka No. 33, Medan',
                'account_number' => 'encrypted_account_number_31',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU032',
                'employee_name' => 'Nia Hidayati',
                'phone_number' => '84234567920',
                'address' => 'Jl. Alumni No. 19, Medan',
                'account_number' => 'encrypted_account_number_32',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU033',
                'employee_name' => 'Arief Setiawan',
                'phone_number' => '85334567921',
                'address' => 'Jl. Jamin Ginting No. 127, Medan',
                'account_number' => 'encrypted_account_number_33',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU034',
                'employee_name' => 'Siti Rohmawati',
                'phone_number' => '86434567922',
                'address' => 'Jl. Amal, Pancur Batu',
                'account_number' => 'encrypted_account_number_34',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU035',
                'employee_name' => 'Junaedi Nasution',
                'phone_number' => '87534567923',
                'address' => 'Jl. Kasuari, Medan',
                'account_number' => 'encrypted_account_number_35',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU036',
                'employee_name' => 'Eka Kartini',
                'phone_number' => '88634567924',
                'address' => 'Jl. Setia Budi No. 165, Medan',
                'account_number' => 'encrypted_account_number_36',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU037',
                'employee_name' => 'Siti Sulastri',
                'phone_number' => '89734567925',
                'address' => 'Jl. Katamso No. 29, Medan',
                'account_number' => 'encrypted_account_number_37',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU038',
                'employee_name' => 'Elsa Lestari',
                'phone_number' => '89863728190',
                'address' => 'Jl. Pos Bloc, Medan',
                'account_number' => 'encrypted_account_number_38',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU039',
                'employee_name' => 'Yanuar Bima',
                'phone_number' => '82134567934',
                'address' => 'Jl. Taman Siswa No. 42, Medan',
                'account_number' => 'encrypted_account_number_39',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU040',
                'employee_name' => 'Fitriyani',
                'phone_number' => '83234567935',
                'address' => 'Jl. Lautan No. 43, Deli Serdang',
                'account_number' => 'encrypted_account_number_40',
                'status' => 'active',
            ],
        ]);

        Employee::insert([
            [
                'employee_id' => 'EU041',
                'employee_name' => 'Inamina',
                'phone_number' => '84334567936',
                'address' => 'Jl. Raya No. 44, Binjai',
                'account_number' => 'encrypted_account_number_41',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU042',
                'employee_name' => 'Ngasiah',
                'phone_number' => '85434567937',
                'address' => 'Jl. Melati No. 45, Medan',
                'account_number' => 'encrypted_account_number_42',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU043',
                'employee_name' => 'Ester',
                'phone_number' => '86534567938',
                'address' => 'Jl. Angkasa No. 46, Belawan',
                'account_number' => 'encrypted_account_number_43',
                'status' => 'active',
            ],
            [
                'employee_id' => 'EU044',
                'employee_name' => 'Dewan',
                'phone_number' => '87634567939',
                'address' => 'Jl. Cendrawasih No. 47, Medan',
                'account_number' => 'encrypted_account_number_44',
                'status' => 'active',
            ]
        ]);
    }
}
