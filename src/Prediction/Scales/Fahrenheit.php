<?php


namespace App\Prediction\Scales;

/**
* Each scale carry the methods show how it could turn to other scales.
*/
class Fahrenheit
{
    public function toCelsius($temp) {
        return ($temp - 32) * 5/9;
    }

    public function toFahrenheit($temp) {
        return $temp;
    }
}