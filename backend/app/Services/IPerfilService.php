<?php

namespace App\Services;

use App\Models\User;
use App\Types\AlunoDTO;

interface IPerfilService
{
    public function atualizar(User $user, AlunoDTO $data): void; 
}