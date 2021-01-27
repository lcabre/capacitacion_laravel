<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Proyecto extends Model
{
    protected $table = 'proyectos';

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_proyecto','proyecto_id', 'user_id');
    }
}
