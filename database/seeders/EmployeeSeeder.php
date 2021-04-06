<?php

namespace Database\Seeders;

use App\Models\BuildingCity;
use App\Models\Employee;
use Faker\Provider\fr_FR\Person;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $cityBuildings = BuildingCity::all();

        $cityBuildings->each(
            function ($building) {
                $num = random_int(1, 3);

                for ($i = 1; $i <= $num; $i++) {
                    Employee::create(
                        [
                            'name'             => trans('employee') . ' ' . $i,
                            'building_city_id' => $building->id,
                        ]
                    );
                }
            }
        );
    }
}
