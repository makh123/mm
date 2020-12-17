<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
    protected $casts=[
        'images'=>'array',

        'created_at' => 'datetime:Y-m-d',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user');
    }

    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->roles->contains('role_name' , $role);
        }
        foreach ($role as $r) {
            if($this->hasRole($r->role_name)) {
                return true;
            }
        }
        return false;

        return !! $role->intersect($this->roles)->count();
    }
}
