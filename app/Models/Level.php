<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['level_name'];

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function employeeJob()
    {
        return $this->hasMany(EmployeeJob::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_levels', 'level_id', 'subject_id')
                ->withPivot('major_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

}
