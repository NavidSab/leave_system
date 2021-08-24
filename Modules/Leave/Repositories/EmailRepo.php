<?php
namespace Modules\Leave\Repositories;
use Modules\Leave\Entities\Email;
use Modules\User\Entities\User;
use Modules\Department\Entities\Department;
use DB;
use Auth;
class EmailRepo
{

    public function store($id,$from,$to,$department_id)
    {



            $department=Department::where('id', $department_id)->get('name')->first();
            $department_users=DB::table('department_users')->where('department_id', $department_id)->get('user_id');
            Email::create([
                'leave_id'          => $id,
                'name'              => Auth::user()->name,
                'from_date'         => $from,
                'to_date'           => $to,
                'department'        => $department['name'],
                'code'              => md5(uniqid(rand(), true)),
                'email'             => 'mohd@king.graphics',
                'type'              =>  'admin'

            ]);
            Email::create([
                'leave_id'          => $id,
                'name'              => Auth::user()->name,
                'from_date'         => $from,
                'to_date'           => $to,
                'department'        => $department['name'],
                'code'              => md5(uniqid(rand(), true)),
                'email'             => 'donna.marie@king.graphics',
                'type'              =>  'admin'

            ]);
            foreach($department_users as $item){
                $email=User::where('id', $item->user_id)->get('email')->first();
                 Email::create([
                    'leave_id'          => $id,
                    'name'              => Auth::user()->name,
                    'from_date'         => $from,
                    'to_date'           => $to,
                    'department'        => $department['name'],
                    'code'              => md5(uniqid(rand(), true)),
                    'email'             => $email['email'],
                    
                ]);
            }
            return;
    }


}
    
