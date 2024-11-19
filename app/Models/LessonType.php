<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonType extends Model
{
    use HasFactory;

    protected $guarded = ['type_id'];
    protected $primaryKey = 'type_id';

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'type_id', 'type_id');
    }
}
