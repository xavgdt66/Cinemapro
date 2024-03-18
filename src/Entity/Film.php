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
    // Déclaration de la relation OneToMany avec l'entité Horaire
    #[ORM\OneToMany(targetEntity: "App\Entity\Horaire", mappedBy: "film", cascade: ["persist"])]
    private $horaires;

    // Constructeur pour initialiser la collection $horaires
    public function __construct()
    {
        $this->horaires = new ArrayCollection();
    }

      // Méthode pour récupérer la collection d'Horaires associés à ce Film
    /**
     * @return Collection|Horaire[]  
     */
    public function getHoraires(): Collection
    {
        return $this->horaires;
    }
    // Méthode pour ajouter un Horaire à la collection et mettre à jour la relation inverse
    public function addHoraire(Horaire $horaire): self
    {
        if (!$this->horaires->contains($horaire)) {
            $this->horaires[] = $horaire;
            $horaire->setFilm($this); // Mise à jour de la relation inverse dans Horaire
        }

        return $this;
    }

     // Méthode pour supprimer un Horaire de la collection et mettre à jour la relation inverse
     public function removeHoraire(Horaire $horaire): self
     {
         if ($this->horaires->contains($horaire)) {
             $this->horaires->removeElement($horaire);
             // Mettre à null le côté propriétaire de la relation si nécessaire
             if ($horaire->getFilm() === $this) {
                 $horaire->setFilm(null); // Mise à jour de la relation inverse dans Horaire
             }
         }
 
         return $this;
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

}