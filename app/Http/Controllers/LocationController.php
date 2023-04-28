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
        $lat = $request->input('latitude');
        $long = $request->input('longitude');
        $rad = $request->input('radius');

        $locations = Location::radius($lat, $long, $rad)->get();

        return response()->json([
            'locations' => LocationResource::collection($locations),
        ]);
    }
}
