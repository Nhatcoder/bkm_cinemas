<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Showtime extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'showtimes';

    protected $guarded = [];
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function getCanCancelAttribute()
    {
        $now = \Carbon\Carbon::now();

        $startTime = \Carbon\Carbon::parse($this->start_time);

        $timeDifferenceInMinutes = $now->diffInMinutes($startTime, false);

        return $timeDifferenceInMinutes >= 120;
    }
}
