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

    #[ORM\ManyToOne(inversedBy: 'datesEvent')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $event = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DateEvent $dateEvent = null;






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

}
