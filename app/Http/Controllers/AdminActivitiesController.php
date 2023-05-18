<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class AdminActivitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $activities = Activity::all();
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'score' => 'required'
        ]);

        $activity = new Activity();

        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->score = $request->input('score');
        $activity->save();

        return redirect(route('admin.activities'))->with('message', 'Activity Added Successfully!');
    }

    public function edit($id)
    {
        $activity = Activity::find($id);
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'score' => 'required'
        ]);
        $activity->update($request->all());
        $activity->save();
        return redirect()->back()->with('message', 'Activity Updated Successfully!');
    }

    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        return redirect(route('admin.activities'))->with('message', 'Activity deleted successfully');
    }
}
