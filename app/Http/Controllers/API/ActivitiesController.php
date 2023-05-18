<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ActivitiesResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends BaseController
{
    public function index()
    {
        $activities = Activity::all();
        return $this->sendResponse(ActivitiesResource::collection($activities), 'Activities Receieved Successfully!');
    }

    public function show($id)
    {
        $activity = Activity::find($id);

        if (is_null($activity)) {
            return $this->sendError('Activity not found!');
        }

        return $this->sendResponse(new ActivitiesResource($activity), 'Activity Found Successfully!');
    }

}
