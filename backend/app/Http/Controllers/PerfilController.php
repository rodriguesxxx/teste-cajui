<?php

namespace App\Http\Controllers;

use App\Facades\Response;
use App\Http\Requests\EditarAlunoRequest;
use App\Services\IPerfilService;
use App\Transformers\AlunoResource;
use App\Types\AlunoDTO;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function __construct(protected IPerfilService $perfilService)
    {
    }

    public function me(): JsonResponse
    {
        return Response::success()
            ->message("Informações do aluno retornadas com sucesso!")
            ->data(AlunoResource::make(Auth::user()))
            ->send();
    }

    public function update(EditarAlunoRequest $request): JsonResponse
    {
        $data = AlunoDTO::fromRequest($request);

        $this->perfilService->atualizar(Auth::user(), $data);
        
        return Response::success()
            ->message("Informações do perfil foram atualizadas com sucesso!")
            ->data(AlunoResource::make(Auth::user()))
            ->send();
    }
}