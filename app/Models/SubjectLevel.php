<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectLevel extends Model
{
    use HasFactory;

    protected $guarded = ['subject_level_id'];
    protected $primaryKey = 'subject_level_id';

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'subject_level_id', 'subject_level_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'subject_id');
    }
}
