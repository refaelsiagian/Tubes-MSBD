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
            ['room_id' => 1, 'grade' => 7, 'level_id' => 1, 'major_id' => null, 'subclass' => '1'],
            ['room_id' => 2, 'grade' => 7, 'level_id' => 1, 'major_id' => null, 'subclass' => '2'],
            ['room_id' => 3, 'grade' => 8, 'level_id' => 1, 'major_id' => null, 'subclass' => '1'],
            ['room_id' => 4, 'grade' => 8, 'level_id' => 1, 'major_id' => null, 'subclass' => '2'],
            ['room_id' => 5, 'grade' => 9, 'level_id' => 1, 'major_id' => null, 'subclass' => '1'],
            ['room_id' => 6, 'grade' => 9, 'level_id' => 1, 'major_id' => null, 'subclass' => '2'],
            ['room_id' => 7, 'grade' => 10, 'level_id' => 2, 'major_id' => null, 'subclass' => null],
            ['room_id' => 8, 'grade' => 11, 'level_id' => 2, 'major_id' => null, 'subclass' => null],
            ['room_id' => 9, 'grade' => 12, 'level_id' => 2, 'major_id' => null, 'subclass' => null],
            ['room_id' => 10, 'grade' => 10, 'level_id' => 3, 'major_id' => '1', 'subclass' => null],
            ['room_id' => 11, 'grade' => 11, 'level_id' => 3, 'major_id' => '1', 'subclass' => 'TKRO'],
            ['room_id' => 12, 'grade' => 11, 'level_id' => 3, 'major_id' => '1', 'subclass' => 'TBSM'],
            ['room_id' => 13, 'grade' => 12, 'level_id' => 3, 'major_id' => '1', 'subclass' => 'TKRO'],
            ['room_id' => 14, 'grade' => 12, 'level_id' => 3, 'major_id' => '1', 'subclass' => 'TBSM'],
            ['room_id' => 15, 'grade' => 10, 'level_id' => 3, 'major_id' => '2', 'subclass' => 'Akuntansi'],
            ['room_id' => 16, 'grade' => 11, 'level_id' => 3, 'major_id' => '2', 'subclass' => 'Akuntansi'],
            ['room_id' => 17, 'grade' => 12, 'level_id' => 3, 'major_id' => '2', 'subclass' => 'Akuntansi'],
            ['room_id' => 18, 'grade' => 10, 'level_id' => 3, 'major_id' => '3', 'subclass' => 'Multimedia'],
            ['room_id' => 19, 'grade' => 11, 'level_id' => 3, 'major_id' => '3', 'subclass' => 'Multimedia'],
            ['room_id' => 20, 'grade' => 12, 'level_id' => 3, 'major_id' => '3', 'subclass' => 'Multimedia'],
        ]);
    }
}
