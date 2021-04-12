<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingCity extends Model
{
    protected $table = 'building_city';

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
