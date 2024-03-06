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


    #[ORM\Column(type: "int")]
    private int $Numerosalle;


    #[ORM\Column(type: "int")]
    private int $Capacite; 
    

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
