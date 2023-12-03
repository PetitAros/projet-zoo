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

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: AssoEventDateEvent::class)]
    private Collection $datesEvent;



    public function __construct()
    {
        $this->dateEvent = new ArrayCollection();
        $this->datesEvent = new ArrayCollection();
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
     * @return Collection<int, AssoEventDateEvent>
     */
    public function getDatesEvent(): Collection
    {
        return $this->datesEvent;
    }

    public function addDatesEvent(AssoEventDateEvent $datesEvent): static
    {
        if (!$this->datesEvent->contains($datesEvent)) {
            $this->datesEvent->add($datesEvent);
            $datesEvent->setEvent($this);
        }

        return $this;
    }

    public function removeDatesEvent(AssoEventDateEvent $datesEvent): static
    {
        if ($this->datesEvent->removeElement($datesEvent)) {
            // set the owning side to null (unless already changed)
            if ($datesEvent->getEvent() === $this) {
                $datesEvent->setEvent(null);
            }
        }

        return $this;
    }




}
