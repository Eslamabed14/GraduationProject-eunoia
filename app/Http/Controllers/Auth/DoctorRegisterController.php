<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorRegisterController extends Controller
{

    public function register(){
        return view('doctor.register');
    }

    public function confirmregister(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $password = Hash::make($request->input('password'));

        $doctor = new Doctor();

        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->password = $password;
        $doctor->save();

        return redirect(route('profile', $doctor->id));
    }


}
