<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lessonType()
    {
        return $this->belongsTo(LessonType::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
