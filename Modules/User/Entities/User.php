<?php
namespace Modules\User\Entities;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\Acl\Entities\Role;
use Modules\Acl\Entities\Permission;
use Modules\Department\Entities\Department;

class User extends Authenticatable
{
    use  Notifiable;
    protected $fillable = ['name','email','password'];
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_users', 'user_id', 'department_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'user_permissions');
    }

    public function hasRole(...$roles)
    {
       // dd($roles);

        foreach($roles as $role)
        {
            if($this->roles->contains('name',$role))
            {
                return true;
            }
        }
        return false;
    }

    public function hasPermission($permission)
    {
        return $this->hasPermissionThroughRole($permission) || (bool) $this->permissions->where('name',$permission->name)->count();
    }


    public function hasPermissionThroughRole($permission)
    {

        if (is_array($permission->roles) || is_object($permission->roles))
        {
            foreach($permission->roles as $role)
            {
                if($this->roles->contains($role))
                {
                    return true;
                }
            }
        }
        return false;
    }

    public function givePermission(...$permission)
    {
        $permissions = $this->getPermissions(array_flatten($permission));
        if($permissions === null)
        {
            return $this;
        }  
        $this->permissions()->saveMany($permissions);
        return $this; 
    }

    public function getPermissions(array $permissions)
    {
        return Permission::whereIn('name',$permissions)->get();
    }

    public function removePermission(...$permission)
    {
        $permissions = $this->getPermissions(array_flatten($permission));
        $this->permissions()->detach($permissions);
        return $this;
    }


    public function modifyPermission(...$permissions)
    {
        $this->permissions()->detach();
        return $this->givePermission($permissions);
    }




    
}
