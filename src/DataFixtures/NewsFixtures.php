<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Personne;

class NewsFixtures extends Fixture
{
    public function load(ObjectManager $manager) {
        $personne = new Personne();

        $personne->setNom("FIXTURE");
        $personne->setAdresse("3 rue des champs blanc");
        $personne->setEmail("test@test.com");

        $manager->persist($personne);
        $manager->flush();
    }
}