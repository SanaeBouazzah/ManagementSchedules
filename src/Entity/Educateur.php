<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?emploidutemps $idemploisdutemps = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdemploisdutemps(): ?emploidutemps
    {
        return $this->idemploisdutemps;
    }

    public function setIdemploisdutemps(emploidutemps $idemploisdutemps): static
    {
        $this->idemploisdutemps = $idemploisdutemps;

        return $this;
    }
}
