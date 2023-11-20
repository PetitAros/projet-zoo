<?php

namespace App\Entity;

use App\Repository\FamilleAnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilleAnimalRepository::class)]
class FamilleAnimal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $nomFamilleAnimal = null;

    #[ORM\Column(length: 128)]
    private ?string $nomScientifique = null;

    #[ORM\Column]
    private ?int $dangerExtinction = null;

    #[ORM\Column(length: 511)]
    private ?string $description = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $imgFamilleAnimal = null;

    #[ORM\Column(length: 128)]
    private ?string $typeAlimentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFamilleAnimal(): ?string
    {
        return $this->nomFamilleAnimal;
    }

    public function setNomFamilleAnimal(string $nomFamilleAnimal): static
    {
        $this->nomFamilleAnimal = $nomFamilleAnimal;

        return $this;
    }

    public function getNomScientifique(): ?string
    {
        return $this->nomScientifique;
    }

    public function setNomScientifique(string $nomScientifique): static
    {
        $this->nomScientifique = $nomScientifique;

        return $this;
    }

    public function getDangerExtinction(): ?int
    {
        return $this->dangerExtinction;
    }

    public function setDangerExtinction(int $dangerExtinction): static
    {
        $this->dangerExtinction = $dangerExtinction;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImgFamilleAnimal()
    {
        return $this->imgFamilleAnimal;
    }

    public function setImgFamilleAnimal($imgFamilleAnimal): static
    {
        $this->imgFamilleAnimal = $imgFamilleAnimal;

        return $this;
    }

    public function getTypeAlimentation(): ?string
    {
        return $this->typeAlimentation;
    }

    public function setTypeAlimentation(string $typeAlimentation): static
    {
        $this->typeAlimentation = $typeAlimentation;

        return $this;
    }
}
