<?php

namespace Modules\Acl\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;
use Modules\Acl\Entities\Permission;

class Role extends Model
{
    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class , 'role_permissions');
    // }
    protected $fillable = ['name'];
    protected $table='roles';

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }
    public function users()
    {
         return $this->belongsToMany(User::class);
    }
}
