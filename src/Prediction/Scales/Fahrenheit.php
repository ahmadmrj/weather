<?php


namespace App\Prediction\Scales;


class Fahrenheit
{
    public function toCelsius($temp) {
        return ($temp - 32) * 5/9;
    }

    public function toFahrenheit($temp) {
        return $temp;
    }
}