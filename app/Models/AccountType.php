<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;
    protected $table = 'account_types';

    protected $fillable = [
        'id',
        'account_type_name',
    ];

    /**
     * Get the users associated with the account type.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
