<?php

namespace App\Exception;

use RuntimeException;

class ProjectNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Проект не найден');
    }
}
