<?php


namespace App\Prediction;

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