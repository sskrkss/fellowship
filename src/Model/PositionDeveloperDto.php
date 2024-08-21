<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PositionDeveloperDto
{
    #[Assert\NotBlank(message: 'id разработчика не должен быть пустым')]
    private int $developerId;

    #[Assert\NotBlank(message: 'Должность не должна быть пустой')]
    #[Assert\Choice(choices: ['программист', 'администратор', 'devops', 'дизайнер'], message: 'Недопустимая должность')]
    private string $position;

    public function getDeveloperId(): int
    {
        return $this->developerId;
    }

    public function setDeveloperId(int $developerId): void
    {
        $this->developerId = $developerId;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }
}
