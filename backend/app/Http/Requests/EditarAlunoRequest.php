<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarAlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'sometimes|string',
            'email' => [
                'sometimes',
                'email',
                'unique:users,email',
                'regex:/@(ifnmg\.edu\.br|aluno\.ifnmg\.edu\.br)$/i'
            ],
            'foto' => 'sometimes|file|mimes:jpg,png,jpeg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.string' => 'Insira um nome válido.',
            'email.email' => 'Insira um endereço de e-mail válido.',
            'email.unique' => 'O e-mail informado já está cadastrado em nosso sistema.',
            'email.regex' => 'O e-mail deve ser dos domínios ifnmg.edu.br ou aluno.ifnmg.edu.br.',
            'foto.file' => 'A foto deve ser um arquivo.',
            'foto.mimes' => 'A foto deve ser um arquivo do tipo: jpg, jpeg ou png.',
            'foto.max' => 'A foto não pode ter mais que 2MB.',
        ];
    }
}
