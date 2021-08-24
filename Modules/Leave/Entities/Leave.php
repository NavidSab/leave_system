<?php

namespace Modules\Leave\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;
use Modules\Department\Entities\Department;

class Leave extends Model
{
    protected $fillable = ['date_to','user_id','department_id','document','date_from'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    
}
