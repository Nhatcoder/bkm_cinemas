<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $table = 'rewards';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_rewards', 'reward_id', 'user_id')
            ->withPivot('code', 'points_spent', 'quantity', 'status', 'used_at')
            ->withTimestamps();
    }
}
