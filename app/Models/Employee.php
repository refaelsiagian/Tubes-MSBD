<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $keyType = 'string';

    public function employeeJob()
    {
        return $this->hasMany(EmployeeJob::class);
    }
    
}
