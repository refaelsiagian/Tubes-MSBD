<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $guarded = ['semester_id'];
    protected $primaryKey = 'semester_id';

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'semester_id', 'semester_id');
    }
}
