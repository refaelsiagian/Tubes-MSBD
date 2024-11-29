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
}
