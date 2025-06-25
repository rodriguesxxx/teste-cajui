<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class DisciplinaException extends DomainException
{
    public function __construct(
        string $message = 'Ocorreu um erro ao processar as disciplinas!',
        int $code = Response::HTTP_INTERNAL_SERVER_ERROR,
    ) {
        parent::__construct($message, $code);
    }
}
