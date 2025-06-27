<?php

namespace App\Transformers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlunoResource extends JsonResource
{
    public function __construct(User $resource)
    {
        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->name,
            'email' => $this->email,
            'matricula' => $this->aluno()?->matricula,
            'foto' => $this->foto,
        ];
    }
}
