<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: FamilleAnimal::class, mappedBy: 'habitats')]
    private Collection $famillesAnimaux;

    /**
     * Constructeur de la classe Habitat. Définit l'attribut famillesAnimaux.
     */
    public function __construct()
    {
        $this->famillesAnimaux = new ArrayCollection();
    }

    /**
     * Accesseur de l'identifiant d'un habitat.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Accesseur du libellé de l'habitat.
     *
     * @return string|null
     */
    public function getLibHabitat(): ?string
    {
        return $this->libHabitat;
    }

    /**
     * Modifie le libellé d'un habitat séléctionné en paramètre.
     *
     * @param string $libHabitat
     * @return $this
     */
    public function setLibHabitat(string $libHabitat): static
    {
        $this->libHabitat = $libHabitat;

        return $this;
    }


    /**
     * Accesseur des fammilles d'animaux présentes dans un habitat.
     *
     * @return Collection<int, FamilleAnimal>
     */
    public function getFamillesAnimaux(): Collection
    {
        return $this->famillesAnimaux;
    }

    /**
     * Permet d'ajouter une ou plusieures familles d'animaux dans un habitat, si ces familles n'y étaient pas déjà auparavant.
     *
     * @param FamilleAnimal $famillesAnimaux
     * @return $this
     */
    public function addFamillesAnimaux(FamilleAnimal $famillesAnimaux): static
    {
        if (!$this->famillesAnimaux->contains($famillesAnimaux)) {
            $this->famillesAnimaux->add($famillesAnimaux);
            $famillesAnimaux->addHabitat($this);
        }

        return $this;
    }

    /**
     * Permet de supprimer une ou plusieures familles d'animaux dans un habitat, si ces familles y étaient auparavant.
     *
     * @param FamilleAnimal $famillesAnimaux
     * @return $this
     */
    public function removeFamillesAnimaux(FamilleAnimal $famillesAnimaux): static
    {
        if ($this->famillesAnimaux->removeElement($famillesAnimaux)) {
            $famillesAnimaux->removeHabitat($this);
        }

        return $this;
    }
}
