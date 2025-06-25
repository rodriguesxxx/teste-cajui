<?php

namespace App\Transformers\Collections;

use App\Models\Aluno;
use App\Transformers\AvaliacaoAlunoResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AvaliacaoAlunoResourceCollection extends ResourceCollection
{
    public function __construct($resource, protected Aluno $aluno)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return $this->collection->map(function ($avaliacao) {
            return new AvaliacaoAlunoResource($avaliacao, $this->aluno);
        })->all();
    }
}