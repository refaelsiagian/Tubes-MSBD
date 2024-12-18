<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Presence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('l, d F Y');
    }

    public function getFormattedTimeAttribute()
    {
        return Carbon::parse($this->created_at)->format('H:i');
    }
}
