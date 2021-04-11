<?php

namespace App\Classes;

use App\Models\Country;

class TextModifier
{
    public static function getModifiedText($text, $investigation)
    {
        foreach (Constants::METHODS_LIST as $method) {
            $pattern = $method . '\[([^\]]*)\]';
            preg_match_all('/' . $pattern . '/', $text, $matches, PREG_SET_ORDER);

            // Replace the corresponding patterns one by one
            foreach ($matches as $match) {
                $pos = strpos($text, $match[0]);
                if ($pos !== false) {
                    $text = substr_replace($text, self::$method($match[1], $investigation), $pos, strlen($match[0]));
                }
            }
        }

        return $text;
    }

    /**
     * Adapts the text to fit the gender of the suspect.
     *
     * @param $text
     * @param $investigation
     *
     * @return string
     */
    public static function genre($text, $investigation): string
    {
        $split = explode('|', $text);

        // There must be 2 values, no more, no less
        if (count($split) !== 2) {
            return 'EXACTLY_TWO_PARAMETERS_EXPECTED';
        }

        switch ($investigation->suspect->genre) {
            case Constants::GENRE_MALE:
                return $split[0];
            case Constants::GENRE_FEMALE:
                return $split[1];
            default:
                return $text;
        }
    }

    /**
     * Gives clues about the next destination.
     *
     * @param $text
     * @param $suspect
     *
     * @return mixed
     */
    public static function destination($text, $investigation)
    {
        if ($text === 'flag') {
            $nextDestination = $investigation->loc_next;

            return Country::where('cca3', $nextDestination)
                          ->first()
                          ->flag;
        }
        return $text;
    }

    public static function currency($text, $investigation)
    {
        $nextDestination = $investigation->loc_next;

        return Country::where('cca3', $nextDestination)
                      ->first()
                      ->currency;

        return $text;
    }
}
