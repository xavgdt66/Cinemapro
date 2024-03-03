<?php
// src/Entity/Tag.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;
    private string $name;
 
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}