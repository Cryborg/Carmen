<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspect extends Model
{
    use HasFactory;

    public const ORIGINS_LIST = [
        'european' => [
            'fr_FR',
            'en_GB',
            'de_DE',
        ],
        'asian' => [
            'ja_JP',
            'ko_KR',
            'zh_CN',
            'zh_TW',
        ],
        'arabic' => [
            'ar_JO',
            'ar_SA',
        ],
        'latino' => [
            'es_ES',
            'es_PE',
        ],
    ];

    public const HEIGHTS = [
        'average',
        'small',
        'tall',
    ];

    public const HAIR = [
        'black',
        'blond',
        'brown',
        'grey',
        'red',
    ];

    public const HOBBIES = [
        'baseball',
        'computers',
        'football',
        'matchstick',
        'music',
        'pets',
        'postcards',
        'swimming',
        'tennis',
    ];

    public const SIGNS = [
        'earring',
        'piercing',
        'scar',
        'tattoo',
    ];

    public const FASHION_STYLES = [
        'casual',
        'chic',
        'gothic',
        'punk',
        'sexy',
        'sporty',
        'vintage',
    ];

    public $timestamps = false;
}
