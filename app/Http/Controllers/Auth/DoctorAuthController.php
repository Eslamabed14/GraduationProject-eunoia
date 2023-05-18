<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;



class DoctorAuthController extends Controller
{

    public function index(){
        return view('profile');
    }

    public function login(){

        if(!Auth::guard('webdoctor')->check()) {
            return view('doctor.login');
        } else

        return redirect(route('profile', Auth::guard('webdoctor')->user()->id));
    }

    public function confirmlogin(Request $request){
        if (Auth::guard('webdoctor')->attempt($request->only(['email', 'password']))) {
            return redirect(route('profile', Auth::guard('webdoctor')->user()->id));
        }
        return redirect()->back()->with('error', 'falseeeee');
    }

    public function logout(){
        Auth::guard('webdoctor')->logout();
        return redirect(route('doctor.login'));
    }
}
