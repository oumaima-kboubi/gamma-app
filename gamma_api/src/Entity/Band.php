<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandRepository::class)]
class Band
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomGroupe = null;

    #[ORM\Column(length: 100)]
    private ?string $origine = null;

    #[ORM\Column(length: 100)]
    private ?string $ville = null;

    #[ORM\Column(nullable: false)]
    private ?float $annéeDébut = null;

    #[ORM\Column(nullable: true)]
    private ?float $annéeSéparation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fondateurs = null;

    #[ORM\Column(nullable: true)]
    private ?int $membres = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $courantMusical = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $présentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): static
    {
        $this->origine = $origine;

        return $this;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nomGroupe;
    }

    public function setNomGroupe(string $nomGroupe): static
    {
        $this->nomGroupe = $nomGroupe;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAnnéeDébut(): ?float
    {
        return $this->annéeDébut;
    }

    public function setAnnéeDébut(float $annéeDébut): static
    {
        $this->annéeDébut = $annéeDébut;

        return $this;
    }

    public function getAnnéeSéparation(): ?float
    {
        return $this->annéeSéparation;
    }

    public function setAnnéeSéparation(?float $annéeSéparation): static
    {
        $this->annéeSéparation = $annéeSéparation;

        return $this;
    }

    public function getFondateurs(): ?string
    {
        return $this->fondateurs;
    }

    public function setFondateurs(?string $fondateurs): static
    {
        $this->fondateurs = $fondateurs;

        return $this;
    }

    public function getMembres(): ?int
    {
        return $this->membres;
    }

    public function setMembres(?int $membres): static
    {
        $this->membres = $membres;

        return $this;
    }

    public function getCourantMusical(): ?string
    {
        return $this->courantMusical;
    }

    public function setCourantMusical(?string $courantMusical): static
    {
        $this->courantMusical = $courantMusical;

        return $this;
    }

    public function getPrésentation(): ?string
    {
        return $this->présentation;
    }

    public function setPrésentation(?string $présentation): static
    {
        $this->présentation = $présentation;

        return $this;
    }
}
