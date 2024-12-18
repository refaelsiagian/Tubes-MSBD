<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeJob extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function classTeacher()
    {
        return $this->hasOne(ClassTeacher::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function lessonCount()
    {
        return $this->hasMany(LessonCount::class);
    }

    public function classAdvisor()
    {
        return $this->hasMany(ClassAdvisor::class);
    }

    public function teacherLessons()
    {
        return $this->hasMany(TeacherAllLessons::class);
    }
}
