<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SentimenstResource;
use App\Http\Controllers\API\BaseController;
use App\Models\Sentiment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SentimenstController extends BaseController
{

    public function index()
    {
        $Sentiments = Sentiment::all();
        return view('admin.Sentiments.index', compact('Sentiments'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request , $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error !', $validator->errors());
        }
        $Sentiment = new Sentiment();
        $Sentiment->description = $request->input('description');
        $Sentiment->status = $request->input('status');
        $Sentiment->date = $request->input('date');
        $Sentiment->user_id = $user->id;
        $Sentiment->save();
        return $this->sendResponse(new SentimenstResource($Sentiment), 'Sentiment Updated successfully!');

    }


    public function show($id)
    {
        $Sentiment = Sentiment::find($id);

        if (is_null($Sentiment)) {
            return $this->sendError('Sentiment not found!');
        }

        return $this->sendResponse(new SentimenstResource($Sentiment), 'Sentiment Found Successfully!');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
