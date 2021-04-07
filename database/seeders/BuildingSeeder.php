<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = [
            'town-hall',
            'airport',
            'hotel',
            'market',
            'museum',
            'police-station',
        ];

        foreach ($buildings as $building) {
            Building::create([
                'slug' => $building,
            ]);
        }
    }
}
