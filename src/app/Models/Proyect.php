<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Proyect extends Model
{
    protected $table = 'proyects';

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_proyect','proyect_id', 'user_id');
    }
}
