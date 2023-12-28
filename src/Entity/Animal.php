<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $taille = null;

    #[ORM\Column]
    private ?float $poids = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateMort = null;

    #[ORM\Column(length: 128)]
    private ?string $caracteristique = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?FamilleAnimal $famille = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $imgAnimal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getDateMort(): ?\DateTimeInterface
    {
        return $this->dateMort;
    }

    public function setDateMort(?\DateTimeInterface $dateMort): static
    {
        $this->dateMort = $dateMort;

        return $this;
    }

    public function getCaracteristique(): ?string
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(string $caracteristique): static
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    public function getFamille(): ?FamilleAnimal
    {
        return $this->famille;
    }

    public function setFamille(?FamilleAnimal $famille): static
    {
        $this->famille = $famille;

        return $this;
    }

    public function getImgAnimal(): ?string
    {
        return $this->imgAnimal;
    }

    public function setImgAnimal(?string $imgAnimal): static
    {
        $this->imgAnimal = $imgAnimal;

        return $this;
    }
}
