<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: AssoEventReservation::class)]
    private Collection $assoEventReservations;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Billet $billet = null;

    public function __construct()
    {
        $this->assoEventReservations = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, AssoEventReservation>
     */
    public function getAssoEventReservations(): Collection
    {
        return $this->assoEventReservations;
    }

    public function addAssoEventReservation(AssoEventReservation $assoEventReservation): static
    {
        if (!$this->assoEventReservations->contains($assoEventReservation)) {
            $this->assoEventReservations->add($assoEventReservation);
            $assoEventReservation->setReservation($this);
        }

        return $this;
    }

    public function removeAssoEventReservation(AssoEventReservation $assoEventReservation): static
    {
        if ($this->assoEventReservations->removeElement($assoEventReservation)) {
            // set the owning side to null (unless already changed)
            if ($assoEventReservation->getReservation() === $this) {
                $assoEventReservation->setReservation(null);
            }
        }

        return $this;
    }

    public function getBillet(): ?Billet
    {
        return $this->billet;
    }

    public function setBillet(?Billet $billet): static
    {
        $this->billet = $billet;

        return $this;
    }
}
