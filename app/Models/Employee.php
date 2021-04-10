<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $name;

    public static function boot()
    {
        parent::boot();

        static::retrieved(function($model)
        {
            $model->name = trans('common.employee');
        });
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
