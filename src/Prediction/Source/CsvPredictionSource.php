<?php


namespace App\Prediction\Source;


class CsvPredictionSource extends PredictionSourceAbstract
{
    public function getData()
    {
        $output = [];
        $file = fopen($this->address, 'r');
        fgetcsv($file, 100, ",");
        $file_content = fgetcsv($file, 100, ",");
        $output['scale'] = $file_content[0];
        $output['city'] = $file_content[1];
        $output['date'] = date('Y-m-d', strtotime(strval($file_content[2])));
        $output['predictions'][] = [
            'time' => $file_content[3],
            'value' => $file_content[4]
        ];

        while ($file_content = fgetcsv($file, 100, ",")) {
            $output['predictions'][] = [
                'time' => $file_content[3],
                'value' => $file_content[4]
            ];
        }

        return $output;
    }
}