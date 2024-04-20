<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nbrplaces = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrplaces(): ?string
    {
        return $this->nbrplaces;
    }

    public function setNbrplaces(string $nbrplaces): static
    {
        $this->nbrplaces = $nbrplaces;

        return $this;
    }
}
