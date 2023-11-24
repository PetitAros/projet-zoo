<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $nomEvent = null;

    #[ORM\Column]
    private ?int $nbPlaces = null;

    #[ORM\Column(length: 512)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: DateEvent::class, inversedBy: 'event')]
    private Collection $dateEvent;

    public function __construct()
    {
        $this->dateEvent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvent(): ?string
    {
        return $this->nomEvent;
    }

    public function setNomEvent(string $nomEvent): static
    {
        $this->nomEvent = $nomEvent;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): static
    {
        $this->nbPlaces = $nbPlaces;

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

    /**
     * @return Collection<int, DateEvent>
     */
    public function getDateEvent(): Collection
    {
        return $this->dateEvent;
    }

    public function addDateEvent(DateEvent $dateEvent): static
    {
        if (!$this->dateEvent->contains($dateEvent)) {
            $this->dateEvent->add($dateEvent);
        }

        return $this;
    }

    public function removeDateEvent(DateEvent $dateEvent): static
    {
        $this->dateEvent->removeElement($dateEvent);

        return $this;
    }
}
