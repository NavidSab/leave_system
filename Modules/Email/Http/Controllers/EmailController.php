<?php

namespace Modules\Email\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Email\Repositories\EmailRepo;
use Modules\Email\Http\Requests\EmailLeaveRequest;

class EmailController extends Controller
{

    public $emailRepo;

    public function __construct(EmailRepo $emailRepo){
        $this->emailRepo=$emailRepo;
    }
    public function leaveConfirm(Request $request){
        $confirm=$this->emailRepo->confirmLeave($request);
        return redirect()->route('email')->with('success','Your Request Is Send!');
    }
    public function index(){
        return view('email::message.index');

    }
    
}
