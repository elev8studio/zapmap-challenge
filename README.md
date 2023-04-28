# Zap-Map Technical Challenge

## The Challenge

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
3. Update the `Get Locations in Radius` request params (or use defaults)
4. Send the request
5. Voila! Nearby EV charging points await

