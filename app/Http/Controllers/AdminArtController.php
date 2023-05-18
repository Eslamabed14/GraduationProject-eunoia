<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;

class AdminArtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $arts = Art::all();
        return view('admin.arts.index', compact('arts'));
    }

    public function create()
    {
        return view('admin.arts.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required'
        ]);

        $art = new Art();

        $art->title = $request->input('title');
        $art->link = $request->input('link');
        $art->save();

        return redirect(route('admin.arts'))->with('message', 'Art Added Successfully!');
    }

    public function edit($id)
    {
        $art = Art::find($id);
        return view('admin.arts.edit', compact('art'));
    }

    public function update(Request $request, $id)
    {
        $art = Art::find($id);
        $request->validate([
            'title' => 'required',
            'link' => 'required'
        ]);
        $art->update($request->all());
        $art->save();
        return redirect()->back()->with('message', 'Art Updated Successfully!');
    }

    public function destroy($id)
    {
        $art = Art::find($id);
        $art->delete();
        return redirect(route('admin.arts'))->with('message', 'Art deleted successfully');
    }
}
