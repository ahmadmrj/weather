<?php


namespace App\Prediction\Source;


class XmlPredictionSource implements PredictionSource
{
    public function getData()
    {
    	if (file_exists(__DIR__."/files/temps.xml")) {
        	$file_content = simplexml_load_file(__DIR__."/files/temps.xml");
        	print_r($file_content);
        	die();
        } else {
        	return 'xml';
        }
    }
}	