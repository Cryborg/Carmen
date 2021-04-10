<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $cities = City::all();

        $cities->each(
            function ($city) {
                $buildings = $city->buildings;

                foreach ($buildings as $building) {
                    $num = random_int(1, 2);

                    for ($i = 1; $i <= $num; $i++) {
                        Employee::create(
                            [
                                'building_city_id' => $building->pivot->id,
                            ]
                        );
                    }
                }
            }
        );
    }
}

