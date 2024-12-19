<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $fillable = [
        'fine_name',
        'fine_price',
    ];

    use HasFactory;

    public function penalty()
    {
        return $this->hasMany(Penalty::class);
    }

}
