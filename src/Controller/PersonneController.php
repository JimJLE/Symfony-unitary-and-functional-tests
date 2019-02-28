<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Persistence\ObjectManager;

class PersonneController extends Controller 
{
    private $objcManager;

    public function __construct(ObjectManager $objpManager) {
        $this->objcManager = $objpManager;
    }

    public function getNameOfPeopleById($intpId) {
        $objlRepository = $this->objcManager->getRepository(Personne::class);
        $objlPersonne = $objlRepository->find($intpId);

        return $objlPersonne->getNom();
    }

}