<?php

namespace App\DataFixtures;

use App\Entity\Gig;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GigFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $prog = (new Gig())->setName('Tech & Programmation');
        $data = (new Gig())->setName('Data');
        $this->addReference('prog', $prog);
        $this->addReference('data', $data);
        $manager->persist($prog);
        $manager->persist($data);
        $manager->flush();
    }
}
