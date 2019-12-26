<?php


namespace App\Prediction;

use App\Prediction\Source\XmlPredictionSource;
use App\Prediction\Source\CsvPredictionSource;
use App\Prediction\Source\JsonPredictionSource;
use App\Prediction\Source\PredictionService;


/**
* This class is responsible for creating related source with each type of API
* csv, xml or json
*/
class SourceFactory
{
    // This static method create mock resources according to their address on DB and their file type
    public static function createSource($address) {
        $prediction = new PredictionService();

        if(strpos($address, 'csv')) {
            $prediction->setSource(new CsvPredictionSource($address));
        } elseif(strpos($address, 'json')) {
        	$prediction->setSource(new JsonPredictionSource($address));
        } else {
            $prediction->setSource(new XmlPredictionSource($address));
        }

        return $prediction;
    }
}