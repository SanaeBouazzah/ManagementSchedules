<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nbrapprenant = null;

    #[ORM\Column(length: 255)]
    private ?string $nomgroupe = null;

    /**
     * @var Collection<int, salle>
     */
    #[ORM\ManyToMany(targetEntity: salle::class)]
    private Collection $idsalle;

    public function __construct()
    {
        $this->idsalle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrapprenant(): ?string
    {
        return $this->nbrapprenant;
    }

    public function setNbrapprenant(string $nbrapprenant): static
    {
        $this->nbrapprenant = $nbrapprenant;

        return $this;
    }

    public function getNomgroupe(): ?string
    {
        return $this->nomgroupe;
    }

    public function setNomgroupe(string $nomgroupe): static
    {
        $this->nomgroupe = $nomgroupe;

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
}
