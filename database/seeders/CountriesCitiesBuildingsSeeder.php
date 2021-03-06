<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Country;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $countries = countries();
        $allBuildings = Building::all();
        $user = User::where('name', 'Cryborg')->first();

        foreach ($countries as $alpha2 => $values) {
            $country = country($alpha2);

            /**
             * Don't import the country if it is not in the translations.
             * This way I keep the database as clean as I can.
             */
            if (trans('countries.' . $country->getIsoAlpha2()) === 'countries.' . $country->getIsoAlpha2()) {
                continue;
            }

            if ($country->getCapital())
            {
                try {
                    // Save a new country
                    $newCountry = Country::create(
                        [
                            'cca2'     => $country->getIsoAlpha2(),
                        ]
                    );

                    if ($country->getCapital() !== '') {
                        // Save a new city
                        $newCity = $newCountry->cities()->create([
                            'name'    => $country->getCapital(),
                            'capital' => true,
                        ]);

                        // Attach 3 random buildings to the city
                        $buildings = $allBuildings->shuffle();

                        for ($i = 1; $i <= 3; $i++) {
                            $newCity->buildings()
                                    ->attach($buildings->shift());
                        }

                        $pictures = Storage::disk('pictures')
                            ->files('countries/' . $country->getIsoAlpha2());

                        foreach ($pictures as $picture) {
                            $newPicture = new Picture([
                                'filename' => File::basename($picture),
                                'approved_at' => now(),
                                'approved_by' => $user->id,
                            ]);
                            $newCountry->pictures()->save($newPicture);
                        }
                    } else {
                        dump('no capital');
                    }

                } catch (\Exception $e) {
                    dump($e->getMessage());
                }
            }
        }
    }
}
