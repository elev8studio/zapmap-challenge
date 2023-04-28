<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'latitude' => $this->resource->latitude,
            'longitude' => $this->resource->longitude,
            'distance' => round($this->resource->distance, 1),
        ];
    }
}
