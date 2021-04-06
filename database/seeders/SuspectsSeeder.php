<?php

namespace Database\Seeders;

use App\Models\Suspect;
use Faker\Factory;
use Faker\Provider\Person;
use Illuminate\Database\Seeder;

class SuspectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Suspect::ORIGINS_LIST as $origin => $languages)
        {
            for ($i = 1; $i <= 1000; $i++)
            {
                $language = $languages[array_rand($languages)];
                $faker    = Factory::create($language);

                if ($origin === 'african') {
                    // Add the African Person provider
                    $faker->addProvider(new \App\Providers\Faker\af\Person($faker));
                }

                $genre = $faker->randomElement([Person::GENDER_MALE, Person::GENDER_FEMALE]);

                if ($genre === Person::GENDER_MALE) {
                    $firstName = $faker->firstNameMale();
                } else {
                    $firstName = $faker->firstNameFemale();
                }

                $name = $firstName . ' ' . $faker->lastName();

                try {
                    Suspect::create(
                        [
                            'name'          => $name,
                            'genre'         => $genre,
                            'hair'          => $faker->randomElement(Suspect::HAIR),
                            'height'        => $faker->randomElement(Suspect::HEIGHTS),
                            'origin'        => $origin,
                            'hobby'         => $faker->randomElement(Suspect::HOBBIES),
                            'sign'          => $faker->randomElement(Suspect::SIGNS),
                            'fashion_style' => $faker->randomElement(Suspect::FASHION_STYLES),
                        ]
                    );
                } catch (\Exception $e) {
                    $i--;
                }
            }
        }
    }
}
