<?php

namespace App\Providers;

use App\Models\Building;
use App\Models\City;
use App\Models\Country;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'Country'   => Country::class,
            'City'      => City::class,
            'Specialty' => Specialty::class,
            'Building'  => Building::class,
        ]);
    }
}

