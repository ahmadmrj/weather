<?php
namespace App\Controller;

use App\Entity\Partner;
use App\Prediction\PredictionResults;
use App\Prediction\SourceFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class PredictionController extends AbstractController
{
	/**
	* It reperents endpoint.
    */
	public function index($date) {
		$validated = $this->validate($date);

		if($validated===true) {
		    // Get ORM repository
	        $repository = $this->getDoctrine()->getRepository(Partner::class);
	        // Get all partners
	        $partners = $repository->findAll();
	        // Init prediction result object
	        $predictions = new PredictionResults();
	        // Get Data from partners
	        foreach ($partners as $partner){
	            $prediction_source = SourceFactory::createSource($partner->getSource());
	            $partner_res = $prediction_source->getData($date);
	            $predictions->addResults($partner_res);
	        }
	        // Prepare response
	        $response = new JsonResponse();
	        $response->setData($predictions);
	        return $response;
	    } else {
	    	return $validated;
	    }
	}

	/**
	* It validates input 
	* @param $date
	*/
	private function validate($date)
	{
		$validator = Validation::createValidator();
		// First lets see it is a real date
		$errors = $validator->validate(
		        $date,
		        new Assert\Date(),
		    );

		// Next, controll range of input
		if (!isset($errors[0])) {
			$range_input = \DateTime::createfromformat('Y-m-d', $date);

			$errors = $validator->validate(
			        $range_input,
			        [
			        	new Assert\Range([
	                      'min' => "+1 days",
	                      'max' => "+10 days"
	                  	]),
			        ]
			    );
		}

		if (isset($errors[0])) {
        	return new Response($errors[0]->getMessage());
	    } else {
	        return true;
	    }
	}
}