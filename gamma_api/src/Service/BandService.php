<?php
// src/Service/BandService.php

namespace App\Service;

use App\Entity\Band;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;

class BandService
{
    private ManagerRegistry $doctrine;
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function create(string $nomGroupe, string $origin, string $ville, float $annéeDébut, float $annéeSéparation, string $fondateurs, int $membres, string $courantMusical, string $présentation)
    {
        $entityManager = $this->doctrine->getManager();
    
        $band = new Band();
        $band->setNomGroupe($nomGroupe);
        $band->setOrigine($origin);
        $band->setVille($ville);
        $band->setAnnéeDébut($annéeDébut);
        $band->setAnnéeSéparation($annéeSéparation);
        $band->setFondateurs($fondateurs);
        $band->setMembres($membres);
        $band->setCourantMusical($courantMusical);
        $band->setPrésentation($présentation);

        $entityManager->persist($band);
        $entityManager->flush();
        return new JsonResponse(200);
    }
}
