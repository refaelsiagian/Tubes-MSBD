<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAdvisor extends Model
{
    use HasFactory;

    protected $table = 'class_advisors_view'; // Nama view
    protected $primaryKey = null; // Tidak ada primary key
    public $incrementing = false;
    public $timestamps = false;

    public function employeeJob()
    {
        return $this->belongsTo(EmployeeJob::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
