<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class ProjectDeveloperDto
{
//    #[Assert\NotBlank(message: 'Флаг действия не должен быть пустым')]
    #[Assert\NotNull(message: 'Флаг действия не должен быть пустым')]
    private bool $action;

    #[Assert\NotBlank(message: 'id разработчика не должен быть пустым')]
    private int $developerId;

    #[Assert\NotBlank(message: 'id проекта не должен быть пустым')]
    private int $projectId;

    public function isAction(): bool
    {
        return $this->action;
    }

    public function setAction(bool $action): void
    {
        $this->action = $action;
    }

    public function getDeveloperId(): int
    {
        return $this->developerId;
    }

    public function setDeveloperId(int $developerId): void
    {
        $this->developerId = $developerId;
    }

    public function getProjectId(): int
    {
        return $this->projectId;
    }

    public function setProjectId(int $projectId): void
    {
        $this->projectId = $projectId;
    }
}
