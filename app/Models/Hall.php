<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cinema;

class Hall extends Model
{
    use HasFactory;
    protected $table = 'halls';
    public function cinema() {
        return $this->belongsTo(Cinema::class, 'cinema_id');
    }
}
