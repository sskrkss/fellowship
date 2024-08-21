<?php

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Project>
 */
class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private readonly EntityManagerInterface $em)
    {
        parent::__construct($registry, Project::class);
    }

    public function newProject(string $name, string $owner): void
    {
        $project = new Project();
        $project->setName($name);
        $project->setOwner($owner);

        $this->em->persist($project);
        $this->em->flush();
    }

    public function deleteProject(Project $project): void
    {
        $this->em->remove($project);
        $this->em->flush();
    }
}
