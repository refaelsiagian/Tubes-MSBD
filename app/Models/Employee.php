<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'employee_name',
        'phone_number',
        'address',
        'account_number',
        'bank_name',
    ];
    

    public function employeeJob()
    {
        return $this->hasMany(EmployeeJob::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'employee_jobs', 'employee_id', 'job_id');
    }
    
}