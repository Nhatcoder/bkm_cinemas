<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movies';

    protected $guarded = [];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actors')->withPivot('role');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function movieActor()
    {
        return $this->hasMany(MovieActor::class, 'movie_id', 'id');
    }

    public function movieGenre()
    {
        return $this->hasMany(MovieGenre::class, 'movie_id', 'id');
    }

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'showtimes');
    }
    public function cinemas()
    {
        return $this->belongsToMany(
            Cinema::class,   // Model để lấy ra rạp
            'showtimes',     // Tên bảng trung gian
            'movie_id',      // Foreign key trên bảng trung gian (liên kết với bảng hiện tại)
            'cinema_id'      // Foreign key trên bảng trung gian (liên kết với bảng cinema)
        )
        ->whereDate('showtimes.start_time', '>=', Carbon::today()->toDateString())  // So sánh theo ngày (không tính giờ)
        ->distinct();
    }
    
    
}
