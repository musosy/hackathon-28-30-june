<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager)

    {
        $john = (new User())->setName('John Doe')
            ->setPassword('john')
            ->setEmail('johndoe@diverr.com')
            ->setCreatedAt(new DateTimeImmutable())
            ->setLocation('France')
            ->setRoles(['LEVEL_1'])
        ;
        $jane = (new User())->setName('Jane Doe')
            ->setPassword('jane')
            ->setEmail('janedoe@diverr.com')
            ->setCreatedAt(new DateTimeImmutable())
            ->setLocation('France')
            ->setRoles(['LEVEL_2'])
        ;
        $jack = (new User())->setName('Jack Doe')
            ->setPassword('jack')
            ->setEmail('jackdoe@diverr.com')
            ->setCreatedAt(new DateTimeImmutable())
            ->setLocation('France')
            ->setRoles(['PRO'])
        ;
        $john->setPassword($this->passwordHasher->hashPassword($john, 'john'));
        $jane->setPassword($this->passwordHasher->hashPassword($jane, 'jane'));
        $jack->setPassword($this->passwordHasher->hashPassword($jack, 'jack'));
        $this->addReference('john', $john);
        $this->addReference('jane', $jane);
        $this->addReference('jack', $jack);

        $manager->persist($john);
        $manager->persist($jane);
        $manager->persist($jack);
        $manager->flush();
    }
}
