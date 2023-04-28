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
        $coords = urlencode("{$this->resource->latitude},{$this->resource->longitude}");

        return [
            'name' => $this->resource->name,
            'latitude' => $this->resource->latitude,
            'longitude' => $this->resource->longitude,
            'distance' => round($this->resource->distance, 1),
            'directions' => [
                'google' => "https://www.google.com/maps/search/?api=1&query=$coords",
                'waze' => "https://waze.com/ul?ll=$coords",
                'apple' => "https://maps.apple.com/?daddr=$coords"
            ]
        ];
    }
}
