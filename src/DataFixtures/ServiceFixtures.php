<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $manager->persist(
            (new Service())->setName('John\'s chatbot service')
                ->setUser($this->getReference('john'))
                ->setCategory($this->getReference('chatbots'))
                ->setClients(3)
        );
        $manager->persist(
            (new Service())->setName('John\'s webdev service')
                ->setUser($this->getReference('john'))
                ->setCategory($this->getReference('webDev'))
                ->setClients(15)
        );
        $manager->persist(
            (new Service())->setName('Jane\'s chatbot service')
                ->setUser($this->getReference('jane'))
                ->setCategory($this->getReference('chatbots'))
                ->setClients(20)
        );
        $manager->persist(
            (new Service())->setName('Jane\'s game dev service')
                ->setUser($this->getReference('jane'))
                ->setCategory($this->getReference('gameDev'))
                ->setClients(55)
        );
        $manager->persist(
            (new Service())->setName('Jane\'s cybersecurity service')
                ->setUser($this->getReference('jane'))
                ->setCategory($this->getReference('cybersecurity'))
                ->setClients(8)
        );
        $manager->persist(
            (new Service())->setName('Jack\'s data science service')
                ->setUser($this->getReference('jack'))
                ->setCategory($this->getReference('dataScience'))
                ->setClients(150)
        );
        $manager->persist(
            (new Service())->setName('Jack\'s analytics service')
                ->setUser($this->getReference('jack'))
                ->setCategory($this->getReference('analytics'))
                ->setClients(100)
        );
        $manager->persist(
            (new Service())->setName('Jack\'s data science service')
                ->setUser($this->getReference('jack'))
                ->setCategory($this->getReference('dataProcessing'))
                ->setClients(600)
        );
        $manager->flush();
    }

    public function getDependencies() {
        return [
            CategoryFixtures::class,
            UserFixtures::class
        ];
    }
}
