<?php


namespace App\Prediction;

use App\Prediction\Source\XmlPredictionSource;
use App\Prediction\Source\CsvPredictionSource;
use App\Prediction\Source\PredictionService;

class SourceFactory
{
    public static function createSource($format) {
        $prediction = new PredictionService();

        if(strpos($format, 'csv')) {
            $prediction->setSource(new CsvPredictionSource());
        } else {
            $prediction->setSource(new XmlPredictionSource());
        }

        return $prediction;
    }
}