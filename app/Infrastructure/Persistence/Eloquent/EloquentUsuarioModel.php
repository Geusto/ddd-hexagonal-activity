<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentUsuarioModel extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'password',
        'role',
    ];
}
