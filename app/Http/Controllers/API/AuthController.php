<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
            // 'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return $this->sendError('please Validate error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('mohammedhassanahmedghazy')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User has registered successfully');

    }

    public function login(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            $success['token'] = $user->createToken('mohammedhassanahmedghazy')->accessToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User has login successfully');

        }

        else{
            return $this->sendError('please Check your cordinates', ['error' => 'Unauthorized']);
        }

    }

}
