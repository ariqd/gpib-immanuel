<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'worship_id',
        'booking_seat',
        'user_id',
        'booking_name',
        'fixed'
    ];

    public function worship()
    {
        return $this->belongsTo(Worship::class);
    }
}
