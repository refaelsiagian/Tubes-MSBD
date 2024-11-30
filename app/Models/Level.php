<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function employeeJob()
    {
        return $this->hasMany(EmployeeJob::class);
    }
}
