<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Answer;
use App\Http\Resources\AnswerResource as AnswerResource;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $answers = answer::all();
        return view(('admin.answers.answers'), compact('answers'));
    }

    public function create()
    {
        return view('admin.answers.addd_answer');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required',
            'weight' => ['required', 'integer']
        ]);
        $answer = new answer();
        $answer->answer = $request->input('answer');
        $answer->weight = $request->input('weight');
        $answer->save();
        return redirect(route('answers'))->with('message', 'success');
    }

    public function show($id)
    {
        $Answer = Answer::find($id);
        if (is_null($Answer)) {
            return $this->sendError('not found');
        }
        return $this->sendResponse(new AnswerResource($Answer), 'Success');
    }

    public function edit($id)
    {
        $answer = answer::find($id);
        return view('admin.answers.edit_answer', compact('answer'));
    }

    public function update(Request $request, $id)
    {
        $Answer = Answer::find($id);
        $request->validate([
            'answer' => 'required',
            'weight' => ['required', 'integer']
        ]);

        $Answer->update($request->all());
        $Answer->save();
        return redirect(route('answers'))->with('message', 'updated successfully');
    }

    public function destroy($id)
    {
        $Answer = Answer::find($id);
        $Answer->delete();
        return redirect(route('answers'))->with('message', 'deleted successfully');
    }
}
