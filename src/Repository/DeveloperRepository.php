<?php

namespace App\Repository;

use App\Entity\Developer;
use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Developer>
 */
class DeveloperRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private readonly EntityManagerInterface $em)
    {
        parent::__construct($registry, Developer::class);
    }

    public function newDeveloper(string $fullName, string $position, int $salary, string $email, string $phone): void
    {
        $developer = new Developer();
        $developer->setFullName($fullName);
        $developer->setPosition($position);
        $developer->setSalary($salary);
        $developer->setEmail($email);
        $developer->setPhone($phone);

        $this->em->persist($developer);
        $this->em->flush();
    }

    public function deleteDeveloper(Developer $developer): void
    {
        $this->em->remove($developer);
        $this->em->flush();
    }

    public function setPosition(Developer $developer, string $position): void
    {
        $developer->setPosition($position);

        $this->em->persist($developer);
        $this->em->flush();
    }

    public function addProject(Developer $developer, Project $project): void
    {
        $developer->addProject($project);

        $this->em->persist($developer);
        $this->em->flush();
    }

    public function removeProject(Developer $developer, Project $project): void
    {
        $developer->removeProject($project);

        $this->em->persist($developer);
        $this->em->flush();
    }
}
