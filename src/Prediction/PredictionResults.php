<?php
namespace App\Prediction;

/**
* Results from different partners gather in here to a one result.
*/
class PredictionResults
{
    public $city;
    public $date;
    public $results;

    public function addResults($result) {
        if(empty($this->results)) {
            $this->city = $result['city'];
            $this->date = $result['date'];
            foreach ($result['predictions'] as $key => $value) {
                $this->results[] = new Prediction($key, $value, $result['scale']);
            }
        } else {
            $this->addExtraResults($result);
        }
    }

    /**
     * Compute average of next result added to current
     * @param $result
     */
    private function addExtraResults($result) {
        foreach ($this->results as $currentResult) {
            $currentResult->value = round((intval($result['predictions'][$currentResult->time]) + intval($currentResult->value)) / 2);
        }
    }
}