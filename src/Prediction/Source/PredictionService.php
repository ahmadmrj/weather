<?php
namespace App\Prediction\Source;

use App\Prediction\OutputFormatter\OFormatterInterface;

class PredictionService
{
    private $source;
    public $formatter;

	public function setSource(PredictionSource $source) {
		$this->source = $source;
	}

	public function getData(OFormatterInterface $formatter) {
        $data = $this->source->getData();
	    return $formatter->format($data);
    }
}