<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'showtime_id', 'seat_id', 'customer_name', 'customer_email', 'customer_phone', 'booking_date', 'status'
    ];
}
