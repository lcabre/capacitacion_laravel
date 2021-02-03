<?php

namespace App;

use App\Models\Dg;
use App\Models\Profile;
use App\Models\Proyect;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_role','user_id', 'role_id');
    }

    public function checkRole($roles){
        return $this->roles()->whereIn('slug', $roles)->count();
    }

    public function dg(){
        return $this->belongsTo(Dg::class, 'dg_id');
    }
    public function proyect(){
        return $this->belongsToMany(Proyect::class, 'user_proyect','user_id', 'proyect_id');
    }
    public function profile(){
        return $this->hasOne(Profile::class, 'user_id');
    }
}
