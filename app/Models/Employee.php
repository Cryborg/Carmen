<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $name;

    public static function boot()
    {
        parent::boot();

        static::retrieved(function(self $model)
        {
            $model->name = trans('common.employee');
        });
    }

    public function building(): HasOneThrough
    {
        return $this->hasOneTHrough(
            Building::class,
            BuildingCity::class,
            'id',
            'id',
            'building_city_id',
            'building_id',
        );
    }

    public function city(): HasOneThrough
    {
        return $this->hasOneTHrough(
            City::class,
            BuildingCity::class,
            'id',
            'id',
            'building_city_id',
            'city_id',
        );
    }
}
