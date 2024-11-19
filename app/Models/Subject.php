<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ['subject_id'];
    protected $primaryKey = 'subject_id';

    public function subjectLevel()
    {
        return $this->hasMany(SubjectLevel::class, 'subject_id', 'subject_id');
    }
}
