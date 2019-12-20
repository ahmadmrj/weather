<?php

namespace App\DataFixtures;

use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PartnerFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create xpartnar as a mock partner
        $xpartner = new Partner();
        $xpartner->setTitle('xpartner');
        $xpartner->setSource('temps.json');
        $manager->persist($xpartner);

        // create ypartner as a mock partner
        $ypartner = new Partner();
        $ypartner->setTitle('ypartner');
        $ypartner->setSource('temps.csv');
        $manager->persist($ypartner);

        $manager->flush();
    }
}
