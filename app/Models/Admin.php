<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'username',
        'name',
        'role_id',
        'email',
        'password',
    ];

    protected $table = 'admin';

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
