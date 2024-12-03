<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonCount extends Model
{
    use HasFactory;

    protected $table = 'lesson_count_view'; // Nama view
    protected $primaryKey = null; // Tidak ada primary key
    public $incrementing = false;
    public $timestamps = false;

    public function employeeJob()
    {
        return $this->belongsTo(EmployeeJob::class);
    }

    public function subjectLevel()
    {
        return $this->belongsTo(SubjectLevel::class);
    }
}
