<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Art;
use App\Models\Doctor;
use App\Models\Lifestyle;
use App\Models\Move;
use App\Models\Sentiment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class DoctorController extends Controller
{
    public function requests()
    {
        $appointments = Appointment::where('status', 'pending')->where('doctor_id', Auth::guard('webdoctor')->user()->id)->get();
        return view('doctor.requests', compact('appointments'));
    }

    public function appointments()
    {
        $appointments = Appointment::where('status', 'accept')->where('doctor_id', Auth::guard('webdoctor')->user()->id)->get();
        return view('doctor.appointments', compact('appointments'));
    }

    public function changeStatus(Request $request, $id)
    {
        Appointment::where('id', $id)->update(['status' => $request->status]);
        return back();
    }

    public function profile($id)
    {
        if ($id == Auth::guard('webdoctor')->user()->id) {
            $doctor = Doctor::find($id);
            return view('doctor.profile', compact('doctor'));
        } else
            return "error 404";
    }
    public function update(Request $request, $id)
    {

        $input = $request->all();

        $doctor = Doctor::find($id);

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            echo "error";
        }

        $password = Hash::make($request->input('password'));

        $doctor->name = $input['name'];
        $doctor->email = $input['email'];
        $doctor->password = $password;
        $doctor->phone_no = $input['phone_no'];
        $doctor->address = $input['address'];
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor updated successfully');
    }

    public function patientdetails($id)
    {
        $user = User::find($id);
        $moves = Move::all();
        $arts = Art::all();
        $lifestyle = Lifestyle::where('user_id', $id)->first();
        $Sentiment = Sentiment::where('user_id', $id)->first();
        $appointments = Appointment::where('status', 'accept')->where('user_id', $id)->get();
        return view('doctor.patient_details', compact('user', 'appointments', 'moves', 'arts', 'lifestyle', 'Sentiment'));
    }

    public function patients()
    {
        $id =  Auth::guard('webdoctor')->user()->id;
        $users = User::where('doctor_id', $id)->get();
        return view('doctor.patients', compact('users'));
    }

    public function updatenote(Request $request, $id){

        $input = $request->all();

        $user = User::find($id);

        $validator = Validator::make($input, [
            'doctor_note' => 'required'
        ]);

        if ($validator->fails()) {
            echo "error";
        }

        $user->doctor_note = $input['doctor_note'];
        $user->save();

        return redirect()->back();

    }
}
