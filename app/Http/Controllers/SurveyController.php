<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Survey;
use App\Models\Question;
use App\Http\Resources\SurveyResource as SurveyResource;
use App\Models\Disease;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $surveys=Survey::all();
        return view('admin.surveys.surveys',compact('surveys'));
    }


    public function create()
    {
        $diseases = Disease::where('levels','low')->get();
        return view('admin.surveys.add_srv', compact('diseases'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'survey_type'=>'required',
            'disease_id'=> ['required','integer'] ]  );
            $survvey = new survey();
            $survvey->name = $request->input('name');
            $survvey->survey_type = $request->input('survey_type');
            $survvey->disease_id = $request->input('disease_id');
            $survvey->save();
            return redirect(route('surveys'))->with ('message','success');
    }

    public function show($id)
    {
        $survey = Survey::find($id);
        if ( is_null($survey) ) {
            return $this->sendError('not found'  );
              }
              return $this->sendResponse(new SurveyResource($survey), 'Success' );

    }

    public function survey_question($id)
    {
        $survey = Survey::find($id);
        $questions = Question::where('survey_id',$id)->get();
        return view('admin.surveys.questions',compact('questions' ,'survey'));
    }

    public function edit($id)
    {
        $survey = survey::find($id);
        return view('admin.surveys.edit', compact('survey'));
    }


    public function update(Request $request, $id)
    {
        $survey = Survey::find($id);
        $request->validate([
         'name'=> 'required',
         'survey_type'=> 'required',
         'disease_id'=> ['required','integer'] ]  );
        $survey ->update($request->all());
        $survey->save();
        return redirect(route('surveys'))->with('message', 'updated successfully');
    }


    public function destroy($id)
    {
        $survey = Survey::find($id);
        $survey->delete();
        return redirect(route('surveys'))->with('message', 'deleted successfully');
    }


}



