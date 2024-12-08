<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function classTeacher()
    {
        return $this->hasOne(ClassTeacher::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function employeeJob()
    {
        return $this->hasMany(EmployeeJob::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function classAdvisor()
    {
        return $this->hasOne(ClassAdvisor::class);
    }

    public function getClassNameAttribute()
    {
        // Ambil nama level
        $levelName = $this->level->level_name ?? '';

        // Gabungkan grade dan subclass (jika ada)
        $className = $this->grade;
        if ($this->subclass) {
            $className .= '-' . $this->subclass;
        }

        // Tambahkan nama level
        $className .= ' ' . strtoupper($levelName);

        return $className;
    }

}
