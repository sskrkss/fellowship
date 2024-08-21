<?php

namespace App\Entity;

use App\Repository\DeveloperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DeveloperRepository::class)]
class Developer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $fullName = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $position = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $salary = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\ManyToMany(targetEntity: Project::class, inversedBy: 'developers', cascade: ['persist'])]
    #[ORM\JoinTable(name: 'developers_projects')]
    private Collection $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(?int $salary): void
    {
        $this->salary = $salary;
    }

    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): void
    {
        if (!$this->projects->contains($project)) {
            $project->addDeveloper($this);
            $this->projects->add($project);
        }
    }

    public function removeProject(Project $project): void
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
        }
    }
}
