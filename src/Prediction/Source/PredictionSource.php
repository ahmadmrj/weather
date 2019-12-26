<?php


namespace App\Prediction\Source;


interface PredictionSource
{
    public function getData($date);
}