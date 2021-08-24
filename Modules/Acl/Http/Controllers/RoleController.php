<?php
namespace Modules\Acl\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Acl\Repositories\RoleRepo;
use Modules\Acl\Repositories\PermissionRepo;
use Modules\Acl\Http\Requests\RoleRequest;
use DB;
class RoleController extends Controller
{

    public $roleRepo;
    public $permissionRepo;
    public $title;
    public $description;
    public function __construct(RoleRepo $roleRepo,PermissionRepo $permissionRepo)
    {
        $this->title='Role';
        $this->description='description';
        $this->roleRepo=$roleRepo;
        $this->permissionRepo=$permissionRepo;

    }
    public function index(Request $request)
    {
        $title='Role List';
        $description= $this->description;
        $roles = $this->roleRepo->getOrderBy();
        return view('acl::role.index',compact('title','description','roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $title='Role Create';
        $description= $this->description;
        $permission = $this->permissionRepo->getAll();
        return view('acl::role.create',compact('title','description','permission'));
    }
    public function store(RoleRequest $request)
    {
        $role =  $this->roleRepo->store($request);
        $this->roleRepo->storePermission($request->input('permission'),$role->id);
        return redirect()->route('role')->with('success','Role created successfully');
    }
    public function show($id)
    {
        $title='Role Details';
        $description= $this->description;
        $role =$this->roleRepo->getById($id);
        return view('acl::role.show',compact('role','title','description'));
    }
    public function edit($id)
    {
        $title='Edit Leave';
        $description= $this->description;
        $role =$this->roleRepo->getById($id);
        $permissions = $this->permissionRepo->getAll();
        $rolePermission = $role->permissions->pluck('id')->all();
        return view('acl::role.edit',compact('title','description','role','permissions','rolePermission'));

    }
    public function update(RoleRequest $request)
    {
        $role = $this->roleRepo->update($request);
        $this->roleRepo->deletePermission($role->id);
        $this->roleRepo->storePermission($request->input('permission'),$role->id);
        return redirect()->route('role')->with('success','Role updated successfully');
    }
    public function destroy($id)
    {
        $this->roleRepo->delete($id); 
        return redirect()->route('role') ->with('success','Role deleted successfully');
    }
}
