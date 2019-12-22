<?php


namespace App\Prediction\Source;


class XmlPredictionSource implements PredictionSource
{
    public function getData()
    {
        return 'xml';
    }
}