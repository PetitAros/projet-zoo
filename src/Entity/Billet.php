<?php

namespace App\Entity;

use App\Repository\BilletRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BilletRepository::class)]
class Billet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbJours = null;

    #[ORM\Column]
    private ?float $tarifAdult = null;

    #[ORM\Column]
    private ?float $tarifChild = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbJours(): ?int
    {
        return $this->nbJours;
    }

    public function setNbJours(int $nbJours): static
    {
        $this->nbJours = $nbJours;

        return $this;
    }

    public function getTarifAdult(): ?float
    {
        return $this->tarifAdult;
    }

    public function setTarifAdult(float $tarifAdult): static
    {
        $this->tarifAdult = $tarifAdult;

        return $this;
    }

    public function getTarifChild(): ?float
    {
        return $this->tarifChild;
    }

    public function setTarifChild(float $tarifChild): static
    {
        $this->tarifChild = $tarifChild;

        return $this;
    }
}
