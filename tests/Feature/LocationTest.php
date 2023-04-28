<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LocationTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('data:import');
    }

    public function test_location_endpoint_returns_at_least_one_item(): void
    {
        $response = $this->get('api/location?' . http_build_query([
                'radius' => 50,
                'latitude' => $this->faker->latitude(51, 52),
                'longitude' => $this->faker->longitude(-2, -3),
            ]));


        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) {
            $json->where('locations', function (Collection $locations) {
                // At least one location expected
                return $locations->count() > 1;
            });
        });
    }

    public function test_location_endpoint_returns_expected_json_structure(): void
    {
        $response = $this->get('api/location?' . http_build_query([
                'radius' => 50,
                'latitude' => $this->faker->latitude(51, 52),
                'longitude' => $this->faker->longitude(-2, -3),
            ]));

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) {
            $json->has('locations')->where('locations', function (Collection $locations) {
                $location = $locations->first();
                $expectKeys = ['radius', 'latitude', 'longitude', 'distance', 'directions'];
                $gotKeys = array_keys($location);
                // Each item in the locations array should contain the expected keys
                return !array_diff_key($expectKeys, $gotKeys);
            });
        });
    }
}
