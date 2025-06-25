<?php

namespace App\Exceptions;

use App\Facades\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->renderable(function (\Throwable $th): JsonResponse {
            return Response::error()
                ->status(HttpResponse::HTTP_INTERNAL_SERVER_ERROR)
                ->message($th->getMessage() ?? 'Erro inesperado, tente novamente mais tarde!')
                ->send();
        });
    }
}
