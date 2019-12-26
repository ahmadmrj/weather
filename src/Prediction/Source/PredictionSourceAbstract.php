<?php


namespace App\Prediction\Source;


abstract class PredictionSourceAbstract implements PredictionSource
{
    protected $address;

    public function __construct($address)
    {
        $this->address = __DIR__.'/files/'.$address;
    }

    abstract public function getData($date);
}