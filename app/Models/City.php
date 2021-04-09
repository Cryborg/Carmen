<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PragmaRX\Countries\Update\Cities;

class City extends Model
{
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::retrieved(function($model)
        {
            //$model->name = 'test';
        });
    }

    public function buildings()
    {
        return $this->belongsToMany(Building::class);
    }
}
