<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController;
use App\Http\Resources\MentalGamesResource;
use App\Models\MentalGames;
use Illuminate\Http\Request;

class MentalGamesController extends BaseController
{
    public function index()
    {
        $games = MentalGames::all();
        return $this->sendResponse(MentalGamesResource::collection($games), 'Games Retrieved Successfully!');
    }

    public function randomGame()
    {
        $games = MentalGames::inRandomOrder()->limit(2)->get();
        return $this->sendResponse(MentalGamesResource::collection($games), 'Games Retrieved Successfully!');
    }

    public function show($id)
    {
        $game = MentalGames::find($id);

        if (is_null($game)) {
            return $this->sendError('Game not found!');
        }

        return $this->sendResponse(new MentalGamesResource($game), 'Game Found Successfully!');
    }
}
