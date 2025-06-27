<?php

namespace App\Services;

use App\Exceptions\PerfilException;
use App\Facades\Upload;
use App\Models\User;
use App\Types\AlunoDTO;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class PerfilService implements IPerfilService
{
    public function atualizar(User $user, AlunoDTO $data): void
    {
        try {
            DB::beginTransaction();
            
            $user->update($data->toArray());
            
            if($data->foto()) {
                $user->foto = $this->salvarFotoPerfil($user, $data->foto());
                $user->save();
            }

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            throw new PerfilException("Erro interno ao atualizar as informações do usuário {$user->name}!");
        }
    }

    private function salvarFotoPerfil(User $user, UploadedFile $foto): string
    {
        $pasta = "alunos/{$user->id}";

        return Upload::make()
            ->file($foto)
            ->directory($pasta)
            ->disk('public')
            ->save();
    }
}