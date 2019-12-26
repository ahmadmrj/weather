<?php
namespace App\Prediction\Source;

class PredictionService
{
    private $source;

	public function setSource(PredictionSource $source) {
		$this->source = $source;
	}

	public function getData($date) {
        $data = $this->source->getData($date);
	    return $data;
    }
}