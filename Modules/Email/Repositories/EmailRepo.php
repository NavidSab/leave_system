<?php
namespace Modules\Email\Repositories;
use Modules\Email\Entities\Email;
use Modules\Leave\Entities\Leave;
use Modules\User\Entities\User;
use Modules\Department\Entities\Department;
use DB;
use Auth;

class EmailRepo
{
    public function storeLeave(Leave $leave)
    {
            $department=Department::where('id', $leave->department_id)->get('name')->first();
            $department_users=DB::table('department_users')->where('department_id', $leave->department_id)->get('user_id');
            
            Email::create([
                'leave_id'          => $leave->id,
                'name'              => Auth::user()->name,
                'from_date'         => $leave->from_date,
                'to_date'           => $leave->to_date,
                'department'        => $department['name'],
                'code'              => md5(uniqid(rand(), true)),
                'email'             => 'mohd@king.graphics',
                'type'              => 'admin'
            ]);
            Email::create([
                'leave_id'          => $leave->id,
                'name'              => Auth::user()->name,
                'from_date'         => $leave->from_date,
                'to_date'           => $leave->to_date,
                'department'        => $department['name'],
                'code'              => md5(uniqid(rand(), true)),
                'email'             => 'donna.marie@king.graphics',
                'type'              => 'admin'
            ]);
            foreach($department_users as $item){
                $email=User::where('id', $item->user_id)->get('email')->first();
                 Email::create([
                    'leave_id'          => $leave->id,
                    'name'              => Auth::user()->name,
                    'from_date'         => $leave->from_date,
                    'to_date'           => $leave->to_date,
                    'department'        => $department['name'],
                    'code'              => md5(uniqid(rand(), true)),
                    'email'             => $email['email'],
                ]);
            }
            return;
    }

    public function confirmLeave($request)
    {
        $email = Email::where(['is_send'=>1,'code'=>$request->code,'is_confirme'=>0])->update([
            'is_confirme'        =>$request->approve
        ]);
        return $email;
    }
}
