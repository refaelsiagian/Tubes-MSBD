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
        return $this->belongsToMany(Job::class, 'employee_jobs', 'employee_id', 'job_id')
                    ->withPivot('level_id');
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }

    public function penalty()
    {
        return $this->hasMany(Penalty::class);
    }
    
    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class);
    }

    public function jobsExcludingSpecificIds()
    {
        return $this->hasMany(EmployeeJob::class, 'employee_id', 'id')
                    ->whereNotIn('job_id', [1, 2, 3, 4]);
    }

    public function scopeRealJobs($query)
    {
        return $query->whereHas('jobsExcludingSpecificIds');
    }



}