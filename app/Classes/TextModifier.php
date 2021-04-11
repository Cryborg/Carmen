<?php

namespace App\Classes;

class TextModifier
{
    public static function genre($text): string
    {
        $genre       = Constants::GENRE_FEMALE;
        $split       = explode('|', $text);

        // There must be 2 values, no more, no less
        if (count($split) !== 2) {
            return 'EXACTELY_TWO_PARAMETERS_EXPECTED';
        }

        switch ($genre) {
            case Constants::GENRE_MALE:
                return $split[0];
            case Constants::GENRE_FEMALE:
                return $split[1];
            default:
                return $text;
        }
    }
}
