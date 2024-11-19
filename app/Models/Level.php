<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = ['level_id'];
    protected $primaryKey = 'level_id';

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'level_id', 'level_id');
    }
}
