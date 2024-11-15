<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::insert([
            ['subject_name' => 'Bahasa Indonesia', 'subject_abb' => 'B.INDO'],
            ['subject_name' => 'Ilmu Pengetahuan Alam', 'subject_abb' => 'IPA'],
            ['subject_name' => 'Bahasa Inggris', 'subject_abb' => 'B.ING'],
            ['subject_name' => 'Matematika', 'subject_abb' => 'MM'],
            ['subject_name' => 'Seni Budaya dan Keterampilan', 'subject_abb' => 'SBK'],
            ['subject_name' => 'Pendidikan Kewarganegaraan', 'subject_abb' => 'PKN'],
            ['subject_name' => 'Muatan Lokal', 'subject_abb' => 'MULOK'],
            ['subject_name' => 'Ilmu Pengetahuan Sosial', 'subject_abb' => 'IPS'],
            ['subject_name' => 'Agama', 'subject_abb' => 'AGAMA'],
            ['subject_name' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'subject_abb' => 'PJOK'],
            ['subject_name' => 'Teknologi Informasi dan Komunikasi', 'subject_abb' => 'TIK'],
            ['subject_name' => 'Matematika Umum', 'subject_abb' => 'MM.U'],
            ['subject_name' => 'Matematika Peminatan', 'subject_abb' => 'MM.P'],
            ['subject_name' => 'Informatika', 'subject_abb' => 'INFOR'],
            ['subject_name' => 'Kimia', 'subject_abb' => 'KIM'],
            ['subject_name' => 'Biologi', 'subject_abb' => 'BIO'],
            ['subject_name' => 'Fisika', 'subject_abb' => 'FIS'],
            ['subject_name' => 'Sejarah', 'subject_abb' => 'SJRH'],
            ['subject_name' => 'Seni', 'subject_abb' => 'SENI'],
            ['subject_name' => 'Sosiologi', 'subject_abb' => 'SOSIO'],
            ['subject_name' => 'Ekonomi', 'subject_abb' => 'EKO'],
            ['subject_name' => 'Geografi', 'subject_abb' => 'GEO'],
            ['subject_name' => 'Prakarya', 'subject_abb' => 'PKY'],
            ['subject_name' => 'Ilmu Pengetahuan Alam dan Sosial', 'subject_abb' => 'IPAS'],
            ['subject_name' => 'Pemeliharaan Dasar Teknik Otomotif', 'subject_abb' => 'PDTO'],
            ['subject_name' => 'Gambar Teknik Otomotif', 'subject_abb' => 'GTO'],
            ['subject_name' => 'Teknik Dasar Otomotif', 'subject_abb' => 'TDO'],
            ['subject_name' => 'Pemeliharaan Kelistrikan Kendaraan Ringan', 'subject_abb' => 'PKKR'],
            ['subject_name' => 'Pemeliharaan Sasis dan Pemindahan Tenaga Kendaraan Ringan', 'subject_abb' => 'PSPTKR'],
            ['subject_name' => 'Pemeliharaan Mesin Kendaraan Ringan', 'subject_abb' => 'PMKR'],
            ['subject_name' => 'Produk Kreatif dan Kewirausahaan', 'subject_abb' => 'PKK'],
            ['subject_name' => 'Praktik Kerja Siswa Menengah', 'subject_abb' => 'PKSM'],
            ['subject_name' => 'Pemeliharaan Sasis dan Sistem Suspensi Mekanik', 'subject_abb' => 'PSSM'],
            ['subject_name' => 'Pemeliharaan Mesin Sepeda Motor', 'subject_abb' => 'PMSM'],
            ['subject_name' => 'Pemeliharaan Body dan Sasis Mobil', 'subject_abb' => 'PBSM'],
            ['subject_name' => 'Etika Profesi', 'subject_abb' => 'EP'],
            ['subject_name' => 'Ekonomi Bisnis', 'subject_abb' => 'EB'],
            ['subject_name' => 'Pengantar Desain', 'subject_abb' => 'PD'],
            ['subject_name' => 'Administrasi Distribusi', 'subject_abb' => 'AD'],
            ['subject_name' => 'Analisis Pasar dan Strategi', 'subject_abb' => 'APAS'],
            ['subject_name' => 'Administrasi Umum', 'subject_abb' => 'AU'],
            ['subject_name' => 'Pengelolaan Arsip Lanjutan dan Implementasi Pengarsipan', 'subject_abb' => 'PALIP'],
            ['subject_name' => 'Administrasi Perkantoran', 'subject_abb' => 'AP'],
            ['subject_name' => 'Kearsipan', 'subject_abb' => 'KA'],
            ['subject_name' => 'Pengelolaan Administrasi dan Penyajian Data Modern', 'subject_abb' => 'PAPJDM'],
            ['subject_name' => 'Akuntansi Keuangan', 'subject_abb' => 'AK'],
            ['subject_name' => 'Komunikasi Jaringan Data', 'subject_abb' => 'KJD'],
            ['subject_name' => 'Sistem Komputer', 'subject_abb' => 'SK'],
            ['subject_name' => 'Dasar Desain Grafis', 'subject_abb' => 'DDG'],
            ['subject_name' => 'Pemrograman Dasar', 'subject_abb' => 'PD'],
            ['subject_name' => 'Desain Grafis Percetakan', 'subject_abb' => 'DGP'],
            ['subject_name' => 'Animasi 2D & 3D', 'subject_abb' => 'A2D3D'],
            ['subject_name' => 'Dasar Multimedia Interaktif', 'subject_abb' => 'DMI'],
            ['subject_name' => 'Teknik Produksi Audio-Video', 'subject_abb' => 'TPAV'],
        ]);
    }
}
