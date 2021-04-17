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
            'airport' => [
                'destination', 'origin',
            ],
            'bank' => [
                'destination', 'fashion_style', 'sign',
            ],
            'fitness_center' => [
                'hobby', 'sign', 'hair', 'height',
            ],
            'hotel' => [
                'destination', 'origin',
            ],
            'internet_cafe' => [
                'hobby', 'destination',
            ],
            'restaurant' => [
                'fashion_style', 'hair', 'sign', 'height',
            ],
        ];

        foreach ($buildings as $building => $clues) {
            Building::create([
                'slug' => $building,
                'clues' => $clues,
            ]);
        }

        // TODO: Peut-être rajouter les monuments historiques ?
    }
}
