<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $table = 'friends';

    protected $fillable = [
        'id',
        'user_id',
        'friend_id',
    ];

    /**
     * Get the user associated with the friend record.
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the friend (user) associated with the friend record.
     */
    public function friendUser(): BelongsTo {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
