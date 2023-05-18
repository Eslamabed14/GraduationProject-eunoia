<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Move;

class AdminMovesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $moves = Move::all();
        return view('admin.moves.index', compact('moves'));
    }

    public function create()
    {
        return view('admin.moves.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $art = new Move();

        $art->title = $request->input('title');
        $art->link = $request->input('link');
        $art->description = $request->input('description');
        $art->save();

        return redirect(route('admin.moves'))->with('message', 'Move Added Successfully!');
    }

    public function edit($id)
    {
        $move = Move::find($id);
        return view('admin.moves.edit', compact('move'));
    }

    public function update(Request $request, $id)
    {
        $move = Move::find($id);
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);
        $move->update($request->all());
        $move->save();
        return redirect()->back()->with('message', 'Move Updated Successfully!');
    }

    public function destroy($id)
    {
        $move = Move::find($id);
        $move->delete();
        return redirect(route('admin.moves'))->with('message', 'Move deleted successfully');
    }
}
