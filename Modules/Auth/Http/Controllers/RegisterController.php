<?php
namespace Modules\Auth\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\User\Repositories\UserRepo;
class RegisterController extends Controller
{
    public $userRepo;
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo=$userRepo;
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth::register');
    }
    public function create(RegisterRequest $request)
    { 
        $check=$this->userRepo->store($request);
        return redirect()->route('login')->with('success','Your account is created!');
    }
}
