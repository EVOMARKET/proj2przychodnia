<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctorRepository::class)]
class Doctor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\ManyToOne(inversedBy: 'doctors')]
    private ?Specjalization $specjalizacja = null;

    #[ORM\OneToMany(mappedBy: 'doctor', targetEntity: Visit::class, orphanRemoval: true)]
    private Collection $visits;

    public function __construct()
    {
        $this->visits = new ArrayCollection();
    }

   

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getSpecjalizacja(): ?Specjalization
    {
        return $this->specjalizacja;
    }

    public function setSpecjalizacja(?Specjalization $specjalizacja): static
    {
        $this->specjalizacja = $specjalizacja;

        return $this;
    }

    /**
     * @return Collection<int, Visit>
     */
    public function getVisits(): Collection
    {
        return $this->visits;
    }
   

    public function addVisit(Visit $visit): static
    {
        if (!$this->visits->contains($visit)) {
            $this->visits->add($visit);
            $visit->setDoctor($this);
        }

        return $this;
    }

    public function removeVisit(Visit $visit): static
    {
        if ($this->visits->removeElement($visit)) {
            // set the owning side to null (unless already changed)
            if ($visit->getDoctor() === $this) {
                $visit->setDoctor(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->firstName . ' ' . $this->lastName. ' - '.$this->specjalizacja->getName();
        
    }
   
    
}
