<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTime extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'day', 'day');
    }

}
