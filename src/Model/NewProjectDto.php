<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class NewProjectDto
{
    #[Assert\NotBlank(message: 'Название проекта не должно быть пустым')]
    private string $name;

    #[Assert\NotBlank(message: 'Заказчик не должен быть пустым')]
    private string $owner;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }
}
