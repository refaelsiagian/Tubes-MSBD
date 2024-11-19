<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['lesson_id'];
    protected $primaryKey = 'lesson_id';

    public function lessonType()
    {
        return $this->belongsTo(LessonType::class, 'type_id', 'type_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'level_id');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'lesson_id', 'lesson_id');
    }
}
