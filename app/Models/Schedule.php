<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = ['schedule_id'];
    protected $primaryKey = 'schedule_id';

    public function subject_level()
    {
        return $this->belongsTo(SubjectLevel::class, 'subject_level_id', 'subject_level_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'lesson_id');
    }

    public function teacher()
    {
        return $this->belongsTo(EmployeeJob::class, 'teacher_id', 'employee_job_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'semester_id');
    }
}
