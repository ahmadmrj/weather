<?php


namespace App\Prediction;

/**
* Eache prediction of a specific time will be turn to a class of Prediction
* As we want to have a out put with 2 scales during creating object different scales value added to object.
* 
*/

class Prediction
{
    public $time;
    public $value;
    public $fahrenheit_value;

    public function __construct($time, $value, $scale)
    {
        $scale_class_name = 'App\Prediction\Scales\\'.ucfirst($scale);
        $scale = new $scale_class_name();
        $this->time = $time;
        $this->value = $scale->toCelsius($value);
        $this->fahrenheit_value = $scale->toFahrenheit($value);
    }
}