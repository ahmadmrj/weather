<?php


namespace App\Prediction\Scales;


interface Scale
{
    public function toCelsius($temp);
    public function toFahrenheit($temp);
}