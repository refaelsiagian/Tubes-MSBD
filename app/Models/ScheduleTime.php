<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTime extends Model
{
    use HasFactory;

    protected $table = 'schedule_time_view'; // Nama view
    protected $primaryKey = null; // Tidak ada primary key
    public $incrementing = false;
    public $timestamps = false;

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
