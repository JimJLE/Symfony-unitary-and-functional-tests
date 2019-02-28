<?php

namespace App\Tests\Unitary;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use App\Entity\Personne;

class A09_SuperFixtureTest extends WebTestCase
{

    protected static $application;

    protected static $client;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected static $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        self::runCommand('doctrine:database:drop --force');
        self::runCommand('doctrine:database:create');
        self::runCommand('doctrine:schema:create');
        self::runCommand('doctrine:fixtures:load --append --no-interaction');

        $kernel = self::bootKernel();
        self::$entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }


    /**
     * {@inheritDoc}
     */
    protected function tearDown() {
        self::$entityManager->close();
        self::$entityManager = null; // Evite fuite mémoire
    }

    protected function dropDatabase() {
        self::runCommand('doctrine:database:drop --force');
    }

    protected static function runCommand($command) {
        $command = sprintf('%s --quiet', $command);

        return self::getApplication()->run(new StringInput($command));
    }

    protected static function getApplication() {
        if (null === self::$application) {
            $client = static::createClient();

            self::$application = new Application($client->getKernel());
            self::$application->setAutoExit(false);
        }

        return self::$application;
    }

    /**
     * @TODO : REMOVE
     */
    public function testASupprimer() {
        $this->assertEquals(1,1);
    }

}