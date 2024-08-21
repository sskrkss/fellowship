<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class DeleteDto
{
    #[Assert\NotBlank(message: 'id не должен быть пустым')]
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
