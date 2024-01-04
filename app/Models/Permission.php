<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    public $table = 'permissions';

 
    protected $fillable = [
        'title',
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
