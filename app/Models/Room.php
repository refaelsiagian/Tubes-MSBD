<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function classTeacher()
    {
        return $this->hasOne(ClassTeacher::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

}
