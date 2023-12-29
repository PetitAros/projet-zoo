<?php

namespace App\Entity;

use App\Repository\AssoEventDateEventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssoEventDateEventRepository::class)]
class AssoEventDateEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'datesEvent')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $event = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DateEvent $dateEvent = null;

    #[ORM\Column(length: 10)]
    private ?string $horaire = null;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->dateEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): static
    {
        $this->event = $event;

        return $this;
    }

    public function getDateEvent(): ?DateEvent
    {
        return $this->dateEvent;
    }

    public function setDateEvent(?DateEvent $dateEvent): static
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(string $horaire): static
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function __toString()
    {
        return $this->dateEvent->getDateEvent()->format('d-m-Y');
    }
}
