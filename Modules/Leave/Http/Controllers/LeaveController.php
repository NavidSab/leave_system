<?php

namespace Modules\Leave\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Leave\Repositories\LeaveRepo;
use Modules\Department\Repositories\DepartmentRepo;
use Modules\Leave\Http\Requests\LeaveRequest;
use Modules\Leave\Http\Requests\UpdateLeaveRequest;



class LeaveController extends Controller
{

    public $leavetRepo;
    public $departmentRepo;
    public $title;
    public $description;
    public function __construct(LeaveRepo $leavetRepo,DepartmentRepo $departmentRepo ){
        $this->leavetRepo=$leavetRepo;
        $this->departmentRepo=$departmentRepo;
        $this->title='Leave';
        $this->description='description';
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        if(auth()->user()->hasRole('admin'))
        {
        $leaves=$this->leavetRepo->getAll();
        }
        else
        {
        $leaves=$this->leavetRepo->getMyItem();
        }
        $title='Leave List';
        $description= $this->description;
        return view('leave::index',compact('title','description','leaves'))->with( ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $departments=$this->departmentRepo->getAll();
        $title='Create Leave';
        $description= $this->description;
        return view('leave::create',compact('title','description','departments'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LeaveRequest $request)
    {
        $leave = $this->leavetRepo->store($request);
        return redirect()->route('leave')->with('success','Leave created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('leave::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $title='Edit Leave';
        $description= $this->description;
        $leave = $this->leavetRepo->findById($id);
        $departments=$this->departmentRepo->getAll();
        return view('leave::edit',compact('leave','departments','description','title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateLeaveRequest $request)
    {
        $leave=$this->leavetRepo->update($request);
        return redirect()->route('leave')->with('success','Leave updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->leavetRepo->delete($id);
        return redirect()->route('leave')->with('success','Leave deleted successfully');
    }
}
