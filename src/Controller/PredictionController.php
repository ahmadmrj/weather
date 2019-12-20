<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Service\PredictionService;

class PredictionController
{
	public function test(PredictionService $prediction) {

		// $partners = 

		return new Response(
			'hello wold!'.$prediction->getPrediction()
		);
	}
}