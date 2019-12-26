<?php


namespace App\Prediction\Scales;

/**
* Each scale carry the methods show how it could turn to other scales.
*/
class Celsius implements Scale
{
    public function toCelsius($temp)
    {
        return $temp;
    }

    public function toFahrenheit($temp)
    {
        return ($temp * 9/5) + 32;
    }
}