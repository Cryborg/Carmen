<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $dates = [
        'approved_at' => 'timestamp',
    ];

    protected $casts = [
        'clues' => 'array',
    ];

    protected $fillable = [
        'approved_at',
        'approved_by',
        'clues',
        'country',
        'name',
        'user_id',
        'wikipedia_link',
    ];
}
