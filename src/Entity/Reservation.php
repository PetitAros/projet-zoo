<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateReservation = null;

    #[ORM\Column]
    private ?int $nbPlacesAdult = null;

    #[ORM\Column]
    private ?int $nbPlacesChild = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): static
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getNbPlacesAdult(): ?int
    {
        return $this->nbPlacesAdult;
    }

    public function setNbPlacesAdult(int $nbPlacesAdult): static
    {
        $this->nbPlacesAdult = $nbPlacesAdult;

        return $this;
    }

    public function getNbPlacesChild(): ?int
    {
        return $this->nbPlacesChild;
    }

    public function setNbPlacesChild(int $nbPlacesChild): static
    {
        $this->nbPlacesChild = $nbPlacesChild;

        return $this;
    }
}
