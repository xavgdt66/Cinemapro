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
    private string $Numérosalle;

    public function getId(): int
    {
        return $this->id;
    }



}
