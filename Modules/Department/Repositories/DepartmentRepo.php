<?php
namespace Modules\Department\Repositories;
use Modules\Department\Entities\Department;
use Illuminate\Support\Facades\Hash;
use DB;
class DepartmentRepo
{

    public function getWithPaginate()
    {
        return Department::orderBy('id','DESC')->paginate(5);
    }
    public function getAll()
    {
        return Department::orderBy('id','DESC')->get();
    }
    public function findById($id)
    {
        return Department::find($id);
    }
    public function delete($id)
    {
        return Department::find($id)->delete();
    }
    public function store($request)
    {
        return Department::create([
            'name'     => $request->name
        ]);
    }



    public function storeUser(array $user , $department_id)
    {
        foreach($user as $users){
        DB::table('department_users')->insert([
            'department_id'       => $department_id,
            'user_id'             => $users
         ]);
        }
    }

    public function deleteUser($department_id){
        DB::table('department_users')->where('department_id',$department_id)->delete();
    }




    public function update($request)
    {
     
        $role =  Department::find($request->department_id);
        $result = tap($role)->update([
            'name'        =>$request->name
        ]);
        return $result;

        
    }


}
