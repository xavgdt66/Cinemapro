<?php 
// src/Entity/Task.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection; 
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\TaskRepository;

#[ORM\Entity(repositoryClass: TaskRepository::class)] 
class Task 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id; 
    protected string $description;
    
    #[ORM\ManyToMany(targetEntity: Tag::class)]
    #[ORM\JoinTable(name: "tasks_tags")]
    protected Collection $tags; 

    public function __construct()
    {
        $this->tags = new ArrayCollection(); 
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }
}