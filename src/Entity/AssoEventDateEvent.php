<?php

namespace App\Entity;

use App\Repository\AssoEventDateEventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssoEventDateEventRepository::class)]
class AssoEventDateEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $horaire = null;

    #[ORM\OneToMany(mappedBy: 'dateEvent', targetEntity: Event::class)]
    private Collection $events;

    #[ORM\OneToMany(mappedBy: 'events', targetEntity: DateEvent::class)]
    private Collection $dateEvents;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->dateEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHoraire(): ?\DateTimeInterface
    {
        return $this->horaire;
    }

    public function setHoraire(\DateTimeInterface $horaire): static
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setDateEvent($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): static
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getDateEvent() === $this) {
                $event->setDateEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DateEvent>
     */
    public function getDateEvents(): Collection
    {
        return $this->dateEvents;
    }

    public function addDateEvent(DateEvent $dateEvent): static
    {
        if (!$this->dateEvents->contains($dateEvent)) {
            $this->dateEvents->add($dateEvent);
            $dateEvent->setEvents($this);
        }

        return $this;
    }

    public function removeDateEvent(DateEvent $dateEvent): static
    {
        if ($this->dateEvents->removeElement($dateEvent)) {
            // set the owning side to null (unless already changed)
            if ($dateEvent->getEvents() === $this) {
                $dateEvent->setEvents(null);
            }
        }

        return $this;
    }
}
