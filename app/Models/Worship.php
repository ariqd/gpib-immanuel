<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    use HasFactory;

    protected $fillable = [
        'worship_name',
        'worship_date',
        'worship_time',
    ];
}
