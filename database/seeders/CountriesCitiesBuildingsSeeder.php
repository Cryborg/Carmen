<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Country;
use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Support\Collection;

class CountriesCitiesBuildingsSeeder extends Seeder
{
    /**
     * Seeds countries & cities from pragmarx/countries package.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $countries = Countries::all();
        $allBuildings = Building::all();
        $totalBuildings = $allBuildings->count();

        foreach ($countries as $country) {
            if ($country->has('capital')) {
                // Save a new country
                $newCountry = Country::create(
                    [
                        'cca3' => $country->cca3,
                    ]
                );

                if ($country->capital instanceof Collection) {

                    $capital = $country->capital->first();

                    if ($capital instanceof Collection && count($capital) === 0) {
                        continue;
                    }

                    if ($capital !== '') {
                        // Save a new city
                        $newCity = $newCountry->cities()->create(
                            [
                                'name' => $capital,
                                'capital' => true,
                            ]
                        );

                        // Attach buildings to the city
                        $randomNbBuildings = random_int(3, 5);
                        $buildings = $allBuildings->shuffle();

                        for ($i = 1; $i <= $randomNbBuildings; $i++) {
                            $newCity->buildings()->attach($buildings->shift());
                        }
                    } else {
                        dump($country->name->common . ' => Capital is NULL');
                    }
                } else {
                    dump($country->name->common . ' => (string) Capital is ' . $country->capital);
                }
            } else {
                dump($country->name->common . ' => Has no capital');
            }
        }
    }
}
