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

                try {
                    // Save a new country
                    $newCountry = Country::create(
                        [
                            'cca3'     => $country->cca3,
                            'currency' => strtolower($country->hydrate('currencies')->currencies->first()->units->major->name),
                            'flag'     => $country->flag->flag_icon,
                        ]
                    );

                    if ($country->capital instanceof Collection) {
                        $capital = $country->capital->first();

                        if ($capital instanceof Collection && count($capital) === 0) {
                            continue;
                        }

                        if ($capital !== '') {
                            // Save a new city
                            $newCity = $newCountry->cities()
                                                  ->create(
                                                      [
                                                          'name'    => $capital,
                                                          'capital' => true,
                                                      ]
                                                  );

                            // Attach 3 random buildings to the city
                            $buildings = $allBuildings->shuffle();

                            for ($i = 1; $i <= 3; $i++) {
                                $newCity->buildings()
                                        ->attach($buildings->shift());
                            }
                        }
                    }
                } catch (\Exception $e) {
                    dump($e->getMessage());
                }
            }
        }
    }
}
