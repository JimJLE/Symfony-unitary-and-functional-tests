<?php

namespace App\Tests\Unitary;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Personne;

class SimpleDoctrineTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private static $entityManager;

    /**
     * {@inheritDoc}
     */
    public static function setUpBeforeClass()
    {
        $kernel = self::bootKernel();
        self::$entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * {@inheritDoc}
     */
    public static function tearDownAfterClass() {
        // Vide la table Personne
        $connection = self::$entityManager->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->executeUpdate($platform->getTruncateTableSQL('personne', false));
        // Clos la connexion
        self::$entityManager->close();
        self::$entityManager = null;
    }

    public function testLoadPersonne() {
        $personne = new Personne();

        $personne->setNom("HP");
        $personne->setAdresse("59 rue des bois");
        $personne->setEmail("test.septieme@test.com");

        self::$entityManager->persist($personne);
        self::$entityManager->flush();

        $this->assertGreaterThan(0, $personne->getId());
    }

    /**
     * @depends testLoadPersonne
     */
    public function testCheckPeopleExist() {
        $rule_005 = "Il doit y avoir exactement 1 personne dans la base de données.";

        $personnes = self::$entityManager
        ->getRepository(Personne::class)
        ->findAll();

        $this->assertCount(1, $personnes, $rule_005);
    }

}