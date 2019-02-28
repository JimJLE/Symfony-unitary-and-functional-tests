<?php

namespace App\Tests\Unitary;

use App\Tests\Unitary\A09_SuperFixtureTest;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use App\Entity\Personne;

class ExtendsSuperFixtureTest extends A09_SuperFixtureTest
{

    protected function setUp() {
        parent::setUp();
    }

    protected function tearDown() {
        parent::tearDown();
        //parent::dropDatabase();
    }

    public function testLoadPersonne() {
        $personne = new Personne();

        $personne->setNom("PACKARD");
        $personne->setAdresse("19 abe rd");
        $personne->setEmail("test.septieme@test.com");

        static::$entityManager->persist($personne);
        static::$entityManager->flush();

        $this->assertGreaterThan(0, $personne->getId());
    }  

}