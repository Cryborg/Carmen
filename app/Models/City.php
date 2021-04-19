<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class City extends Model
{
    public $timestamps = false;

    public function buildings()
    {
        return $this->belongsToMany(Building::class)->withPivot('id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'imageable');
    }

    public function getPicturePath()
    {
        return 'cities' . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR;
    }
}
