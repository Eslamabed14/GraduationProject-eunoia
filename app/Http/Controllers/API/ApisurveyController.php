<?php

namespace App\Http\Controllers\API;
use App\Models\Survey;
use App\Models\Question;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\SurveyResource;
use App\Http\Resources\QuestionResource;
use Illuminate\Http\Request;
use App\Models\Disease;

class ApisurveyController extends BaseController
{
    public function index()
    {
        $surveys = Survey::all();
        return $this->sendResponse(SurveyResource::collection($surveys), 'Surveys Receieved Successfully!');
    }

    public function show($id)
    {
        $survey = Survey::find($id);

        if (is_null($survey)) {
            return $this->sendError('Survey not found!');
        }

        return $this->sendResponse(new SurveyResource($survey), 'Survey Found Successfully!');
    }

    public function survey_question($id)
    {

        $survey = Survey::where('disease_id', $id)->first();

        if (is_null($survey)) {
            return $this->sendError('Survey not found!');
        }

        $questions = Question::where('survey_id', $survey->id)->get();
        if (is_null($questions)) {
            return $this->sendError('Questions not found!');
        }

        return $this->sendResponse(new QuestionResource($questions), 'Questions Found Successfully!');

    }
}
