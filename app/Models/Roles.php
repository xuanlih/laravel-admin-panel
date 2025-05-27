<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description',
        'active',
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }
}
