<?php

namespace App\Classes;

class TextModifier
{
    public static function getModifiedText($text, $suspect = null)
    {
        foreach (Constants::METHODS_LIST as $method) {
            $pattern = $method . '\[([^\]]*)\]';
            preg_match_all('/' . $pattern . '/', $text, $matches, PREG_SET_ORDER);

            // Replace the corresponding patterns one by one
            foreach ($matches as $match) {
                $pos = strpos($text, $match[0]);
                if ($pos !== false) {
                    $text = substr_replace($text, self::$method($match[1], $suspect), $pos, strlen($match[0]));
                }
            }
        }

        return $text;
    }

    public static function genre($text, $suspect): string
    {
        $split = explode('|', $text);

        // There must be 2 values, no more, no less
        if (count($split) !== 2) {
            return 'EXACTELY_TWO_PARAMETERS_EXPECTED';
        }

        switch ($suspect->genre) {
            case Constants::GENRE_MALE:
                return $split[0];
            case Constants::GENRE_FEMALE:
                return $split[1];
            default:
                return $text;
        }
    }
}
