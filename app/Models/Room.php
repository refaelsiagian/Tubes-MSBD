<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['room_id'];
    protected $primaryKey = 'room_id';

    public function classTeacher()
    {
        return $this->hasOne(ClassTeacher::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'room_id', 'room_id');
    }

}
