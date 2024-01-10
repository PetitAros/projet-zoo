<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'habitat', targetEntity: AssoHabitatFamilleAnimal::class)]
    private Collection $assoHabitatFamilleAnimal;

    /**
     * Constructeur de la classe Habitat. Définit l'attribut famillesAnimaux.
     */
    public function __construct()
    {
        $this->famillesAnimaux = new ArrayCollection();
        $this->assoHabitatFamilleAnimal = new ArrayCollection();
    }

    /**
     * Accesseur de l'identifiant d'un habitat.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Accesseur du libellé de l'habitat.
     */
    public function getLibHabitat(): ?string
    {
        return $this->libHabitat;
    }

    /**
     * Modifie le libellé d'un habitat séléctionné en paramètre.
     *
     * @return $this
     */
    public function setLibHabitat(string $libHabitat): static
    {
        $this->libHabitat = $libHabitat;

        return $this;
    }

    /**
     * @return Collection<int, AssoHabitatFamilleAnimal>
     */
    public function getAssoHabitatFamilleAnimal(): Collection
    {
        return $this->assoHabitatFamilleAnimal;
    }

    public function addAssoHabitatFamilleAnimal(AssoHabitatFamilleAnimal $assoHabitatFamilleAnimal): static
    {
        if (!$this->assoHabitatFamilleAnimal->contains($assoHabitatFamilleAnimal)) {
            $this->assoHabitatFamilleAnimal->add($assoHabitatFamilleAnimal);
            $assoHabitatFamilleAnimal->setHabitat($this);
        }

        return $this;
    }

    public function removeAssoHabitatFamilleAnimal(AssoHabitatFamilleAnimal $assoHabitatFamilleAnimal): static
    {
        if ($this->assoHabitatFamilleAnimal->removeElement($assoHabitatFamilleAnimal)) {
            // set the owning side to null (unless already changed)
            if ($assoHabitatFamilleAnimal->getHabitat() === $this) {
                $assoHabitatFamilleAnimal->setHabitat(null);
            }
        }

        return $this;
    }
}
