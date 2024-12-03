<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['job_name', 'salary'];
    public $timestamps = false;

    public function employeeJob()
    {
        return $this->hasMany(Employee::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_jobs', 'job_id', 'employee_id');
    }

}
