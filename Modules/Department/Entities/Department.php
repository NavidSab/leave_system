<?php

namespace Modules\Department\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;
use Modules\Department\Entities\Department;

class Department extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'department_users', 'department_id', 'user_id');
    }
   
    
}
