<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitations';

    protected $fillable = [
        'id',
        'sender_id',
        'receiver_id',
    ];

    /**
     * Get the sender user associated with the invitation.
     */
    public function sender(): BelongsTo {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the receiver user associated with the invitation.
     */
    public function receiver(): BelongsTo {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
