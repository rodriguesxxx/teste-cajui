<?php

namespace App\Http\Controllers;

use App\Facades\Response;
use App\Transformers\AlunoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function __construct()
    {
    }

    public function me(): JsonResponse
    {
        return  Response::success()
            ->message("Informações do aluno retornadas com sucesso!")
            ->data(AlunoResource::make(Auth::user()))
            ->send();
    }


}