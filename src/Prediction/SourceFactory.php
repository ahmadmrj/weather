<?php


namespace App\Prediction;

use App\Prediction\Source\XmlPredictionSource;
use App\Prediction\Source\CsvPredictionSource;
use App\Prediction\Source\PredictionService;

class SourceFactory
{
    public static function createSource($address) {
        $prediction = new PredictionService();

        if(strpos($address, 'csv')) {
            $prediction->setSource(new CsvPredictionSource($address));
        } else {
            $prediction->setSource(new XmlPredictionSource($address));
        }

        return $prediction;
    }
}