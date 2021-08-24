<?php
namespace Modules\User\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepo;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Modules\Acl\Repositories\RoleRepo;
use Modules\User\Entities\User;

use DB;
use Auth;


class UserController extends Controller
{
    public $userRepo;
    public $roleRepo;
    public $title;
    public $description;
    public function __construct(UserRepo $userRepo,RoleRepo $roleRepo){
        $this->userRepo=$userRepo;
        $this->roleRepo=$roleRepo;
        $this->title='Users';
        $this->description='description';

        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $title='User List';
        $description= $this->description;
        $users =$this->userRepo->getWithPaginate();
        return view('user::index',compact('title','description','users'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $title='User Create';
        $description= $this->description;
        $roles = $this->roleRepo->getRoles();
            return view('user::create',compact('title','description','roles'));
    }
    public function store(UserRequest $request)
    {
        $user = $this->userRepo->store($request);
        $this->userRepo->storeRole($request->input('roles'),$user->id);
        return redirect()->route('user')->with('success','User created successfully');
    }
    public function show($id)
    {
        $title='Role Details';
        $description= $this->description;
        $user = $this->userRepo->findById($id);
        return view('user::show',compact('title','description','user'));
    }
    public function edit($id)
    {
        $title='Edit User';
        $description= $this->description;
        $user = $this->userRepo->findById($id);
        $roles = $this->roleRepo->getRoles();
        $userRole = $user->roles->pluck('id')->all();
        return view('user::edit',compact('title','description','user','roles','userRole'));
    }
    public function update(UpdateUserRequest $request)
    {
        $user=$this->userRepo->update($request);
        $this->userRepo->deleteRole($user->id);
        $this->userRepo->storeRole($request->input('roles'),$user->id);
        return redirect()->route('user')->with('success','User updated successfully');
    }
    public function destroy($id)
    {
        $this->userRepo->delete($id);
        return redirect()->route('user')->with('success','User deleted successfully');
    }
}