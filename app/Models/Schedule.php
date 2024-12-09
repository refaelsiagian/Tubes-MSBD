<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subjectLevel()
    {
        return $this->belongsTo(SubjectLevel::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function teacher()
    {
        return $this->belongsTo(EmployeeJob::class);
    }

    public function teacher2()
    {
        return $this->belongsTo(EmployeeJob::class, 'teacher2_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_level_id');
    }

    public function scheduleTimes()
    {
        return $this->hasMany(ScheduleTime::class, 'lesson_id', 'lesson_id');
    }

    public function scopeFilterSchedules($query, $roomId, $day = 'Senin')
    {
        return $query->where('room_id', $roomId)
            ->when($day, function ($query, $day) {
                $query->whereHas('lesson', function ($lessonQuery) use ($day) {
                    $lessonQuery->where('day', $day);
                });
            });
    }
}
