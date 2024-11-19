<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'employee_id';

    public function employeeJob()
    {
        return $this->hasMany(EmployeeJob::class, 'employee_id', 'employee_id');
    }
    
}
