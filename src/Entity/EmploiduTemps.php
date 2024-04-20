<?php

namespace App\Entity;

use App\Repository\EmploiduTempsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmploiduTempsRepository::class)]
class EmploiduTemps
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Jour = null;

    #[ORM\Column]
    private ?int $Mois = null;

    #[ORM\Column]
    private ?int $Annee = null;

    /**
     * @var Collection<int, seance>
     */
    #[ORM\OneToMany(targetEntity: seance::class, mappedBy: 'idemploisdutemps')]
    private Collection $idseance;

    public function __construct()
    {
        $this->idseance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?int
    {
        return $this->Jour;
    }

    public function setJour(int $Jour): static
    {
        $this->Jour = $Jour;

        return $this;
    }

    public function getMois(): ?int
    {
        return $this->Mois;
    }

    public function setMois(int $Mois): static
    {
        $this->Mois = $Mois;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->Annee;
    }

    public function setAnnee(int $Annee): static
    {
        $this->Annee = $Annee;

        return $this;
    }

    /**
     * @return Collection<int, seance>
     */
    public function getIdseance(): Collection
    {
        return $this->idseance;
    }

    public function addIdseance(seance $idseance): static
    {
        if (!$this->idseance->contains($idseance)) {
            $this->idseance->add($idseance);
            $idseance->setIdemploisdutemps($this);
        }

        return $this;
    }

    public function removeIdseance(seance $idseance): static
    {
        if ($this->idseance->removeElement($idseance)) {
            // set the owning side to null (unless already changed)
            if ($idseance->getIdemploisdutemps() === $this) {
                $idseance->setIdemploisdutemps(null);
            }
        }

        return $this;
    }
}
