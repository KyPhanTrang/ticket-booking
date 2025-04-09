<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hall;
use App\Models\Movie;

class Showtime extends Model
{
    // use HasFactory;
    protected $fillable = [
        'movie_id', 'hall_id', 'show_time', 'price'
    ];

    protected $table = 'showtimes';
    public function hall() {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

    public function movie() {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
