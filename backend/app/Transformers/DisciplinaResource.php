<?php

namespace App\Transformers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DisciplinaResource extends JsonResource
{
    public function __construct(Disciplina $resource)
    {
        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'curso' => $this->curso->nome,
            'professor' => $this->professor->user->name,
            'periodo' => $this->periodo,
            'ementa' => $this->ementa,
            'carga_horaria' => $this->carga_horaria,
        ];
    }
}
