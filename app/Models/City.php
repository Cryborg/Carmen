<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
