<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dg extends Model
{
    protected $table = 'dgs';

    public function users(){
        return $this->hasMany(User::Class, 'user_id');
    }
}
