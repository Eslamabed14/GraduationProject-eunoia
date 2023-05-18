<?php

namespace App\Http\Controllers;

use App\Models\Sentiment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.admin');
    }

    public function index()
    {
        $users = User::where('user_type' , 0)->get();
        return view('admin.users.users', compact('users'));
    }

    public function create()
    {
        return view('admin.users.add');
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
        ]);

        $password = Hash::make($request->input('password'));

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $password;
        $user->phone_no = $request->input('phone_no');
        $user->gender = $request->input('gender');
        $user->age = $request->input('age');
        $user->save();

        return redirect(route('admin.users'))->with('message', 'User added successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no' => ['required'],
            'gender' => ['required'],
            'age' => ['required'],
        ]);

        $password = Hash::make($request->input('password'));

        $user->update($request->all());
        $user->password = $password;
        $user->save();
        return redirect()->back()->with('message', 'user updated successfully');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.users'))->with('message', 'User deleted successfully');
    }
    public function Sentiments($id)
    {
        $user = User::find($id);
        $Sentiments = Sentiment::where('user_id',$id)->get();
        return view('admin.users.Sentiments',compact('Sentiments' ,'user'));
    }

}
