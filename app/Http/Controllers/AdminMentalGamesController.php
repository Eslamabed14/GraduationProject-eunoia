<?php

namespace App\Http\Controllers;

use App\Models\MentalGames;
use Illuminate\Http\Request;

class AdminMentalGamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $games = MentalGames::all();
        return view('admin.MentalGames.index', compact('games'));
    }

    public function create()
    {
        return view('admin.MentalGames.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $game = new MentalGames();

        $game->title = $request->input('title');
        $game->description = $request->input('description');
        $game->answer = $request->input('answer');
        $game->image = $request->input('image');
        $game->link = $request->input('link');
        $game->save();

        return redirect(route('admin.games'))->with('message', 'Game Added Successfully!');
    }

    public function edit($id)
    {
        $game = MentalGames::find($id);
        return view('admin.MentalGames.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = MentalGames::find($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $game->update($request->all());
        $game->save();
        return redirect()->back()->with('message', 'Game Updated Successfully!');
    }

    public function destroy($id)
    {
        $game = MentalGames::find($id);
        $game->delete();
        return redirect(route('admin.games'))->with('message', 'Game deleted successfully');
    }
}
