<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fine extends Model
{
    protected $fillable = [
        'fine_name',
        'fine_price',
    ];

}
