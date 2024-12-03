<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['subject_name', 'subject_abb'];

    public function subjectLevel()
    {
        return $this->hasMany(SubjectLevel::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'subject_level_id');
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class, 'subject_levels', 'subject_id', 'level_id', 'major_id');
    }

    public function majors()
{
    return $this->belongsToMany(Major::class, 'subject_levels', 'subject_id', 'major_id');
}
}
