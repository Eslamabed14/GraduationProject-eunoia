<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends BaseController
{
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'date' => 'required',
            'time' => 'required',
            'day' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('please Validate error', $validator->errors());
        }

        $user = Auth::user();

        $input['user_id'] = $user->id;
        $input['doctor_id'] = $user->doctor_id;
        $appointment = Appointment::create($input);
        return $this->sendResponse($appointment, 'Appointment added!');

    }

}
