<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAllLessons extends Model
{
    use HasFactory;

    protected $table = 'teacher_all_lessons_view'; // Nama view
    protected $primaryKey = null; // Tidak ada primary key
    public $incrementing = false;
    public $timestamps = false;

    public function employeeJob()
    {
        return $this->belongsTo(EmployeeJob::class, 'employee_id', 'id');
    }

    public function subjectLevel()
    {
        return $this->belongsTo(SubjectLevel::class, 'subject_level_id', 'id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
