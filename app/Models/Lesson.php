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
        return $this->belongsTo(LessonType::class, 'type_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function scheduleTime()
    {
        return $this->has(SubjectLevel::class);
    }

    public function dayTime()
    {
        return $this->belongsTo(DayTime::class, 'day', 'day');
    }
}
