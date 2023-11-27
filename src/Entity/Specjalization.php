<?php

namespace App\Entity;

use App\Repository\SpecjalizationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotNull;

#[ORM\Entity(repositoryClass: SpecjalizationRepository::class)]
class Specjalization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = Null;

    #[ORM\Column(length: 255)]
    private string $Name;

    #[ORM\OneToMany(mappedBy: 'specjalizacja', targetEntity: Doctor::class)]
    private Collection $doctors;

    public function __construct()
    {
        $this->doctors = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection<int, Doctor>
     */
    public function getDoctors(): Collection
    {
        return $this->doctors;
    }

    public function addDoctor(Doctor $doctor): static
    {
        if (!$this->doctors->contains($doctor)) {
            $this->doctors->add($doctor);
            $doctor->setSpecjalizacja($this);
        }

        return $this;
    }

    public function removeDoctor(Doctor $doctor): static
    {
        if ($this->doctors->removeElement($doctor)) {
            // set the owning side to null (unless already changed)
            if ($doctor->getSpecjalizacja() === $this) {
                $doctor->setSpecjalizacja(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->Name;
    }

}
