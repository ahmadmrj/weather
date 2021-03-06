<?php
namespace App\Prediction\Source;

use Exception;

class XmlPredictionSource extends PredictionSourceAbstract
{
    public function getData($date)
    {
        $output = [];

    	if (file_exists($this->address)) {
        	$file_content = simplexml_load_file($this->address);
        	$output['scale'] = strval($file_content['scale']);
        	$output['city'] = strval($file_content->city);
        	// $output['date'] = date('Y-m-d', strtotime(strval($file_content->date)));
            $output['date'] = date('Y-m-d', strtotime(strval($date)));

        	foreach ($file_content->prediction as $prediction) {
                $output['predictions'][strval($prediction->time)] = strval($prediction->value);
            }

        	return $output;
        } else {
        	throw new Exception("File doesn't exist");
        }
    }
}	