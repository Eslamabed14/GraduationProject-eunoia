<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\DoctorResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BaseController
{
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse(new UserResource($user), 'User found successfully');
    }


    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'age' => 'required',
            'phone_no' => 'required',
            'gender' => 'required'
        ]);

        $password = Hash::make($input['password']);

        if ($validator->fails()) {
            return $this->sendError('Validation Error !', $validator->errors());
        }

        if ($user->id != Auth::user()->id) {
            return $this->sendError('You dont have right to edit', $validator->errors());
        }

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $password;
        $user->age = $input['age'];
        $user->phone_no = $input['phone_no'];
        $user->gender = $input['gender'];
        $user->save();

        return $this->sendResponse(new UserResource($user), 'User Updated successfully!');
    }

    public function updateSurveyScore(Request $request, $id)
    {
        $input = $request->all();

        $user = User::find($id);

        $validator = Validator::make($input, [
            'survey_score' => 'required',
            'disease_id' => 'required'
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error !', $validator->errors());
        }

        if ($user->id != Auth::user()->id) {
            return $this->sendError('You dont have right to edit', $validator->errors());
        }

        $user->survey_score = $input['survey_score'];
        $user->disease_id  = $input['disease_id'];

        $user->save();

        return $this->sendResponse(new UserResource($user), 'Survey Score Updated successfully!');
    }

    public function result($id){

        $user = User::find($id);
        $disease = Disease::where('id', $user->disease_id)->first();
        $survey = Survey::where('disease_id', $disease->id)->first();
        $questions = Question::where('survey_id', $survey->id)->get();

        $max = count($questions)*3;

        $no = ($max/100) * 20;
        $low = ($max/100) * 40;
        $mod = ($max/100) * 60;
        $sev = ($max/100) * 80;
        $ex = $max;

        if ($user->survey_score <= $no ) {
            $result = 'subclinical';
        }elseif ($user->survey_score <= $low && $user->survey_score > $no ){
            $result = 'Mild';
        }elseif ($user->survey_score <= $mod && $user->survey_score > $low ){
            $result = 'Moderate';
        }elseif ($user->survey_score <= $sev && $user->survey_score > $mod ){
            $result = 'Severe';
        }elseif($user->survey_score <= $ex && $user->survey_score > $sev ){
            $result = 'Extreme';
        }else{
            $result = 'There is error computing your score and definning your level, try again';
        }

        return response()->json($result, 200);
    }
}
