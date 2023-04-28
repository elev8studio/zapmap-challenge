<?php

namespace App\Console\Commands;

use App\Models\Location;
use Illuminate\Console\Command;
use League\Csv\Reader;

class DataImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import location data to database';

    /**
     * Execute the console command.
     * @throws \League\Csv\Exception
     */
    public function handle()
    {
        $csv = Reader::createFromPath(storage_path('app/data.csv'));

        $records = collect($csv->getRecords())->map(function ($record) {
            return [
                'name' => $record[0],
                'latitude' => $record[1],
                'longitude' => $record[2],
            ];
        });

        $records->each(function ($record) {
            Location::firstOrCreate($record);
        });

        $this->info('Location data imported successfully!');

    }
}
