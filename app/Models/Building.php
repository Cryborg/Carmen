<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public $timestamps = false;

    public string $name;

    public static function boot()
    {
        parent::boot();

        static::retrieved(function($model)
        {
            $model->name = trans('buildings.' . $model->slug);
        });
    }
}
