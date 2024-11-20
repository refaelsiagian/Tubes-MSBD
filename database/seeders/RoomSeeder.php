<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::insert([
            ['id' => 1, 'grade' => 7, 'level_id' => 1, 'major_id' => null, 'subclass' => '1'],
            ['id' => 2, 'grade' => 7, 'level_id' => 1, 'major_id' => null, 'subclass' => '2'],
            ['id' => 3, 'grade' => 8, 'level_id' => 1, 'major_id' => null, 'subclass' => '1'],
            ['id' => 4, 'grade' => 8, 'level_id' => 1, 'major_id' => null, 'subclass' => '2'],
            ['id' => 5, 'grade' => 9, 'level_id' => 1, 'major_id' => null, 'subclass' => '1'],
            ['id' => 6, 'grade' => 9, 'level_id' => 1, 'major_id' => null, 'subclass' => '2'],
            ['id' => 7, 'grade' => 10, 'level_id' => 2, 'major_id' => null, 'subclass' => null],
            ['id' => 8, 'grade' => 11, 'level_id' => 2, 'major_id' => null, 'subclass' => null],
            ['id' => 9, 'grade' => 12, 'level_id' => 2, 'major_id' => null, 'subclass' => null],
            ['id' => 10, 'grade' => 10, 'level_id' => 3, 'major_id' => '1', 'subclass' => null],
            ['id' => 11, 'grade' => 11, 'level_id' => 3, 'major_id' => '1', 'subclass' => 'TKRO'],
            ['id' => 12, 'grade' => 11, 'level_id' => 3, 'major_id' => '1', 'subclass' => 'TBSM'],
            ['id' => 13, 'grade' => 12, 'level_id' => 3, 'major_id' => '1', 'subclass' => 'TKRO'],
            ['id' => 14, 'grade' => 12, 'level_id' => 3, 'major_id' => '1', 'subclass' => 'TBSM'],
            ['id' => 15, 'grade' => 10, 'level_id' => 3, 'major_id' => '2', 'subclass' => 'Akuntansi'],
            ['id' => 16, 'grade' => 11, 'level_id' => 3, 'major_id' => '2', 'subclass' => 'Akuntansi'],
            ['id' => 17, 'grade' => 12, 'level_id' => 3, 'major_id' => '2', 'subclass' => 'Akuntansi'],
            ['id' => 18, 'grade' => 10, 'level_id' => 3, 'major_id' => '3', 'subclass' => 'Multimedia'],
            ['id' => 19, 'grade' => 11, 'level_id' => 3, 'major_id' => '3', 'subclass' => 'Multimedia'],
            ['id' => 20, 'grade' => 12, 'level_id' => 3, 'major_id' => '3', 'subclass' => 'Multimedia'],
        ]);
    }
}
