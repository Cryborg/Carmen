<?php

namespace Database\Seeders;

use App\Models\BuildingCity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use PragmaRX\Countries\Package\Countries;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = Countries::all();

        foreach ($countries as $country) {
            $cities = $country->hydrate('cities')->cities;

            foreach ($cities as $city) {
                if (is_array($city) && array_key_exists('wof_id', $city)) {
                    BuildingCity::create(
                        [
                            'city_id'     => $city['wof_id'],
                            'building_id' => 1,
                        ]
                    );
                }
            }
        }
    }
}
