<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    public function users(){
        return $this->belongsToMany(User::class, 'user_project', 'user_id');
    }
}
