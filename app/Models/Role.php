<?php

namespace CodePub\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable= [
        'name',
        'description'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function addPermission(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    public function revokePermission(Permission $permission)
    {
        return $this->permissions()->detach($permission);
    }
}
