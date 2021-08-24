<?php
namespace Modules\Acl\Repositories;
use Modules\Acl\Entities\Role;
use Modules\Acl\Entities\Permission;
use Illuminate\Support\Facades\Hash;
use DB;
class RoleRepo
{
    public function getRoles()
    {
        return Role::select('name', 'id')->get();
    }
    public function getById($id){
        return Role::find($id);
    }
    public function getPermission()
    {
        $role = new Role();
        return $role->roles();
    }
    
    public function getOrderBy(){
        return Role::orderBy('id','DESC')->paginate(5);
    }

    public function store($request){
        return Role::create([
            'name' => $request->input('name')
        ]);


    }
    public function storePermission(array $permission , $role_id)
    {
        foreach($permission as $permissions){
        DB::table('role_permissions')->insert([
            'role_id'       => $role_id,
            'permission_id' => $permissions
         ]);
        }
    }
    public function deletePermission($role_id){
        DB::table('role_permissions')->where('role_id',$role_id)->delete();
    }
    public function delete($id)
    {
        return Role::find($id)->delete();
    }
    public function update($request){
        $role =  Role::find($request->role_id);
        $result = tap($role)->update([
            'name'        =>$request->name
        ]);
        return $result;
    }
}
