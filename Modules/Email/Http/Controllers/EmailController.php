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
        if($confirm ){
            return redirect()->route('email')->with('Success','Your request has been successfully submitted.');
        }
        else
        {
            return redirect()->route('email')->with('Failed','You have already submitted this request.');

        }
    }
    public function index(){
        return view('email::message.index');

    }
    
}
