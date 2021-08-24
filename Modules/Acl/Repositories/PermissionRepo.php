<?php
namespace Modules\Acl\Repositories;
use Modules\Acl\Entities\Role;
use Modules\Acl\Entities\Permission;
use Illuminate\Support\Facades\Hash;
class PermissionRepo
{
    public function getRoles()
    {
        return Permission::select('name', 'id')->get();
    }
    public function getById($id){
        return Permission::find($id);
    }
    public function getAll(){
        return Permission::get();
    }
    public function getOrderBy(){
        return Permission::orderBy('id','DESC')->paginate(5);
    }

    public function store($request){
        return Permission::create([
            'name' => $request->input('name')
        ]);
    }
    public function delete($id)
    {
        return Permission::find($id)->delete();
    }
    public function update($request){
        $role =  Permission::find($request->permission_id);
        $result = tap($role)->update([
            'name'        =>$request->name
        ]);
        return $result;
    }
}
