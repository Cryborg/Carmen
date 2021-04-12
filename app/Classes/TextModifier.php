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
                    $text = substr_replace($text, self::$method($investigation, $match[1]), $pos, strlen($match[0]));
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
    public static function genre($investigation, $text): string
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
     * @param $investigation
     *
     * @return mixed
     */
    public static function destination($investigation, $text): string
    {
        if ($text === 'flag') {
            $nextDestination = $investigation->loc_next;

            return '<div class="flag">'
                   . country($nextDestination)->getFlag()
                   . '</div>';
        }
        return $text;
    }

    public static function currency($investigation, $text = null)
    {
        $nextDestination = $investigation->loc_next;

        return country($nextDestination)->getCurrency()['iso_4217_name'];
    }
}
