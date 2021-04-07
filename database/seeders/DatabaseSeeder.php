<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(BuildingSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(SuspectsSeeder::class);
        $this->call(CountriesCitiesBuildingsSeeder::class);
    }
}
