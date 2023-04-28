# Zap-Map Technical Challenge

## The challenge

Develop a single restful API endpoint which should return Location points for a region on a map.

## Ready the application

1. Clone the repository: `git clone git@github.com:elev8studio/zapmap-challenge.git`
2. Navigate into the project root and install Composer dependencies: `composer install`
3. Migrate the location data: `php artisan data:import`
4. Run tests: `php artisan test`
5. Start the application: `php artisan serve`

## Perform an API request

1. Download Postman and import `zapmap-challenge.postman_collection.json` as a new collection
2. Make sure the URL/port matches the running application (if you already have an application running on localhost port 8000, the port will be different)
3. Update the `Get Locations in Radius` request params (or use defaults):
   * `latitude` - A valid latitude coordinate in decimal degrees format
   * `longitude` - A valid longitude coordinate in decimal degrees format
   * `radius` - The radius to search around given coordinates (km)
4. Send the request in Postman
5. Voila! Locations are ordered by distance from input coordinates

## What's in the response?

The data for each location returned within the radius includes the following properties:

* `name` - The name of the location at the coordinates according to the database
* `latitude` - The latitude of the location
* `longitude` - The longitude of the location
* `distance` - The distance of the location from the input coordinates (km)
* `directions` - Links to navigate to the location in Google Maps, Waze and Apple Maps
