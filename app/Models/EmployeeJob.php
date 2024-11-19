<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeJob extends Model
{
    use HasFactory;

    protected $guarded = ['employee_job_id'];
    protected $primaryKey = 'employee_job_id';

    public function classTeacher()
    {
        return $this->hasOne(ClassTeacher::class, 'employee_job_id', 'teacher_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'employee_job_id', 'teacher_id');
    }
}
