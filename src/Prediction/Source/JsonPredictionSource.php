<?php
namespace App\Prediction\Source;

use Exception;

class JsonPredictionSource extends PredictionSourceAbstract
{
    public function getData($date)
    {
        $output = [];

    	if (file_exists($this->address)) {
        	$file_content = json_decode(file_get_contents($this->address))->predictions;
        	$output['scale'] = $file_content->{"-scale"};
        	$output['city'] = $file_content->city;
        	// $output['date'] = date('Y-m-d', strtotime($file_content->date));
        	$output['date'] = date('Y-m-d', strtotime($date));

        	foreach ($file_content->prediction as $prediction) {
                $output['predictions'][strval($prediction->time)] = strval($prediction->value);
            }
        	return $output;
        } else {
        	throw new Exception("File doesn't exist");
        }
    }
}	