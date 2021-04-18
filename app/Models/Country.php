<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'imageable');
    }

    public function getPicturePath()
    {
        return 'countries' . DIRECTORY_SEPARATOR . $this->cca2 . DIRECTORY_SEPARATOR;
    }
}
