<?php


namespace App\Prediction\Source;


class CsvPredictionSource implements PredictionSource
{
    public function getData()
    {
        return 'csv';
    }
}