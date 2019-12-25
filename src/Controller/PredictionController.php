<?php
namespace App\Controller;

use App\Entity\Partner;
use App\Prediction\PredictionResults;
use App\Prediction\SourceFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PredictionController extends AbstractController
{
	public function index() {
	    // Get ORM repository
        $repository = $this->getDoctrine()->getRepository(Partner::class);
        // Get all partners
        $partners = $repository->findAll();
        // Init prediction result object
        $predictions = new PredictionResults();
        // Get Data from partners
        foreach ($partners as $partner){
            $prediction_source = SourceFactory::createSource($partner->getSource());
            $partner_res = $prediction_source->getData();
            $predictions->addResults($partner_res);
        }
        // Prepare response
        $response = new JsonResponse();
        $response->setData($predictions);
        return $response;
	}
}