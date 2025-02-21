<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{

    protected $fillable = [
        "name",
        "email",
        "password"
    ];

    public static function factory(int $int)
    {
    }
}
