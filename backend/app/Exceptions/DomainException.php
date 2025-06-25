<?php

namespace App\Exceptions;

use Exception;

class DomainException extends Exception
{
    public function __construct(
        string $message = '',
        int $status = 0,
    ) {
        parent::__construct($message, $status);
    }
}
