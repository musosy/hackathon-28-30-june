<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //Programmation
        $chatbots = (new Category())->setName('Chatbots')->setGig($this->getReference('prog'));
        $mobileApps = (new Category())->setName('Mobile Apps')->setGig($this->getReference('prog'));
        $webDev = (new Category())->setName('Web Dev')->setGig($this->getReference('prog'));
        $gameDev = (new Category())->setName('Game Dev')->setGig($this->getReference('prog'));
        $itSupport = (new Category())->setName('IT Support')->setGig($this->getReference('prog'));
        $cybersecurity = (new Category())->setName('Cybersecurity')->setGig($this->getReference('prog'));

        $this->addReference('chatbots', $chatbots);
        $this->addReference('mobileApps', $mobileApps);
        $this->addReference('webDev', $webDev);
        $this->addReference('gameDev', $gameDev);
        $this->addReference('itSupport', $itSupport);
        $this->addReference('cybersecurity', $cybersecurity);

        $manager->persist($chatbots);
        $manager->persist($mobileApps);
        $manager->persist($webDev);
        $manager->persist($gameDev);
        $manager->persist($itSupport);
        $manager->persist($cybersecurity);

        //Data
        $database = (new Category())->setName('Database')->setGig($this->getReference('data'));
        $analytics = (new Category())->setName('Analytics')->setGig($this->getReference('data'));
        $dataScience = (new Category())->setName('Data Science')->setGig($this->getReference('data'));
        $dataProcessing = (new Category())->setName('Data Processing')->setGig($this->getReference('data'));

        $this->addReference('database', $database);
        $this->addReference('analytics', $analytics);
        $this->addReference('dataScience', $dataScience);
        $this->addReference('dataProcessing', $dataProcessing);

        $manager->persist($database);
        $manager->persist($analytics);
        $manager->persist($dataScience);
        $manager->persist($dataProcessing);

        $manager->flush();
    }

    public function getDependencies() {
        return [
            GigFixtures::class,
        ];
    }
}
