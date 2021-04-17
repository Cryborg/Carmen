<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Country extends Model
{
    public $timestamps = false;

    public $name;

    public static function boot()
    {
        parent::boot();

        static::retrieved(function($model)
        {
            $model->name = trans('countries.' . $model->cca2);
        });
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function picture(): MorphOne
    {
        return $this->morphOne(Picture::class, 'imageable');
    }
}
