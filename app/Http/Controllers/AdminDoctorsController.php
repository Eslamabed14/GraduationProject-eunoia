<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDoctorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no' => ['required'],
            'gender' => ['required'],
            'age' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
        ]);

        $password = Hash::make($request->input('password'));

        $doctor = new Doctor();

        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->password = $password;
        $doctor->phone_no = $request->input('phone_no');
        $doctor->gender = $request->input('gender');
        $doctor->age = $request->input('age');
        $doctor->description = $request->input('description');
        $doctor->address = $request->input('address');
        $doctor->save();

        return redirect(route('admin.doctors'))->with('message', 'Doctor added successfully');
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'phone_no' => ['required'],
            'gender' => ['required'],
            'age' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
        ]);

        $password = Hash::make($request->input('password'));

        $doctor->update($request->all());
        $doctor->password = $password;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor updated successfully');

    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect(route('admin.doctors'))->with('message', 'Doctor deleted successfully');
    }
}
