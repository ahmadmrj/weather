<?php


namespace App\Prediction\Scales;


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