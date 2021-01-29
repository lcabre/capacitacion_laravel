<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'user_profile';

    public function profiles(){
        return $this->belongsToMany(Profile::class, 'user_profile','user_id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_profile','user_id');
    }
}
