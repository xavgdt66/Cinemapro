<?php
namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SalleRepository;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: "integer", nullable: true)] 
    private ?int $Numerosalle; 

    #[ORM\Column(type: "integer", nullable: true)] 
    private ?int $Capacite;

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    #[ORM\ManyToOne(targetEntity:"App\Entity\User", inversedBy:"salles")] 
    private $user;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getId(): int
    {
        return $this->id;
    }

    public function getNumerosalle(): ?int 
    {
        return $this->Numerosalle;
    }

    public function setNumerosalle(?int $Numerosalle): self 
    {
        $this->Numerosalle = $Numerosalle;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->Capacite;
    }

    public function setCapacite(?int $Capacite): self
    {
        $this->Capacite = $Capacite;

        return $this;
    }
}
