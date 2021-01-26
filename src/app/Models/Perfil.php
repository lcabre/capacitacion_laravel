<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
