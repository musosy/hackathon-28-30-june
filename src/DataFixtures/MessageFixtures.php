<?php

namespace App\DataFixtures;

use App\Entity\Message;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MessageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $messageA = (new Message())->setSender($this->getReference('jane'))
            ->setChannel($this->getReference('cb'))
            ->setDate((new DateTimeImmutable())->setDate(2021, 06, 28))
            ->setContent('Hello there ! This is a fixtures just to start a channel !')
        ;
        $messageB = (new Message())->setSender($this->getReference('jane'))
            ->setChannel($this->getReference('cb'))
            ->setDate((new DateTimeImmutable())->setDate(2021, 06, 29))
            ->setContent('And this is a reply !')
        ;
        $manager->persist($messageA);
        $manager->persist($messageB);
        $manager->flush();
    }

    public function getDependencies() {
        return [
            CategoryFixtures::class,
            UserFixtures::class
        ];
    }    
}
