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

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $iconeHabitat = null;

    #[ORM\ManyToMany(targetEntity: FamilleAnimal::class, mappedBy: 'habitat')]
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
     * Accesseur de l'icone de l'habitat. Peut retourner null si l'habitat n'a pas d'image liée.
     *
     * @return null
     */
    public function getIconeHabitat()
    {
        return $this->iconeHabitat;
    }

    /**
     * Modifie l'icone d'un habitat (ou bien l'attribue s'il n'y en avait pas au préalable).
     *
     * @param $iconeHabitat
     * @return $this
     */
    public function setIconeHabitat($iconeHabitat): static
    {
        $this->iconeHabitat = $iconeHabitat;

        return $this;
    }

    /**
     * @return Collection<int, FamilleAnimal>
     */
    public function getFamillesAnimaux(): Collection
    {
        return $this->famillesAnimaux;
    }

    public function addFamillesAnimaux(FamilleAnimal $famillesAnimaux): static
    {
        if (!$this->famillesAnimaux->contains($famillesAnimaux)) {
            $this->famillesAnimaux->add($famillesAnimaux);
            $famillesAnimaux->addHabitat($this);
        }

        return $this;
    }

    public function removeFamillesAnimaux(FamilleAnimal $famillesAnimaux): static
    {
        if ($this->famillesAnimaux->removeElement($famillesAnimaux)) {
            $famillesAnimaux->removeHabitat($this);
        }

        return $this;
    }
}
