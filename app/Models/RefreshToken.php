<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RefreshToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'refresh_token',
        'expires_at'
    ];


    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
