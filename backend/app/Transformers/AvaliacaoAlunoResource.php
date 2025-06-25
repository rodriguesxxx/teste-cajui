<?php

namespace App\Transformers;

use App\Models\Aluno;
use App\Models\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AvaliacaoAlunoResource extends JsonResource
{
    public function __construct(Avaliacao $resource, protected Aluno $aluno)
    {
        parent::__construct($resource);
    }

    public static function collectionWithAluno($resource, Aluno $aluno)
    {
        return collect($resource)->map(function ($avaliacao) use ($aluno) {
            return new static($avaliacao, $aluno);
        });
    }

    public function toArray(Request $request): array
    {
        $notaAluno = $this->aluno->nota_avaliacao($this->id);

        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'data' => $this->data,
            'nota_maxima' => $this->nota_maxima,
            'nota' => $notaAluno->nota ?? 0,
        ];
    }
}
