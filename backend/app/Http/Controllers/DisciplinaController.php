<?php

namespace App\Http\Controllers;

use App\Facades\Response;
use App\Models\Disciplina;
use App\Services\IDisciplinaService;
use App\Transformers\Collections\AvaliacaoAlunoResourceCollection;
use App\Transformers\DisciplinaResource;
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

        return Response::success()
            ->message("Disciplinas listadas com sucesso!")
            ->data($disciplinas)
            ->send();
    }
    
    /**
     * Retorno disciplinas aluno
    */
    public function indexDisciplinasAluno(Request $request): JsonResponse
    {
        $disciplinas = $this->disciplinaService->listarDisciplinasAluno(Auth::user());

        return Response::success()
            ->message("Disciplinas listadas com sucesso!")
            ->data(DisciplinaResource::collection($disciplinas))
            ->send();
    }

    /**
     * Retorno disciplina específica
    */
    public function showDisciplinaAluno(Request $request, Disciplina $disciplina): JsonResponse
    {
        $disciplina = $this->disciplinaService->getDisciplinaAluno($disciplina, Auth::user());

        return Response::success()
            ->message("Disciplina retornada com sucesso!")
            ->data(DisciplinaResource::make($disciplina))
            ->send();
    }

    /**
    * Retorno avaliações aluno
    */
    public function showAvaliacoesAluno(Request $request, Disciplina $disciplina): JsonResponse
    {
        $avaliacoes = $this->disciplinaService->listarAvaliacoesAlunoPorDisciplina($disciplina, Auth::user());

        return Response::success()
            ->message("Avaliações listadas com sucesso!")
            ->data(AvaliacaoAlunoResourceCollection::make($avaliacoes, Auth::user()->aluno()))
            ->send();
    }

    /**
    * Retorno média aluno em determinada disciplina
    */
    public function showMediaAluno(Request $request, Disciplina $disciplina): JsonResponse
    {
        $media = $this->disciplinaService->calcularMediaAluno($disciplina, Auth::user());
        
        return Response::success()
            ->message("Avaliações listadas com sucesso!")
            ->data(['media' => $media])
            ->send();   
    }
}
