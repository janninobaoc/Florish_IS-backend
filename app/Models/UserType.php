<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    const USER_TYPE_ADMIN = 1;
    const USER_TYPE_CASHIER = 2;

    protected $fillable = [
        'user_type'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
