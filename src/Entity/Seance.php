<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Duree = null;

    /**
     * @var Collection<int, salle>
     */
    #[ORM\ManyToMany(targetEntity: salle::class)]
    private Collection $idsalle;

    /**
     * @var Collection<int, groupe>
     */
    #[ORM\ManyToMany(targetEntity: groupe::class)]
    private Collection $idgroupe;

    /**
     * @var Collection<int, programmes>
     */
    #[ORM\ManyToMany(targetEntity: programmes::class)]
    private Collection $idprogrammes;

    #[ORM\ManyToOne(inversedBy: 'idseance')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EmploiduTemps $idemploisdutemps = null;

    public function __construct()
    {
        $this->idsalle = new ArrayCollection();
        $this->idgroupe = new ArrayCollection();
        $this->idprogrammes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?string
    {
        return $this->Duree;
    }

    public function setDuree(string $Duree): static
    {
        $this->Duree = $Duree;

        return $this;
    }

    /**
     * @return Collection<int, salle>
     */
    public function getIdsalle(): Collection
    {
        return $this->idsalle;
    }

    public function addIdsalle(salle $idsalle): static
    {
        if (!$this->idsalle->contains($idsalle)) {
            $this->idsalle->add($idsalle);
        }

        return $this;
    }

    public function removeIdsalle(salle $idsalle): static
    {
        $this->idsalle->removeElement($idsalle);

        return $this;
    }

    /**
     * @return Collection<int, groupe>
     */
    public function getIdgroupe(): Collection
    {
        return $this->idgroupe;
    }

    public function addIdgroupe(groupe $idgroupe): static
    {
        if (!$this->idgroupe->contains($idgroupe)) {
            $this->idgroupe->add($idgroupe);
        }

        return $this;
    }

    public function removeIdgroupe(groupe $idgroupe): static
    {
        $this->idgroupe->removeElement($idgroupe);

        return $this;
    }

    /**
     * @return Collection<int, programmes>
     */
    public function getIdprogrammes(): Collection
    {
        return $this->idprogrammes;
    }

    public function addIdprogramme(programmes $idprogramme): static
    {
        if (!$this->idprogrammes->contains($idprogramme)) {
            $this->idprogrammes->add($idprogramme);
        }

        return $this;
    }

    public function removeIdprogramme(programmes $idprogramme): static
    {
        $this->idprogrammes->removeElement($idprogramme);

        return $this;
    }

    public function getIdemploisdutemps(): ?EmploiduTemps
    {
        return $this->idemploisdutemps;
    }

    public function setIdemploisdutemps(?EmploiduTemps $idemploisdutemps): static
    {
        $this->idemploisdutemps = $idemploisdutemps;

        return $this;
    }
}
