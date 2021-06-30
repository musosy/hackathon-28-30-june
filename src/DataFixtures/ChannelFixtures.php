<?php

namespace App\DataFixtures;

use App\Entity\Channel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ChannelFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cb = (new Channel())->setCategory($this->getReference('chatbots'));
        $this->setReference('cb', $cb);
        $manager->persist($cb);
        $ma = (new Channel())->setCategory($this->getReference('mobileApps'));
        $manager->persist($ma);
        $manager->persist((new Channel())->setCategory($this->getReference('webDev')));
        $manager->persist((new Channel())->setCategory($this->getReference('gameDev')));
        $manager->persist((new Channel())->setCategory($this->getReference('itSupport')));
        $manager->persist((new Channel())->setCategory($this->getReference('cybersecurity')));
        $manager->persist((new Channel())->setCategory($this->getReference('database')));
        $manager->persist((new Channel())->setCategory($this->getReference('analytics')));
        $manager->persist((new Channel())->setCategory($this->getReference('dataScience')));
        $manager->persist((new Channel())->setCategory($this->getReference('dataProcessing')));

        $manager->flush();
    }

    public function getDependencies() {
        return [
            CategoryFixtures::class,
        ];
    }
}
