<?php
namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HoraireRepository;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]   
class Horaire
{
   #[ORM\Id]
   #[ORM\GeneratedValue]
   #[ORM\Column] 
   private int $id; 

   #[ORM\Column(type: "time")] 
   private \DateTimeInterface $heure;

 ////////////////////////////////
    #[ORM\ManyToOne(targetEntity:"App\Entity\Film", inversedBy:"horaires")] 
    #[ORM\JoinColumn(nullable:false)]
    
    private $film;   
////////////////////////////////
   public function getId(): int
   {
       return $this->id;
   }

   public function getHeure(): \DateTimeInterface
   {
       return $this->heure;
   }

   public function setHeure(\DateTimeInterface $heure): self
   {
       $this->heure = $heure;

       return $this;
   }

   ////////////////////////////////
   public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }
   ////////////////////////////////
  
}
