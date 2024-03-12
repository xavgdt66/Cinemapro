<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: "string", length: 555, nullable: true)]
    private string $titre;


    /////////////////////////////////////////////////////////
    // cascade: ["persist"] =  Cela permet d'enregistrer ton objet Film en enregistrant un objet enfant, ici Horaire.

    #[ORM\OneToMany(targetEntity: "App\Entity\Horaire", mappedBy: "film", cascade: ["persist"])] 
    private $horaires; 




    public function __construct()
    {
        $this->horaires = new ArrayCollection();
    }





    /////////////////////////////////////////////////////////






    public function getId(): int
    {
        return $this->id;
    }


    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    ////////////////////////////////////////////////////
    /**
     * @return Collection|Horaire[]  
     */
    public function getHoraires(): Collection
    {
        return $this->horaires;
    }

    public function addHoraire(Horaire $horaire): self
    {
        if (!$this->horaires->contains($horaire)) {
            $this->horaires[] = $horaire;
            $horaire->setFilm($this);
        }

        return $this;
    }

    public function removeHoraire(Horaire $horaire): self
    {
        if ($this->horaires->contains($horaire)) {
            $this->horaires->removeElement($horaire);
            // set the owning side to null (unless already changed)
            if ($horaire->getFilm() === $this) {
                $horaire->setFilm(null);
            }
        }

        return $this;
    }
    ////////////////////////////////////////////////////
}
