<?php
namespace Modules\Auth\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth::login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success','Welcome Back Dear '.Auth::user()->name);
        }
        return redirect()->route('login')->with('failed','Credentials are Wrong!');
    }
}
