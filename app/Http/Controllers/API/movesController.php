<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\MovesResource;
use App\Http\Resources\UserResource;
use App\Models\Move;
use App\Models\User;
use Illuminate\Http\Request;

class movesController extends BaseController
{
    public function index()
    {
        $moves = Move::all();
        return $this->sendResponse(MovesResource::collection($moves), 'Moves Receieved Successfully!');
    }

    public function show($id)
    {
        $move = Move::find($id);

        if (is_null($move)) {
            return $this->sendError('Move not found!');
        }

        return $this->sendResponse(new MovesResource($move), 'Move Found Successfully!');
    }

    public function tracking($id)
    {

        $user = User::find($id);
        $moves = Move::all();

        if (count($moves) > $user->track_move) {
            $user->track_move = $user->track_move + 1;
            $user->save();
        } else {
            echo "That's enough!";
        }
    }
}
