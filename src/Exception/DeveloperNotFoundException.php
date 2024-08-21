<?php

namespace App\Exception;

use RuntimeException;

class DeveloperNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Разработчик не найден');
    }
}
