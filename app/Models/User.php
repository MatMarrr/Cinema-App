<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'google_id',
        'role_id',
        'name',
        'login',
        'email',
        'password',
        'account_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the role associated with the user.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the account type associated with the user.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(AccountType::class, 'account_type');
    }

    /**
     * Get the invitations sent by the user.
     */
    public function sentInvitations(): HasMany
    {
        return $this->hasMany(Invitation::class, 'sender_id');
    }

    /**
     * Get the invitations received by the user.
     */
    public function receivedInvitations(): HasMany
    {
        return $this->hasMany(Invitation::class, 'receiver_id');
    }

    /**
     * Get the friends associated with the user.
     */
    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    /**
     * Check if the user has already invited another user by their ID.
     */
    public function hasInvited(int $userId): bool
    {
        return $this->sentInvitations()->where('receiver_id', $userId)->exists();
    }

    /**
     * Check if the user has another user as a friend by their ID.
     */
    public function hasFriend(int $friendId): bool
    {
        return $this->friends->contains($friendId);
    }

}
