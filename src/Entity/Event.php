<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: AssoEventReservation::class)]
    private Collection $reservation;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $imgEvent = null;

    public function __construct()
    {
        $this->dateEvent = new ArrayCollection();
        $this->datesEvent = new ArrayCollection();
        $this->reservation = new ArrayCollection();
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

    /**
     * @return Collection<int, AssoEventReservation>
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(AssoEventReservation $reservation): static
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation->add($reservation);
            $reservation->setEvent($this);
        }

        return $this;
    }

    public function removeReservation(AssoEventReservation $reservation): static
    {
        if ($this->reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getEvent() === $this) {
                $reservation->setEvent(null);
            }
        }

        return $this;
    }

    public function getImgEvent(): ?string
    {
        return $this->imgEvent;
    }

    public function setImgEvent(?string $imgEvent): static
    {
        $this->imgEvent = $imgEvent;

        return $this;
    }

    /**
     * Fonction d'instance de la classe Event. Renvoie le nombre de places libres de l'évènement qui l'appel.
     *
     * @return int
     */
    public function getNbPlacesLibres(): int
    {
        return $this->nbPlaces - count($this->getReservation());
    }
}
