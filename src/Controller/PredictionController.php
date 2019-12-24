<?php
namespace App\Controller;

use App\Entity\Partner;
use App\Prediction\OutputFormatter\OFormatterStandard;
use App\Prediction\SourceFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PredictionController extends AbstractController
{
	public function test() {
	    // Get ORM repository
        $repository = $this->getDoctrine()->getRepository(Partner::class);
        // Get all partners
        $partners = $repository->findAll();
        // Get Data from partners
        foreach ($partners as $partner){
            $prediction = SourceFactory::createSource($partner->getSource());
            $partner_res = $prediction->getData(new OFormatterStandard());

        }
//        $prediction->getPrediction()

		return new Response(
			'hello world!'
		);
	}
}