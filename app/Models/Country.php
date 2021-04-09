<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    public $timestamps = false;

    public $name;

    public static function boot()
    {
        parent::boot();

        static::retrieved(function($model)
        {
            $model->name = trans('countries.' . $model->cca3);
        });
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
