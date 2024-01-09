<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatRepository::class)]
class Habitat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $libHabitat = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $iconeHabitat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibHabitat(): ?string
    {
        return $this->libHabitat;
    }

    public function setLibHabitat(string $libHabitat): static
    {
        $this->libHabitat = $libHabitat;

        return $this;
    }

    public function getIconeHabitat()
    {
        return $this->iconeHabitat;
    }

    public function setIconeHabitat($iconeHabitat): static
    {
        $this->iconeHabitat = $iconeHabitat;

        return $this;
    }
}
