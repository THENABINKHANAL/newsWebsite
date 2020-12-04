<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo = '/admin';
    //


    public function showLoginForm()
    {
        return view('auth.adminlogin')->with(array("message"=>" "));
    }
    public function username()
    {
        return 'name';
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        return view('auth.adminlogin')->with(array("message"=>"Wrong username or password. Please try again."));
    }
}
