<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Seeder;

class SpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Real data
        $specialties = [
            [
                'country' => 'FR',
                'name' => 'Moutarde de Dijon',
                'wikipedia_link' => 'Moutarde_de_Dijon',
                'clues' => [
                    'genre[Il|Elle] m\'a dit qu\'genre[il|elle] s\'approvisionnerait en moutarde de Dijon à la source.',
                    'genre[Il|Elle] me parlait de la moutarde de Dijon qu\'genre[il|elle] achèterait d\'ici peu directement chez le producteur.',
                ]
            ],
            [
                'country' => 'FR',
                'name' => 'Nougat de Montélimar',
                'wikipedia_link' => 'Nougat_de_Montélimar',
                'clues' => [
                    'genre[Il|Elle] m\'a dit qu\'genre[il|elle] s\'approvisionnerait en nougat de Montélimar chez un producteur local.',
                    'genre[Il|Elle] me disait que le nougat de Montélimar ne pourrait pas souffrir de la contrefaçon, tant son goût et sa qualité sont uniques.',
                ]
            ],
            [
                'country' => 'FR',
                'name' => 'Arc de Triomphe',
                'wikipedia_link' => 'Arc_de_triomphe_de_l%27Étoile',
                'clues' => [
                    'genre[Il|Elle] me disait vouloir photographier l\'Arc de Triomphe et l\'avenue des Champs-Elysées.',
                    'genre[Il|Elle] voulait faire son footing en partant de l\'Obélisque de la Concorde pour terminer à la Défense.',
                ]
            ],
        ];

        // Fake data for testing
        $countries = Country::all();

        foreach ($countries as $country) {
            $specialties[] = [
                    'country'        => $country->cca2,
                    'name'           => 'Fake ' . $country->cca2 . ' specialty',
                    'wikipedia_link' => 'fake',
                    'clues'          => [
                        'FAKE DATA: genre[Il|Elle] était genre[interessé|interessée] par une spécialité venant de '
                            . trans('countries.' . $country->cca2),
                        'FAKE DATA: genre[Il|Elle] voulait absolument goûter à une spécialité venant de '
                            . trans('countries.' . $country->cca2),
                    ]
            ];
        }

        $user = User::where('name', 'Cryborg')->first();

        foreach ($specialties as $specialty) {
            Specialty::create($specialty + [
                'user_id' => $user->id,
                'approved_at' => now(),
                'approved_by' => $user->id,
            ]);
        }
    }
}
