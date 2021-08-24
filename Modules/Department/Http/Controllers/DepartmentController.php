<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Department\Repositories\DepartmentRepo;
use Modules\User\Repositories\UserRepo;
use Modules\Department\Http\Requests\DepartmentRequest;
use Modules\Department\Http\Requests\UpdateDepartmentRequest;



class DepartmentController extends Controller
{

    public $departmentRepo;
    public $userRepo;
    public $title;
    public $description;
    public function __construct(DepartmentRepo $departmentRepo,UserRepo $userRepo ){
        $this->departmentRepo=$departmentRepo;
        $this->userRepo=$userRepo;
        $this->title='Department';
        $this->description='description';
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $departments=$this->departmentRepo->getWithPaginate();
        $title='Department List';
        $description= $this->description;
        return view('department::index',compact('title','description','departments'))->with( ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $users=$this->userRepo->getAll();
        $title='Create Department';
        $description= $this->description;
        return view('department::create',compact('title','description','users'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DepartmentRequest $request)
    {
        $department = $this->departmentRepo->store($request);
        $this->departmentRepo->storeUser($request->input('user'),$department->id);
        return redirect()->route('department')->with('success','Department created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('department::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

        $title='Edit Department';
        $description= $this->description;
        $department = $this->departmentRepo->findById($id);
        $user = $this->userRepo->getAll();
        $departmentUsers = $department->users->pluck('id')->all();
        return view('department::edit',compact('department','user','departmentUsers','description','title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateDepartmentRequest $request)
    {
        $department=$this->departmentRepo->update($request);
        $this->departmentRepo->deleteUser($department->id);
        $this->departmentRepo->storeUser($request->input('user'),$department->id);
        return redirect()->route('department')->with('success','Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->departmentRepo->delete($id);
        return redirect()->route('department')->with('success','Department deleted successfully');
    }
}
