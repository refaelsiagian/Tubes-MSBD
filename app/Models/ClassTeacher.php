<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function employeeJob()
    {
        return $this->belongsTo(EmployeeJob::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
