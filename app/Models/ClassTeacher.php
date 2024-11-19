<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    use HasFactory;

    protected $guarded = ['class_teacher_id'];
    protected $primaryKey = 'class_teacher_id';


    public function employeeJob()
    {
        return $this->belongsTo(EmployeeJob::class, 'teacher_id', 'employee_job_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
