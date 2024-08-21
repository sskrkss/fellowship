<?php

namespace App\Service;

use App\Exception\ProjectNotFoundException;
use App\Model\DeleteDto;
use App\Model\NewProjectDto;
use App\Repository\ProjectRepository;

readonly class ProjectService
{
    public function __construct(
        private ProjectRepository $projectRepository,
    ) {
    }

    public function createProject(NewProjectDto $newProjectDto): array
    {
        $name = $newProjectDto->getName();
        $owner = $newProjectDto->getOwner();

        $this->projectRepository->newProject($name, $owner);

        return ['message' => 'Проект добавлен'];
    }

    public function deleteProject(DeleteDto $deleteDto): array
    {
        $id = $deleteDto->getId();
        $project = $this->projectRepository->find($id);

        if (null === $project) {
            throw new ProjectNotFoundException();
        }

        $this->projectRepository->deleteProject($project);

        return ['message' => 'Проект удален'];
    }
}
