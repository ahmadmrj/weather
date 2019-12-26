<?php


namespace App\Prediction\Scales;

/**
* Scales implemet this interface 
*/
interface Scale
{
    public function toCelsius($temp);
    public function toFahrenheit($temp);
}