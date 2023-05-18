<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class AdminDiseasesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $diseases = Disease::all();
        return view('admin.diseases.index', compact('diseases'));
    }

    public function create()
    {
        return view('admin.diseases.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'levels' => 'required'
        ]);

        $disease = new Disease();

        $disease->name = $request->input('name');
        $disease->levels = $request->input('levels');
        $disease->save();

        return redirect(route('admin.diseases'))->with('message', 'Disease Added Successfully!');
    }

    public function edit($id)
    {
        $disease = Disease::find($id);
        return view('admin.diseases.edit', compact('disease'));
    }

    public function update(Request $request, $id)
    {
        $disease = Disease::find($id);
        $request->validate([
            'name' => 'required',
            'levels' => 'required'
        ]);
        $disease->update($request->all());
        $disease->save();
        return redirect()->back()->with('message', 'Disease Updated Successfully!');
    }

    public function destroy($id)
    {
        $disease = Disease::find($id);
        $disease->delete();
        return redirect(route('admin.diseases'))->with('message', 'Disease deleted successfully');
    }
}
