<?php

namespace Modules\Leave\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\Leave\Entities\Leave;

class Email extends Model
{
    protected $fillable = ['leave_id','name','from_date','to_date','department','email','code','type'];


    public function leave()
    {
        return $this->belongsTo(Leave::class, 'leave_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    
}
