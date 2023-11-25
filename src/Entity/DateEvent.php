<?php

namespace App\Entity;

use App\Repository\DateEventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DateEventRepository::class)]
class DateEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEvent = null;

    #[ORM\OneToMany(mappedBy: 'dateEvent', targetEntity: AssoEventDateEvent::class)]
    private Collection $events;




    public function __construct()
    {
        $this->event = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->dateEvent;
    }

    public function setDateEvent(\DateTimeInterface $dateEvent): static
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    /**
     * @return Collection<int, AssoEventDateEvent>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(AssoEventDateEvent $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setDateEvent($this);
        }

        return $this;
    }

    public function removeEvent(AssoEventDateEvent $event): static
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getDateEvent() === $this) {
                $event->setDateEvent(null);
            }
        }

        return $this;
    }



}
