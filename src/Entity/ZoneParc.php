<?php

namespace App\Entity;

use App\Repository\ZoneParcRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZoneParcRepository::class)]
class ZoneParc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $libZone = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $imgZone;

    #[ORM\OneToMany(mappedBy: 'zoneParc', targetEntity: FamilleAnimal::class)]
    private Collection $familleAnimals;

    public function __construct()
    {
        $this->familleAnimals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibZone(): ?string
    {
        return $this->libZone;
    }

    public function setLibZone(string $libZone): static
    {
        $this->libZone = $libZone;

        return $this;
    }

    public function getImgZone()
    {
        return $this->imgZone;
    }

    public function setImgZone($imgZone): static
    {
        $this->imgZone = $imgZone;

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
            $familleAnimal->setZoneParc($this);
        }

        return $this;
    }

    public function removeFamilleAnimal(FamilleAnimal $familleAnimal): static
    {
        if ($this->familleAnimals->removeElement($familleAnimal)) {
            // set the owning side to null (unless already changed)
            if ($familleAnimal->getZoneParc() === $this) {
                $familleAnimal->setZoneParc(null);
            }
        }

        return $this;
    }
}
