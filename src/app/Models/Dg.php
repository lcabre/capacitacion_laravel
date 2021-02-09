<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Dg extends Model
{
    protected $table = 'dgs';

    public function users(){
        return $this->hasMany(User::Class, 'dg_id');
    }
}
