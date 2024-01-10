<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspeceRepository::class)]
class Espece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $libEspece = null;

    #[ORM\OneToMany(mappedBy: 'esp√√®ce', targetEntity: FamilleAnimal::class)]
    private Collection $familleAnimals;

    public function __construct()
    {
        $this->familleAnimals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibEspece(): ?string
    {
        return $this->libEspece;
    }

    public function setLibEspece(string $libEspece): static
    {
        $this->libEspece = $libEspece;

        return $this;
    }

    /**
     * @return Collection<int, FamilleAnimal>
     */
    public function getFamilleAnimals(): Collection
    {
        return $this->familleAnimals;
    }

    public function addFamilleAnimal(FamilleAnimal $familleAnimal): static
    {
        if (!$this->familleAnimals->contains($familleAnimal)) {
            $this->familleAnimals->add($familleAnimal);
            $familleAnimal->setEsp√√®ce($this);
        }

        return $this;
    }

    public function removeFamilleAnimal(FamilleAnimal $familleAnimal): static
    {
        if ($this->familleAnimals->removeElement($familleAnimal)) {
            // set the owning side to null (unless already changed)
            if ($familleAnimal->getEsp√√®ce() === $this) {
                $familleAnimal->setEsp√√®ce(null);
            }
        }

        return $this;
    }
}
