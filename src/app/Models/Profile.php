<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'user_profile';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
