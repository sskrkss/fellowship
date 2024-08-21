<?php

namespace App\Service;

use App\Exception\DeveloperNotFoundException;
use App\Exception\ProjectNotFoundException;
use App\Model\DeleteDto;
use App\Model\PositionDeveloperDto;
use App\Model\NewDeveloperDto;
use App\Model\ProjectDeveloperDto;
use App\Repository\DeveloperRepository;
use App\Repository\ProjectRepository;

readonly class DeveloperService
{
    public function __construct(
        private DeveloperRepository $developerRepository,
        private ProjectRepository $projectRepository
    ) {
    }

    public function createDeveloper(NewDeveloperDto $newDeveloperDto): array
    {
        $fullName = $newDeveloperDto->getFullName();
        $position = $newDeveloperDto->getPosition();
        $salary = $newDeveloperDto->getSalary();
        $email = $newDeveloperDto->getEmail();
        $phone = $newDeveloperDto->getPhone();

        $this->developerRepository->newDeveloper($fullName, $position, $salary, $email, $phone);

        return ['message' => 'Разработчик добавлен'];
    }

    public function deleteDeveloper(DeleteDto $deleteDto): array
    {
        $id = $deleteDto->getId();
        $developer = $this->developerRepository->find($id);

        if (null === $developer) {
            throw new DeveloperNotFoundException();
        }

        $this->developerRepository->deleteDeveloper($developer);

        return ['message' => 'Разработчик удален'];
    }

    public function movePosition(PositionDeveloperDto $positionDeveloperDto): array
    {
        $developerId = $positionDeveloperDto->getDeveloperId();
        $position = $positionDeveloperDto->getPosition();
        $developer = $this->developerRepository->find($developerId);

        if (null === $developer) {
            throw new DeveloperNotFoundException();
        }

        $this->developerRepository->setPosition($developer, $position);

        return ['message' => 'Перевод на новую должность осуществлен'];
    }

    public function moveProject(ProjectDeveloperDto $projectDeveloperDto): array
    {
        $developerId = $projectDeveloperDto->getDeveloperId();
        $projectId = $projectDeveloperDto->getProjectId();
        $action = $projectDeveloperDto->isAction();
        $developer = $this->developerRepository->find($developerId);
        $project = $this->projectRepository->find($projectId);

        if (null === $developer) {
            throw new DeveloperNotFoundException();
        }

        if (null === $project) {
            throw new ProjectNotFoundException();
        }

        if ($action) {
            $this->developerRepository->addProject($developer, $project);

            return ['message' => 'Перевод на новый проект осуществлен'];
        } else {
            $this->developerRepository->removeProject($developer, $project);

            return ['message' => 'Отстранение от проекта осуществлено'];
        }
    }
}
