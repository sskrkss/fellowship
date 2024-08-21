<?php

namespace App\Exception;

use RuntimeException;

class RequestWrongTypeException extends RuntimeException
{
    public function __construct(string $attr, string $expectedType)
    {
        parent::__construct("$attr должен быть $expectedType");
    }
}
