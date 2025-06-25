<?php

namespace App\Http\Controllers;

use App\Facades\Response;
use App\Models\Disciplina;
use App\Services\IDisciplinaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisciplinaController extends Controller
{

    public function __construct(protected IDisciplinaService $disciplinaService)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $disciplinas = Disciplina::all();

        return  Response::success()
            ->message("Disciplinas listadas com sucesso!")
            ->data($disciplinas)
            ->send();
    }

    public function indexDisciplinasAluno(Request $request): JsonResponse
    {
        $disciplinas = $this->disciplinaService->listarDisciplinasAluno(Auth::user());

        return  Response::success()
            ->message("Disciplinas listadas com sucesso!")
            ->data($disciplinas)
            ->send();
    }

    public function showDisciplinaAluno(Request $request, Disciplina $disciplina): JsonResponse
    {
        $disciplina = $this->disciplinaService->getDisciplinaAluno($disciplina, Auth::user());

        return  Response::success()
            ->message("Disciplina retornada com sucesso!")
            ->data($disciplina)
            ->send();
    }
}
