<?php

namespace App\Tests\Unitary;

use PHPUnit\Framework\TestCase;
use App\Entity\Personne;
use App\Controller\PersonneController;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

class MockTest extends TestCase
{
   
    public function testNewsController() {
        // Créer une fausse entrée personne
        $personne = new Personne();
        $personne->setNom('Max');

        // Création du mock du dépôt. Celui-ci retournera donc le mock de l'entrée personne
        $personneRepository = $this->createMock(ObjectRepository::class);
        $personneRepository->expects($this->any())
            ->method('find')
            ->willReturn($personne);

        // Enfin, création du mock de l'EntityManager pour retourner le mock du dépôt
        $objectManager = $this->createMock(ObjectManager::class);
        $objectManager->expects($this->any())
            ->method('getRepository')
            ->willReturn($personneRepository);
        
        // On injecte l'objectManager dans notre controlleur PersonneController
        $objlController = new PersonneController($objectManager);

        // On exécute un fonction de recherche interne à notre controlleur
        // qui va aller récupérer le nom de la personne avec l'identifiant 1.
        $this->assertEquals('Max', $objlController->getNameOfPeopleById(1));
    }

}