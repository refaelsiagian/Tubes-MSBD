<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectLevel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

  public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function lessonCount()
    {
        return $this->hasMany(LessonCount::class);
    }
}
