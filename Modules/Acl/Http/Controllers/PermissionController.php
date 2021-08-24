<?php
namespace Modules\Acl\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Acl\Repositories\PermissionRepo;
use Modules\Acl\Http\Requests\PermissionRequest;
use DB;
class PermissionController extends Controller
{

    public $permissionsRepo;
    public $title;
    public $description;
    public function __construct(PermissionRepo $permissionsRepo)
    {
         $this->permissionsRepo=$permissionsRepo;
         $this->title='Permission';
         $this->description='description';
    }
    public function index(Request $request)
    {
        $title='Permission List';
        $description= $this->description;
        $permissions = $this->permissionsRepo->getOrderBy();
        return view('acl::permission.index',compact('title','description','permissions'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $title='Permission Create';
        $description= $this->description;
        return view('acl::permission.create',compact('title','description'));
    }
    public function store(PermissionRequest $request)
    {
        $role =  $this->permissionsRepo->store($request);
        return redirect()->route('permission')->with('success','Permission created successfully');
    }
    public function show($id)
    {
        $role =$this->permissionsRepo->getById($id);
        $acls =$this->permissionsRepo->getWithJoin($id); 
        return view('acl::permission.show',compact('role','acls'));
    }
    public function edit($id)
    {
        $title='Edit Leave';
        $description= $this->description;
        $permission =$this->permissionsRepo->getById($id);
        return view('acl::permission.edit',compact('permission','description','title'));
    }
    public function update(PermissionRequest $request)
    {
        $role = $this->permissionsRepo->update($request);
        return redirect()->route('permission')->with('success','Permission updated successfully');
    }
    public function destroy($id)
    {
        $this->permissionsRepo->delete($id); 
        return redirect()->route('permission') ->with('success','Permission deleted successfully');
    }
}
