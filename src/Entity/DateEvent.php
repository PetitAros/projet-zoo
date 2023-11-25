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

    #[ORM\ManyToOne(inversedBy: 'dateEvents')]
    private ?AssoEventDateEvent $events = null;


    public function __construct()
    {
        $this->event = new ArrayCollection();
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

    public function getEvents(): ?AssoEventDateEvent
    {
        return $this->events;
    }

    public function setEvents(?AssoEventDateEvent $events): static
    {
        $this->events = $events;

        return $this;
    }

}
