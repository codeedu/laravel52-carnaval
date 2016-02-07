<?php

namespace CodePub\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    //$user->addRole('Admin')
    //$user->addRole($role);
    public function addRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->save(
                Role::whereName($role)->firstOrFail()
            );
        }

        return $this->roles()->save(
            Role::whereName($role->name)->firstOrFail()
        );

    }

    public function revokeRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->detach(
                Role::whereName($role)->firstOrFail()
            );
        }

        return $this->roles()->detach($role);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        if(is_array($role)) {
            foreach($role as $r) {
                if($this->roles->contains('name', $r)) {
                    return true;
                }
            }
            return false;
        }

        return $role->intersect($this->roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }
}
