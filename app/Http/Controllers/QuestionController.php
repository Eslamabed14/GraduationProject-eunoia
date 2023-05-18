<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Survey;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\QuestionResource as QuestionResource;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $surveys = Survey::all();
        $questions = Question::all();
        return view(('admin.questions.questions'), compact('questions', 'surveys'));
    }


    public function create()
    {
        $surveys = Survey::all();
        return view('admin.questions.add_questions', compact('surveys'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'survey_id' => ['required', 'integer']
        ]);
        $question = new question();
        $question->question = $request->input('question');
        $question->survey_id = $request->input('survey_id');
        $question->save();
        return redirect(route('questions'))->with('message', 'success');
    }


    public function show($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return $this->sendError('not found');
        }
        return $this->sendResponse(new QuestionResource($question), 'Success');
    }


    public function edit($id)
    {
        $surveys = Survey::all();
        $question = question::find($id);
        return view('admin.questions.edit_question', compact('question', 'surveys'));
    }


    public function update(Request $request, $id)
    {
        $question = question::find($id);
        $request->validate([
            'question' => 'required',
            'survey_id' => ['required', 'integer']
        ]);
        $question->update($request->all());
        $question->save();
        return redirect(route('questions'))->with('message', 'updated successfully');
    }


    public function destroy($id)
    {
        $question = question::find($id);
        $question->delete();
        return redirect(route('questions'))->with('message', 'deleted successfully');
    }
}
