<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function show(LocationRequest $request): JsonResponse
    {
        $locations = Location::radius($request->latitude, $request->longitude, $request->radius)->get();

        return response()->json([
            'locations' => LocationResource::collection($locations),
        ]);
    }
}
