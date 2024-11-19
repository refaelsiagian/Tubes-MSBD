<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = ['job_id'];
    protected $primaryKey = 'job_id';

    public function employeeJob()
    {
        return $this->hasMany(Employee::class, 'job_id', 'job_id');
    }

}
