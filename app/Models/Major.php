<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['major_name'];

    public function subjectLevel()
    {
        return $this->hasMany(SubjectLevel::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }

    public function subjects()
{
    return $this->belongsToMany(Subject::class, 'subject_levels', 'major_id', 'subject_id');
}
}
