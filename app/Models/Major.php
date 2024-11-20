<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subjectLevel()
    {
        return $this->hasMany(SubjectLevel::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
