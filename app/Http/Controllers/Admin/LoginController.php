<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth\Guard;
use App\Http\Requests\Login_Account\RequestAdminLogin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/admin';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function login(RequestAdminLogin $req){        
        if(Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password, 'status' => 0])){
            return redirect()->route('admin');
        }else{
            return redirect()->back()->with('error', "Đăng nhập thất bại");;
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('show.admin.login');
    }
}