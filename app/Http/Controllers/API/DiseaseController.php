<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\DiseaseResource;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends BaseController
{
    public function index()
    {
        $diseases = Disease::where('levels', 'low')->get();
        return $this->sendResponse(DiseaseResource::collection($diseases), 'Diseases Receieved Successfully!');
    }

    public function show($id)
    {
        $disease = Disease::find($id);

        if (is_null($disease)) {
            return $this->sendError('Disease not found!');
        }

        return $this->sendResponse(new DiseaseResource($disease), 'Disease Found Successfully!');
    }
}
