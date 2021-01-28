<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public function projects(){
        return $this->belongsToMany(Project::class, 'projects');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_project','project_id', 'user_id');
    }
}
