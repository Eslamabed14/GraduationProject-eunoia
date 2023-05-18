<?php

namespace App\Http\Controllers\API;
use App\Models\Question;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\QuestionResource;
use Illuminate\Http\Request;

class ApiquestionController extends BaseController
{
    public function index()
    {
        $questions = Question::all();
        return $this->sendResponse(QuestionResource::collection($questions), 'Questions Receieved Successfully!');
    }

    public function show($id)
    {
        $question = Question::find($id);

        if (is_null($question)) {
            return $this->sendError('Question not found!');
        }

        return $this->sendResponse(new QuestionResource($question), 'Question Found Successfully!');
    }
}
