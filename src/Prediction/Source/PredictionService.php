<?php
namespace App\Prediction\Source;

class PredictionService
{
    private PredictionSource $source;

	public function setSource(PredictionSource $source) {
		$this->source = $source;
	}

	public function getData() {
	    return $this->source->getData();
    }
}